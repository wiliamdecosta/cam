<?php

/**
 * Pembuatan schema Model
 *
 */
class Parent_product extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    ="  product_id ,
                                product_name,
                                product_desc ,
                                product_family_name ,
                                product_family_id ,
                                parent_product_id";

    public $fromClause      = "( select n01 as product_id ,
                                      s01 as product_name,
                                      s21 as product_desc ,
                                      s02 as product_family_name ,
                                      n02 as product_family_id ,
                                      n03 as parent_product_id 
                                  from table(pack_lov.get_product_list(%s, '')) )";

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
