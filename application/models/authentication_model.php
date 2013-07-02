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

    function getExisting($value, $variable){

        $this->db->select('
            user_id,
            username,
            email,
            date_of_reg,
            profile_img,
            bio,
            location,
            feedback,
            views,
            comments,
            contributions,
            parties,
            facebook_id,
            timezone,
        ');

        $this->db->from('users');
        $this->db->where($value, $variable);

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            return $dataResults;

        }else{

            return false;

        }

    }

    public function signup(){

    	$username    =   $this->security->xss_clean($this->input->post('username'));
    	$email       =   $this->security->xss_clean($this->input->post('email'));
    	$password    =   $this->security->xss_clean($this->input->post('password'));
    	$dateOfReg   =   date('Y/m/d h:i:s', time());
		$userID      =   uniqid();
		$exists      =   $this->checkIfExists('username', $username);
        $exists2     =   $this->checkIfExists('email', $email);

		if(!$exists && !$exists2){
            
			$data = array(
				'user_id'         =>   $userID,
				'email'           =>   $email,
				'username'        =>   $username,
				'pword'           =>   $password,
				'date_of_reg'     =>   $dateOfReg,
                'user_ip'         =>   $this->input->ip_address(),
                'feedback'        =>   0,
                'views'           =>   0,
                'comments'        =>   0,
                'contributions'   =>   0,
                'parties'         =>   0,
			);

	    	$q = $this->db->insert('users', $data);

            $sData = array(
                'userID'     =>   $userID,
                'email'      =>   $email,
                'username'   =>   $username
            );

    		$this->session->set_userdata($sData);

	    	return true;

		}else{

			return false;

		}

    }

    public function login(){

    	$email      =   $this->security->xss_clean($this->input->post('email'));
    	$password   =   $this->security->xss_clean($this->input->post('password'));

    	$this->db->where('email', $email);
    	$this->db->where('pword', $password);

    	$q = $this->db->get('users');

    	if($q->num_rows == 1){

    		$row = $q->row();

    		$sData = array(
    			'userID'         =>   $row->user_id,
    			'email'          =>   $row->email,
    			'username'       =>   $row->username,
                'dateOfReg'      =>   $row->date_of_reg,
                'profileImage'   =>   $row->profile_img,
                'facebookID'     =>   $row->facebook_id,
                'location'       =>   $row->location,
                'timezone'       =>   $row->timezone,
                'bio'            =>   $row->bio
    		);

    		$this->session->set_userdata($sData);

    		return true;

    	}else{

    		return false;
            
    	}

    }

    public function registerFacebook($fbData, $existing){

        if($existing){

            $url          =   'https://graph.facebook.com/'.$fbData['id'].'/picture?type=large';
            $profileImg   =   uniqid() .'.png';
            
            file_put_contents('uploads/profile/'.$profileImg, file_get_contents($url));

            $data = array(
                'facebook_id' => $fbData['id']
            );

            $this->db->where('email', $fbData['email']);
            $this->db->update('users', $data);

            $uData = $this->getExisting('email', $fbData['email']); 

            $sData = array(
                'userID'         =>   $uData[0]['user_id'],
                'email'          =>   $uData[0]['email'],
                'username'       =>   $uData[0]['username'],
                'dateOfReg'      =>   $uData[0]['date_of_reg'],
                'profileImage'   =>   $profileImg,
                'facebookID'     =>   $uData[0]['facebook_id'],
                'location'       =>   $fbData['location']['name'],
                'timezone'       =>   $fbData['timezone'],
                'bio'            =>   $uData[0]['bio'],
            );

            $this->session->set_userdata($sData);

            return true;

        }else{

            $url          =   'https://graph.facebook.com/'.$fbData['id'].'/picture?type=large';
            $profileImg   =   uniqid() .'.png';
            
            file_put_contents('uploads/profile/'.$profileImg, file_get_contents($url));

            $username    =   $fbData['username'];
            $email       =   $fbData['email'];
            $location    =   $fbData['location']['name'];
            $dateOfReg   =   date('Y/m/d h:i:s', time());
            $userID      =   uniqid();

            $exists = $this->checkIfExists('username', $username);

            if(!$exists){

                $data = array(
                    'user_id'         =>   $userID,
                    'email'           =>   $email,
                    'username'        =>   $username,
                    'date_of_reg'     =>   $dateOfReg,
                    'location'        =>   $location,
                    'timezone'        =>   $fbData['timezone'],
                    'profile_img'     =>   $profileImg,
                    'user_ip'         =>   $this->input->ip_address(),
                    'feedback'        =>   0,
                    'views'           =>   0,
                    'comments'        =>   0,
                    'contributions'   =>   0,
                    'parties'         =>   0,
                );

                $q = $this->db->insert('users', $data);

                $sData = array(
                    'userID'         =>   $userID,
                    'email'          =>   $email,
                    'username'       =>   $username,
                    'profileImage'   =>   $profileImg,
                    'timezone'       =>   $fbData['timezone'],
                    'location'       =>   $location,
                );

                $this->session->set_userdata($sData);

                return true;
            }else{
                return false;
            }

        }

    }

    public function loginFacebook($fbData, $existing){

        if($existing){

            $uData = $this->getExisting('email', $fbData['email']); 

            $sData = array(
                'userID'         =>   $uData[0]['user_id'],
                'email'          =>   $uData[0]['email'],
                'username'       =>   $uData[0]['username'],
                'dateOfReg'      =>   $uData[0]['date_of_reg'],
                'profileImage'   =>   $uData[0]['profile_img'],
                'facebookID'     =>   $uData[0]['facebook_id'],
                'location'       =>   $uData[0]['location'],
                'timezone'       =>   $uData[0]['timezone'],
                'bio'            =>   $uData[0]['bio'],
            );

            $this->session->set_userdata($sData);

            return true;

        }else{

            $data = array(
                'email' => $fbData['email'],
            );

            $this->db->where('facebook_id', $fbData['id']);
            $this->db->update('users', $data);

            $uData = $this->getExisting('email', $fbData['email']); 

            $sData = array(
                'userID'         =>   $uData[0]['user_id'],
                'email'          =>   $uData[0]['email'],
                'username'       =>   $uData[0]['username'],
                'dateOfReg'      =>   $uData[0]['date_of_reg'],
                'profileImage'   =>   $uData[0]['profile_img'],
                'facebookID'     =>   $uData[0]['facebook_id'],
                'location'       =>   $uData[0]['location'],
                'timezone'       =>   $uData[0]['timezone'],
                'bio'            =>   $uData[0]['bio'],
                'feedback'       =>   0,
                'views'          =>   0,
                'comments'       =>   0,
                'contributions'  =>   0,
                'parties'        =>   0,
            );

            $this->session->set_userdata($sData);

            return true;

        }

    }

    public function facebook($fbData){

        $fbExists   =   $this->checkIfExists('facebook_id', $fbData['id']);
        $emExists   =   $this->checkIfExists('email', $fbData['email']);

        if(!$fbExists && $emExists){                        //User has made an account with email already, but not facebook.
            if($this->registerFacebook($fbData, true)){     //--true says that user already has an account via email.
                return true;
            }else{
                return false;
            }
        }else if($fbExists && $emExists){                   //User has already registered with email and facebook. Login normally.
            if($this->loginFacebook($fbData, true)){        //--true says that user already has an account via email
                return true;
            }else{
                return false;
            }
        }else if($fbExists && !$emExists){                  //User has registered using facebook, but not with an email.
            if($this->loginFacebook($fbData, false)){       //--false says user has not registered their email.
                return true;
            }else{
                return false;
            }
        }else if(!$fbExists && !$emExists){                 //User has not registered with facebook or email.
            if($this->registerFacebook($fbData, false)){    //--false says user has not registered their email.
                return true;
            }else{
                return false;
            }

        }

    }

    public function twitter($twData, $twitterImg){

        $url          =   $twitterImg;
        $profileImg   =   uniqid() .'.png';
        
        file_put_contents('uploads/profile/'.$profileImg, file_get_contents($url));

        $username    =   $twData['screen_name'];
        $dateOfReg   =   date('Y/m/d h:i:s', time());
        $userID      =   uniqid();
        $twitterID   =   $twData['user_id'];

        $exists = $this->checkIfExists('twitter_id', $twitterID);
        $imgeEists = $this->checkIfExists('profile_img', $twitterID);

        if(!$exists){

            $data = array(
                'user_id'         =>   $userID,
                'username'        =>   $username,
                'date_of_reg'     =>   $dateOfReg,
                'user_ip'         =>   $this->input->ip_address(),
                'twitter_id'      =>   $twitterID,
                'profile_img'     =>   $profileImg,
                'feedback'        =>   0,
                'views'           =>   0,
                'comments'        =>   0,
                'contributions'   =>   0,
                'parties'         =>   0,
            );

            $q = $this->db->insert('users', $data);

            $sData = array(
                'userID'            =>   $userID,
                'username'          =>   $username,
                'twitter_user_id'   =>   $twData['user_id'],
                'profile_img'       =>   $profileImg,
            );

            $this->session->set_userdata($sData);

            return true;

        }else{

            if(!$imgeEists){

                $data = array(
                    'profile_img'     =>   $profileImg,
                );
            }

            $this->db->where('twitter_id', $twitterID);
            $this->db->update('users', $data);

            $uData = $this->getExisting('twitter_id', $twitterID); 

            $sData = array(
                'userID'            =>   $uData[0]['user_id'],
                'email'             =>   $uData[0]['email'],
                'username'          =>   $uData[0]['username'],
                'dateOfReg'         =>   $uData[0]['date_of_reg'],
                'profileImage'      =>   $uData[0]['profile_img'],
                'facebookID'        =>   $uData[0]['facebook_id'],
                'location'          =>   $uData[0]['location'],
                'timezone'          =>   $uData[0]['timezone'],
                'bio'               =>   $uData[0]['bio'],
                'twitter_user_id'   =>   $twData['user_id'],
            );

            $this->session->set_userdata($sData);

            return true;
        }

    }

}