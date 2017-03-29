<?php

/**
 * Pembuatan schema Model
 *
 */
class R_bill_unbill_summary extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " business_area_code,
                                business_area_name,
                                bill_count,
                                unbill_count,
                                growth_count,
                                bill_amount,
                                unbill_amount,
                                growth_amount
                                ";
    public $fromClause      = "(    select    
                                          s01 as business_area_code,
                                          s02 as business_area_name,
                                          n02 as bill_count,
                                          n03 as unbill_count,
                                          n04 as growth_count,
                                          n05 as bill_amount,
                                          n06 as unbill_amount,
                                          n07 as growth_amount
                                       from table(pack_report.rep_rekap_bill_unbill_per_ba(%s,%s,null,''))
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
