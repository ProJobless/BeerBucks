<?

class Authentication_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
    }

	function checkIfExists($value, $variable) {
        $this->db->select($value);
        $this->db->where($value, $variable);

        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {
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

		$exists = $this->checkIfExists('username', $username);
        $exists2 = $this->checkIfExists('email', $email);

		if(!$exists && !$exists2){
			$data = array(
				'user_id' => $userID,
				'email' => $email,
				'username' => $username,
				'pword' => $password,
				'date_of_reg' => $dateOfReg,
                'user_ip' => $this->input->ip_address()
			);

	    	$q = $this->db->insert('users', $data);

            $sData = array(
                'userID' => $userID,
                'email' => $email,
                'username' => $username
            );

    		$this->session->set_userdata($sData);

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

    	$q = $this->db->get('users');

    	if($q->num_rows == 1){

    		$row = $q->row();

    		$sData = array(
    			'userID' => $row->user_id,
    			'email' => $row->email,
    			'username' => $row->username,
                'dateOfReg' => $row->date_of_reg,
                'profileImage' =>$row->profile_img,
                'facebookID' =>$row->facebook_id,
                'location' =>$row->location,
                'timezone' =>$row->timezone,
                'bio' =>$row->bio
    		);

    		$this->session->set_userdata($sData);

    		return true;
    	}else{
    		return false;
    	}
    }
}