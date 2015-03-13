<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_api extends CI_Controller {

public function index(){
	
	for($i = 0; $i<=2; $i++){
		$this->apiRequest();
	}
	echo("requests sents"); 
}

public function apiRequest(){
	$api_url = 'http://sudskitchen.com/currency-fair/index.php/api';
	$currency_array = array("EUR", "GBP", "USD", "INR", "AUD", "CAD", "NZD");
	$countries = array("FR", "IN", "GB", "IN", "NZ", "AU", "IL");
	$currencyFrom = $currency_array[array_rand($currency_array, 1)];
	
	if(($key = array_search($currencyFrom, $currency_array)) !== false) {
	    unset($currency_array[$key]);
	}
	$currencyTo = $currency_array[array_rand($currency_array, 1)];
	$userId = rand(10000, 20000);
	$amountSell = rand (10000, 20000);
	$amountBuy = rand (10000, 20000);
	$rate = rand (1, 9)/10;
	
	$post_value = array(
					'userId' => $userId,
					'currencyFrom' => $currencyFrom,
					'currencyTo' => $currencyTo,
					'amountSell' => $amountSell,
					'amountBuy' => $amountBuy,
					'rate' => $rate,
					'timePlaced' => date('d-m-y H:i:s'),
					'originatingCountry' => $countries[array_rand($countries, 1)]
				);
	
	$post_value_json = json_encode($post_value);
	var_dump($post_value_json);
	//open connection
	$ch = curl_init($api_url);
	
	//set the url, number of POST vars, POST data
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_value_json); // set POST body
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	//execute post
	$result = curl_exec($ch);
	
	//close connection
	curl_close($ch);
	var_dump($result);
	
}

}