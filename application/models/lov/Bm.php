<?php

/**
 * Pembuatan schema Model
 *
 */
class Bm extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    ="area_code, 
                              area_name, 
                              fm_code, 
                              fm_name, 
                              bm_code, 
                              bm_name ";

    public $fromClause      = "( select s01 as area_code, 
                                          s02 as area_name, 
                                          s03 as fm_code, 
                                          s04 as fm_name, 
                                          s05 as bm_code, 
                                          s06 as bm_name 
                                   from table(pack_lov.get_bm_list(%s, null, '')) )";

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
