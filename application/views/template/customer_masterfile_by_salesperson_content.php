<head>  <title>Customer Masterfile by Salesperson</title></head>
<body> <style type="text/css">
           body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
        }
            table{
        border:none!important;
    }
    table-td.left{
        border-left: 1px solid gray!important;
    }
    table-td.right{
        border-left: 1px solid gray!important;
    }
    #tbl_supplier thead tr th {
        border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;
    }
</style>
<div>
    <table width="100%" cellspacing="5" cellspacing="0">
        <tr>
            <td width="10%"  class="bottom"><img src="<?php echo base_url($company_info->logo_path); ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%"  class="bottom" >
                <h1 class="report-header" style="margin-bottom: 0"><strong><?php echo $company_info->company_name; ?></strong></h1>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span><br>
                <span><?php echo $company_info->email_address; ?></span><br>

            </td>
        </tr>
    </table>
   <center> <h2>CUSTOMER MASTERFILE BY SALESPERSON</h2></center>

  <?php foreach ($salesperson as $sales) { ?>
 
    <h2><?php echo $sales->salesperson ?></h2>
        <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11" id="tbl_supplier">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Contact Person</th>
                <th>Contact No</th>
                <th width="20%">Address</th>
                <th>Email Address</th>
                <th>TIN</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($customers as $customer) { 
                if($customer->salesperson_id == $sales->salesperson_id){
             ?>
            <tr>
                <td><?php echo $customer->customer_name ?></td>
                <td><?php echo $customer->contact_name ?></td>
                <td><?php echo $customer->contact_no ?></td>
                <td><?php echo $customer->address ?></td>
                <td><?php echo $customer->email_address ?></td>
                <td><?php echo $customer->tin_no ?></td>
            </tr>
            <?php } } ?>

            </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table><br />
        <p style="page-break-before: always">
 <?php  } ?>  
        <br />
    </center>
</div>
<script type="text/javascript">
    window.print();
</script>













