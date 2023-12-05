<?php

namespace App\Http\Controllers;

use App\Interface\PaystackInterface;
use Illuminate\Http\Request;

class PaystackController extends Controller
{

    public function initiate(Request $request, PaystackInterface $paystackInterface){

        $email = $request->get('email');
        $amount = $request->get('amount');

        $reponse = $paystackInterface->initiate($email, $amount);


        return response()->json([
            $reponse
        ]);
    }


    public function verify(Request $request, PaystackInterface $paystackInterface){
        $reference = $request->get('reference');

        $reponse = $paystackInterface->verify($reference);

        return response()->json([
            $reponse
        ]);
    }
}
