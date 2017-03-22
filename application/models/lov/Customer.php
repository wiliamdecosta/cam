<?php

/**
 * Pembuatan schema Model
 *
 */
class Customer extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = " customer_ref ,
                                address_name ,
                                first_name ,
                                last_name ,
                                salutation_name ,
                                market_segment_id ,
                                parent_customer_ref ,
                                invoicing_co_id";

    public $fromClause      = "( select s01 as customer_ref ,
                                        s21 as address_name ,
                                        s02 as first_name ,
                                        s03 as last_name ,
                                        s22 as salutation_name ,
                                        n01 as market_segment_id ,
                                        s04 as parent_customer_ref ,
                                        n02 as invoicing_co_id
                                from table(pack_lov.get_customer_list(%s, '')) )";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';

        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
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
