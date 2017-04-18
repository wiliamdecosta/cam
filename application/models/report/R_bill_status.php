<?php

/**
 * Pembuatan schema Model
 *
 */
class R_bill_status extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = " ba,
                               period,
                               billed_count,
                               not_billed_count ";
    public $fromClause      = "( select s01 as ba,
                                        s02 as period,
                                         n02 as billed_count,
                                         n03 as not_billed_count
                                  from table(pack_bill_qa.get_billinfo_l1(%s, %s))
                            ) ";

    public $refs            = array();

    function __construct($periode = "") {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$periode."'"); 

        /*$this->db_crm = $this->load->database('corecrm', TRUE);
        $this->db_crm->_escape_char = ' ';*/
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
