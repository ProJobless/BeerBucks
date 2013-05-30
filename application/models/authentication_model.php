<?

class Authentication_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
    }

	function checkIfExists($value, $variable) {
        $this->db->select($value);
        $this->db->where($value, $variable);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    } 

    public function signup(){
    	$username = $this->security->xss_clean($this->input->post('username'));
    	$email = $this->security->xss_clean($this->input->post('email'));
    	$password = $this->security->xss_clean($this->input->post('password'));
    	$dateOfReg = date('Y/m/d h:i:s', time());
		$userID = uniqid();

		$exi = $this->checkIfExists('username', $username);
        $exi2 = $this->checkIfExists('email', $email);

		if(!$exi && !$exi2){
			$data = array(
				"user_id" => $userID,
				"email" => $email,
				"username" => $username,
				"pword" => $password,
				"date_of_reg" => $dateOfReg
			);

	    	$q = $this->db->insert("users", $data);

            $sdata = array(
                "userID" => $userID,
                "email" => $email,
                "username" => $username,
                "isLoggedIn" => 1
            );

    		$this->session->set_userdata($sdata);

	    	return true;
		}else{
			return false;
		}
    }

    public function login(){
    	$email = $this->security->xss_clean($this->input->post('email'));
    	$password = $this->security->xss_clean($this->input->post('password'));

    	$this->db->where('email', $email);
    	$this->db->where('pword', $password);

    	$query = $this->db->get('users');

    	if($query->num_rows == 1){

    		$row = $query->row();

    		$sessData = array(
    			'userID' => $row->user_id,
    			'email' => $row->email,
    			'username' => $row->username,
    			'isLoggedIn' => 1
    		);

    		$this->session->set_userdata($sessData);

    		return true;
    	}else{
    		return false;
    	}
    }
}