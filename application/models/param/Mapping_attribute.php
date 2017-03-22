<?php

/**
 * Mapping_attribute Model
 *
 */
class Mapping_attribute extends Abstract_model {

    public $table           = "p_prod_attr_val_map";
    public $pkey            = "p_prod_attr_val_map_id";
    public $alias           = "pav";

    public $fields          = array(
                                'p_prod_attr_val_map_id'   => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Mapping Attribute'),
                                'product_id'                      => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Product'),
                                'product_attribute_subid'                  => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'ID Product Attribute Sub'),
                                'val_type'                      => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Val Type'),
                                'val_refference'                  => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'Val Refference'),
                                'valid_from'          => array('nullable' => false, 'type' => 'date', 'unique' => false, 'display' => 'Valid From'),
                                'valid_to'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Valid To'),
                                'description'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Description'),

                                'creation_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "pav.* ,p.product_name,pa.attribute_ua_name";
    public $fromClause      = "p_prod_attr_val_map pav
                                    inner join  product p
                                on pav.product_id =p.product_id
                                    inner join productattribute pa
                                on pav.product_attribute_subid = pa.product_attribute_subid
                                and pav.product_id =pa.product_id";

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

/* End of file Mapping_attribute.php */