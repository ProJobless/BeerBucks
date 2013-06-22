<?

class Party_model extends CI_Model {

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
            $days       =   $newPartyInfo[$key]['days'] = $interval->format("%d"); 
            $hours      =   $newPartyInfo[$key]['hours'] = $interval->format("%h"); 
            $minutes    =   $newPartyInfo[$key]['minutes'] = $interval->format("%i"); 
            $seconds    =   $newPartyInfo[$key]['seconds'] = $interval->format("%s"); 

            if($key+1 == count($partyInfo)){

                return $newPartyInfo;
            }
            
        }

    }

    public function converTimezone($time){

        $timeP   =   new DateTime( $time );
        $timezone;

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
        $newStart        =   $this->converTimezone($start);
        $newEnd          =   $this->converTimezone($end);

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

            $dataResults = objectToArray($dataResults);

            $filteredData = $this->checkStatus($dataResults, true);

            return $this->getTimeTillParty($filteredData);

        }else{
            return false;
        }

    }

    public function getParty($partyID){
        
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

}