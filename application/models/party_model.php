<?

class Party_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
        $this->load->helper('cookie');
        
    }

    public function prepTime($data, $what){

        $newData = array();

        foreach($data as $key=>$row){

            $date = new DateTime($row[$what]);

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
            }

            $newData[$key] = $row;
            $newData[$key][$what] = $formatted;
        }

        return $newData;

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

    public function checkStatus($partyInfo, $option){

        $nonExpiredData   =   array();
        $currentData      =   array();
        $today            =   date('Y-m-d H:i:s', time());

        foreach($partyInfo as $row){

            if($row['start'] > $today){
                array_push($nonExpiredData, $row);
            }else if($row['start'] < $today && $row['end'] > $today){
                array_push($currentData, $row);
            }else{
                $this->changeToExpired($row);
            }

        }

        if($option){
            return $nonExpiredData;
        }else{
            return $currentData;
        }
        
    }

    public function changeToExpired($partyInfo){

        $data = array(
            'expired' => 1,
        );

        $this->db->where('party_id', $partyInfo['party_id']);
        $this->db->update('parties', $data); 

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

    public function convertTimezone($time){

        $timeP   =   new DateTime( $time );
        $timezone = 0;

        if($time[strlen($time)-1] == '5'){
            $timeP->modify('+6 hours');
            $timezone = -6;
        }else if($time[strlen($time)-1] == '6'){
            $timeP->modify('+7 hours');
            $timezone = -7;
        }else if($time[strlen($time)-1] == '7'){
            $timeP->modify('+8 hours');
            $timezone = -8;
        }else if($time[strlen($time)-1] == '8'){
            $timeP->modify('+9 hours');
            $timezone = -9;
        }
    
        if (strpos($time,'pm') !== false) {
            //$timeP->modify('-12 hours');
        }

        return array($timeP->format( 'Y-m-d H:i:s' ), $timezone);  

    }

    public function newParty(){

        $party_id        =   uniqid();
        $user_id         =   $this->session->userdata('userID');
        $title           =   $this->security->xss_clean($this->session->userdata('title'));
        $description     =   $this->security->xss_clean($this->session->userdata('description'));
        $partyLocation   =   $this->security->xss_clean($this->session->userdata('partyLocation'));
        $address         =   $this->security->xss_clean($this->session->userdata('address'));
        $start           =   $this->security->xss_clean($this->session->userdata('start'));
        $end             =   $this->security->xss_clean($this->session->userdata('end'));
        $goal            =   $this->security->xss_clean(ltrim($this->session->userdata('goal') , '$'));
        $party_img       =   $this->security->xss_clean($this->session->userdata('img_name'));
        $newStart        =   $this->convertTimezone($start);
        $newEnd          =   $this->convertTimezone($end);

        $data = array(
            'party_id'         =>   $party_id,
            'user_id'          =>   $user_id,
            'tos'              =>   1,
            'title'            =>   $title,
            'description'      =>   $description,
            'party_location'   =>   $partyLocation,
            'address'          =>   $address,
            'start'            =>   $newStart[0],
            'end'              =>   $newEnd[0],
            'goal'             =>   $goal,
            'party_img'        =>   $party_img,
            'attending'        =>   0,
            'expired'          =>   0,
            'party_timezone'   =>   $newStart[1],
        );

        $q = $this->db->insert('parties', $data);
        
        return $party_id;
        
    }

    public function getParties(){

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
        $this->db->where("parties.expired = 0");

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults    =   objectToArray($dataResults);
            $filteredData   =   $this->checkStatus($dataResults, true);

            return $this->getTimeTillParty($filteredData);

        }else{
            return false;
        }

    }

    public function getParty($partyID = 0){

        if(!$partyID) return false;
        
        $this->db->select('
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
            parties.attending,
            users.username,
            users.profile_img,
            users.bio,
            users.location,
            users.feedback,
            users.views,
            users.comments,
            users.contributions,
            users.parties,
        ');

        $this->db->from('parties');
        $this->db->join('users', 'parties.user_id = users.user_id');
        $this->db->where("parties.party_id = '$partyID'");

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

    public function getCompleted(){

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
        $this->db->where("parties.expired = 1");

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

    public function postComment($partyID = 0){

        if(!$partyID) return false;

        $comment         =   $this->security->xss_clean($this->input->post('comment'));
        $partyCommentID   =   uniqid();
        
        $posterID = $this->session->userdata('userID'); 
        $dateOfCom       =   date('Y/m/d h:i:s', time());

        $data = array(
            'party_comment_id'   =>   $partyCommentID,
            'party_id'           =>   $partyID,
            'poster_id'          =>   $posterID,
            'party_comment'      =>   $comment,
            'comment_date'       =>   $dateOfCom,
        );

        $q = $this->db->insert('party_comments', $data);

        return true;

    }

    public function getComments($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('
            party_comments.party_comment_id,
            party_comments.party_comment,
            party_comments.comment_date,
            users.user_id,
            users.username,
            users.profile_img,
        ');

        $this->db->from('party_comments');
        $this->db->join('users', 'party_comments.poster_id = users.user_id');
        $this->db->where("party_comments.party_id = '$partyID'");
        $this->db->order_by("party_comment_id", "desc");

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

    public function deleteComment($commentID){

        if(!$commentID) return false;
        
        $this->db->where('party_comment_id', $commentID);
        $this->db->delete('party_comments'); 

        return true;
    }

    public function checkUser($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('user_id');
        $this->db->where("party_id = '$partyID'");
        $this->db->from('parties');

        $query = $this->db->get();

        if($query->num_rows > 0){    

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            if($dataResults[0]['user_id'] == $this->session->userdata('userID')){

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }

    public function updateImage($partyID = 0, $image){

        if(!$partyID) return false;

        $data = array(
            'party_img' => $image,
        );

        $this->db->where('party_id', $partyID);
        $this->db->update('parties', $data); 


    }

    public function updateInfo($partyID = 0){

        if(!$partyID) return false;

        $title         =   $this->security->xss_clean($this->input->post('title'));
        $description   =   $this->security->xss_clean($this->input->post('description'));

        $data = array(
            'title'         =>   $title,
            'description'   =>   $description,
        );

        $this->db->where('party_id', $partyID);
        $this->db->update('parties', $data); 

        return true;

    }

    public function updateDetails($partyID = 0){

        if(!$partyID) return false;

        $partyLocation   =   $this->security->xss_clean($this->input->post('partyLocation'));
        $address         =   $this->security->xss_clean($this->input->post('address'));
        $start           =   $this->security->xss_clean($this->input->post('start'));
        $end             =   $this->security->xss_clean($this->input->post('end'));
        $goal            =   $this->security->xss_clean(ltrim($this->input->post('goal') , '$'));
        $newStart        =   $this->convertTimezone($start);
        $newEnd          =   $this->convertTimezone($end);

        $data = array(
            'party_location'   =>   $partyLocation,
            'address'          =>   $address,
            'start'            =>   $newStart[0],
            'end'              =>   $newEnd[0],
            'goal'             =>   $goal,
            'party_timezone'   =>   $newStart[1],
        );

        $this->db->where('party_id', $partyID);
        $this->db->update('parties', $data); 

        return true;

    }

    public function addUpdate($partyID = 0){

        if(!$partyID) return false;

        $updateTitle   =   $this->security->xss_clean($this->input->post('updateTitle'));
        $update        =   $this->security->xss_clean($this->input->post('update'));
        $updateID      =   uniqid();
        $updateDate    =   date('Y/m/d h:i:s', time());


        $data = array(
            'update_id'      =>   $updateID,
            'party_id'       =>   $partyID,
            'update_title'   =>   $updateTitle,
            'update'         =>   $update,
            'update_date'    =>   $updateDate,
        );

        $this->db->insert('updates', $data);

    }

    public function getUpdates($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('
            update_id,
            party_id,
            update_title,
            update,
            update_date,
        ');

        $this->db->where('party_id', $partyID);
        $query = $this->db->get('updates');

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            $dataResults = $this->prepTime($dataResults, 'update_date');

            return $dataResults;

        }else{
            return false;
        }

    }

    public function deleteUpdate($updateID = 0){

        if(!$updateID) return false;

        $this->db->where('update_id', $updateID);
        $this->db->delete('updates'); 

        return true;

    }

}