<?php

/**
 * Pembuatan schema Model
 *
 */
class Service_address extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" address_1,
                                  address_2 ,
                                  address_3 ,
                                  address_4 ,
                                  address_5 ,
                                  zipcode ,
                                  country_name ,
                                  start_date ,
                                  end_date ,
                                  nm_jalan ,
                                  nm_kota ,
                                  propinsi ,
                                  country_id,
                                  address";

    public $fromClause      = "(select    s01 address_1,
                                          s02 address_2,
                                          s03 address_3,
                                          s04 address_4,
                                          s05 address_5,
                                          s06 zipcode,
                                          s07 country_name,
                                          s08 start_date,
                                          s09 end_date,
                                          s21 nm_jalan,
                                          s22 nm_kota,
                                          s23 propinsi,
                                          n01 country_id,
                                          s21||','||s22||','||s23||','||s07 address
                                from table(pack_list_cust_acc_prod.product_details_address(%s,%s, %d)))";

    public $refs            = array();

    function __construct($customer_ref='', $product_seq=0) {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'",$product_seq);
        // $this->db_crm = $this->load->database('default', TRUE);
        // $this->db_crm->_escape_char = ' ';
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
