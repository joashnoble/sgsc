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
        border-collapse: collapse!important;
    }
    .top{
        border-top: 1px solid black!important;
        padding-top: 0px!important;
        margin-top: 0px!important;
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


    <div>

        <?php include 'sgsc_header.php'; ?>

        <div class="row" style="margin-top: 20px;">
            <table width="100%" class="tbl" cellpadding="5" cellspacing="0" style="font-size: 9pt;">
                <tr>
                    <td style="font-size: 13pt;" width="60%"><b>WAREHOUSE PULL OUT FORM</b></td>
                    <td style="font-size: 10pt;" width="15%"><b>NO:</b></td>
                    <td style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;" width="25%"><center><b><?php echo $issuance_info->po_no; ?></b></center></td>
                </tr>
            </table>
            <table width="100%" class="tbl" cellpadding="5" cellspacing="0" style="font-size: 8pt;margin-top: 20px;">
                 <tr>
                    <td width="20%">CUSTOMER: </td>
                    <td width="20%" class="bottom"><?php echo $issuance_info->customer_name; ?></td>
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
            <table width="100%" class="tbl tbl_items" cellpadding="5" cellspacing="0" style="font-size: 9pt;">
                <tr>
                    <td width="55%"><b>DESCRIPTION</b></td>
                    <td width="15%" align="right"><b>QUANTITY</b></td>
                    <td width="10%"><b>UNIT</b></td>
                    <td width="15%" align="right"><b>PRICE</b></td>
                    <td width="15%" align="right"><b>AMOUNT</b></td>
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
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right">Total</td>
                        <td align="right"><?php echo number_format($grandtotal,2); ?></td>
                    </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table width="100%" class="tbl" cellpadding="5" cellspacing="0" style="font-size: 8pt;">
                <tr>
                    <td width="25%" class="bottom"></td>
                    <td width="25%"></td>
                    <td width="25%">PULL OUT GOODS FOR: </td>
                    <td width="25%" class="bottom"></td>
                </tr>
                <tr>
                    <td><center><i>Prepared by:</i></center></td>
                    <td></td>
                    <td>RECEIVED BY:</td>
                    <td class="bottom"></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                </tr>                   
                <tr>
                    <td width="25%" class="bottom" style="padding-top: 20px;"></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td><center><i>Confirmed by:</i></center></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td colspan="4"></td>
                </tr>                   
                <tr>
                    <td width="25%" class="bottom" style="padding-top: 20px;"></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td><center><i>Check by:</i></center></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td colspan="4"></td>
                </tr>                   
                <tr>
                    <td width="25%" class="bottom" style="padding-top: 20px;"></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td><center><i>Certified by:</i></center></td>
                    <td colspan="3"></td>
                </tr>  
                <tr>
                    <td colspan="4"></td>
                </tr>                   
                <tr>
                    <td width="25%" class="bottom" style="padding-top: 20px;"></td>
                    <td colspan="3"></td>
                </tr>   
                <tr>
                    <td><center><i>Approved by:</i></center></td>
                    <td colspan="3"></td>
                </tr>                                                                                
            </table>
        </div>
    </div>   








