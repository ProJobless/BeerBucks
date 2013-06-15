<?

class App_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('cookie');
    }

    public function userLocation(){

        include('application/libraries/ip2locationlite.class.php');

        $ipLite = new ip2location_lite;
        $visitorGeolocation = $ipLite->getCity($_SERVER['REMOTE_ADDR']);

        if ($visitorGeolocation['statusCode'] == 'OK') {
            $data = base64_encode(serialize($visitorGeolocation));
            setcookie("geolocation", $data, time()+3600*24*7); 

            return $data;

        }

    }

}