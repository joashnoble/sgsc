<?php

class Product_type_model extends CORE_Model {
    protected  $table="product_type";
    protected  $pk_id="product_type_id";

    function __construct() {
        parent::__construct();
    }

    function get_product_type_list($product_type_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  product_type as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($product_type_id==null?"":" AND a.product_type_id=$product_type_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>