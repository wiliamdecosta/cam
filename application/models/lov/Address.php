<?php

/**
 * Pembuatan schema Model
 *
 */
class Address extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" s01 as ADDRESS_1, 
                                  s02 as ADDRESS_2, 
                                  s03 as ADDRESS_3, 
                                  s04 as ADDRESS_4, 
                                  s05 as ADDRESS_5, 
                                  s06 as ZIPCODE, 
                                  s07 as COUNTRY_NAME, 
                                  s08 as CUSTOMER_REF, 
                                  n01 as ADDRESS_SEQ , 
                                  n03 as COUNTRY_ID , 
                                  n04 as ADDRESS_FORMAT_ID ";

    public $fromClause      = "( select  s01 as ADDRESS_1, 
                                      s02 as ADDRESS_2, 
                                      s03 as ADDRESS_3, 
                                      s04 as ADDRESS_4, 
                                      s05 as ADDRESS_5, 
                                      s06 as ZIPCODE, 
                                      s07 as COUNTRY_NAME, 
                                      s08 as CUSTOMER_REF, 
                                      n01 as ADDRESS_SEQ , 
                                      n03 as COUNTRY_ID , 
                                      n04 as ADDRESS_FORMAT_ID 
                                   from table(pack_lov.get_addres_bycustomer(%s, %s,''))
                            )";

    public $refs            = array();

    function __construct($customer_ref = '') {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'");
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
