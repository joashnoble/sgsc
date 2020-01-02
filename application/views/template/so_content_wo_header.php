     <head>  <title>Sales Order </title></head>
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
        .tbl_so_info{
            font-family: tahoma;font-size: 9pt;
        }
        .tbl_so_info td{
            border: 1px solid lightgray;
        }
        #tbl_printing_info td{
            border: 1px solid gray;
        }
        .border-top{
            border-top: 20px solid black!important;
        }
        .border-bottom{
            border-bottom: 20px solid black!important;
        }
</style>

<div style="margin: 10px 20px 10px 20px!important;padding: 10px 20px 10px 20px!important;">
        
    <div class="row">
        <table width="100%" class="" cellpadding="5">
            <tr>
                <td width="35%"><strong style="font-size: 10pt;">SALES ORDER</strong></td>
                <td width="35%"></td>
                <td width="7%" style="font-size: 10pt;"><strong>NO :</strong> </td>
                <td width="23%" align="right" style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;">
                    <center><strong><?php echo $sales_order->so_no; ?></strong></center>
                </td>
            </tr>
        </table>
        <table width="100%" class="" cellpadding="5">
            <tr>
                <td width="10%">SOLD TO: </td>
                <td width="50%" style="border-bottom: 1px solid black;font-size: 10pt;padding-bottom: 0px!important;"><strong><?php echo $sales_order->customer_name; ?></strong></td>
                <td width="5%"></td>
                <td width="7%">DATE: </td>

                <td width="10%"></td>
                <td width="13%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo date_format(new DateTime($sales_order->date_order),"m/d/Y"); ?></td>
            </tr>
        </table>
        <table  width="100%" class="" cellpadding="5">
            <tr>
                <td width="18%">Contact Person/Cell #</td>
                <td width="42%"><?php echo $sales_order->contact_no; ?></td>
                <td width="5%"></td>
                <td width="7%">TERMS:</td>
                <td width="10%"></td>
                <td width="13%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo $sales_order->terms; ?></td>
            </tr>
        </table>
    </div>

    <div class="row" style="margin-top: 15px;">

        <table width="100%" cellpadding="5">
            <tr>
                <td width="35%" align="right" style="font-size: 9pt;"><b>(FOR PRINTING)</b></td>
                <td width="65%"></td>
            </tr>
        </table>

        <table width="100%" id="tbl_printing_info" cellpadding="5">
            <tr>
                <td width="10%" style="border-bottom: 1px solid white!important;"><center><b>Label(material)</b></center></td>
                <td width="15%"><center><b>Opp Adhesive label</b></center></td>
                <td width="10%"><center><b>Adhesive Paper</b></center></td>
                <td width="15%"><center><b>Cardboard210GSM</b></center></td>
                <td width="10%"><center><b>PAPER+CPP</b></center></td>
                <td width="13%"><center><b>PET+CPP</b></center></td>
                <td width="15%"><center><b>MATERIALS FOR SLIPPER</b></center></td>
                <td width="12%"><center><b>Other</b></center></td>
            </tr>
            <tr>
                <td><b>Color for Print</b></td>
                <td><center><?php echo $sales_order->cfp1_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_other; ?></center></td>
            </tr>
            <tr>
                <td><b>Description</b></td>
                <td><center><?php echo $sales_order->desc_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->desc_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->desc_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->desc_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->desc_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->desc_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->desc_other; ?></center></td>
            </tr>
            <tr>
                <td><b>Quantity</b></td>
                <td align="right"><?php if ($sales_order->qty1_opp_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty1_opp_adhesive;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty1_adhesive;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_cardboard == 0.00){ echo ""; }else{ echo $sales_order->qty1_cardboard;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_paper_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty1_paper_cpp;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_pet_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty1_pet_cpp;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_mat_slipper == 0.00){ echo ""; }else{ echo $sales_order->qty1_mat_slipper;} ?></td>
                <td align="right"><?php if ($sales_order->qty1_other == 0.00){ echo ""; }else{ echo $sales_order->qty1_other;} ?></td>
            </tr>
            <tr>
                <td colspan="8" style="padding-bottom: 0px!important;margin-bottom: 0px!important;">&nbsp;</td>
            </tr>
            <tr>
                <td><b>Direct Print</b></td>
                <td><center><?php echo $sales_order->dp_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->dp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->dp_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->dp_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->dp_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->dp_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->dp_other; ?></center></td>
            </tr>
            <tr>
                <td><b>Colors for Print</b></td>
                <td><center><?php echo $sales_order->cfp2_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_other; ?></center></td>
            </tr>
            <tr>
                <td><b>Model / ML</b></td>
                <td><center><?php echo $sales_order->ml_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->ml_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->ml_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->ml_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->ml_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->ml_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->ml_other; ?></center></td>
            </tr>          
            <tr>
                <td><b>Quantity</b></td>
                <td align="right"><?php if ($sales_order->qty2_opp_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty2_opp_adhesive; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty2_adhesive; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_cardboard == 0.00){ echo ""; }else{ echo $sales_order->qty2_cardboard; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_paper_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty2_paper_cpp; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_pet_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty2_pet_cpp; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_mat_slipper == 0.00){ echo ""; }else{ echo $sales_order->qty2_mat_slipper; } ?></td>
                <td align="right"><?php if ($sales_order->qty2_other == 0.00){ echo ""; }else{ echo $sales_order->qty2_other; } ?></td>
            </tr>  
        </table>
    </div>

    <div class="row" style="margin-top: 20px;">
        <table width="100%" id="tbl_printing_info" cellpadding="5">
            <tr>
                <td width="50%"><center><b>ITEM DESCRIPTION</td>
                <td width="10%"><center><b>QUANTITY</td>
                <td width="13%"><center><b>UNIT</td>
                <td width="15%"><center><b>PRICE</td>
                <td width="12%"><center><b>TOTAL AMOUNT</td>
            </tr>
            <?php foreach($sales_order_items as $item){ ?>
                <tr>
                    <td><?php echo $item->product_desc; ?></td>
                    <td align="right"><?php echo number_format($item->so_qty,2); ?></td>
                    <td><?php echo $item->unit_name; ?></td>
                    <td align="right"><?php echo number_format($item->so_price,2); ?></td>
                    <td align="right"><?php echo number_format($item->so_line_total_price,2); ?></td>
                </tr>
            <?php }?>
        </table>
    </div>

    <div class="row" style="margin-top: 20px;">
        
        <table width="100%" cellpadding="5">
            <tr>
                <td width="15%">PRODUCTION TIME:</td>
                <td width="20%" style="border-bottom: 1px solid black;"><?php echo $sales_order->production_time; ?></td>
                <td width="25%"></td>
                <td width="15%"><b>AMOUNT DUE</b></td>
                <td width="13%"></td>
                <td width="12" align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_before_tax,2); ?></td>
            </tr>
            <tr>
                <td>DELIVERY DAY:</td>
                <td style="border-bottom: 1px solid black;"><?php echo date_format(new DateTime($sales_order->estimated_date),"m/d/Y"); ?></td>
                <td></td>
                <td>ADD: <span style="float: right;">VAT</span></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_tax_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>LESS: <span style="float: right;">DISCOUNT 1</span></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_discount,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>TOTAL AMOUNT DUE</b></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_after_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>LESS: <span style="float: right;">DISCOUNT 2</span></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_overall_discount_amount,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>LESS: <span style="float: right;">COMMISSION</span></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->commission,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>LESS: <span style="float: right;">D.P</span></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->down_payment,2); ?></td>                
            </tr>
            <tr>
                <td colspan="5"></td>
                <td style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;">&nbsp;</td>
            </tr>
            <tr>
                <td><b>REMARKS: </b></td>
                <td colspan="2"></td>
                <td><b style="font-size: 8pt;">NET AMOUNT DUE</b></td>
                <td></td>
                <td align="right" style="border-bottom: 3px double black!important;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_after_discount,2); ?></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $sales_order->remarks; ?></td>
                <td colspan="4"></td>
            </tr>
        </table>
    </div>
</div>





















