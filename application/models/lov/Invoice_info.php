<?php

/**
 * Pembuatan schema Model
 *
 */
class Invoice_info extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = "*";

    public $fromClause      = "cc_invoice_info";

    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('invoice', TRUE);
        $this->db->_escape_char = ' ';

        // $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
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