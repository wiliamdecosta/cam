<?php

/** 
 * Pembuatan schema Model
 *
 */
class Terminate_reason extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    ="termination_reason_id, 
                              termination_reason_name, 
                              termination_reason_desc";

    public $fromClause      = "( select   n01 as termination_reason_id ,
                                          s01 as termination_reason_name,
                                          s21 as termination_reason_desc
                               from table(pack_lov.get_terminationreason_list(%s, '')) )";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';

        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        // $this->db_crm = $this->load->database('default', TRUE);
        // $this->db_crm->_escape_char = ' ';
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

        }
        return true;
    }


}

/* End of file Users.php */
