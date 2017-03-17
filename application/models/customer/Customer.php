<?php

/**
 * Pembuatan schema Model
 *
 */
class Customer extends Abstract_model {

    public $table           = "customer";
    public $pkey            = "customer_ref";
    public $alias           = "cust";

    public $fields          = array(


                            );
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " ct.customer_ref ,
                                ct.ADDRESS_NAME ,
                                ct.FIRST_NAME ,
                                ct.LAST_NAME ,
                                ct.SALUTATION_NAME ,
                                ct.MARKET_SEGMENT_NAME ,
                                ct.INVOICING_CO_NAME ,
                                ct.MARKET_SEGMENT_ID ,
                                ct.PARENT_CUSTOMER_REF,
                                ct.INVOICING_CO_ID,
                                '-' as account_num,
                                '-' as account_name";
    public $fromClause      = "( select s01 as customer_ref ,
                                        s21 as ADDRESS_NAME ,
                                        s02 as FIRST_NAME ,
                                        s03 as LAST_NAME ,
                                        s22 as SALUTATION_NAME ,
                                        s05 as MARKET_SEGMENT_NAME ,
                                        s06 as INVOICING_CO_NAME ,
                                        s07 as SAP_CODE_BILL ,
                                        s08 as SAP_CODE_UNBILL ,
                                        n01 as MARKET_SEGMENT_ID ,
                                        s04 as PARENT_CUSTOMER_REF ,
                                        n02 as INVOICING_CO_ID 
                                 from table(pack_list_cust_acc_prod.customer_list(%s, ''))
                                 ) ct ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'"); 

        $this->db_crm = $this->load->database('corecrm', TRUE);
        $this->db_crm->_escape_char = ' ';
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

    public function genCustReff(){

        $prefix = (int)$this->input->post('prefix');
        //print_r($prefix);
        //exit;
        $sql = " DECLARE " .
            "  BEGIN " .
            "  SIN_CORE.SINCUSTOMER.GENCUSTOMERREF(:params1,:cursor); END;";

        $params = array(
            array('name' => ':params1', 'value' => $prefix, 'type' => SQLT_INT, 'length' => 11),
        );

        // Bind the output parameter
        $stmt = oci_parse($this->db_crm->conn_id, $sql);
        foreach ($params as $p) {
            // Bind Input
            oci_bind_by_name($stmt, $p['name'], $p['value'], $p['length']);
        }

        $cursor = oci_new_cursor($this->db_crm->conn_id);

        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

        oci_execute($stmt, OCI_DEFAULT);
        oci_execute($cursor, OCI_DEFAULT);

        oci_fetch_all($cursor, $res);
        echo json_encode($res);
    }

}

/* End of file Users.php */
