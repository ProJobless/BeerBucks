<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hook_handler extends CI_Controller{
    function post_controller_constructor() {
        $this->CI = & get_instance();

	    $this->load->helper('cookie');

	    include('application/libraries/ip2locationlite.class.php');

		if(!get_cookie("geolocation")){
			$ipLite = new ip2location_lite;
			$visitorGeolocation = $ipLite->getCity($_SERVER['REMOTE_ADDR']);

			if ($visitorGeolocation['statusCode'] == 'OK') {
				$data = base64_encode(serialize($visitorGeolocation));
				setcookie("geolocation", $data, time()+3600*24*7); 
			}
		}		 
    }
}
