<?

class App_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('cookie');
        $this->load->model('authentication_model');
        $this->load->library('twitteroauth');
        $this->config->load('twitter');
        
        if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret')){
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('access_token'),  $this->session->userdata('access_token_secret'));
        }elseif($this->session->userdata('request_token') && $this->session->userdata('request_token_secret')){
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('request_token'), $this->session->userdata('request_token_secret'));
        }else{
            $this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'));
        }

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

    public function getTweets(){

        $data = array(
            'q' => '@thebeerbucks',
        );

        $content = $this->connection->get('search/tweets', $data);

        $tweets = objectToArray($content);
        
        $results = array();

        for ($i=0; $i < count($tweets['statuses']); $i++) { 

            $text = $tweets['statuses'][$i]->text;
            $name = $tweets['statuses'][$i]->user->screen_name;

            $results[] = array('name' => $name, 'text' => $text);

        }

        return $results;

    }

}