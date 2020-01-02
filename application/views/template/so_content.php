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
            border-collapse: collapse!important;
        }
        table-td.left{
            border-left: 1px solid black!important;
        }
        table-td.right{
            border-left: 1px solid black!important;
        }
        .tbl_so_info{
            font-family: tahoma;font-size: 9pt;
        }
        .tbl_so_info td{
            border: 1px solid black;
        }
        #tbl_printing_info td{
            border: 1px solid black;
        }
        .border-top{
            border-top: 20px solid black!important;
        }
        .border-bottom{
            border-bottom: 20px solid black!important;
        }
</style>
    <div>
        <?php include 'sgsc_header.php'; ?>
    </div>
    <div class="row" style="margin-top: 20px;">
        <table width="100%" class="" cellpadding="3" cellspacing="0">
            <tr>
                <td width="35%"><strong style="font-size: 10pt;">SALES ORDER</strong></td>
                <td width="30%"></td>
                <td width="7%" style="font-size: 10pt;"><strong>NO :</strong> </td>
                <td width="28%" align="right" style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;">
                    <center><strong><?php echo $sales_order->so_no; ?></strong></center>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
        </table>
        
        <table width="100%" class="" cellpadding="4" cellspacing="0" style="font-size: 8pt;">
            <tr>
                <td width="10%">SOLD TO: </td>
                <td width="50%" style="border-bottom: 1px solid black;font-size: 10pt;padding-bottom: 0px!important;"><strong><?php echo $sales_order->customer_name; ?></strong></td>
                <td width="5%"></td>

                <td width="7%">DATE: </td>
                <td width="10%"></td>
                <td width="18%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo date_format(new DateTime($sales_order->date_order),"m/d/Y"); ?></td>
            </tr>
        </table>
        <table  width="100%" class="" cellpadding="4" cellspacing="0" style="font-size: 8pt;">
            <tr>
                <td width="18%">Contact Person/Cell #</td>
                <td width="42%"><?php echo $sales_order->contact_no; ?></td>
                <td width="5%"></td>
                <td width="7%">TERMS:</td>
                <td width="10%"></td>
                <td width="18%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><center><?php echo $sales_order->terms; ?></center></td>
            </tr>
        </table>
    </div>

    <div class="row" style="margin-top: 15px;">

        <table width="100%" cellpadding="4" cellspacing="0">
            <tr>
                <td width="35%" align="right" style="font-size: 8pt;"><b>(FOR PRINTING)</b></td>
                <td width="65%"></td>
            </tr>
        </table>

        <table width="100%" id="tbl_printing_info" cellspacing="0" cellpadding="2" style="font-size: 7pt;">
            <tr>
                <td width="10%" style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><center><b>Label(material)</b></center></td>
                <td width="15%" style="font-size: 6pt;"><center><b>Opp Adhesive label</b></center></td>
                <td width="10%" style="font-size: 6pt;"><center><b>Adhesive Paper</b></center></td>
                <td width="15%" style="font-size: 6pt;"><center><b>Cardboard210GSM</b></center></td>
                <td width="10%" style="font-size: 6pt;"><center><b>PAPER+CPP</b></center></td>
                <td width="13%" style="font-size: 6pt;"><center><b>PET+CPP</b></center></td>
                <td width="15%" style="font-size: 6pt;"><center><b>MATERIALS FOR SLIPPER</b></center></td>
                <td width="12%" style="font-size: 6pt;"><center><b>Other</b></center></td>
            </tr>
            <tr>
                <td style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Color for Print</b></td>
                <td><center><?php echo $sales_order->cfp1_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->cfp1_other; ?></center></td>
            </tr>
            <tr>
                <td style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Description</b></td>
                <td><center><?php echo $sales_order->desc_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->desc_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->desc_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->desc_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->desc_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->desc_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->desc_other; ?></center></td>
            </tr>
            <tr>
                <td class="border-bottom" style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Quantity</b></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_opp_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty1_opp_adhesive;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_adhesive == 0.00){ echo ""; }else{ echo $sales_order->qty1_adhesive;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_cardboard == 0.00){ echo ""; }else{ echo $sales_order->qty1_cardboard;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_paper_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty1_paper_cpp;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_pet_cpp == 0.00){ echo ""; }else{ echo $sales_order->qty1_pet_cpp;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_mat_slipper == 0.00){ echo ""; }else{ echo $sales_order->qty1_mat_slipper;} ?></td>
                <td class="border-bottom" align="right"><?php if ($sales_order->qty1_other == 0.00){ echo ""; }else{ echo $sales_order->qty1_other;} ?></td>
            </tr>
            <tr>
                <td colspan="8" style=""></td>
            </tr>
            <tr>
                <td class="border-top" style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Direct Print</b></td>
                <td class="border-top"><center><?php echo $sales_order->dp_opp_adhesive; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_adhesive; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_cardboard; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_paper_cpp; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_pet_cpp; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_mat_slipper; ?></center></td>
                <td class="border-top"><center><?php echo $sales_order->dp_other; ?></center></td>
            </tr>
            <tr>
                <td style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Colors for Print</b></td>
                <td><center><?php echo $sales_order->cfp2_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->cfp2_other; ?></center></td>
            </tr>
            <tr>
                <td style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Model / ML</b></td>
                <td><center><?php echo $sales_order->ml_opp_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->ml_adhesive; ?></center></td>
                <td><center><?php echo $sales_order->ml_cardboard; ?></center></td>
                <td><center><?php echo $sales_order->ml_paper_cpp; ?></center></td>
                <td><center><?php echo $sales_order->ml_pet_cpp; ?></center></td>
                <td><center><?php echo $sales_order->ml_mat_slipper; ?></center></td>
                <td><center><?php echo $sales_order->ml_other; ?></center></td>
            </tr>          
            <tr>
                <td style="font-size: 6pt;margin-left: 5!important;padding-left: 5!important;"><b>Quantity</b></td>
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
        <table width="100%" id="tbl_printing_info" cellspacing="0" cellpadding="3" style="font-size: 7.5pt;">
            <tr>
                <td width="50%" style="font-size: 7pt;margin-left: 5!important;padding-left: 5!important;"><b>ITEM DESCRIPTION</b></td>
                <td width="10%" align="right" style="font-size: 7pt;margin-right: 5!important;padding-right: 5!important;"><b>QUANTITY</b></td>
                <td width="13%" style="font-size: 7pt;margin-left: 5!important;padding-left: 5!important;"><b>UNIT</b></td>
                <td width="15%" align="right" style="font-size: 7pt;margin-right: 5!important;padding-right: 5!important;"><b>PRICE</b></td>
                <td width="12%" align="right" style="font-size: 6pt;margin-right: 5!important;padding-right: 5!important;"><b>TOTAL AMOUNT</b></td>
            </tr>
            <?php foreach($sales_order_items as $item){ ?>
                <tr>
                    <td style="margin-left: 5!important;padding-left: 5!important;"><?php echo $item->product_desc; ?></td>
                    <td align="right" style="margin-right: 5!important;padding-right: 5!important;"><?php echo number_format($item->so_qty,2); ?></td>
                    <td style="margin-left: 5!important;padding-left: 5!important;"><?php echo $item->unit_name; ?></td>
                    <td align="right" style="margin-right: 5!important;padding-right: 5!important;"><?php echo number_format($item->so_price,2); ?></td>
                    <td align="right" style="margin-right: 5!important;padding-right: 5!important;"><?php echo number_format($item->so_line_total_price,2); ?></td>
                </tr>
            <?php }?>
        </table>
    </div>

    <div class="row" style="margin-top: 20px;">
        
        <table width="100%" cellpadding="4" cellspacing="0" style="font-size: 7.5pt;">
            <tr>
                <td width="15%" style="font-size: 7pt!important;">PRODUCTION TIME:</td>
                <td width="20%" style="border-bottom: 1px solid black;"><?php echo $sales_order->production_time; ?></td>
                <td width="25%"></td>
                <td width="20%" colspan="2"><b>AMOUNT DUE</b></td>
                <td width="8%"></td>
                <td width="12%" align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_before_tax,2); ?></td>
            </tr>
            <tr>
                <td style="font-size: 7pt!important;">DELIVERY DAY:</td>
                <td style="border-bottom: 1px solid black;"><?php echo date_format(new DateTime($sales_order->estimated_date),"m/d/Y"); ?></td>
                <td></td>
                <td width="10%">ADD:</td>

                <td width="10%">VAT</td>

                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_tax_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="2">LESS : DISCOUNT 1</td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_discount,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="2"><b>TOTAL AMOUNT DUE</b></td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_after_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="2">LESS : DISCOUNT 2</td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_overall_discount_amount,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="2">LESS: COMMISSION</td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->commission,2); ?></td>                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>LESS: </td>
                <td>D.P</td>
                <td></td>
                <td align="right" style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->down_payment,2); ?></td>                
            </tr>
            <tr>
                <td colspan="6"></td>
                <td style="border-bottom: 1px solid black;margin-bottom: 0px!important;padding-bottom: 0px!important;">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="2"><b>NET AMOUNT DUE</b></td>
                <td></td>
                <td align="right" style="border-bottom: 3px double black!important;margin-bottom: 0px!important;padding-bottom: 0px!important;"><?php echo number_format($sales_order->total_after_discount,2); ?></td>
            </tr>
        </table>
    </div>

    <div class="row" style="margin-top: 20px;">
         <table width="100%" cellpadding="4" cellspacing="0" style="font-size: 7pt;">
            <tr>
                <td width="25%"><b>PAYMENT</b></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td colspan="3" style="border-bottom: 1px solid black;"></td>
            </tr>
        </table>
         <table width="100%" cellpadding="4" cellspacing="0" style="font-size: 7pt;">
            <tr>
                <td width="15%">CASH</td>
                <td width="20%" style="border-bottom: 1px solid black;"></td>
                <td width="30%"></td>
                <td colspan="3"><center><i>Prepared by</i></center></td>
            </tr>
            <tr>
                <td>CHECK</td>
                <td style="border-bottom: 1px solid black;"></td>
                <td></td>
                <td colspan="3"></td>
            </tr>  
            <tr>
                <td>DEPOSIT</td>
                <td style="border-bottom: 1px solid black;"></td>
                <td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"></td>
            </tr>    
            <tr>
                <td colspan="3"></td>
                <td colspan="3"><center><i>Confirmed by</i></center></td>
            </tr>     
        </table>
        <table width="100%" cellpadding="4" cellspacing="0" style="font-size: 7pt;margin-top: 20px;">
            <tr>
                <td width="25%"><b>REMARKS:</b></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td colspan="3" style="border-bottom: 1px solid black;"></td>
            </tr>  
            <tr>
                <td colspan="2" style="text-align: justify;text-align-last: left;padding-left: "><u><?php echo $sales_order->remarks;?></u></td>
                <td></td>
                <td colspan="3"><center><i>Check by</i></center></td>
            </tr>   
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td colspan="3">&nbsp;</td>
            </tr>     
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td colspan="3" style="border-bottom: 1px solid black;">&nbsp;</td>
            </tr> 
            <tr>
                <td colspan="3"></td>
                <td colspan="3"><center><i>Certified by</i></center></td>
            </tr> 
            <tr>
                <td colspan="2"></td>
                <td></td>
                <td colspan="3">&nbsp;</td>
            </tr>                 
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td colspan="3" style="border-bottom: 1px solid black;">&nbsp;</td>
            </tr>             
            <tr>
                <td colspan="3"></td>
                <td colspan="3"><center><i>Approved by</i></center></td>
            </tr>             
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>             
            <tr>
                <td colspan="2" style="font-size: 6pt;">"THIS STATEMENT OF ACCOUNT IS NOT VALID FOR CLAIMING INPUT TAXES"</td>
                <td colspan="4"></td>
            </tr>
        </table>
    </div>





















