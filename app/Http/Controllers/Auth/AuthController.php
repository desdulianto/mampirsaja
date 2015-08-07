<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_depan' => 'required|max:255',
            'nama_belakang' => 'required|max:255',
            'gender' => 'required|in:female,male',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'username' => 'required|max:255|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'username' => $data['username'],
            'kode_konfirmasi'=> $data['kode_konfirmasi'],
        ]);
    }

    public function loginUsername()
    {
        //return property_exists($this, 'username') ? $this->username : 'email';
        return 'username';
    }

    public function registerRole()
    {
        return view('auth.register-role');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $url = $request->url();
        $role = explode('/', $url);
        $role = array_pop($role);


        $kode_konfirmasi = str_random(30);
        $request->merge(['role'=>$role, 'kode_konfirmasi'=>$kode_konfirmasi]);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $username = $request->username;
        $nama_depan = $request->nama_depan;
        $nama_belakang = $request->nama_belakang;

        // buat user
        $this->create($request->all());

        Mail::send('auth.verify', array('nama'=>$nama_depan . ' ' . $nama_belakang,
                'username'=>$username, 'kode_konfirmasi'=>$kode_konfirmasi), function($pesan) {
                    $pesan->to(Input::get('email'), Input::get('username'))->subject('Verifikasi Akun mampirsaja.com');
        });

        //return redirect($this->redirectPath());
        return redirect()->route('login')->with('alert-info', 'Kami akan mengirimkan konfirmasi registrasi untuk memverifikasi email Anda. Silahkan periksa email Anda');
    }

    public function registerConfirm(Request $request, $kode) {
        $user = User::where('kode_konfirmasi', $kode)->firstOrFail();

        $user->konfirmasi = true;
        $user->kode_konfirmasi = null;
        $user->save();

        return redirect()->route('login')->with('alert-info', 'Account Anda sudah aktif! Silahkan login. Terima kasih.');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);
        $credentials['konfirmasi'] = true;

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        Session::regenerate();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
