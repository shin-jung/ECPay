<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder()
    {
    	date_default_timezone_set("Asia/Taipei");
    	$data = [
    		'ChoosePayment'=> 'Credit',
    		'EncryptType' => 1,
    		'ItemName'=> '手機20元X2#隨身碟60元X1',
    		'MerchantID' => '2000132',
    		'MerchantTradeDate'=> date('Y/m/d h:i:s', time()),
    		'MerchantTradeNo'=> 'ecPay1234df',
    		'PaymentType'=> 'aio',
    		'ReturnURL'=> 'https://newwebtest.test/get-orders',
    		'TotalAmount'=> 5000,
    		'TradeDesc'=> 'expay商城購物',
    	];
    	$checkValue = 'HashKey=5294y06JbISpM5x9';
    	foreach ($data as $key => $detail) {
    		$checkValue .= '&' . $key . '=' . $detail;
    	}
    	$checkValue = $checkValue . '&HashIV=v77hoKGq4kWxNNIS';
    	$checkValue = urlencode($checkValue);
    	$checkValue = strtolower($checkValue);
    	$checkValue = str_replace('%2d', '-', $checkValue);
    	$checkValue = str_replace('%5f', '_', $checkValue);
    	$checkValue = str_replace('%2e', '.', $checkValue);
    	$checkValue = str_replace('%21', '!', $checkValue);
    	$checkValue = str_replace('%2a', '*', $checkValue);
    	$checkValue = str_replace('%28', '(', $checkValue);
    	$checkValue = str_replace('%29', ')', $checkValue);
    	$checkValue = hash('sha256', $checkValue);
    	$checkValue = strtoupper($checkValue);
    	$data['CheckMacValue'] = $checkValue;
        ksort($data);

    	return view('/ECPay')->with('code', $data);
    }

    public function getOrders(Request $request)
    {
    	dd($request);
    }
}
