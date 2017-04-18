<?php

/**
 * Product Model
 *
 */
class Product extends Abstract_model {

    public $table           = "product";
    public $pkey            = "product_id";
    public $alias           = "";

    public $fields          = array(

                            );

    public $selectClause    = "c.p_portofolio_id, c.portofolio_code, b.product_family_name, a.*";
    public $fromClause      = "product a
                            left join productfamily b on a.product_family_id = b.product_family_id
                            left join v_p_portofolio_map c on b.product_family_id = c.product_family_id";

    public $refs            = array();

    function __construct() {
        parent::__construct();
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

/* End of file Product.php */