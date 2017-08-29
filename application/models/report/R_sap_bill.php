<?php

/**
 * Pembuatan schema Model
 *
 */
class R_sap_bill extends Abstract_model {

    public $table           = "invoice.T_INTERFACE_SAP_BILL";
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
                                profit_center ,
                                activity_type ,
                                assignment ,
                                text,
                                amount_doc ,
                                amount_local ,
                                cust_gl_type ,
                                d_c ,
                                trade_partner,
                                file_name,
                                user_create_file,
                                file_created_date 
                                ";
    public $fromClause      = "(    SELECT   s01 AS journal_no,
                                             n01 AS line_item,
                                             s02 AS co_code,
                                             s03 AS doc_type,
                                             s04 AS period,
                                             s05 AS curr,
                                             s07 AS reference,
                                             s08 AS doc_header,
                                             s09 AS doc_date,
                                             s10 AS post_date,
                                             s11 AS pos_key,
                                             s12 AS customer_gl,
                                             s13 AS ba,
                                             s14 AS cost_center,
                                             s15 AS profit_center,
                                             s16 AS activity_type,
                                             s17 AS assignment,
                                             s21 AS text,
                                             n02 AS amount_doc,
                                             n03 AS amount_local,
                                             s18 AS cust_gl_type,
                                             s19 AS d_c,
                                             s20 AS trade_partner,
                                             a.file_name,
                                             a.user_create_file,
                                             a.file_created_date
                                      FROM   table (pack_report.rep_sap_bill (%s,%s,NULL,'')) b,
                                             invoice.T_INTERFACE_SAP_BILL a) 
                                             where %s
                                      ";

    public $refs            = array();

    function __construct($periode = "", $isgenerate = "ungenerated") {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        //die($file_name);

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$periode."'"); 
        if ($isgenerate == "generated") {
          $where = ('FILE_NAME IS NOT NULL');
        }else{
          $where = ('FILE_NAME IS NULL');
        }
        
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$periode."'",$where); 
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

    

    function edit_generate($file_name,$journal_no,$line_item,$customer_gl,$cust_gl_type){

        $ci =& get_instance();
        $userdata = $ci->session->userdata;
        $date = "to_date('".date('Y-m-d')."','yyyy-mm-dd')";
        $uname = $userdata['user_name'];
        

         $sql = "UPDATE invoice.T_INTERFACE_SAP_BILL SET
                file_created_date = ".$date." ,
                user_create_file = '".$uname."' ,
                file_name = '".$file_name."'
                WHERE journal_no = '".$journal_no."'
                AND line_item = ".$line_item."
                AND customer_gl = '".$customer_gl."'
                AND cust_gl_type = '".$cust_gl_type."' ";

        $this->db->query($sql);
     
    }

}

/* End of file Users.php */
