<?php

/**
 * P_business_area_user Model
 *
 */
class Business_area_user extends Abstract_model {

    public $table           = "p_business_area_user";
    public $pkey            = "p_business_area_user_id";
    public $alias           = "a";

    public $fields          = array(
                                'p_business_area_user_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Module'),
                                'user_id'                   => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'User ID'),
                                'business_area_code'        => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Business Area Code'),
                                'valid_from'                => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'                  => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),

                                'description'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),
                            );

    public $selectClause    = "a.p_business_area_user_id, a.user_id, a.business_area_code, a.business_area_code as area_code, to_char(a.valid_from,'yyyy-mm-dd') as valid_from,
                                to_char(a.valid_to,'yyyy-mm-dd') as valid_to, a.description
                                ";
    public $fromClause      = "p_business_area_user a";

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
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);
            $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            unset($this->record['valid_from']);
            if(empty($this->record['valid_to'])){
                unset($this->record['valid_to']);
            }

        }else {
            //do something
            //example:

            $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            unset($this->record['valid_from']);

            if(empty($this->record['valid_to'])){
                unset($this->record['valid_to']);
            }

            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
        }
        return true;
    }

}

/* End of file P_business_area_user.php */