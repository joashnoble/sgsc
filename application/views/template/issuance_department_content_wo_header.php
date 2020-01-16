<head>  <title>Issuance Report</title></head>
<body>
<style>
    #issuance tr {
        background: transparent !important;
    }
    .report{

    border-bottom: 1px solid gray;

    border-right: none;
    border-left:none;
    border-top:none;
    }
    th{
        background-color: transparent!important;
    }
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
    .bottom{
        border-bottom: 1px solid black!important;
        padding-bottom: 0px!important;
        margin-bottom: 0px!important;
    }
    .tbl_items td{
        border: 1px solid black!important;
    }
     
    </style>

    <div class="row" style="margin: 0px 10px 5px 10px!important;padding: 0px 10px 5px 10px!important;">
        <div class="row">
            <table width="100%" class="tbl" cellpadding="5" style="font-size: 9pt;">
                <tr>
                    <td style="font-weight: 900;font-size: 13pt;" width="60%">WAREHOUSE PULL OUT FORM</td>
                    <td style="font-weight: 600;font-size: 13pt;" width="15%">NO:</td>
                    <td style="font-weight: 600;font-size: 13pt;" width="25%"><?php echo $issuance_info->po_no; ?></td>
                </tr>
            </table>
            <table width="100%" class="tbl" cellpadding="5" style="font-size: 9pt;margin-top: 20px;">
                 <tr>
                    <td width="15%">CUSTOMER: </td>
                    <td width="25%" class="bottom"><?php echo $issuance_info->customer_name; ?></td>
                    <td width="20%"></td>
                    <td width="15%">DATE:</td>
                    <td width="25%" class="bottom"><?php echo  date_format(new DateTime($issuance_info->date_issued),"m/d/Y"); ?></td>
                </tr>
                <tr>
                    <td>FROM DEPARTMENT:</td>
                    <td class="bottom"><?php echo $issuance_info->from_department_name; ?></td>
                    <td></td>
                    <td>TERMS:</td>
                    <td class="bottom"><?php echo $issuance_info->terms; ?></td>
                </tr>
                <tr>
                    <td>TO DEPARTMENT:</td>
                    <td class="bottom"><?php echo $issuance_info->to_department_name; ?></td>
                    <td></td>
                    <td>TRN NO: </td>
                    <td class="bottom"><?php echo $issuance_info->trn_no; ?></td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table width="100%" class="tbl tbl_items" cellpadding="5" style="font-size: 9pt;">
                <tr>
                    <td><b>DESCRIPTION</b></td>
                    <td align="right"><b>QUANTITY</b></td>
                    <td><b>UNIT</b></td>
                    <td align="right"><b>PRICE</b></td>
                    <td align="right"><b>AMOUNT</b></td>
                </tr>
                <?php 
                    $grandtotal=0;
                    foreach($issue_items as $item){
                    $grandtotal+=$item->issue_line_total_price;
                 ?>                
                    <tr>
                        <td><?php echo $item->product_desc; ?></td>
                        <td align="right"><?php echo number_format($item->issue_qty,2); ?></td>
                        <td><?php echo $item->unit_name; ?></td>
                        <td align="right"><?php echo number_format($item->issue_price,2); ?></td>
                        <td align="right"><?php echo number_format($item->issue_line_total_price,2); ?></td>
                    </tr>
                 <?php }?>
            </table>
        </div>
    </div>   








