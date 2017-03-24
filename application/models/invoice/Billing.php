<?php

/**
 * Pembuatan schema Model
 *
 */
class Billing extends Abstract_model {

    public $table           = "account";
    public $pkey            = "account_num";
    public $alias           = "a";

    public $fields          = array(


                            );

    public $selectClause    = "    ACCOUNT_NUM,
                                   BILL_SEQ,
                                   EVENT_SEQ,
                                   BILL_PERIOD,
                                   BILL_DTM,
                                   INVOICE_NET_MNY,
                                   INVOICE_TAX_MNY,
                                   INVOICE_WITH_PPN,
                                   BALANCE_FWD_MNY,
                                   BALANCE_OUT_MNY,
                                   ADJUSTMENT_MNY,
                                   PAYMENTS_MNY,
                                   INVOICE_NUM";
    public $fromClause      = "  V_TLK_BILLSUMMARY a
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
