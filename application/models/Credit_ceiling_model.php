<?php

class Credit_ceiling_model extends CORE_Model{

    protected  $table="customers"; //table name
    protected  $pk_id="customer_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_customer_ceiling_report($startDate,$endDate){
        $sql="SELECT n.*,
			c.customer_name,
			c.ceiling_amount, 
			IF(n.inv_total < c.ceiling_amount, 1, 0) as is_below
			FROM 

			(SELECT 
			main.customer_id, 
			count(main.total) inv_count, 
			SUM(main.total) inv_total 
				FROM 
				(SELECT si.customer_id,si.total_after_discount as total
				FROM sales_invoice si 
				WHERE si.is_active = TRUE AND si.is_deleted = FALSE
				AND si.date_invoice BETWEEN '$startDate' AND '$endDate'
				UNION ALL

				SELECT ci.customer_id, ci.total_after_discount as total
				FROM  cash_invoice ci 
				WHERE ci.is_active = TRUE AND ci.is_deleted = FALSE
				AND ci.date_invoice BETWEEN '$startDate' AND '$endDate') as main
			GROUP BY main.customer_id) n

			LEFT JOIN customers c on c.customer_id = n.customer_id";

        return $this->db->query($sql)->result();
    }


    function get_customer_credit_limit($customer_id,$filter_accounts){
        $sql="SELECT (SUM(m.debit) - SUM(m.credit)) as balance
			FROM
			(SELECT 
				ji.journal_id,
			    date_txn,
			    DATE_FORMAT(ji.date_created, '%Y-%m-%d') AS date_created,
			    txn_no,
			    account_title,
			    account_type,
			    memo,
    			remarks,
			    ac.account_type_id,
			    ji.customer_id,
			    customer_name,
			    CONCAT(user_fname,' ',user_mname,' ',user_lname) AS posted_by,
			    ja.dr_amount AS debit,
			    ja.cr_amount AS credit
			FROM
			    journal_accounts AS ja
			        LEFT JOIN
			    journal_info AS ji ON ji.journal_id = ja.journal_id
			        LEFT JOIN
			    account_titles AS at ON at.account_id = ja.account_id
			        LEFT JOIN
			    account_classes AS ac ON ac.account_class_id = at.account_class_id
			        LEFT JOIN
			    account_types AS atypes ON atypes.account_type_id = ac.account_type_id
			        LEFT JOIN
			    user_accounts AS ua ON ua.user_id = ji.created_by_user
			        LEFT JOIN
			    customers AS c ON c.customer_id = ji.customer_id 
			    WHERE ji.is_active=TRUE AND ji.is_deleted=FALSE AND ji.customer_id=$customer_id AND ja.account_id IN ($filter_accounts)
			    
			    ORDER BY date_txn,journal_id ASC) as m";

        return $this->db->query($sql)->result();
    }




}




?>