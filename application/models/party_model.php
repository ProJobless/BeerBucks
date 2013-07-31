<?

class Party_model extends CI_Model {

    function __construct(){
        parent::__construct();

        $this->load->helper('object_to_array.php');
        $this->load->helper('cookie');
        $this->load->model('app_model'); 
        
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

    public function incrementValue($title, $userID, $amount){

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

	public function checkIfBadgeExists($badge, $user) {

        $this->db->select('user_badge_id');
        $this->db->where('badge_id', $badge);
        $this->db->where('user_id', $user);

        $q = $this->db->get('user_badges');

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

        if($option) return $nonExpiredData; else return $currentData;
        
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

            if($date2 < $date1)
                $newPartyInfo[$key]['expirationCheck'] = true;

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

        $timeP      =   new DateTime( $time );
        $timezone   =   0;

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

    private function addPartyActivity($partyID, $date){

        $activityID = uniqid();
        $userID = $this->session->userdata('userID');

        $data = array(
            'activity_id'     =>   $activityID,
            'user_id'         =>   $userID,
            'friendship_id'   =>   0,
            'party_id'        =>   $partyID,
            'seen'            =>   0,
            'date_created'    =>   $date,
            'public'          =>   1,
        );

        $this->db->insert('activity', $data);

    }
    private function addBadge($bData){
        //Accepts an array with the following information:
        //--badgeID - The id of the badge you while to add see documentation for badge's ID.
        //--date - The datetime which the event related to the badge happened.

        $userID = $this->session->userdata('userID');

        if(!$this->checkIfBadgeExists($bData['badgeID'], $userID)){

            $userBadgeID = uniqid();

            $data = array(
                'user_badge_id'   =>   $userBadgeID,
                'user_id'         =>   $userID,
                'badge_id'        =>   $bData['badgeID'],
                'date_given'      =>   $bData['date'],
            );

            $this->db->insert('user_badges', $data);

        }else{

            return false;

        }

    }

    public function newParty(){

        $partyID         =   uniqid();
        $userID          =   $this->session->userdata('userID');
        $dateCreated     =   date('Y/m/d H:i:s', time());
        $title           =   $this->security->xss_clean($this->session->userdata('title'));
        $description     =   $this->security->xss_clean($this->session->userdata('description'));
        $partyLocation   =   $this->security->xss_clean($this->session->userdata('partyLocation'));
        $address         =   $this->security->xss_clean($this->session->userdata('address'));
        $partyLat        =   $this->security->xss_clean($this->session->userdata('partyLat'));
        $partyLng        =   $this->security->xss_clean($this->session->userdata('partyLng'));
        $start           =   $this->security->xss_clean($this->session->userdata('start'));
        $end             =   $this->security->xss_clean($this->session->userdata('end'));
        $goal            =   $this->security->xss_clean(ltrim($this->session->userdata('goal') , '$'));
        $party_img       =   $this->security->xss_clean($this->session->userdata('img_name'));
        $newStart        =   $this->convertTimezone($start);
        $newEnd          =   $this->convertTimezone($end);

        $data = array(
            'party_id'         =>   $partyID,
            'user_id'          =>   $userID,
            'date_created'     =>   $dateCreated,
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
            'party_lat'        =>   $partyLat,
            'party_lng'        =>   $partyLng,
        );

        $q = $this->db->insert('parties', $data);

        $this->incrementValue('parties', $userID, '1');
        $this->addPartyActivity($partyID, $dateCreated);

        $bData = array(
            'badgeID'   =>   '51e79393a9941',
            'date'      =>   $dateCreated,
        );

        $this->addBadge($bData);

        return $partyID;
        
    }
    public function getNearCount(){

        if(!$this->session->userdata('userLat') && !$this->session->userdata('userLng')) $this->app_model->userLocation();

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   100;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69); 

        $query = $this->db->query("

            SELECT  parties.party_id, 
                    parties.user_id, 
                    parties.date_created, 
                    parties.date_edited, 
                    parties.start, 
                    parties.end, 
                    parties.goal,
                    parties.expired,
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            JOIN    `users` ON parties.user_id = users.user_id
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist;
        ");

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults    =   objectToArray($dataResults);
            $filteredData   =   $this->checkStatus($dataResults, true);

            return count($this->getTimeTillParty($filteredData));

        }else{
            return false;
        }


    }
    public function getNearParties($limit, $start){

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   100;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69);

        $query = $this->db->query("

            SELECT  parties.party_id, 
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
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            JOIN    `users` ON parties.user_id = users.user_id
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist
            ORDER BY distance
            LIMIT $limit
            OFFSET $start;
        ");

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

    public function getUpcomingCount(){

        if(!$this->session->userdata('userLat') && !$this->session->userdata('userLng')) $this->app_model->userLocation();

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   100;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69); 

        $query = $this->db->query("

            SELECT  parties.party_id, 
                    parties.user_id, 
                    parties.date_created, 
                    parties.date_edited, 
                    parties.start, 
                    parties.end, 
                    parties.goal,
                    parties.expired,
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            JOIN    `users` ON parties.user_id = users.user_id
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist;
        ");

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults    =   objectToArray($dataResults);
            $filteredData   =   $this->checkStatus($dataResults, true);

            return count($this->getTimeTillParty($filteredData));

        }else{
            return false;
        }

    }

    public function getUpcomingParties($limit, $start){

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   100;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69); 

        $query = $this->db->query("

            SELECT  parties.party_id, 
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
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            JOIN    `users` ON parties.user_id = users.user_id
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist
            ORDER BY parties.start
            LIMIT $limit
            OFFSET $start;
        ");

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

    public function getFeaturedCount(){

        if(!$this->session->userdata('userLat') && !$this->session->userdata('userLng')) $this->app_model->userLocation();

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   1000;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69); 

        $query = $this->db->query("

            SELECT  parties.party_id, 
                    parties.user_id, 
                    parties.date_created, 
                    parties.date_edited, 
                    parties.start, 
                    parties.end, 
                    parties.goal,
                    parties.expired,
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist
        ");

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults    =   objectToArray($dataResults);
            $filteredData   =   $this->checkStatus($dataResults, true);

            return count($this->getTimeTillParty($filteredData));

        }else{

            return false;

        }

    }

    public function getFeaturedParties($limit, $start){

        $userLat   =   $this->security->xss_clean($this->session->userdata('userLat'));
        $userLng   =   $this->security->xss_clean($this->session->userdata('userLng'));
        $dist      =   1000;
        $x         =   $userLng - $dist / ABS(COS(deg2rad($userLat))*69); 
        $xx        =   $userLng + $dist / ABS(COS(deg2rad($userLat))*69); 
        $y         =   $userLat - ($dist / 69); 
        $yy        =   $userLat + ($dist / 69); 

        $query = $this->db->query("

            SELECT  parties.party_id, 
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
                    3956 * 2 * ASIN(
                        SQRT(
                            POWER(
                                SIN(
                                    ($userLat - parties.party_lat) * pi() / 180 / 2
                                ), 2
                            ) +
                            COS(
                                $userLat * pi() / 180
                            ) *
                            COS(
                                parties.party_lat * pi() / 180
                            ) *
                            POWER(
                                SIN(
                                    ($userLng - parties.party_lng) * pi() / 180 / 2
                                ), 2
                            )
                        )
                    ) as distance
            FROM    `parties` AS parties
            JOIN    `users` ON parties.user_id = users.user_id
            WHERE   parties.party_lng BETWEEN $x AND $xx
            AND     parties.party_lat BETWEEN $y AND $yy
            AND     parties.expired = 0
            HAVING  distance < $dist
            LIMIT $limit
            OFFSET $start;
        ");

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
            parties.party_lat,
            parties.party_lng,
            parties.expired,
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

    public function getCompletedCount(){

        $this->db->select('COUNT(party_id) as totalPartyCount');
        $this->db->from('parties');
        $this->db->where("expired = 1");

        return $this->db->count_all_results();

    }

    public function getCompleted($limit, $start){

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

    public function postComment($partyID = 0){

        if(!$partyID) return false;

        $comment          =   $this->security->xss_clean($this->input->post('comment'));
        $partyCommentID   =   uniqid();
        $posterID         =   $this->session->userdata('userID'); 
        $dateOfCom        =   date('Y/m/d H:i:s', time());

        $data = array(
            'party_comment_id'   =>   $partyCommentID,
            'party_id'           =>   $partyID,
            'poster_id'          =>   $posterID,
            'party_comment'      =>   $comment,
            'comment_date'       =>   $dateOfCom,
        );

        $q = $this->db->insert('party_comments', $data);

        if($q){

            if($this->incrementValue('comments', $posterID, '1')){

                return true;
            }

        }else{

            return false;

        }

    }

    public function getCommentsCount($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('party_comment_id');
        $this->db->from('party_comments');
        $this->db->where('party_comments.party_id', $partyID);
        
        return $this->db->count_all_results();

    }

    public function getComments($partyID = 0, $limit, $start){

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
        $this->db->where('party_comments.party_id', $partyID);
        $this->db->order_by("party_comment_id", "desc");
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

    public function deleteComment($commentID){

        if(!$commentID) return false;

        $this->db->select('party_comment_id');
        $this->db->where('party_comment_id', $commentID);

        $q = $this->db->get('party_comments');

        if ($q->num_rows() > 0) {

            $this->db->where('party_comment_id', $commentID);
            $this->db->delete('party_comments'); 

            if($this->incrementValue('comments', $this->session->userdata('userID'), '-1')){

                return true;
            }

        }else{

            return false;

        } 

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
        $lat             =   $this->security->xss_clean($this->input->post('lat'));
        $lng             =   $this->security->xss_clean($this->input->post('lng'));
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
            'party_lat'        =>   $lat,
            'party_lng'        =>   $lng,
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
        $updateDate    =   date('Y/m/d H:i:s', time());


        $data = array(
            'update_id'      =>   $updateID,
            'party_id'       =>   $partyID,
            'update_title'   =>   $updateTitle,
            'update'         =>   $update,
            'update_date'    =>   $updateDate,
        );

        $this->db->insert('party_updates', $data);

    }

    public function getUpdatesCount($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('update_id');
        $this->db->from('party_updates');
        $this->db->where('party_id', $partyID);
        
        return $this->db->count_all_results();

    }

    public function getUpdates($partyID = 0, $limit, $start){

        if(!$partyID) return false;

        $this->db->select('
            update_id,
            party_id,
            update_title,
            update,
            update_date,
        ');

        $this->db->where('party_id', $partyID);
        $this->db->limit($limit, $start);
        $query = $this->db->get('party_updates');

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
        $this->db->delete('parties_updates'); 

        return true;

    }
    
    public function reportComment($commentID){

        if(!$commentID) return false;

        $reportID = uniqid();

        $data = array(
            'report_id'      =>   $reportID,
            'reporter_id'    =>   $this->session->userdata('userID'),
            'comment_id'     =>   $commentID,
            'comment_type'   =>   'party_comments'
        );

        $this->db->insert('reports', $data);

        return true;

    }

    public function getSearchResults(){

        $search = $this->security->xss_clean($this->uri->segment(3));

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
        $this->db->like('parties.party_location', $search); 
        $this->db->or_like('parties.title', $search);

        $query = $this->db->get();

        if($query->num_rows > 0){

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults    =   objectToArray($dataResults);

            return $this->getTimeTillParty($dataResults);

        }else{
            return false;
        }

    } 

    public function addDonation($response, $partyID, $amount){

        $donationID     =   $response->id;
        $userID         =   $this->session->userdata('userID');
        $donationDate   =   date('Y/m/d H:i:s', time());
        $fingerprint    =   $response->card->fingerprint;

        $data = array(
            'donation_id'     =>   $donationID,
            'party_id' => $partyID,
            'user_id' => $userID,
            'amount' => $amount,
            'fingerprint' => $fingerprint,
            'donation_date' => $donationDate
        );

        $this->db->insert('party_donations', $data);

        $this->incrementValue('contributions', $userID, '1');
        
        return true;
    }

    public function getDonations($partyID = 0){

        $this->db->select('
            party_donations.donation_id,
            party_donations.user_id,
            party_donations.party_id,
            party_donations.donation_date,
            party_donations.amount,
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
        ');

        $this->db->from('party_donations');
        $this->db->join('users', 'party_donations.user_id = users.user_id');
        $this->db->where('party_donations.party_id', $partyID);

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

    public function getAttendingCount($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('user_id');
        $this->db->from('party_donations');
        $this->db->where("party_id", $partyID);
        $this->db->group_by('user_id');
        
        $query = $this->db->get();

        if($query->num_rows > 0){

            $count = 0;

            foreach($query->result() as $row){
                $count ++;
            }

            return $count;

        }else{
            return 0;
        }

    }

    public function getAttending($partyID = 0, $limit, $start){

        $this->db->select('
            party_donations.donation_id,
            party_donations.user_id,
            party_donations.party_id,
            party_donations.donation_date,
            party_donations.amount,
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
        ');

        $this->db->from('party_donations');
        $this->db->join('users', 'party_donations.user_id = users.user_id');
        $this->db->where('party_donations.party_id', $partyID);
        $this->db->group_by('users.user_id');
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

    public function checkCollected($partyID = 0){

        if(!$partyID) return false;

        $this->db->select('collected');
        $this->db->where("party_id = '$partyID'");
        $this->db->from('parties');

        $query = $this->db->get();

        if($query->num_rows > 0){    

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            if($dataResults[0]['collected'] == 0){

                return true;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }

    public function getAmount($partyID = 0){

        if(!$partyID) return false;

        $total = 0;

        $this->db->select('amount');
        $this->db->where("party_id = '$partyID'");
        $this->db->from('party_donations');

        $query = $this->db->get();

        if($query->num_rows > 0){    

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            foreach($dataResults as $dr){
               $total += $dr['amount'];
            }
           
            return $total*100;
           
        }else{

            return false;

        }

    }

    public function getRecipientID(){

        $userID = $this->session->userdata('userID');

        $this->db->select('recipient_id');
        $this->db->where("user_id = '$userID'");
        $this->db->from('recipients');

        $query = $this->db->get();

        if($query->num_rows > 0){    

            foreach($query->result() as $row){
                $dataResults[] = $row;
            }

            $dataResults = objectToArray($dataResults);

            return $dataResults[0]['recipient_id'];
           
        }else{

            return false;

        }

    }

    public function changeCollected($partyID = 0){

        if(!$partyID) return false;

        $data = array('collected' => 1);

        $this->db->where("party_id", $partyID);
        $this->db->update('parties', $data); 

        return true;

    }

}