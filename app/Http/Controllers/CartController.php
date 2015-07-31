<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $items = 0;
        $total = 0;
        foreach ($session->get('cart') as $item) {
            $items += $item['qty'];
            $total += $item['produk']['harga'] * $item['qty'];
        }
        return view('cart', ['cart'=>$cart, 'total_items'=>$items, 'total'=>$total]);
    }

    public function del(Request $request, $index)
    {
        $session = $request->session();
        $session->forget('cart.' . $index);
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        return redirect()->route('cart');
    }

    public function increase(Request $request, $index)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $item = $session->get("cart.$index", null);
        if ($item != null) {
            $item['qty'] = $item['qty'] + 1;
            $session->put("cart.$index", $item);
        }

        return redirect()->route('cart');
    }

    public function decrease(Request $request, $index)
    {
        $session = $request->session();
        $cart = $session->get('cart', []);
        if (count($cart) == 0) {
            $session->forget('cart');
            return redirect()->route('root');
        }
        $item = $session->get("cart.$index", null);
        if ($item != null) {
            $item['qty'] = $item['qty'] - 1;
            $session->put("cart.$index", $item);

            if ($item['qty'] == 0) {
                return redirect()->route('delCart', ['index'=>$index]);
            }
        }

        return redirect()->route('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
