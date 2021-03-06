<?php

/**
 * Business_area Model
 *
 */
class Business_area extends Abstract_model {

    public $table           = "p_business_area";
    public $pkey            = "p_business_area_id";
    public $alias           = "ba";

    public $fields          = array(
                                'p_business_area_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Business Area'),
                                'business_area_code'                      => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Business Area Code'),
                                'business_area_name'                  => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Name'),
                                'p_business_area_type_id'                      => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Business Type Area'),
                                'parent_id'                  => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Parent'),
                                'valid_from'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),
                                'address'                      => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Address'),
                                'city'                  => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'City'),
                                'description'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "ba.p_business_area_id,
                                ba.business_area_code,
                                ba.business_area_name,
                                ba.p_business_area_type_id,
                                ba.parent_id,
                                to_char(ba.valid_from, 'yyyy-mm-dd') valid_from,
                                to_char(ba.valid_to, 'yyyy-mm-dd') valid_to,
                                ba.address,
                                ba.city,
                                ba.creation_date,
                                ba.created_by,
                                ba.updated_date,
                                ba.updated_by,
                                ba.description,
                               bat.code";
    public $fromClause      = "p_business_area ba
                                inner join p_business_area_type bat
                                on ba.p_business_area_type_id = bat.p_business_area_type_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['parent_id'] = 0;

            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

            if($this->record['valid_from'] != "") {
                $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            }

            if($this->record['valid_to'] != "") {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);

            if(empty($this->record['parent_id']))
                unset($this->record['parent_id']);
        }else {
            //do something
            //example:
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception

            if($this->record['valid_from'] != "") {
                $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            }

            if($this->record['valid_to'] != "") {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);
            
            if(empty($this->record['parent_id']))
                unset($this->record['parent_id']);
        }
        return true;
    }

    function business_area_type_combo(){
        try {
            $sql = "SELECT * FROM p_business_area_type";
            $query = $this->db->query($sql);

            $items = $query->result_array();
            echo '<select>';
            foreach($items  as $item ){
                echo '<option value="'.$item['p_business_area_type_id'].'">'.$item['code'].'</option>';
            }
            echo '</select>';
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
    }

    function emptyChildren($p_business_area_id) {
        $sql = "select count(1) as total from p_business_area where parent_id = ?";

        $query = $this->db->query($sql, array($p_business_area_id));
        $row = $query->row_array();

        return $row['total'] == 0;
    }

}

/* End of file Business_area.php */