<?php

/**
 * Product_family Model
 *
 */
class Product_family extends Abstract_model {

    public $table           = "productfamily";
    public $pkey            = "product_family_id";
    public $alias           = "";

    public $fields          = array(

                            );

    public $selectClause    = "n01 as product_family_id ,
                                        s01 as product_family_name";
    public $fromClause      = "table(pack_lov.get_product_fmly_list('%s', ''))";

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

/* End of file Product_family.php */