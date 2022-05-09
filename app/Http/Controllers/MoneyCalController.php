<?php

namespace App\Http\Controllers;

use App\Http\Resources\MoneyCalResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MoneyCalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_money = [
            '500' => '',
            '100' => '',
            '50' => '',
            '10' => '',
            '5' => '',
            '1' => '',
        ];

        return response()->json(['test data', $data_money]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'inputMoney'  =>  'required|integer|not_in:0',   
            'totalPrice'  =>  'required|integer|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $inputMoney = $request->inputMoney;
        $totalPrice = $request->totalPrice;

        if ($inputMoney < $totalPrice) {
            return response()->json('not enough money.');
        } else {
            $ans = $this->moneyCal($inputMoney, $totalPrice);
        }


        return response()->json($ans);
    }


    public function moneyCal($inputMoney, $totalPrice)
    {
        $input = $inputMoney;
        $price = $totalPrice;

        $change = $input - $price;

        $list = [500, 100, 50, 10, 5, 1];
        $n = count($list);

        $ans = [];

        for ($i = 0; $i <= $n - 1; $i++) {
            if ($change == 0) {
                $ans[$i] = 0;
            }

            $ans[$i] = (int)($change / $list[$i]);
            $amount = $ans[$i] * $list[$i];
            $change -= $amount;
        }

        $data_output = [
            '500' => $ans[0],
            '100' => $ans[1],
            '50' => $ans[2],
            '10' => $ans[3],
            '5' => $ans[4],
            '1' => $ans[5],
        ];

        return $data_output;

        // if($change >= 500 || $change == 0){
        //     if($change == 0){
        //         $fiveHundred = 0;
        //     }

        //     $fiveHundred = (int)($change / 500);
        //     $amount = $fiveHundred * 500;
        //     $change = $change - $amount;
        // }
        // if($change >= 100 || $change == 0){
        //     if($change == 0){
        //         $oneHundred = 0;
        //     }

        //     $oneHundred = (int)($change / 100);
        //     $amount = $oneHundred * 100;
        //     $change = $change - $amount;
        // }
        // if($change >= 50 || $change == 0){
        //     if($change == 0){
        //         $fifty = 0;
        //     }

        //     $fifty = (int)($change / 50);
        //     $amount = $fifty * 50;
        //     $change = $change - $amount;
        // }
        // if($change >= 10 || $change == 0){
        //     if($change == 0){
        //         $ten = 0;
        //     }

        //     $ten = (int)($change / 10);
        //     $amount = $ten * 10;
        //     $change = $change - $amount;
        // }
        // if($change >= 5 || $change == 0){
        //     if($change == 0){
        //         $five = 0;
        //     }

        //     $five = (int)($change / 5);
        //     $amount = $five * 5;
        //     $change = $change - $amount;
        // }
        // if($change >= 1 || $change == 0){
        //     if($change == 0){
        //         $one = 0;
        //     }

        //     $one = (int)($change / 1);
        //     $amount = $one * 1;
        //     $change = $change - $amount;
        // }


        // $data_output = [
        //     '500' => $fiveHundred,
        //     '100' => $oneHundred,
        //     '50' => $fifty,
        //     '10' => $ten,
        //     '5' => $five,
        //     '1' => $one,
        // ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
