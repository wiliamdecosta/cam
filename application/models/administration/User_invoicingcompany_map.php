<?php

/**
 * User_invoicingcompany_map Model
 *
 */
class User_invoicingcompany_map extends Abstract_model {

    public $table           = "user_invoicingcompany_map";
    public $pkey            = "user_inv_co_id";
    public $alias           = "inv_co_id";

    public $fields          = array(
                                'user_inv_co_id'        => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID UserInvoicingCompany'),
                                'user_id'               => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'User ID'),
                                'invoicing_co_id'       => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Invoicing ID'),

                                'valid_from'            => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'              => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),
                                'description'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),

                                'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "inv_co_id.user_inv_co_id, inv_co_id.user_id, inv_co_id.invoicing_co_id,
                                to_char(inv_co_id.valid_from,'yyyy-mm-dd') as valid_from,
                                to_char(inv_co_id.valid_to,'yyyy-mm-dd') as valid_to,
                                inv_co_id.description,
                                inv_co_id.creation_date, inv_co_id.created_by,
                                inv_co_id.updated_date, inv_co_id.updated_by,
                                ivc.invoicing_co_name";
    public $fromClause      = "user_invoicingcompany_map inv_co_id
                                left join invoicingcompany ivc on inv_co_id.invoicing_co_id = ivc.invoicing_co_id";

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
            $this->db->set('creation_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];

            $this->record[$this->pkey] = $this->generate_id($this->table, $this->pkey);

            if($this->record['valid_from'] != "") {
                $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            }

            if($this->record['valid_to'] != "") {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);

        }else {
            //do something
            //example:
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception
            if($this->record['valid_from'] != "") {
                $this->db->set('valid_from',"to_date('".$this->record['valid_from']."','yyyy-mm-dd')",false);
            }

            if($this->record['valid_to'] != "") {
                $this->db->set('valid_to',"to_date('".$this->record['valid_to']."','yyyy-mm-dd')",false);
            }

            unset($this->record['valid_from']);
            unset($this->record['valid_to']);

        }
        return true;
    }

}

/* End of file User_invoicingcompany_map.php */