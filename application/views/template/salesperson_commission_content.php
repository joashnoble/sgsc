<style>
    body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .report-header {
            font-weight: bolder;
        }
.right{
    text-align: right;
}
</style>

    <table width="100%" cellspacing="5" cellspacing="0">
        <tr>
            <td width="10%"  class="bottom"><img src="<?php echo base_url($company_info->logo_path); ?>" style="height: 90px; width: 90px; text-align: left;"></td>
            <td width="90%"  class="bottom" >
                <h3 class="report-header" style="margin-bottom: 0"><strong><?php echo $company_info->company_name; ?></strong></h3>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span><br>
                <span><?php echo $company_info->email_address; ?></span><br>

            </td>

        </tr>
    </table>
    <div class="">
        <h3 class="report-header"><strong>SALESPERSON COMMISSION REPORT</strong></h3>
    </div>
<table width="100%" style="font-size: 11;">
<tr>
    <td width="10%">Date:</td>
    <td><?php echo $info[0]->start_date.' - '.$info[0]->end_date; ?></td>

</tr>
<tr>
    <td>Commission %:</td>
    <td><?php echo number_format($info[0]->global_commission,2) ?></td>
</tr>
</table>
<table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11;" class="table table-striped" frame="box">
    <thead>
        <tr>
            <th style="text-align: left;">Salesperson Code</th>
            <th style="text-align: left;">Salesperson Name</th>
            <th>Invoice Count</th>
            <th style="text-align: right;">Invoice Total</th>
            <th style="text-align: right;" width="10%">Percentage</th>
            <th style="text-align: left;">Void</th>
            <th style="text-align: left;">Remarks</th>
            <th style="text-align: right;">Total Commission</th>
        </tr>
    </thead>
    <tbody>
        <?php $tot = 0; foreach ($items as $item) { ?>
        <tr>
            <td><?php  echo $item->salesperson_code ;?></td>
            <td><?php  echo $item->firstname.' '.$item->lastname ;?></td>
            <td style="text-align: center;"><?php  echo number_format($item->inv_count,0) ;?></td>
            <td class="right"><?php  echo number_format($item->inv_total,2) ;?></td>
            <td class="right"><?php  echo number_format($item->commission_percentage,2) ;?></td>
            <td><?php  if($item->void == 1){ echo 'Yes'; }else{ echo 'No';} ;?></td>
            <td><?php  echo $item->remarks ;?></td>
            <td class="right"><?php  echo number_format($item->total_commission,2) ;?></td>
        </tr>
        <?php 
        $tot += $item->total_commission;
        } ?>
        <tr>
            <td class="right" colspan="7"><b>Total:</b></td>
            <td class="right"><b><?php  echo number_format($tot,2) ;?></b></td>
        </tr>
    </tbody>
</table>

<br>
        <center>
        <br>
            <table style="text-align: center;border: none!important; ">
                <tr>
                    <td width="50%" style="padding-right: 10px;line-height: 5px;">
                    <br style="">
                    _____________________________</td>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    <br style="line-height:5px;">
                    _____________________________</td>
                    <td width="25%" style="padding-right: 10px;line-height: 5px;">
                    &nbsp;<br style="line-height:5px;">
                    _____________________________</td>
                </tr>
                <tr>
                    <td width="" style=""><strong>Prepared by</strong></td>
                    <td width="" style=""><strong>Approved by</strong></td>
                    <td width="" style=""><strong>Date</strong></td>
                </tr>
            </table>
        </center>