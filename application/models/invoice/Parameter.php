<?php

/**
 * Pembuatan schema Model
 *
 */
class Parameter extends Abstract_model {

    public $table           = "Parameter_invoice";
    public $pkey            = "";
    public $alias           = "a";

    public $fields          = array(


                            );

    public $selectClause    = " distinct name
                               
                              ";
    public $fromClause      = "  Parameter_invoice a
                                 ";


    public $refs            = array();

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('invoice', TRUE);
        $this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
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

    function setSelect(){
    	$this->selectClause = " param_id, name, replace(value,'|',' | ') value";
    }
 	
 	function getIdParam(){
        $sql = "select nvl(max(param_id),0)+1 id from parameter_invoice ";
        $query = $this->db->query($sql);

        $data =  $query->result_array();
        $ret = '';
        foreach ($data as $key => $value) {
          $ret = $value['id'];
        }
        return $ret;
    }

    function saveDataParam($data){
    


      $sql = "INSERT INTO parameter_invoice(PARAM_ID, NAME, TYPE, VALUE, STATUS, VALID_FROM, CREATED_BY, UPDATED_BY, CREATED_DATE, UPDATED_DATE)
              VALUES ('".$data['param_id']."','".$data['name']."','s','".$data['value']."', 1, sysdate,'".$this->session->userdata('user_name')."', '".$this->session->userdata('user_name')."', sysdate, sysdate) ";

      if($data['name'] != ''){
        $query = $this->db->query($sql);
      }

    }

}

/* End of file Users.php */
