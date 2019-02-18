<style>

        .report-header {
            font-weight: bolder;
        }
.right{
    text-align: right;
}
</style>
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
