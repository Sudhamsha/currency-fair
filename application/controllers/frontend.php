<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FrontEnd extends CI_Controller {

public function index(){
	$this->load->model('CurrencyFair');
	$data_set = $this->CurrencyFair->getAll();
	$build_html_conversions = "";
	foreach($data_set as $data_single){
		$build_html_conversions .= "<tr><td>{$data_single['currencyFrom']}</td><td>{$data_single['currencyTo']}</td><td>{$data_single['rate']}</td></tr>";
	}
	
	$build_html_pair = "";
	$data_set = $this->CurrencyFair->groupedPair();
	foreach($data_set as $data_single){
		$build_html_pair .= "<tr class='{$data_single['currencyFrom']}-{$data_single['currencyTo']}'><td>{$data_single['currencyFrom']} - {$data_single['currencyTo']}</td><td class='count'>{$data_single['counter']}</td></tr>";
	}
	$data['conversions'] = $build_html_conversions;
	$data['pairs'] = $build_html_pair;
	
	$this->load->view('currencyfair', $data);
}

}