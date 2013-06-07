<?php
final class ip2location_lite{
	protected $errors = array();
	protected $service = 'api.ipinfodb.com';
	protected $version = 'v3';
	protected $apiKey = '6de2529c1ea5aae376d03d3cadb2daed8bf77de5ebd17a6c60c267d285083167';

	public function __construct(){}

	public function __destruct(){}

	public function setKey($key){
		if(!empty($key)) $this->apiKey = $key;
	}

	public function getError(){
		return implode("\n", $this->errors);
	}

	public function getCountry($host){
		return $this->getResult($host, 'ip-country');
	}

	public function getCity($host){
		return $this->getResult($host, 'ip-city');
	}

	private function getResult($host, $name){
		$ip = $this->input->ip_address();

		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
			$xml = @file_get_contents('http://' . $this->service . '/' . $this->version . '/' . $name . '/?key=' . $this->apiKey . '&ip=' . $ip . '&format=xml');


			if (get_magic_quotes_runtime()){
				$xml = stripslashes($xml);
			}

			try{
				$response = @new SimpleXMLElement($xml);

				foreach($response as $field=>$value){
					$result[(string)$field] = (string)$value;
				}

				return $result;
			}
			catch(Exception $e){
				$this->errors[] = $e->getMessage();
				return;
			}
		}

		$this->errors[] = '"' . $host . '" is not a valid IP address or hostname.';
		return;
	}
}
?>