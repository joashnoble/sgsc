<head>
    <title>Sales Invoice</title>
    </head>
    <body><style type="text/css" media="print">
  @page { size: portrait; }
</style>

<style>
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

        .data {
      /*      border-bottom: 1px solid #404040;*/
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
        }

        hr {
     /*       border-top: 3px solid #404040;*/
        }
.left {border-left: 1px solid black;}
.right{border-right: 1px solid black;}
.bottom{border-bottom: 1px solid black;}
.top{border-top: 1px solid black;}

.fifteen{ width: 15%; }
.text-center{text-align: center;}
.text-right{text-align: right;}
</style>

<div style="padding-left: 20px;padding-right: 20px;">
    <br>
    <table width="100%" class="" cellpadding="3" cellspacing="0" style="border:0px!important;">
        <tr>
            <td width="35%"><strong style="font-size: 10pt;">SALES INVOICE</strong></td>
            <td width="30%"></td>
            <td width="7%" style="font-size: 10pt;"><strong>NO :</strong> </td>
            <td width="28%" align="right" style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;">
                <center><strong><?php echo $sales_info->so_no; ?></strong></center>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </table>
    <table width="100%" class="" cellpadding="4" cellspacing="0" style="font-size: 9pt;border:0px!important;">
        <tr>
            <td width="16%">CUSTOMER: </td>
            <td width="29%" style="border-bottom: 1px solid black;font-size: 9pt;padding-bottom: 0px!important;"><strong><?php echo $sales_info->customer_name; ?></strong></td>
            <td width="14%"></td>

            <td width="11%">DATE: </td>
            <td width="20%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><center><?php echo date_format(new DateTime($sales_info->date_invoice),"m/d/Y"); ?></center></td>
        </tr>
        <tr>
            <td width="15%">CONTACT PERSON: </td>
            <td width="30%" style="border-bottom: 1px solid black;font-size: 9pt;padding-bottom: 0px!important;"><?php echo $sales_info->contact_person; ?></td>
            <td width="14%"></td>

            <td width="11%">DUE DATE:</td>
            <td width="20%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><center><?php echo  date_format(new DateTime($sales_info->date_due),"m/d/Y"); ?></center></td>
        </tr>
        <tr>
            <td width="18%">INVOICE NO: </td>
            <td width="17%" style="border-bottom: 1px solid black;font-size: 9pt;padding-bottom: 0px!important;"><?php echo $sales_info->sales_inv_no; ?></td>
            <td width="30%"></td>
            <td width="13%" style="padding-left: 5px;">DEPARTMENT:</td>
            <td width="22%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo $sales_info->department_name; ?></td>
        </tr>                
    </table>
    </div>
    <br>
    <div style="padding-left: 20px;padding-right: 20px;">
    <center>
        <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11">
            <thead>
            <tr>
                <th width="50%" class="bottom top left " style="text-align: left;height: 30px;padding: 6px;">Item</th>
                <th width="12%" class="bottom top left" style="text-align: center;height: 30px;padding: 6px;">Qty</th>
                <th width="12%" class="bottom top left" style="text-align: center;height: 30px;padding: 6px;">UM</th>
                <th width="12%" class="bottom top left" style="text-align: right;height: 30px;padding: 6px;">Price</th>
                <th width="12%" class="bottom top left" style="text-align: right;height: 30px;padding: 6px;">Gross</th>
                <th width="12%" class="bottom top left right" style="text-align: right;height: 30px;padding: 6px;">Net Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($sales_invoice_items as $item){ ?>
                <tr>
                    <td width="50%" class="left" style="text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="12%" class="left" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->inv_qty,2); ?></td>
                    <td width="12%" class="left" style="text-align: center;height: 30px;padding: 6px;"><?php echo $item->unit_name; ?></td>
                    <td width="12%" class="left" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->inv_price,2); ?></td>
                    <td width="12%" class="left" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->inv_gross,2); ?></td>
                    <td width="12%" class="left right" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->inv_line_total_price,2); ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>

            <tr>
                <td colspan="3" class="left top" style="text-align: left;font-weight: bolder; ;height: 30px;padding: 10px;"><b>Remarks<b></td>
                <td colspan="2" class="left top bottom" style="text-align: left;height: 30px;padding: 10px;">Discount 1 : </td>
                <td class="top bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->total_discount,2); ?></td>
            </tr>
            <tr>
                <td colspan="3"  class="left bottom" style="text-align: left;height: 30px;padding: 10px;"><?php echo $sales_info->remarks; ?></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;">Total before Tax : </td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->total_before_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="left bottom" style="height: 30px;padding: 10px;"><b>Prepared by:</b></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;">Tax Amount : </td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->total_tax_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="left bottom" style="height: 30px;padding: 10px;"><b>Confirmed by:</b></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;">Total after Tax : </td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->total_after_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="left bottom" style="height: 30px;padding: 10px;"><b>Check by:</b></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;">Discount 2:</td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->total_overall_discount_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="left bottom" style="height: 30px;padding: 10px;"><b>Certified by:</b></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;">Down Payment:</td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><?php echo number_format($sales_info->down_payment,2); ?></td>
            </tr>
            <tr>
                <td class="left bottom bottom" style="height: 30px;padding: 10px;"><b>Approved By:</b></td>
                <td colspan="2" class="left bottom bottom" style="height: 30px;padding: 10px;"><b>Date:</b></td>
                <td colspan="2" class="left bottom" style="text-align: left;height: 30px;padding: 10px;"><strong>Total:</strong></td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"><strong><?php echo number_format($sales_info->total_after_discount,2); ?></strong></td>
            </tr>
            <tr>
                <td class="left bottom bottom" style="height: 30px;padding: 10px;"><b>Received by:</b></td>
                <td colspan="2" class="left bottom bottom" style="height: 30px;padding: 10px;"><b>Date:</b></td>
                <td colspan="2" class="bottom" style="text-align: left;height: 30px;padding: 10px;"></td>
                <td class="bottom right" style="text-align: right;height: 30px;padding: 10px;"></td>
            </tr>              
            </tfoot>
        </table><br /><br />
    </center>        
    </div>
</div>





















