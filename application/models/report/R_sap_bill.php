<?php

/**
 * Pembuatan schema Model
 *
 */
class R_sap_bill extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " nper, 
                                doc_no, 
                                invoice_no,
                                journal_no, 
                                line_item, 
                                customer_gl, 
                                cust_gl_type, 
                                ba, 
                                profit_center, 
                                post_date,
                                doc_date,
                                amount, 
                                text
                                ";
    public $fromClause      = "(    select    n01 as nper, 
                                              s01 as doc_no, 
                                              s09 as invoice_no,
                                              s02 as journal_no, 
                                              n02 as line_item, 
                                              s03 as customer_gl, 
                                              s04 as cust_gl_type, 
                                              s05 as ba, 
                                              s06 as profit_center, 
                                              s07 as post_date,
                                              s08 as doc_date,
                                              n03 as amount, 
                                              s21 as text
                                    from table(pack_report.rep_sap_bill (%s,%s,null,''))
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
