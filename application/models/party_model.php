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

    public function newParty(){
        $party_id = uniqid();
        $user_id = $this->session->userdata('userID');
        $title = $this->security->xss_clean($this->session->userdata('title'));
        $description = $this->security->xss_clean($this->session->userdata('description'));
        $partyLocation = $this->security->xss_clean($this->session->userdata('partyLocation'));
        $address = $this->security->xss_clean($this->session->userdata('address'));
        $start = $this->security->xss_clean($this->session->userdata('start'));
        $end = $this->security->xss_clean($this->session->userdata('end'));
        $goal = $this->security->xss_clean(ltrim($this->session->userdata('goal') , '$'));
        $party_img = $this->security->xss_clean($this->session->userdata('img_name'));

        $data = array(
            'party_id' => $party_id,
            'user_id' => $user_id,
            'tos' => 1,
            'title' => $title,
            'description' => $description,
            'party_location' => $partyLocation,
            'address' => $address,
            'start' => $start,
            'end' => $end,
            'goal' => $goal,
            'party_img' => $party_img,
            'attending' => 0
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
            parties.attending,
            users.username,
        ');

        $this->db->from('parties');
        $this->db->join('users', 'parties.user_id = users.user_id');
        //$this->db->limit($limit, $start);

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);


            // echo '<pre>';
            // print_r($dataResults);
            // echo '</pre>';

            return $dataResults;

        }else{
            // No Results Found
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


            // echo '<pre>';
            // print_r($dataResults);
            // echo '</pre>';

            return $dataResults;

        }else{
            // No Results Found
        }


    }

}