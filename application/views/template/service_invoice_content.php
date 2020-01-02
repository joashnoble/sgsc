    <style type="text/css">

            body {
                font-family: 'Calibri',sans-serif;
                font-size: 12px;
            }

            @page {
                size: auto;   /* auto is the initial value */
                margin: .5in .5in 1in .5in; 
            }

            /*    

            tr:hover {
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
            }*/

        .left {border-left: 1px solid black;}
        .right{border-right: 1px solid black;}
        .bottom{border-bottom: 1px solid black;}
        .top{border-top: 1px solid black;}
        .fifteen{ width: 15%; }
        .text-center{text-align: center;}
        .text-right{text-align: right;}

    </style>

    <div>
        <?php include 'sgsc_header.php'; ?>
    </div>
    <div class="row" style="margin-top: 20px;">
        <table width="100%" class="" cellpadding="3" cellspacing="0">
            <tr>
                <td width="35%"><strong style="font-size: 12pt;">SERVICE INVOICE</strong></td>
                <td width="30%"></td>
                <td width="7%" style="font-size: 10pt;"><strong>NO :</strong> </td>
                <td width="28%" align="right" style="border: 1px solid black;border-left: 1px solid black!important;font-size: 10pt;">
                    <center><strong><?php echo $service->service_invoice_no; ?></strong></center>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
        </table>
        
        <table width="100%" class="" cellpadding="4" cellspacing="0" style="font-size: 9pt;">
            <tr>
                <td width="15%">Customer: </td>
                <td width="30%" style="border-bottom: 1px solid black;font-size: 10pt;padding-bottom: 0px!important;"><strong><?php echo $service->customer_name; ?></strong></td>
                <td width="25%"></td>

                <td width="7%">Date: </td>
                <td width="5%"></td>
                <td width="18%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo  date_format(new DateTime($service->date_invoice ),"m/d/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Contact Person:</td>
                <td width="30%" class="bottom"><?php echo $service->contact_person; ?></td>
                <td width="20%"></td>
                <td width="10%">Department:</td>
                <td width="7%"></td>
                <td width="18%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo $service->department_name ?></td>
            </tr>    
            <tr>
                <td width="15%">Due Date:</td>
                <td width="30%" class="bottom"><?php echo  date_format(new DateTime($service->date_due),"m/d/Y"); ?></td>
                <td width="20%"></td>
                <td width="12%">Salesperson:</td>
                <td width="5%"></td>
                <td width="18%" style="border-bottom: 1px solid black;padding-bottom: 0px!important;"><?php echo $service->firstname ?> <?php echo $service->lastname ?></td>
            </tr>
                    
        </table>      
    </div>
    <br>
    <table width="100%"  style="font-family: tahoma;font-size: 11;" cellspacing="0" cellpadding="5">
            <thead>

            <tr>
                <th width="12%" style="text-align: center;height: 30px;padding: 6px;" class="left top bottom">Item Qty</th>
                <th width="50%" style="text-align: left;height: 30px;padding: 6px;" class="bottom top left">Item Description</th>
                <th width="12%" style="text-align: center;height: 30px;padding: 6px;" class="bottom top left">UM</th>
                <th width="12%" style="text-align: center;height: 30px;padding: 6px;" class="bottom top left">Unit Cost</th>
                <th width="12%" style="text-align: center;height: 30px;padding: 6px;" class="bottom top right left">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($item_info as $item){ ?>
                <tr>
                    <td width="12%"  class="left" style="text-align: center;height: 30px;padding: 6px;"><?php echo number_format($item->service_qty,0); ?></td>
                    <td width="50%"   class="left" style="text-align: left;height: 30px;padding: 6px;"><?php echo $item->service_desc; ?></td>

                    <td width="12%"  class="left" style="text-align: center;height: 30px;padding: 6px;"><?php echo $item->service_unit_name; ?></td>
                    <td width="12%"  class="left" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->service_price,2); ?></td>
                    <td width="12%"  class="left right" style="text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->service_line_total,2); ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
            <table width="100%" cellspacing="0" cellpadding="5">
                <tr>
                    <td style="width: 15%:height:40px;" class="text-left left bottom top "><strong>Gross Total:</strong></td>
                    <td style="width: 20%" class="bottom text-right top "><?php echo number_format($service->total_amount,2); ?></td>
                    <td style="width: 10%" class="text-right left bottom top "><strong>Discount:</strong></td>
                    <td style="width: 20%" class="bottom text-right top "><?php echo number_format($service->total_overall_discount_amount,2); ?></td>
                    <td style="width: 15%" class="text-left left bottom top "><strong>Net Total:</strong></td>
                    <td style="width: 20%" class="right bottom text-right top"><?php echo number_format($service->total_amount_after_discount,2); ?></td>
                </tr>
            <tr>
            <td colspan="6" style="text-align: left;font-weight: bolder; ;height: 30px;padding: 6px;" class="left right"><b>Remarks</b> </td>
            </tr>
            <tr>
            <td colspan="6" style="text-align: left;font-weight: bolder; ;height: 30px;padding: 6px;" class="right left bottom"><?php echo $service->remarks; ?></td>
            </tr>
                <tr>
                <td colspan="2" class="left ">Prepared by:</td>
                <td colspan="2" class="left">Confirmed by:</td>

                <td colspan="2" class="left right">Check by:</td>
                </tr>
                <tr style="">
                    <td style="width: 15%" class="text-left left bottom"> <br><br><br></td>
                    <td style="width: 20%" class="bottom"></td>
                    <td style="width: 10%" class="text-right left bottom"> </td>
                    <td style="width: 20%" class="bottom"> </td>
                    <td style="width: 15%" class="text-left left bottom"></td>
                    <td style="width: 20%" class="right bottom"></td>
                </tr>

                <tr>
                <td colspan="2" class="left ">Certified by:</td>
                <td colspan="2" class="left">Approved by:</td>

                <td colspan="2" class="left right">Date Received:</td>
                </tr>
                <tr style="">
                    <td style="width: 15%" class="text-left left bottom"> <br><br><br></td>
                    <td style="width: 20%" class="bottom"></td>
                    <td style="width: 10%" class="text-right left bottom"> </td>
                    <td style="width: 20%" class="bottom"> </td>
                    <td style="width: 15%" class="text-left left bottom"></td>
                    <td style="width: 20%" class="right bottom"></td>
                </tr>

            </table>
</table>