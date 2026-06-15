<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('product.contact');
    }

    public function send(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

        return redirect('/products');
    }
}
