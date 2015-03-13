<?php
class CurrencyFair extends CI_Model {

    var $data   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function process($data)
    {
        print_r($data);
    }
}

?>