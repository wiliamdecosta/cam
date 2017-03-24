<?php

/**
 * Pembuatan schema Model
 *
 */
class Invoice extends Abstract_model {

    public $table           = "account";
    public $pkey            = "account_num";
    public $alias           = "a";

    public $fields          = array(


                            );

    public $selectClause    = " a.CUSTOMER_REF,
                                a.ACCOUNT_NUM,
                                a.BILL_PRD,
                                a.INVOICE_NUM,
                                a.NPWP,
                                a.BILL_DATE,
                                a.BILL_LAST_PAY,
                                a.LAST_INVOICE,
                                a.LAST_PAYMENT,
                                a.INVOICE_MNY,
                                a.INVOICE_TAX,
                                a.DUTY_STAMP,
                                a.TOT_BILL,
                                a.INVOICE_TXT_IND,
                                a.INVOICE_TXT_ENG,
                                a.CURR_TYPE,
                                a.CONTRACT_NO,
                                a.BILLSTYLE_ID,
                                a.EXEC_DATE,
                                a.INVOICE_DUE_DATE,
                                b.account_name ";
    public $fromClause      = "  CC_INVOICE_INFO a
                                 JOIN account b ON a.account_num = b.account_num
                                 ";


    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('invoice', TRUE);
        $this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
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
