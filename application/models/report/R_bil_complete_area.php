<?php

/**
 * Pembuatan schema Model
 *
 */
class R_bil_complete_area extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " s01 ||'-' || s02 as area,
                              s03 ||'-' || s04 as fm,
                              s05 ||'-' || s06 as bm,
                              n02 as jml_bc ";
    public $fromClause      = "table(pack_report.rep_bill_complete_per_ba(%s,%s,2,''))  ";

    public $refs            = array();

    function __construct($periode = "") {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$periode."'"); 

        //$this->db_crm = $this->load->database('corecrm', TRUE);
        //$this->db_crm->_escape_char = ' ';
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
