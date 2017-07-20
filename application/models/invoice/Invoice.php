<?php

/**
 * Pembuatan schema Model
 *
 */
class Invoice extends Abstract_model {

    public $table           = "CC_INVOICE_INFO";
    public $pkey            = "";
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
                                b.account_name,
                                nvl((select p10 from account_param_invoice where p1 = a.invoice_num),0) print_seq
                                ";
    public $fromClause      = "  CC_INVOICE_INFO a
                                 JOIN account b ON a.account_num = b.account_num
                                 ";


    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('invoice', TRUE);
        $this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->userSession = $this->session->userdata('user_name');
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->setModelLogInvoice();
            $this->record['userid'] = $this->session->userdata('user_name');
           /* $this->record['id'] = $this->getIdPooling();
            $this->record['pooling_date'] ="sysdate";*/

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

        }
        return true;
    }

    function setModelLogInvoice(){

      $this->table = 'invoice_log_pooling';
      $this->pkey  = 'id';
      $this->selectClause = ' ID, ACCOUNT_NUM, BILL_PRD, STATUS, USERID, INFO, MSG, POOLING_DATE ';
      $this->fromClause = 'invoice_log_pooling';

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

      function getCustInfo2($data){

       $sql = " SELECT account_num,
                       period,
                       p1 invocie_num,
                       p2 real_inv_num,
                       to_date(p3,'DD-Mon-YYYY') tgl,
                       p5 up,
                       p6 perihal,
                       case when p8 is null then 
                       to_char(to_date(p3,'DD-Mon-YYYY'),'DD') || ' ' || INVOICE.MAKE_BULAN(period)
                       else p8 end tgl2,
                       (SELECT VALUE FROM parameter_invoice where param_id = a.p4) signer,
                       (SELECT VALUE FROM parameter_invoice where param_id = a.p7) bank
                       from      account_param_invoice a
                        where p1 = '".$data['invoice_num']."'
        ";
        $query = $this->db->query($sql);

        return $query->result_array();
        //return  $data['account_num'];

    }

    function getKontrak($data){

    $sql = "    select customer_ref, product_seq from 
                ( select   s01 as ACCOUNT_NUM, 
                                          s02 as ACCOUNT_NAME , 
                                          s03 as CUSTOMER_REF , 
                                          n01 as PRODUCT_SEQ , 
                                          s04 as PRODUCT_NAME , 
                                          s05 as PRODUCT_LABEL , 
                                          s06 as START_DAT ,  
                                          s07 as END_DAT ,          
                                          s08 as CUST_ORDER_NUM ,  
                                          s09 as CURRENCY_CODE ,  
                                          n04 as INSTALL ,  
                                          n05 as ABONEMEN ,  
                                          n02 as PRODUCT_ID , 
                                          n03 as PARENT_PRODUCT_SEQ , 
                                          s12 as KONTRAK , 
                                          s13 as KONTRAK_START_DAT ,  
                                          s14 as KONTRAK_END_DAT ,  
                                          s15 as BA ,  
                                          s16 as PROFIT_CENTER 
                                from table(camweb.pack_list_cust_acc_prod.product_list( '".$this->session->userdata('user_name')."',null, null,''))
                                                                 ) ct 
                                        where account_num = '".$data['account_num']."'
                                        and product_seq is not null
                                        and rownum = 1 
        ";
        $query = $this->db->query($sql);

        $d =  $query->result_array();

        $sql = "  select  (select CAMWEB.GET_PRODUCTATTR('".$d[0]['customer_ref']."', '".$d[0]['product_seq']."', 'KONTRAK') from dual ) KONTRAK,
                    (select to_char(to_date(CAMWEB.GET_PRODUCTATTR('".$d[0]['customer_ref']."', '".$d[0]['product_seq']."', 'KONTRAK_START_DAT'
                    ),'yyyymmdd'),'dd') || ' ' ||  INVOICE.MAKE_BULAN (to_char(to_date(CAMWEB.GET_PRODUCTATTR('".$d[0]['customer_ref']."', '".$d[0]['product_seq']."', 'KONTRAK_START_DAT'
                    ),'yyyymmdd'),'yyyymm')) from dual )
                    KONTRAK_START_DAT
                    from dual
        ";
        $query = $this->db->query($sql);

        return $query->result_array();

    }



    function getIdPooling(){
        $sql = "select nvl(max(id),0)+1 id from invoice_log_pooling ";
        $query = $this->db->query($sql);

        $data =  $query->result_array();
        $ret = '';
        foreach ($data as $key => $value) {
          $ret = $value['id'];
        }
        return $ret;
    }
    
   
    function saveDataPooling($data){
      
     /*foreach ($data as $key => $value) {
       
       $account_num = $value['account_num'];
       $bill_prd = $value['bill_prd'];
       $id = $value['id'];
       $user = $value['userid'];

     }*/
       $account_num = $data['account_num'];
       $bill_prd = $data['bill_prd'];
       $id = $data['id'];
       $user = $data['userid'];

      $sql = "INSERT INTO invoice_log_pooling(ID, ACCOUNT_NUM, BILL_PRD, USERID, POOLING_DATE, STATUS)
              VALUES ('".$id."','".$account_num."','".$bill_prd."','".$user."', sysdate, 'init') ";

      if($account_num != ''){
        $query = $this->db->query($sql);
      }

    }

    function startPooling($id){
      $sql = "BEGIN "
                . " INVOICE.RUN_JOB_POOLING ("
                . " :IN_ID "
                . "); END;";

      $stmt = oci_parse($this->db->conn_id, $sql);

      //  Bind the input parameter
      oci_bind_by_name($stmt, ':IN_ID', $id);

      ociexecute($stmt);

    }

     function saveDataParam($data){
    


      $sql = "INSERT INTO parameter_invoice(PARAM_ID, NAME, TYPE, VALUE, STATUS, VALID_FROM, CREATED_BY, UPDATED_BY, CREATED_DATE, UPDATED_DATE)
              VALUES ('".$data['param_id']."','".$data['name']."','s','".$data['value']."', 1, sysdate,'".$this->session->userdata('user_name')."', '".$this->session->userdata('user_name')."', sysdate, sysdate) ";

      if($data['name'] != ''){
        $query = $this->db->query($sql);
      }

    }
    
    function setPrintSeq($data){
      $sql = "update account_param_invoice set p10 = nvl(p10,0)+1 
              where account_num = '".$data['account_num']."'
              and period = '".$data['periode']."'
              and p1 = '".$data['invoice_num']."'
               ";

      if($data['account_num'] != ''){
        $query = $this->db->query($sql);
      }
    }

    function UpdDataInv($data){

      $sql = "update account_param_invoice 
              set p4 = '".$data['signer']."',
                  p5 = '".$data['up']."',
                  p6 = '".$data['perihal']."',
                  p7 = '".$data['bank']."',
                  p8 = to_char(to_date('".$data['invoice_date']."','dd/mm/yyyy'), 'dd') || ' ' || INVOICE.MAKE_BULAN(to_char(to_date('".$data['invoice_date']."','dd/mm/yyyy'), 'yyyymm'))
              where account_num = '".$data['account_num']."'
              and period = '".$data['periode']."'
               ";

      if($data['account_num'] != ''){
        $query = $this->db->query($sql);
      }
    }

    function getInvSummary($data){

    }

    function getInvDetail($data){

    }

}

/* End of file Users.php */
