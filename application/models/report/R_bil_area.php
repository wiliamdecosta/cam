<?php

/**
 * Pembuatan schema Model
 *
 */
class R_bil_area extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " area,
                                fm,
                                profit_center,
                                jml_bulan_n,
                                jml_bulan_n_1,
                                jml_growth
                                ";
    public $fromClause      = "(    select    s01 ||'-' || s02 as area,
                                              s03 ||'-' || s04 as fm,
                                              s05 ||'-' || s06 as profit_center,
                                              n02 as jml_bulan_n,
                                              n03 as jml_bulan_n_1,
                                              n04 as jml_growth
                                    from table(pack_report.rep_billing_per_ba(%s,%s,null,''))
                                )";

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
