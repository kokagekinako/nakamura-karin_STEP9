<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
  public function purchase(Request $request)
  {
    $product_id = $request->input('product_id');
    $quantity = $request->input('quantity');

    $product = Product::find($product_id);

    if (!$product) {
      return response()->json([
        'message' => '商品が存在しません。'
      ], 404);
    }

    if ($product->stock < $quantity) {
      return response()->json([
        'message' => '在庫が不足しています。'
      ], 400);
    }

    DB::beginTransaction();

    try {

      $sale = Sale::create([
        'user_id' => Auth::id(),
        'product_id' => $product_id,
        'quantity' => $quantity,
      ]);

      $product->decrement('stock', $quantity);

      DB::commit();
    } catch (\Exception $e) {

      DB::rollBack();

      return response()->json([
        'message' => $e->getMessage()
      ], 500);
    }

    return response()->json([
      'message' => '購入が完了しました',
      'order' => $sale,
    ], 201);
  }
}
