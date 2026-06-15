<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Sale;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $products = Product::query();

        if ($keyword) {
            $products->where(
                'product_name',
                'like',
                '%' . $keyword . '%'
            );
        }

        if ($min_price) {
            $products->where(
                'price',
                '>=',
                $min_price
            );
        }

        if ($max_price) {
            $products->where(
                'price',
                '<=',
                $max_price
            );
        }

        $products = $products
            ->orderBy('id', 'asc')
            ->get();

        return view('product.index', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('product.detail', compact('product'));
    }

    public function buy($id)
    {
        $product = Product::find($id);

        return view('product.buy', compact('product'));
    }

    public function purchase(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', '商品が存在しません。');
        }

        if ($product->stock < 1) {
            return redirect()->back()->with('error', '在庫が不足しています。');
        }

        Sale::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $product->decrement('stock', 1);

        return redirect('/products');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);

        return redirect('/mypage');
    }

    public function mypage()
    {
        $products = Product::all();

        return view('product.mypage', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);

        return redirect('/mypage');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('/mypage');
    }

    public function mypageShow($id)
    {
        $product = Product::find($id);

        return view('product.mypage_show', compact('product'));
    }

    public function accountEdit()
    {
        $user = Auth::user();

        return view('product.account_edit', compact('user'));
    }

    public function accountUpdate(Request $request)
    {
        $user = Auth::user();

        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->name_kana = $request->name_kana;

        $user->save();

        return redirect('/mypage');
    }
}
