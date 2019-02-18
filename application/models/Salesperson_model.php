<?php
	class Salesperson_model extends CORE_Model {
	    protected  $table="salesperson";
	    protected  $pk_id="salesperson_id";

	    function __construct() {
	        parent::__construct();
	    }


	    function generate_salesperson_commission($start,$end){
	        $sql="SELECT n.*,
				CONCAT(s.firstname, ' ', s.lastname) as salesperson_fullname,
				s.salesperson_code
				FROM 
				(SELECT 
				main.salesperson_id, 
				count(main.total) inv_count, 
				SUM(main.total) inv_total

				FROM
				(SELECT si.salesperson_id,si.total_after_discount as total
				FROM sales_invoice si 
				WHERE si.is_active = TRUE AND si.is_deleted = FALSE
				AND DATE(si.date_invoice) BETWEEN '$start' AND '$end'
				UNION ALL

				SELECT ci.salesperson_id, ci.total_after_discount as total
				FROM  cash_invoice ci 
				WHERE ci.is_active = TRUE AND ci.is_deleted = FALSE
				AND DATE(ci.date_invoice) BETWEEN '$start' AND '$end') as main
				 

				GROUP BY main.salesperson_id) n

				LEFT JOIN salesperson s ON s.salesperson_id = n.salesperson_id";

	        return $this->db->query($sql)->result();


	    }

	}
?>