<?

class Settings_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
    }

	public function checkIfExists($value, $variable, $yours) {
        $this->db->select($value);
        $this->db->where($value, $variable);

        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {

            $row = $q->row();

            $dataResults = objectToArray($row);

            if($dataResults['username'] == $yours){
                return false;
            }else{
                return true;
            }
        } else {
            return false;
        }
        
    } 

    public function editUser(){    

        $user_id        =   $this->session->userdata('userID');
        $username       =   $this->security->xss_clean($this->input->post('username'));
        $bio            =   $this->security->xss_clean($this->input->post('bio'));
        $location       =   $this->security->xss_clean($this->input->post('location'));
        $userLat        =   $this->security->xss_clean($this->input->post('lat'));
        $userLng        =   $this->security->xss_clean($this->input->post('lng'));
        $profileImage   =   $this->security->xss_clean($this->session->userdata('profileImage'));
        $timezone       =   $this->security->xss_clean($this->input->post('timezone'));
        $exists         =   $this->checkIfExists('username', $username, $username);

        if(!$exists){

            $data = array(
                'user_id'       =>   $user_id,
                'username'      =>   $username,
                'bio'           =>   $bio,
                'location'      =>   $location,
                'profile_img'   =>   $profileImage,
                'timezone'      =>   $timezone,
                'user_lat'      =>   $userLat,
                'user_lng'      =>   $userLng
            );

            $this->db->where('user_id', $user_id);
            $this->db->update('users', $data); 

            $sData = array(
                'username'       =>   $username,
                'profileImage'   =>   $profileImage,
                'location'       =>   $location,
                'timezone'       =>   $timezone,
                'bio'            =>   $bio,
                'userLat'        =>   $userLat,
                'userLng'        =>   $userLng
            );

            $this->session->set_userdata($sData);

            return true;
        }else{
            return false;
        }

    }

}