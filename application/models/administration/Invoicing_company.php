<?php

/**
 * Invoicing_company Model
 *
 */
class Invoicing_company extends Abstract_model {

    public $table           = "invoicingcompany";
    public $pkey            = "invoicing_co_id";
    public $alias           = "";

    public $fields          = array(

                            );

    public $selectClause    = "n01 as invoicing_co_id,
                                s21 as invoicing_co_name ,
                                s01 as reg_addr_1 ,
                                s02 as reg_addr_2 ,
                                s03 as reg_addr_3 ,
                                s04 as reg_addr_4 ,
                                s05 as reg_addr_5 ,
                                s06 as reg_addr_6";
    public $fromClause      = "table(pack_lov.get_invoicingcompany_list('%s', ''))";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        $ci =& get_instance();
        $this->fromClause = sprintf($this->fromClause, $ci->session->userdata('user_name'));
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :

        }else {
            //do something
            //example:

        }
        return true;
    }

}

/* End of file User_invoicingcompany_map.php */