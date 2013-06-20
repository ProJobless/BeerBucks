<?

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
    }

	public function checkIfExists($value, $variable) {

        $this->db->select($value);
        $this->db->where($value, $variable);

        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
        
    } 

    public function checkFriendship($user2ID){

        $user1ID = $this->session->userdata('userID');

        $this->db->select('user1_id, user2_id');
        $this->db->where('user1_id', $user1ID);

        $q = $this->db->get('friends');

        if ($q->num_rows() > 0) {

            foreach($q->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            foreach($dataResults as $row){
                if($row['user2_id'] == $user2ID){
                    return false;
                }
            }

            return true;
        }else{
            return true;
        }
    }

    public function getUser($userID){
        
        $this->db->select('
            user_id,
            username,
            profile_img,
            bio,
            location,
            feedback,
            views,
            comments,
            contributions,
            parties,
        ');

        $this->db->from('users');
        $this->db->where("user_id = '$userID'");

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

    public function addFriend($user2ID){

        $user1ID = $this->session->userdata('userID');
        $dateOfReq = date('Y/m/d h:i:s', time());
        $friendshipID = uniqid();

        $exists = $this->checkFriendship($user2ID);

        if($exists){

            $data = array(
                'friendship_id' => $friendshipID,
                'user1_id' => $user1ID,
                'user2_id' => $user2ID,
                'active' => 0,
                'date_of_req' => $dateOfReq,
            );

            $q = $this->db->insert('friends', $data);

            return true;

        }else{
            return false;
        }

    }

    public function checkForFriendRequests(){

        $userID = $this->session->userdata('userID');

        $this->db->select('
            users.user_id,
            users.username,
            users.profile_img,
            users.bio,
            users.location,
            users.feedback,
            users.views,
            users.comments,
            users.contributions,
            users.parties,
            friends.friendship_id,
            friends.user1_id,
            friends.user2_id,
            friends.active,
            friends.date_of_req,
        ');

        $this->db->from('friends');
        $this->db->join('users', 'friends.user1_id = users.user_id');
        $this->db->where("active = 0");
        $this->db->where("user2_id = '$userID'");

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

    public function acceptFriend($friendshipID){

        $data = array(
            'active' => 1,
        );

        $this->db->where('friendship_id', $friendshipID);
        $this->db->update('friends', $data); 

        $sData = array(
            'alerts' => 0,
        );

        $this->session->set_userdata($sData);

    }

    public function declineFriend($friendshipID){

        $data = array(
            'active' => 2,
        );

        $this->db->where('friendship_id', $friendshipID);
        $this->db->update('friends', $data); 

        $sData = array(
            'alerts' => 0,
        );

        $this->session->set_userdata($sData);

    }

    public function checkAlerts(){

        if($this->checkForFriendRequests()){
            $alert = count($this->checkForFriendRequests());
        }else{
            $alert = false;
        }

        $sData = array(
            'alerts' => $alert,
        );

        $this->session->set_userdata($sData);

    }

    public function getFriends($userID){

        $this->db->select('
            friendship_id,
            user1_id,
            user2_id,
            active,
        ');

        $this->db->from('friends');
        $this->db->where("user1_id = '$userID'");
        $this->db->or_where("user2_id = '$userID'");
        $this->db->where("active = 1");

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            $results = array();

            foreach($dataResults as $row){
                if($row['user1_id'] == $userID){
                    array_push($results, $row['user2_id']);
                }
                if($row['user2_id'] == $userID){
                    array_push($results, $row['user1_id']);
                }

            }

            $userResults = array();

            foreach($results as $row){

                array_push($userResults, $this->getUser($row));
            }

            return $userResults;

        }else{
            return false;
        }

    }

    public function getUsers(){

        $this->db->select('
            user_id,
            username,
            profile_img,
            bio,
            location,
            feedback,
            views,
            comments,
            contributions,
            parties,
        ');

        $this->db->from('users');
        //$this->db->where("user_id = '$userID'");

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

}