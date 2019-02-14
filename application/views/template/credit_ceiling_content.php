<!DOCTYPE html>
<html>
<head>
	<title>Voucher Registry Report</title>
	<style>
		body {
			font-family: 'Segoe UI',sans-serif;
			font-size: 12px;
		}
	
		th { border-bottom:   1px solid black;

        }
        td{
            padding:0px 3px 0px 3px;
            border-bottom: none;
        }
        p {
            display: inline-block;
        }

		.report-header {
			font-size: 22px;
		}
        @page {
            size: portrait;
        }
        @media print {
              @page { margin: 0; }
              body { margin: 1.0cm; }
        }

	</style>
            <script>
        (function(){
            window.print();
        })();
    </script>

</head>
<body>
    <table  cellspacing="0" cellpadding="0">
        <tr>
            <td width="10%"><img src="<?php echo base_url($company_info->logo_path); ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%">
                <span class="report-header"><strong><?php echo $company_info->company_name; ?></strong></span><br>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span>
            </td>
        </tr>
    </table><hr>
    <div>
        <h3><strong><center>Credit Ceiling Report</center></strong></h3>
    </div>


    <table width="100%" style=" border: 1px solid black;" cellspacing="0">
            <p>   <strong>Period Covered:</strong>   <?php echo date("m-d-Y",strtotime($start)); ?>  to <?php echo date("m-d-Y",strtotime($end)); ?> </p>
       <p  style="float: right;"> <strong>Run Date:</strong> <?php echo date("m-d-Y");?> </p>
    <thead style=" border: 1px solid black;">
        <tr >
            <th width="25%" style="text-align: left;">Customer Name</th>
            <th width="10%" style="text-align: left;">Invoice Count</th>
            <th width="15%" style="text-align: right;">Ceiling Amount<br>(Monthly)</th>
            <th width="15%" style="text-align: right;">Invoice Amount</th>
            <th width="5%" style="text-align: right;"><center>Above Ceiling</center></th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($customers as $customer) { ?>
        <tr>
            <td><?php echo $customer->customer_name; ?></td>
            <td><?php  echo $customer->inv_count; ?></td>
            <td style="text-align: right;"><?php echo number_format($customer->ceiling_amount,2); ?></td>
            <td style="text-align: right;"><b><?php echo number_format($customer->inv_total,2); ?></b></td>
            <td style="text-align: right;"><b><?php if($customer->is_below == 1){ echo 'NO'; } else { echo 'YES'; } ?></b></td>
        </tr>
        <?php } ?>

    </tbody>
    <tfoot>



    </tfoot>

    </table>
    			



  



</body>
</html>