<?php

namespace App\Http\Controllers;
use App\orders;
use DB; 

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new orders([
            'pname' => $request->get('category_id'),
            'pprice' => $request->get('prc'),
            'qty' => $request->get('qty'),
            'total' => $request->get('total'),
            'user'  => $request->get('user'),
        ]);
        $order ->save();
        return redirect('/home')->with ('success','order saved');
    }

}
