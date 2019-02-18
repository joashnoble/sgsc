<?php
	class Salesperson_comm_items_model extends CORE_Model {
	    protected  $table="salesperson_comm_items";
	    protected  $pk_id="salesperson_comm_item_id";
	    protected  $fk_id="salesperson_comm_info_id";

	    function __construct() {
	        parent::__construct();
	    }

	}
?>