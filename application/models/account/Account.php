<?php

/**
 * Pembuatan schema Model
 *
 */
class Account extends Abstract_model {

    public $table           = "account";
    public $pkey            = "account_num";
    public $alias           = "a";

    public $fields          = array(


                            );

   /* public $selectClause    = " a.account_num, 
                                null as action, 
                                a.account_name, 
                                'OK' as 
                                account_status, a.currency_code,
								a.deposit_mny, 
                                c.end_dat, 
                                null as golivedtm, 
                                e.email_address as email, 
                                d.npwp as npwp,
								RTRIM(f.address_1) || ' ' || RTRIM(f.address_2) || ' ' || RTRIM(f.address_3) || ' ' || RTRIM(f.address_4) || ' ' || RTRIM(f.address_5) as address, invoicing_co_name ";
    public $fromClause      = " account a
                                    INNER JOIN accountdetails c ON a.ACCOUNT_NUM = c.ACCOUNT_NUM
                                    INNER JOIN accountattributes d ON a.ACCOUNT_NUM = d.ACCOUNT_NUM
                                    INNER JOIN contactdetails e ON a.CUSTOMER_REF = e.CUSTOMER_REF
                                    INNER JOIN address f ON a.CUSTOMER_REF = f.CUSTOMER_REF
                                    inner join invoicingcompany g on a.invoicing_co_id = g.invoicing_co_id";*/

    public $selectClause    = " a.account_num, 
                                a.account_name, 
                                a.account_status, 
                                a.currency_code,
                                a.email, 
                                a.npwp,
                                a.address, 
                                a.invoicing_co_name ";
    public $fromClause      = "  ( select s01 as customer_ref,
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
                                    from table(pack_list_cust_acc_prod.account_list(%s , null,''))
                                    ) a ";


    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
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
