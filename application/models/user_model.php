<?

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
        $this->load->helper('cookie');

    }

    public function getCount(){

        $this->db->select('COUNT(user_id) as totalUserCount');
        $this->db->from('users');

        return $this->db->count_all_results();

    }

    public function prepTime($data, $title){

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
        $dateOfReq = date('Y/m/d H:i:s', time());
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

                    $this->db->where('friendship_id', $row['friendship_id']);
                    $this->db->delete('activity'); 

                    return true;
                }
                if($row['user1_id'] == $user2ID && $row['user2_id'] == $user1ID){

                    $this->db->where('friendship_id', $row['friendship_id']);
                    $this->db->delete('friends');

                    $this->db->where('friendship_id', $row['friendship_id']);
                    $this->db->delete('activity'); 

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

    function addFriendshipActivity($friendshipID, $date, $user2ID){

        $activityID = uniqid();
        $activity2ID = uniqid();
        $userID = $this->session->userdata('userID');

        $data = array(
            'activity_id'     =>   $activityID,
            'user_id'         =>   $userID,
            'friendship_id'   =>   $friendshipID,
            'party_id'        =>   0,
            'seen'            =>   0,
            'date_created'    =>   $date,
            'public'          =>   1,
        );

        $this->db->insert('activity', $data);

        $data = array(
            'activity_id'     =>   $activity2ID,
            'user_id'         =>   $user2ID,
            'friendship_id'   =>   $friendshipID,
            'party_id'        =>   0,
            'seen'            =>   0,
            'date_created'    =>   $date,
            'public'          =>   1,
        );

        $this->db->insert('activity', $data);

    }

    function checkStatus($friendshipID){

        $this->db->select('active');
        $this->db->from('friends');
        $this->db->where("friendship_id = '$friendshipID'");
        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            if($dataResults[0]['active']) return false; else return true;

        }else{

            return false;

        }

    }

    function acceptFriend($friendshipID, $user2ID){

        if($this->checkStatus($friendshipID)){

            $dateOfAccept = date('Y/m/d H:i:s', time());

            $data = array(
                'active'           =>   1,
                'date_of_accept'   =>   $dateOfAccept,
            );

            $this->db->where('friendship_id', $friendshipID);
            $this->db->update('friends', $data); 

            $this->addFriendshipActivity($friendshipID, $dateOfAccept, $user2ID);

            $sData = array('alerts' => $this->session->userdata('alerts')-1);

            $this->session->set_userdata($sData);

            return true;
        }

    }

    function declineFriend($friendshipID){

        $data = array(
            'active' => 2,
        );

        $this->db->where('friendship_id', $friendshipID);
        $this->db->update('friends', $data); 

        $sData = array('alerts' => $this->session->userdata('alerts')-1);

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

    function getFriendCount($userID){

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

            return count($userResults);
        }

    }

    function getFriends($userID, $limit, $start){

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

        $this->db->limit($limit, $start);
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

    function getUsers($limit, $start){

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
        $this->db->limit($limit, $start);

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

    function getUserParties($userID, $limit, $start){

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
        $this->db->order_by("parties.date_created", "desc");
        $this->db->limit($limit, $start);

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
        $dateOfCom       =   date('Y/m/d H:i:s', time());

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

    function getComments($user2ID = 0, $limit, $start){

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
        $this->db->limit($limit, $start);

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

    public function getCommentCount($userID){

        $this->db->select('COUNT(usser_comment_id) as totalCommentCount');
        $this->db->from('user_comments');
        $this->db->where("user_id", $userID);

        return $this->db->count_all_results();

    }

    public function getPartyCount($userID){

        $this->db->select('COUNT(party_id) as totalPartyCount');
        $this->db->from('parties');
        $this->db->where("user_id", $userID);

        return $this->db->count_all_results();

    }

    public function getActivityCount($userID){

        $this->db->select('COUNT(activity_id) as totalActivityCount');
        $this->db->from('activity');
        $this->db->where("user_id", $userID);

        return $this->db->count_all_results();

    }

    public function getActivity($userID, $limit, $start){

        $this->db->select('
            activity.activity_id, 
            activity.friendship_id,
            activity.party_id,
            activity.seen,
            activity.date_created,
            activity.public,
            users.profile_img,
            users.user_id,
            users.username,
            parties.title,
            parties.party_img,
        ');

        $this->db->from('activity');
        $this->db->join('friends', 'activity.friendship_id = friends.friendship_id', 'left');
        $this->db->join('parties', 'parties.party_id = activity.party_id', 'left');
        $this->db->join('users', 'friends.user1_id = users.user_id', 'left');
        $this->db->where('activity.user_id', $userID);
        $this->db->where('activity.public','1');
        $this->db->order_by("activity.date_created", "desc");
        $this->db->limit($limit, $start);
        $q = $this->db->get();

        if ($q->num_rows() > 0) {

            foreach($q->result() as $row){

                $dataResults[] = $row;

            }

            $dataResults = objectToArray($dataResults);
            
            return $dataResults = $this->prepTime($dataResults, 'date_created');

        }else{

            return false;

        }

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

    public function reportComment($commentID){

        if(!$commentID) return false;

        $reportID = uniqid();

        $data = array(
            'report_id'      =>   $reportID,
            'reporter_id'    =>   $this->session->userdata('userID'),
            'comment_id'     =>   $commentID,
            'comment_type'   =>   'user_comments'
        );

        $this->db->insert('reports', $data);

        return true;

    }

    public function getSearchResults(){

        $search = $this->security->xss_clean($this->uri->segment(3));

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
        $this->db->like('location', $search); 
        $this->db->or_like('username', $search);

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

    public function getBadges($user2ID = 0){

        $user2ID ? $userID = $user2ID : $userID = $this->session->userdata('userID'); 
        
        $this->db->select('
            user_badges.date_given,
            badges.badge_name,
            badges.badge_img,
            badges.how_to_receive,
        ');
        $this->db->from('user_badges');
        $this->db->join('badges', 'user_badges.badge_id = badges.badge_id');
        $this->db->where('user_badges.user_id', $userID);

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










