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
                                a.customer_ref, 
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

    public function getDetailAccount($account_num){
        $sql = "select  s01 as customer_ref,
                        s02 as account_num,
                        s03 as account_name,
                        s04 as go_live_dat,
                        s05 as go_live_time, 
                        s06 as account_status,
                        s07 as account_in_use,
                        s08 as invoicing_co_name,
                        s09 as cps_name,
                        s10 as tax_status,
                        s11 as last_bill_dtm,
                        s12 as termination_dat,
                        s13 as termination_reason_name 
                     from table(pack_list_cust_acc_prod.account_details_account('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


    public function getBilling($account_num){
        $sql = "select  s01 as bill_period,
                        s02 as bill_period_units,
                        s03 as accounting_method,
                        s04 as bills_per_statement,
                        s05 as payment_method_name,
                        s06 as bill_style_name,
                        s07 as bill_handling_code,
                        s08 as credit_class_name,
                        s09 as payment_term_desc,
                        s10 as credit_limit_mny,
                        s11 as package_disc_account_num,
                        s12 as event_disc_account_num, 
                        s13 as address_name,
                        s14 as ls_address,
                        s15 as email_address,
                        s16 as daytime_contact_tel,
                        s17 as evening_contact_tel,
                        s18 as mobile_contact_tel,
                        s19 as fax_contact_tel
                     from table(pack_list_cust_acc_prod. account_details_billing ('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getServiceAddress($account_num){
        $sql = "select  s01 as country_name,
                        s02 as address_1,
                        s03 as address_2,          
                        s04 as zipcode,
                        s05 as address_3,
                        s06 as country_2
                     from table(pack_list_cust_acc_prod.account_details_srvaddress ('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getFinance($account_num){
        $sql = "select  s01 as currency_code_acc,
                        s02 as currency_code_inf,
                        s03 as billing_status,
                        s04 as next_bill_dtm,
                        s05 as prepay_boo, 
                        s06 as delete_events_on_billing_boo,
                        s07 as holiday_profile_id,
                        s08 as events_per_day
                     from table(pack_list_cust_acc_prod.account_details_finance ('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


    public function getModifyAccount($account_num){
        $sql = "select  s01 as customer_ref,
                      s02 as account_num ,
                      s03 as account_name ,
                      s04 as currency_code,
                      s05 as next_bill_dtm ,
                      s06 as tax_status ,
                      s07 as email ,
                      n01 as country_id,
                      s08 as country_name,
                      s09 as company_name,
                      n03 as bilper_statement,
                      s10 as bill_handling_code,
                      n04 as credit_limit_mny,
                      n05 as acontact_id,
                      s11 as package_disc_account_num,
                      s12 as event_disc_account_num,
                      s13 as mobile_contact_tel,
                      s14 as address1,
                      s15 as address2,
                      s16 as address3,
                      s17 as address4,
                      s18 as address5,
                      s19 as zipcode,
                      s20 as payment_term_desc,
                      s21 as first_name,
                      s22 as last_name,
                      s23 as go_live_date,
                      s24 as account_status
               from table(pack_list_cust_acc_prod_2.account_modify_billing ('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getModifyBillInfo($account_num){
        $sql = "select s03 as business_share ,
                      s04 as npwp,
                      s05 as is_monthly_invoice ,
                      s06 as sap_account ,
                      s07 as slbill_period,
                      n01 as bill_period,
                      n02 as accounting_method,
                      n03 as bill_style_id,
                      n04 as credit_class_id,
                      n05 as payment_method_id
               from table(pack_list_cust_acc_prod_2.account_modify_billing_nexttab ('".$this->session->userdata('user_name')."','".$account_num."'))";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


}

/* End of file Users.php */
