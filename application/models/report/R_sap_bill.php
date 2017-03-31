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

    public $selectClause    = " journal_no,
                                line_item,
                                co_code,
                                doc_type,
                                period,
                                curr,
                                reference,
                                doc_header ,
                                doc_date ,
                                post_date ,
                                pos_key ,
                                customer_gl ,
                                ba ,
                                cost_center ,
                                profit_center,
                                activity_type ,
                                assignment ,
                                text,
                                amount_doc ,
                                amount_local ,
                                cust_gl_type ,
                                d_c ,
                                trade_partner
                                ";
    public $fromClause      = "(    select    s01 as journal_no,
                                              n01 as line_item,
                                              s02 as co_code,
                                              s03 as doc_type,
                                              s04 as period,
                                              s05 as curr,
                                              s07 as reference,
                                              s08 as doc_header ,
                                              s09 as doc_date ,
                                              s10 as post_date ,
                                              s11 as pos_key ,
                                              s12 as customer_gl ,
                                              s13 as ba ,
                                              s14 as cost_center ,
                                              s15 as profit_center,
                                              s16 as activity_type ,
                                              s17 as assignment ,
                                              s21 as text,
                                              n02 as amount_doc ,
                                              n03 as amount_local ,
                                              s18 as cust_gl_type ,
                                              s19 as d_c ,
                                              s20 as trade_partner
                                    from table(pack_report.rep_sap_bill(%s,%s,null,''))
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
