<?php

/**
 * Pembuatan schema Model
 *
 */
class Price_plan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	"tariff_id ,
                                 tariff_name,
                                 tariff_desc ,
                                 sales_start_dat ,
                                 sales_end_dat ,
                                 catalogue_change_id ,
                                 parent_tariff_id ,
                                 product_id ,
                                 product_family_id ";

    public $fromClause      = "( select   n01 as tariff_id ,
                                          s01 as tariff_name,
                                          s21 as tariff_desc ,
                                          s02 as sales_start_dat ,
                                          s03 as sales_end_dat ,
                                          n02 as catalogue_change_id ,
                                          n03 as parent_tariff_id ,
                                          n04 as product_id ,
                                          n05 as product_family_id 
                                from table(pack_lov.get_tariff_list_byprodid(%s, %s,%d,'')) )";

    public $refs            = array();

    function __construct($account_num = '',$product_id = 0) {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$account_num."'", $product_id);
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
