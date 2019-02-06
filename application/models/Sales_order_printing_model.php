<?php

class Sales_order_printing_model extends CORE_Model
{
    protected  $table = "sales_order_printing"; //table name
    protected  $pk_id = "sales_order_printing_id"; //primary key id
    protected  $fk_id = "sales_order_id"; //Foreign Key id 

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
}

?>