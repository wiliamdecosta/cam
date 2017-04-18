<?php

/**
 * Portofolio Model
 *
 */
class Portofolio_product extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "prd";
	//public $where 			= getVarClean('product_family_id','int',0);

    public $fields          = array();
                               /* 'product_id'      				 => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Product'),
                                'product_name'      			 => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'Product Name'),
                                'product_desc'          		 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Product Description'),

                                'sales_start_dat'        		 => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Start Date'),
                                'sales_end_dat'         		 => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'End Date'),
                                'product_family_id'         	 => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Product Fam Id'),
                                'parent_product_id'         	 => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Parent Product Id'),
                                'product_unit_singular_name'	 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Simgular Name'),
                                'product_unit_plural_name' 		 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Plural Name'),
                                'parametric_boo' 				 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Parametric Boo'),
                                'product_event_source_caption' 	 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Product Event'),
                                'event_source_breakout_object' 	 => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Event Source'),
                                'provisioning_system_id' 	 	 => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Provisioning System ID'),
                                'ust_product_class_id' 	 		 => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'Ust Product Class  ID'),
                                'on_net_match_type' 	 		 => array('nullable' => true, 'type' => 'int', 'unique' => false, 'display' => 'On Net Match Type'),

                            );*/

    public $selectClause    = "prd.*";
    public $fromClause      = "product prd ";

    public $refs            = array();

    function __construct() {
        parent::__construct();
	//	 $this->fromClause = sprintf($this->fromClause, "'".$product_family_id."'");
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

        }else {
            //do something
            //example:
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file Portofolio.php */