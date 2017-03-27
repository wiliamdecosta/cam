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

    function getCustInfo($data){

       $sql = "select           a.CUSTOMER_REF,
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
                                b.account_name,
                                b.ADDRESS,
                                b.npwp
                from CC_INVOICE_INFO a
                join  ( select s01 as customer_ref,
                                          s02 as ACCOUNT_NUM ,
                                          s03 as ACCOUNT_NAME ,
                                          s04 as account_status,
                                          s05 as CURRENCY_CODE ,
                                          s06 as NEXT_BILL_DTM ,
                                          s07 as LAST_BILL_DTM ,        
                                          s08 as INVOICING_CO_NAME ,  
                                          s09 as CPS_NAME ,  
                                          s10 as TERMINATION_DAT ,  
                                          n06 as TERMINATION_REASON_ID ,  
                                          s11 as TERMINATION_REASON_NAME ,   
                                          n01 as BILL_EVENT_SEQ ,
                                          n02 as BILL_CHARGE_SEQ ,
                                          n03 as LAST_BILL_SEQ ,
                                          n04 as INVOICING_CO_ID ,
                                          n05 as DEFAULT_CPS_ID ,
                                          s12 as BUSINESS_SHARE , 
                                          s13 as NPWP , 
                                          s14 as IS_MONTHLY_INVOICE , 
                                          s15 as SAP_ACCOUNT , 
                                          s16 as EMAIL , 
                                          s21 as ADDRESS
                                    from table(camweb.pack_list_cust_acc_prod.account_list('".$this->session->userdata('user_name')."' , null,''))) b on 
                                    a.account_num = b.account_num
                                    and a.customer_ref = b.customer_ref
                where a.account_num = '".$data['account_num']."' 
                  and a.bill_prd = '".$data['periode']."'";
        $query = $this->db->query($sql);

        return $query->result_array();
        //return  $data['account_num'];

    }

    function getInvSummary($data){

    }

    function getInvDetail($data){

    }

}

/* End of file Users.php */
