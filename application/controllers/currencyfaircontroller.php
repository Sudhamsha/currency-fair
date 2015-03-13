<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH'.libraries/REST_Controller.php');
class CurrenyFairController extends REST_Controller {
	
	public function process_post()
	{
		$data = array('returned: '. $this->post('userId'));
         $this->response(array('status' => 'success'));	
    }
    
    public function process_get()
	{
		//$data = array('returned: '. $this->post('userId'));
         $this->response(array('status' => 'success'),"200");	
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/api.php */