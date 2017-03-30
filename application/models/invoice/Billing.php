<?php

/**
 * Pembuatan schema Model
 *
 */
class Billing extends Abstract_model {

    public $table           = "V_TLK_BILLSUMMARY";
    public $pkey            = "account_num";
    public $alias           = "a";

    public $fields          = array(


                            );

    public $selectClause    = "    a.ACCOUNT_NUM,
                                   a.BILL_SEQ,
                                   a.EVENT_SEQ,
                                   a.BILL_PERIOD,
                                   a.BILL_DTM,
                                   a.INVOICE_NET_MNY,
                                   a.INVOICE_TAX_MNY,
                                   a.INVOICE_WITH_PPN,
                                   a.BALANCE_FWD_MNY,
                                   a.BALANCE_OUT_MNY,
                                   a.ADJUSTMENT_MNY,
                                   a.PAYMENTS_MNY,
                                   a.INVOICE_NUM ";
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

    function setSelectBilling($account_num, $periode){
      $username = $this->session->userdata('user_name');

      $this->selectClause = " product, value";
      $this->fromClause = "  (
                          select sum(bill_mny) value, trim(product_group) product, decode(trim(product_group),'PPN',10,1) ord
                         from (select s01 as customer_ref, 
                                  s02 as account_num, 
                                  s03 as account_name, 
                                  s04 as invoice_num, 
                                  s05 as npwp, 
                                  n01 as revenue_code_id, 
                                  s06 as product_group, 
                                  s07 as product_name, 
                                  s08 as product_label, 
                                  s09 as prod_period, 
                                  s10 as gl_account, 
                                  s11 as curr_type, 
                                  n02 as bill_mny, 
                                  n03 as installation, 
                                  n04 as abonemen, 
                                  s12 as charge_start_dat, 
                                  s13 as cust_order_num, 
                                  n05 as product_id, 
                                  n06 as product_seq,
                                  s14 as sap_code_bill,
                                  s15 as sap_code_unbill,
                                  s16 as bill_prd,
                                  s18 as bill
                                from table(camweb.pack_report.rep_billing_product_detail('".$username."','".$periode."',null,''))
                                )
                                where account_num = '".$account_num."'
                                and bill_prd = '".$periode."'
                                group by trim(product_group), decode(trim(product_group),'PPN','10',1)
                                union all 
                                select sum(bill_mny) value, 'Total', 11
                         from (select s01 as customer_ref, 
                                  s02 as account_num, 
                                  s03 as account_name, 
                                  s04 as invoice_num, 
                                  s05 as npwp, 
                                  n01 as revenue_code_id, 
                                  s06 as product_group, 
                                  s07 as product_name, 
                                  s08 as product_label, 
                                  s09 as prod_period, 
                                  s10 as gl_account, 
                                  s11 as curr_type, 
                                  n02 as bill_mny, 
                                  n03 as installation, 
                                  n04 as abonemen, 
                                  s12 as charge_start_dat, 
                                  s13 as cust_order_num, 
                                  n05 as product_id, 
                                  n06 as product_seq,
                                  s14 as sap_code_bill,
                                  s15 as sap_code_unbill,
                                  s16 as bill_prd,
                                  s18 as bill
                                from table(camweb.pack_report.rep_billing_product_detail('".$username."','".$periode."',null,''))
                                )
                                 where account_num = '".$account_num."'
                                and bill_prd = '".$periode."'
                                )  ";

    }

}

/* End of file Users.php */
