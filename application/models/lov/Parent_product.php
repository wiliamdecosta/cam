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

    public $selectClause    ="product_id ,
                              product_name,
                              product_label ,       
                              product_desc ,
                              product_family_name ,
                              product_family_id ,
                              parent_product_id,
                              product_seq";

    public $fromClause      = "( select n01 as product_id ,
                                      s01 as product_name,
                                      s02 as product_label ,       
                                      s21 as product_desc ,
                                      s03 as product_family_name ,
                                      n02 as product_family_id ,
                                      n03 as parent_product_id,
                                      n04 as product_seq           
                                  from table(pack_lov.get_acc_parent_product_list(%s, %s,'')) )";

    public $refs            = array();

    function __construct($account_num = '') {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';

        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$account_num."'");
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
