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
        $this->db->or_where("user2_id = '$user1ID'");

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
                if($row['user1_id'] == $user2ID){
                    return false;
                }
            }

            return true;
        }else{
            return true;
        }
    }

    public function getTimeTillParty($partyInfo){

        $newPartyInfo = $partyInfo;

        foreach($partyInfo as $key=>$row){

            $date1      =   new DateTime(date('Y-m-d H:i:s', time()));
            $date2      =   new DateTime($row['start']);
            $interval   =   $date1->diff($date2);
            $days       =   $newPartyInfo[$key]['days']      =   $interval->format("%a"); 
            $hours      =   $newPartyInfo[$key]['hours']     =   $interval->format("%h"); 
            $minutes    =   $newPartyInfo[$key]['minutes']   =   $interval->format("%i"); 
            $seconds    =   $newPartyInfo[$key]['seconds']   =   $interval->format("%s"); 

            if($key+1 == count($partyInfo)){

                return $newPartyInfo;
            }
            
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
                'friendship_id'   =>   $friendshipID,
                'user1_id'        =>   $user1ID,
                'user2_id'        =>   $user2ID,
                'active'          =>   0,
                'date_of_req'     =>   $dateOfReq,
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
        $this->db->where("(
            user1_id = '$userID' OR 
            user2_id = '$userID') AND 
            active = '1'"
        );
        

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults   =   objectToArray($dataResults);
            $results       =   array();

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

    public function getUserParties($userID){

        $this->db->select('
            parties.party_id, 
            parties.user_id, 
            parties.date_created, 
            parties.date_edited, 
            parties.title, 
            parties.description, 
            parties.party_img, 
            parties.party_location, 
            parties.address, 
            parties.start, 
            parties.end, 
            parties.goal,
            parties.expired,
            parties.attending,
            users.username,
        ');

        $this->db->from('parties');
        $this->db->join('users', 'parties.user_id = users.user_id');
        $this->db->where("parties.user_id = '$userID'");

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            return $this->getTimeTillParty($dataResults);

        }else{
            return false;
        }

    }

    public function postComment($user2ID = 0){

        if($user2ID){
            $userID = $user2ID;
        }else{
           $userID = $this->session->userdata('userID');
        }

        $comment         =   $this->security->xss_clean($this->input->post('comment'));
        $userCommentID   =   uniqid();
        
        $posterID = $this->session->userdata('userID'); 
        $dateOfCom       =   date('Y/m/d h:i:s', time());

        $data = array(
            'user_comment_id'   =>   $userCommentID,
            'user_id'           =>   $userID,
            'poster_id'         =>   $posterID,
            'user_comment'      =>   $comment,
            'comment_date'      =>   $dateOfCom,
        );

        $q = $this->db->insert('user_comments', $data);

        return true;

    }

    public function getComments($user2ID = 0){

        if($user2ID){
            $userID = $user2ID;
        }else{
           $userID = $this->session->userdata('userID'); 
        }
        

        $this->db->select('
            user_comments.user_comment_id,
            user_comments.user_comment,
            user_comments.comment_date,
            users.user_id,
            users.username,
            users.profile_img,
        ');

        $this->db->from('user_comments');
        $this->db->join('users', 'user_comments.poster_id = users.user_id');
        $this->db->where("user_comments.user_id = '$userID'");
        $this->db->order_by("user_comment_id", "desc");

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









