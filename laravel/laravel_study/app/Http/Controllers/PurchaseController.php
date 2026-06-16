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
    $request->validate(
      [
        'product_id' => 'required|integer|exists:products,id',
        'quantity' => 'required|integer|min:1',
      ],

      [
        'quantity.required' => '数量を入力してください。',
        'quantity.integer' => '数量は数値で入力してください。',
        'quantity.min' => '数量は1以上で入力してください。',
      ]
    );

    DB::beginTransaction();

    try {

      $product = Product::where('id', $request->product_id)->lockForUpdate()->firstOrFail();

      if ($product->stock < $request->quantity) {
        throw new \Exception('在庫が不足しています。');
      }

      $product->reduceStock($request->quantity);

      $sale = Sale::createSale(
        Auth::id(),
        $product->id,
        $request->quantity,
        $product->price
      );

      DB::commit();

      return response()->json([
        'message' => '購入が完了しました',
        'order' => $sale,
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([
        'message' => $e->getMessage()
      ], 500);
    }
  }
}
