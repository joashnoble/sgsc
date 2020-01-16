<?php

class Sales_order_report_model extends CORE_Model{

    protected  $table="sales_order"; //table name
    protected  $pk_id="sales_order_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_orders_detailed_customers($start,$end){
        $sql=" SELECT 
                so.so_no,
                so.date_order,
                so.customer_id,
                c.customer_name,
                p.product_code,
				p.product_desc,
                IFNULL(so.salesperson_id,0)  as salesperson_id,
                soi.product_id,
                soi.so_qty,
                soi.so_price,
                soi.so_line_total_price - ((so.total_overall_discount/100) * soi.so_line_total_price) as total
                
				FROM sales_order_items soi
				
				LEFT JOIN  sales_order so ON so.sales_order_id = soi.sales_order_id            
				LEFT JOIN customers AS c ON c.customer_id = so.customer_id
				LEFT JOIN products AS p ON p.product_id=soi.product_id

				WHERE 
				so.is_active = TRUE AND so.is_deleted = FALSE AND
				so.date_order BETWEEN '$start' AND '$end'";

        return $this->db->query($sql)->result();
    }


    function get_orders_summary_customers($start,$end){
        $sql="SELECT 
				main.customer_id,
				c.customer_name,
				SUM(main.total_after_discount) as customer_total

				FROM (SELECT so.customer_id,
					so.total_after_discount
					FROM sales_order so
				    
				    WHERE 
				    so.is_active = TRUE AND so.is_deleted = FALSE AND so.date_order BETWEEN '$start' AND '$end') as main
				    
				LEFT JOIN customers c ON c.customer_id = main.customer_id
				GROUP BY c.customer_id
				ORDER BY c.customer_name ASC";

        return $this->db->query($sql)->result();
    }

    function get_orders_list_customers($start,$end){
        $sql="SELECT 
        		DISTINCT
				main.customer_id,
				c.customer_name,
				SUM(main.total_after_discount) as customer_total

				FROM (SELECT so.customer_id,
					so.total_after_discount
					FROM sales_order so
				    
				    WHERE 
				    so.is_active = TRUE AND so.is_deleted = FALSE AND so.date_order BETWEEN '$start' AND '$end') as main
				    
				LEFT JOIN customers c ON c.customer_id = main.customer_id

				GROUP BY c.customer_id

				ORDER BY c.customer_name ASC";

        return $this->db->query($sql)->result();
    }


}




?>