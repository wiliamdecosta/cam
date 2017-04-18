<?php

/**
 * Portofolio_map Model
 *
 */
class Portofolio_map extends Abstract_model {

    public $table           = "v_p_portofolio_map";
    public $pkey            = "product_family_id";
    public $alias           = "";

    public $fields          = array(

                            );

    public $selectClause    = "a.*, b.product_family_name";
    public $fromClause      = "V_P_PORTOFOLIO_MAP a
                               left join productfamily b on a.product_family_id = b.product_family_id";

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

/* End of file Business_area_type.php */