<?php

/**
 * Pembuatan schema Model
 *
 */
class Adjustment_type extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "  adjustment_type_name,
                                 revenue_code_desc ,
                                 adjustment_type_id";

    public $fromClause      = "( select 
                                      s01 as adjustment_type_name,
                                      s21 as revenue_code_desc ,
                                      n01 as adjustment_type_id 
                                  from table(pack_lov.get_adjtype_list(%s, '')) )";

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
