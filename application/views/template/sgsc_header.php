<?php if ($company_info->is_template_header == 0){?>
	<div>
	<table width="100%" class="nohover" >
        <tr>
            <td  class="bottom-only" width="10%" style="object-fit: cover;"><img src="<?php echo $company_info->logo_path; ?>" style="height: 90px; width: 90px; text-align: left;"></td>
            <td class="bottom-only" width="90%" class="">
                <h1 class="report-header"><strong><?php echo $company_info->company_name; ?></strong></h1>
                <p><?php echo $company_info->company_address; ?></p>
                <p><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></p>
                <span><?php echo $company_info->email_address; ?></span><br>

            </td>
        </tr>
    </table><hr>
	</div>
<?php }else{?>
	<div>
		<img src="<?php echo $company_info->header_path; ?>" style="width: 100%;">
	</div>
<?php }?>