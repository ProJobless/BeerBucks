<?

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
        $this->load->helper('cookie');

    }

    function prepTime($data, $title){

        $newData = array();

        foreach($data as $key=>$row){

            $date = new DateTime($row[$title]);

            if(get_cookie("geolocation"))$visitorGeolocation = unserialize(base64_decode($_COOKIE["geolocation"]));

            if($this->session->userdata('timezone') == '-6'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Eastern')), 'm/d/Y h:i A'); 
            }else  if($this->session->userdata('timezone') == '-7'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Central')), 'm/d/Y h:i A'); 
            }else  if($this->session->userdata('timezone') == '-8'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Mountain')), 'm/d/Y h:i A'); 
            }else  if($this->session->userdata('timezone') == '-9'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Pacific')), 'm/d/Y h:i A'); 
            }
            //fallback to cookie if user hasn't set timezone.
            else if($visitorGeolocation['timeZone'] == '-04:00'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Eastern')), 'm/d/Y h:i A'); 
            }else  if($visitorGeolocation['timeZone'] == '-05:00'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Central')), 'm/d/Y h:i A'); 
            }else  if($visitorGeolocation['timeZone'] == '-06:00'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Mountain')), 'm/d/Y h:i A'); 
            }else  if($visitorGeolocation['timeZone'] == '-07:00'){
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Pacific')), 'm/d/Y h:i A'); 
            }else{
                $formatted = date_format($date->setTimezone(new DateTimeZone('US/Eastern')), 'm/d/Y h:i A'); 
            }

            $newData[$key] = $row;
            $newData[$key][$title] = $formatted;
        }

        return $newData;

    }

    function checkForUser($userID){

        $this->db->select('user_id');
        $this->db->where('user_id', $userID);

        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }

    }

	function checkIfExists($value, $variable) {

        $this->db->select($value);
        $this->db->where($value, $variable);

        $q = $this->db->get('users');

        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
        
    } 

    function checkFriendship($user2ID){

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

    function getTimeTillParty($partyInfo){

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

    function getUser($userID, $dateOfAccept = 0){

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

            if($dateOfAccept){
                
                $dataResults[0]['dateOfAccept'] = $dateOfAccept;

            }

            return $dataResults;

        }else{
            return false;
        }

    }

    function addFriend($user2ID){

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

            $this->db->insert('friends', $data);

            return true;

        }else{

            return false;

        }

    }

    function removeFriend($user2ID){

        $user1ID = $this->session->userdata('userID');
        $dateOfReq = date('Y/m/d h:i:s', time());
        $friendshipID = uniqid();

        $this->db->select('friendship_id, user1_id, user2_id');
        $this->db->where('user1_id', $user1ID);
        $this->db->or_where("user2_id = '$user1ID'");

        $query = $this->db->get('friends');

        if ($query->num_rows() > 0) {

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            foreach($dataResults as $row){
                if($row['user2_id'] == $user2ID && $row['user1_id'] == $user1ID){
                    
                    $this->db->where('friendship_id', $row['friendship_id']);
                    $this->db->delete('friends'); 

                    return true;
                }
                if($row['user1_id'] == $user2ID && $row['user2_id'] == $user1ID){

                    $this->db->where('friendship_id', $row['friendship_id']);
                    $this->db->delete('friends');

                    return true;
                }
            }
        }else{

            return false;

        }

    }

    function checkForFriendRequests(){

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

    function acceptFriend($friendshipID){

        $dateOfAccept = date('Y/m/d h:i:s', time());

        $data = array(
            'active'           =>   1,
            'date_of_accept'   =>   $dateOfAccept,
        );

        $this->db->where('friendship_id', $friendshipID);
        $this->db->update('friends', $data); 

        $sData = array('alerts' => 0);

        $this->session->set_userdata($sData);

        return true;

    }

    function declineFriend($friendshipID){

        $data = array(
            'active' => 2,
        );

        $this->db->where('friendship_id', $friendshipID);
        $this->db->update('friends', $data); 

        $sData = array('alerts' => 0);

        $this->session->set_userdata($sData);

        return true;

    }

    function checkAlerts(){

        if($this->checkForFriendRequests()){
            $alert = count($this->checkForFriendRequests());
        }else{
            $alert = false;
        }

        $sData = array('alerts' => $alert);

        $this->session->set_userdata($sData);

    }

    function getFriends($userID){

        $this->db->select('
            friendship_id,
            user1_id,
            user2_id,
            active,
            date_of_accept,
        ');

        $this->db->from('friends');
        $this->db->where("(
            user1_id = '$userID' OR 
            user2_id = '$userID') AND 
            active = '1'
        ");

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults   =   objectToArray($dataResults);
            $results       =   array();

            foreach($dataResults as $row){
                if($row['user1_id'] == $userID){
                    array_push($results, array($row['user2_id'], $row['date_of_accept']));
                }
                if($row['user2_id'] == $userID){
                    array_push($results, array($row['user1_id'], $row['date_of_accept']));
                }

            }

            $userResults = array();

            foreach($results as $row){

                array_push($userResults, $this->getUser($row[0], $row[1]));
            }

            return $userResults;

        }else{
            return false;
        }

    }

    function getUsers(){

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

    function getUserParties($userID){

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

    function incrementValue($title, $userID, $amount){

        $this->db->select($title);
        $this->db->from('users');
        $this->db->where("user_id = '$userID'");

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            $new = $dataResults[0][$title] + $amount;

            $data = array($title => $new);

            $this->db->where("user_id = '$userID'");
            $this->db->update('users', $data); 

            $sData = array($title => $new);

            $this->session->set_userdata($sData);

            return true;

        }else{

            return false;

        }

    }

    function postComment($user2ID = 0){

        if($user2ID){
            $userID = $user2ID;
        }else{
           $userID = $this->session->userdata('userID');
        }

        $comment         =   $this->security->xss_clean($this->input->post('comment'));
        $userCommentID   =   uniqid();
        $posterID        =   $this->session->userdata('userID'); 
        $dateOfCom       =   date('Y/m/d h:i:s', time());

        $data = array(
            'user_comment_id'   =>   $userCommentID,
            'user_id'           =>   $userID,
            'poster_id'         =>   $posterID,
            'user_comment'      =>   $comment,
            'comment_date'      =>   $dateOfCom,
        );

        $q = $this->db->insert('user_comments', $data);

        if($q){

            if($this->incrementValue('comments', $posterID, '1')){

                return true;
            }

        }else{

            return false;

        }

    }

    function getComments($user2ID = 0){

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

            $dataResults = $this->prepTime($dataResults, 'comment_date');

            return $dataResults;

        }else{
            return false;
        }

    }

    function deleteComment($commentID){

        if(!$commentID) return false;


        $this->db->select('user_comment_id');
        $this->db->where('user_comment_id', $commentID);

        $q = $this->db->get('user_comments');

        if ($q->num_rows() > 0) {

            $this->db->where('user_comment_id', $commentID);
            $this->db->delete('user_comments'); 

            if($this->incrementValue('comments', $this->session->userdata('userID'), '-1')){

                return true;
            }

        }else{

            return false;
            
        } 

    }

    function sortActivity($friendInfo = 0, $partyInfo = 0){

        $parsedActivity   =   array();
        $key              =   0;

        if($friendInfo){

            foreach($friendInfo as $friend){

                $parsedActivity['activity'][$key]['type'] = 'friend';
                $parsedActivity['activity'][$key]['username'] = $friend[0]['username'];
                $parsedActivity['activity'][$key]['date'] = $friend[0]['dateOfAccept'];
                $parsedActivity['activity'][$key]['profile_img'] = $friend[0]['profile_img'];
                $parsedActivity['activity'][$key]['user_id'] = $friend[0]['user_id'];
                $key ++;

            }

        }

        if($partyInfo){
            
            foreach($partyInfo as $party){

                $parsedActivity['activity'][$key]['type'] = 'party';
                $parsedActivity['activity'][$key]['title'] = $party['title'];
                $parsedActivity['activity'][$key]['date'] = $party['date_created'];
                $parsedActivity['activity'][$key]['party_id'] = $party['party_id'];
                $parsedActivity['activity'][$key]['user_id'] = $party['user_id'];
                $parsedActivity['activity'][$key]['party_img'] = $party['party_img'];
                $key ++;

            }
        }

        if($friendInfo || $partyInfo){

            function date_compare($a, $b){

                $t1   =   strtotime($a['date']);
                $t2   =   strtotime($b['date']);
                return $t2 - $t1;
            }    

            usort($parsedActivity['activity'], 'date_compare');

        }else{

            return false;

        }

        return $parsedActivity;
    }


    function userViewCount($user2ID){

        $user1ID     =   $this->session->userdata('userID');
        $viewID      =   uniqid();
        $viewCheck   =   false;

        if(!$user1ID) return false;

        $this->db->select('user1_id, user2_id');
        $this->db->where('user1_id', $user1ID);

        $q = $this->db->get('user_views');

        if ($q->num_rows() > 0) {

            foreach($q->result() as $row){

                $dataResults[] = $row;

            }

            $dataResults = objectToArray($dataResults);

            foreach($dataResults as $row){

                if($row['user2_id'] == $user2ID){

                    $viewCheck = true;

                }

            }

            if($viewCheck){

                return false;

            }else{

                $this->db->select('user_id');
                $this->db->where('user_id', $user2ID);

                $q2 = $this->db->get('users');

                if ($q2->num_rows() > 0) {

                    $data = array(
                        'view_id'    =>   $viewID,
                        'user1_id'   =>   $user1ID,
                        'user2_id'   =>   $user2ID,
                    );

                    $this->db->insert('user_views', $data);

                    if($this->incrementValue('views', $user2ID, '1')){

                        return true;

                    }

                }else{

                    return false;

                }
                
            }

        }else{

            $this->db->select('user_id');
            $this->db->where('user_id', $user2ID);

            $q = $this->db->get('users');

            if ($q->num_rows() > 0) {

                $data = array(
                    'view_id'    =>   $viewID,
                    'user1_id'   =>   $user1ID,
                    'user2_id'   =>   $user2ID,
                );

                $this->db->insert('user_views', $data);

            }else{

                return false;

            }

        }

    }

}










