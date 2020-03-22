<?php

namespace App\Http\Controllers\Admin;

use App\Shipping;
use App\ShippingOption;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        $data = ['shippings' => $shippings];
        return view('admin.shippings.index')->with($data);
    }

    public function storeOption(Request $request)
    {
        $shippingOption = new ShippingOption();
        $shippingOption->id_shipping = $request->input('shippingId');
        $shippingOption->name = $request->input('name');
        $shippingOption->price = Utils::toDbCurrency($request->input('price'));
        $shippingOption->save();
        return response()->json(["status"=>"Created", "id"=>$shippingOption->id], 201);
    }

    public function deleteOption(Request $request, $shippingOptionId)
    {
        $shippingOption = ShippingOption::find($shippingOptionId);
        if ($shippingOption) {
            $shippingOption->delete();
        }
        return response()->json(["status"=>"Deleted"], 200);
    }

    public function updateOptions(Request $request) {
        $id = $request->input("id");
        $enabled = $request->input("enabled");
        $shipping = Shipping::find($id);
        if ($shipping) {
            $shipping->enabled = $enabled == "true" ? 1 : 0;
            $shipping->save();
        }
        return response()->json(["status"=>"Updated"], 200);
    }
}
