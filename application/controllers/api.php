<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';



class Api extends REST_Controller {
	
	public function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        $this->methods['index_post']['limit'] = 1; //100 requests per hour per user/key
       
    }
    
    //get the posted json  and send it to the model
	public function index_post()
	{
		$data = array(
			'userId' => $this->post('userId'),
			'currencyFrom' => $this->post('currencyFrom'),
			'currencyTo' => $this->post('currencyTo'),
			'amountSell' => $this->post('amountSell'),
			'amountBuy' => $this->post('amountBuy'),
			'rate' => $this->post('rate'),
			'timePlaced' => $this->post('timePlaced'),
			'originatingCountry' => $this->post('originatingCountry')
		);


	    
		$this->load->model('CurrencyFair'); //Loading the model
		if($this->CurrencyFair->process($data)){
			$this->response(array('status' => 'success', 'data' => $data));	//Sending the success response
		}
		else{
			$this->response(array('status' => 'failed', 'data' => $data));	//Sending the failed response
		}
		
       
    }
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */