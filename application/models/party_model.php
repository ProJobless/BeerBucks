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
        } else {
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
            'location' => $partyLocation,
            'address' => $address,
            'start' => $start,
            'end' => $end,
            'goal' => $goal,
            'party_img' => $party_img
        );

        $q = $this->db->insert('partys', $data);

        return true;
    }

}