<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    public function addOrder(Request $req){
        $rules = array(
            'montant' => 'required',
            'bien' => 'required',
            'valeur' => 'required',
            'activite' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
            return response::json(array('errors' => $validator->getMessageBag()->toarray()));
        else{
            $order = new Oder;
            $order->montant = $req->montant;
            $order->bien_garanti = $req->bien;
            $order->valeur_bien_garanti = $req->valeur;
            $order->activite = $req->activite;
            $order->save();
            return response()->json($order);
        }
    }
}
