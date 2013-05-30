<?

class Party_model extends CI_Model {

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

    public function newParty(){
        $party_id = uniqid();
        $user_id = $this->session->userdata('userID');
        $title = $this->session->userdata('title');
        $description = $this->session->userdata('description');
        $location = $this->session->userdata('location');
        $address = $this->session->userdata('address');
        $start = $this->session->userdata('start');
        $end = $this->session->userdata('end');
        $goal = $this->session->userdata('goal');

        $data = array(
            'party_id' => $party_id,
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'address' => $address,
            'start' => $start,
            'end' => $end,
            'goal' => $goal
        );

        $q = $this->db->insert('partys', $data);

        return true;
    }
}