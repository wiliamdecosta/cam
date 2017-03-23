<?php

/**
 * Product_portofolio_map Model
 *
 */
class Product_portofolio_map extends Abstract_model {

    public $table           = "p_product_portofolio_map";
    public $pkey            = "p_product_portofol_map_id";
    public $alias           = "product_portofol";

    public $fields          = array(
                                'p_product_portofol_map_id'     => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID UserInvoicingCompany'),
                                'p_portofolio_id'               => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'User ID'),
                                'product_family_id'             => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'Invoicing ID'),

                                'valid_from'            => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'              => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),
                                'description'           => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),

                                'creation_date'         => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "product_portofol.p_product_portofol_map_id, product_portofol.p_portofolio_id, product_portofol.product_family_id,
                                to_char(product_portofol.valid_from,'yyyy-mm-dd') as valid_from,
                                to_char(product_portofol.valid_to,'yyyy-mm-dd') as valid_to,
                                product_portofol.description,
                                product_portofol.creation_date, product_portofol.created_by,
                                product_portofol.updated_date, product_portofol.updated_by,
                                prodfam.product_family_name";
    public $fromClause      = "p_product_portofolio_map product_portofol
                                left join productfamily prodfam on product_portofol.product_family_id = prodfam.product_family_id";

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