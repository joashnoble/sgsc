<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<style type="text/css">
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

		hr {
			/*border-top: 3px solid #404040;*/
		}

		tr {
            border: none!important;
        }
/*
        tr:nth-child(even){
            background: #414141 !important;
            border: none!important;
            color: white !important;
        }

        tr:nth-child(odd){
            background: #414141 !important;
            border: none!important;
            color: white !important;
        }*/

/*        tr:hover {
            transition: .4s;
            background: #414141 !important;
            color: white;
        }

        tr:hover .btn {
            border-color: #494949!important;
            border-radius: 0!important;
            -webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
        }
*/
    table{
        border:none!important;
    }
	</style>
</head>
<body>
    <?php include 'sgsc_header.php'; ?>


    <div class="row" style="margin-top: 20px;">
        <table width="100%" class="" cellpadding="3" cellspacing="0">
            <tr>
                <td width="35%"><strong style="font-size: 11pt;">PURCHASE ORDER</strong></td>
                <td width="30%"></td>
                <td width="7%" style="font-size: 10pt;"><strong>NO :</strong> </td>
                <td width="28%" align="right" style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;">
                    <center><strong><?php echo $purchase_info->po_no; ?></strong></center>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
        </table>
        
        <table width="100%" class="" cellpadding="4" cellspacing="0" style="font-size: 8pt;">
            <tr>
                <td width="15%">Supplier / Address: </td>
                <td width="40%" style="border-bottom: 1px solid black;font-size: 10pt;padding-bottom: 0px!important;"><strong><?php echo $purchase_info->supplier_name; ?></strong></td>
                <td width="10%"></td>

                <td width="7%">Date: </td>
                <td width="1%"></td>
                <td width="27%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo date_format(new DateTime($purchase_info->date_created),"m/d/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Deliver to :</td>
                <td width="40%" style="border-bottom: 1px solid black;font-size: 10pt;padding-bottom: 0px!important;"><?php echo $purchase_info->deliver_to_address; ?></td>
                <td width="10%"></td>
                <td width="7%">Terms:</td>
                <td width="1%"></td>
                <td width="27%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo $purchase_info->terms; ?></td>
            </tr>
            <tr>
                <td width="15%"></td>
                <td width="40%"></td>
                <td width="10%"></td>
                <td width="7%" style="padding-left: 6px;">Ref #:</td>
                <td width="1%"></td>
                <td width="27%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"></td>
            </tr>                        
        </table>       
    </div>

	<br><br>
	<table width="100%" cellpadding="10" cellspacing="-1" class="table table-striped" style="text-align: center;">
		<tr>
			<td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;border-left: 1px solid gray;" align="left"><strong>Description</strong></td>
			<td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;"><strong>UM</strong></td>
			<td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;" align="right"><strong>Qty</strong></td>
			<td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;" align="right"><strong>Unit Price</strong></td>
            <td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;" align="right"><strong>Discount (%)</strong></td>
			<td style="padding: 6px;border-bottom: 1px solid gray;border-top: 1px solid gray;border-right: 1px solid gray;" align="right"><strong>Amount</strong></td>
		</tr>
		<?php foreach($po_items as $item){ ?>
            <tr>
                <td width="50%" style="border-bottom: 1px solid gray;text-align: left;height: 10px;padding: 6px;border-left: 1px solid gray;"><?php echo $item->product_desc; ?></td>
                <td width="10%" style="border-bottom: 1px solid gray;text-align: center;height: 10px;padding: 6px;"><?php echo $item->unit_name; ?></td>
                <td width="15%" style="border-bottom: 1px solid gray;text-align: right;height: 10px;padding: 6px;"><?php echo number_format($item->po_qty,2); ?></td>
                <td width="15%" style="border-bottom: 1px solid gray;text-align: right;height: 10px;padding: 6px;"><?php echo number_format($item->po_price,2); ?></td>
                <td width="15%" style="border-bottom: 1px solid gray;text-align: right;height: 10px;padding: 6px;"><?php echo number_format($item->po_discount,2); ?></td>
                <td width="10%" style="border-bottom: 1px solid gray;text-align: right;height: 10px;padding: 6px;border-right: 1px solid gray;"><?php echo number_format($item->po_line_total_after_global,2); ?></td>
            </tr>
        <?php } ?>

        <tr>
            <td colspan="6" style="text-align: left;height: 30px;padding: 6px;border-left: 1px solid gray;border-right: 1px solid gray;"><b>Remarks:</b></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;height: 30px;padding: 6px;border-left: 1px solid gray;border-bottom: 1px solid gray;border-right: 1px solid gray;"><?php echo $purchase_info->remarks; ?></td>
        </tr>
        <tr>
        	<td align="left" colspan="2" style="border-left: 1px solid gray;border-bottom: 1px solid gray;"><b>Prepared By:</b></td>
        	<td colspan="3" style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;border-bottom: 1px solid gray;" align="left">Global Discount %:</td>
        	<td style="padding: 10px;border-bottom: 1px solid gray;height: 30px; border-right: 1px solid gray;border-bottom: 1px solid gray;" align="right"><?php echo number_format($purchase_info->total_overall_discount,2); ?></td>
        </tr>
        <tr>
            <td align="left" colspan="2"  style="border-left: 1px solid gray;border-bottom: 1px solid gray;"><b>Confirmed By:</b></td>
            <td  colspan="3"  style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;border-bottom: 1px solid gray;" align="left">Total Discount :</td>
            <td style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-right: 1px solid gray;border-bottom: 1px solid gray;" align="right"><?php echo number_format($purchase_info->total_overall_discount_amount +$purchase_info->total_discount ,2); ?></td>
        </tr>
        <tr>
            <td  align="left" colspan="2"  style="border-bottom: 1px solid gray;border-left: 1px solid gray;"><b>Check By:</b></td>
            <td colspan="3" style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;" align="left">Total Before Tax:</td>
            <td style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-right: 1px solid gray;" align="right"><?php echo number_format($purchase_info->total_before_tax,2); ?></td>
        </tr>
        <tr>
        	<td align="left" colspan="2" style="border-left: 1px solid gray;border-bottom: 1px solid gray;"><b>Certified By:</b></td>
        	<td colspan="3" style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;border-bottom: 1px solid gray;" align="left">Total Tax Amount:</td>
        	<td style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-right: 1px solid gray;border-bottom: 1px solid gray;" align="right"><?php echo number_format($purchase_info->total_tax_amount,2); ?></td>
        </tr>
        <tr>
        	<td align="left" colspan="2" style="border-left: 1px solid gray;border-bottom: 1px solid gray;" ><b>Approved By:</b></td>
        	<td colspan="3" style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;border-bottom: 1px solid gray;" align="left">Total After Tax:</td>
        	<td style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-right: 1px solid gray;border-bottom: 1px solid gray;" align="right"><?php echo number_format($purchase_info->total_after_tax,2); ?></td>
        </tr>

        <tr>
            <td align="left" colspan="2"  style="border-bottom: 1px solid gray;border-left: 1px solid gray;">Date</td>
            <td  colspan="3"  style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-left: 1px solid gray;" align="left"><strong>Total:</strong></td>
            <td style="padding: 10px;border-bottom: 1px solid gray;height: 30px;border-right: 1px solid gray;" align="right"><strong><?php echo number_format($purchase_info->total_after_discount,2); ?></strong></td>
        </tr>
	</table>

</body>
</html>
