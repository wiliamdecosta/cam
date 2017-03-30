<?php

/**
 * Pembuatan schema Model
 *
 */
class Generate_sap_unbill extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array(


                            );

    public $selectClause    = "    batch_control_id,
                                   process_period,
                                   bill_period,
                                   batch_type,
                                   process_status,
                                   process_start_time,
                                   process_end_time,
                                   creation_date,
                                   created_by,
                                   description,
                                   input_rec,
                                   valid_rec,
                                   invalid_rec,
                                   p_batch_type_id";
    public $fromClause      = "  v_batch_control where p_batch_type_id = 1
                                 ";


    public $refs            = array();

    function __construct() {
        parent::__construct();
        //$this->db = $this->load->database('invoice', TRUE);
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

    //simpan dimodel

    function generateSapUnbill($i_nper, $i_desc){
          $i_user_name = getUserName();
          $dt = array();
          $sql = "BEGIN "
                        . " PACK_INTERFACE_SAP.GENERATE_SAP_UNBILL ("
                        . " :i_user_name, "
                        . " :i_nper, "
                        . " :i_desc, "
                        . " :o_result_code, "
                        . " :o_result_msg "
                        . "); END;";

               
          $stmt = oci_parse($this->db->conn_id, $sql);

          //  Bind the input parameter
          oci_bind_by_name($stmt, ':i_user_name', $i_user_name);
          oci_bind_by_name($stmt, ':i_nper', $i_nper);
          oci_bind_by_name($stmt, ':i_desc', $i_desc);            

          // Bind the output parameter
          oci_bind_by_name($stmt, ':o_result_code', $o_result_code, 2000000);
          oci_bind_by_name($stmt, ':o_result_msg', $o_result_msg, 2000000);

          ociexecute($stmt);

          $dt = array('code' => $o_result_code, 'msg' => $o_result_msg);
          // $dt = array('code' => '001', 'msg' => 'SUKSES');
          return $dt;
        }

}

/* End of file Users.php */
