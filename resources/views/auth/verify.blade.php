<!doctype html>
<html>
    <head>
        <title>Verifikasi Akun mampirsaja.com</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Verifikasi email akun mampirsaja.com</h1>
        <p>{{$nama}}, Anda atau orang yang menggunakan email anda melakukan registrasi di mampirsaja.com dengan username {{$username}}. Untuk mengkonfirmasi email anda, klik link <a href="{{route('register-confirm', ['kode'=>$kode_konfirmasi])}}">konfirmasi</a>. Apabila Anda tidak melakukan registrasi, abaikan email ini. Terima kasih.</p>
    </body>
</html>
