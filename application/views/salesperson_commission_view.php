<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <style>

        .page-content > .breadcrumb {
            margin-bottom: 1px!important; 
        }

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }
        .numeric{
            text-align: right;
        }
        input[readonly]{
            background-color: transparent!important; 
            border: transparent!important; 
        }
        .bolder{
            font-weight: bolder;
        }
        #tbl_salesperson_comm_filter{
            display: none;
        }
        .right_align{
            text-align: right;
        }
    </style>

</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Salesperson_commission">Salesperson Commission</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_summary_list">
                                        <div class="panel panel-default">
           <!--                                  <div class="panel-heading">
                                                <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Locations Management</b>
                                            </div> -->
                                            <div class="panel-body table-responsive">
                                            <h2 class="h2-panel-heading">Salesperson Commission</h2><hr><br>
                                               <div class="row">
                                                    <div class="col-lg-3">
                                                        <button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New Report" ><i class="fa fa-plus"></i> Generate New </button>
                                                    </div>
                                                    <div class="col-lg-3 col-lg-offset-6">
                                                        <input type="text" id="searchbox_comm" class="form-control">
                                                    </div>
                                                </div><br>

                                                <table id="tbl_salesperson_comm" class="table table-striped" cellspacing="0" width="100%">

                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th width="5%">Percentage</th>
                                                        <th>Total Commission</th>
                                                        <th>Remarks</th>
                                                        <th width="7%"><center>Action</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>

                                    <div id="div_summary_fields" class="col-lg-12" style="display: none;">
                                        <div class="panel panel-default">
<!--                                             <div class="panel-heading">
                                               
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div> -->

                                            <div class="panel-body">
                                            <h2 class="h2-panel-heading">Salesperson Commission</h2><hr>
                                                <form id="frm_comm_summary" role="form" class="form-horizontal row-border">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                            From :<br />
                                                            <div class="input-group">
                                                                <input type="text" id="txt_start_date" name="start_date" class="date-picker form-control" value="<?php echo date("m").'/01/'.date("Y"); ?>">
                                                                 <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                 </span>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                            To :<br />
                                                            <div class="input-group">
                                                                <input type="text" id="txt_end_date" name="end_date" class="date-picker form-control" value="<?php echo date("m/t/Y"); ?>">
                                                                 <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                 </span>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                            Commission Percentage :<br />
                                                            <div class="input-group">
                                                                <input type="text" id="commission_percentage" name="global_commission_percentage" class="form-control numeric" value="">
                                                                 <span class="input-group-addon">
                                                                       %
                                                                 </span>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                            <br />
                                                            <button id="btn_generate" type="button" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;padding: 6px 10px!important;"><span class=""></span>  Generate</button>
                                                    </div>
                                                    
                                                </div>

                                                <i>Changing the date will refresh/regenerate the table.</i>
                                                    <br/>
                                                <table id="tbl_frm_commission" class="table table-striped" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Salesperson Code</th>
                                                            <th>Salesperson Name</th>
                                                            <th>Invoice Count</th>
                                                            <th style="text-align: right;">Invoice Total</th>
                                                            <th width="10%">Percentage</th>
                                                            <th style="text-align: left;">Void</th>
                                                            <th style="text-align: left;">Remarks</th>
                                                            <th style="text-align: right;">Total Commission</th>
                                                            <th style="text-align: right;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="7" style="text-align: right;">TOTAL</td>
                                                            <td><input type="text" id="total_commission_all" name="total_commission_all" class="form-control numeric bolder" readonly=""></td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            <hr />
                                            <label>Remarks :</label><br />
                                            <textarea name="global_remarks" class="col-lg-12 form-control"></textarea>
                                                </form>
                                            </div>

                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-4">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;""><span class=""></span>  Save Changes</button>
                                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- .container-fluid -->

                </div> <!-- #page-content -->
            </div>

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2018 - JDEV OFFICE SOLUTION INC</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>

        </div>
    </div>
</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/ellipsis.js"></script>
<!-- Select2-->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!---<script src="assets/plugins/dropdown-enhance/dist/js/bootstrar-select.min.js"></script>-->



<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>


<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj;
    var oTableItems={
        total_invoice : 'td:eq(3)',
        commission_percentage : 'td:eq(4)',
        total_commission : 'td:eq(7)'
 
    };

    var initializeControls=function(){
                $('.numeric').autoNumeric('init');
        dt=$('#tbl_salesperson_comm').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "Salesperson_commission/transaction/list",
            "language": {
                "searchPlaceholder":"Search Location"
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "start_date" },
                { targets:[2],data: "end_date" },
                { targets:[3],data: "global_commission" , render: $.fn.dataTable.render.number( ',', '.', 0)},
                { sClass:'right_align', targets:[2],data: "global_total" , render: $.fn.dataTable.render.number( ',', '.', 2)},
                { targets:[4],data: "remarks" },
                {
                    targets:[5],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_trash+'</center>';
                    }
                }
            ]
        });

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });

    }();

    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_salesperson_comm tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                var d=row.data();
                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/salesperson-commission/"+ d.salesperson_comm_info_id+"/preview",
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response,'no-padding' ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                });
            }
        } );

        $('#btn_new').click(function(){
            _txnMode="new";
            clearFields('#frm_comm_summary');
            $('#tbl_frm_commission tbody').html('');
            $('#total_commission_all').val('0.00');
            showList(false);
        });
        $("#txt_start_date").on("change", function () {        
            $('#btn_generate').click();
        });

        $("#txt_end_date").on("change", function () {        
            $('#btn_generate').click();
        });
        $('#btn_generate').click(function(){
            $('#tbl_frm_commission tbody').html('<tr><td colspan="9"><center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center></td></tr>');
             $.ajax({
                url : 'Salesperson_commission/transaction/generate?start='+$('#txt_start_date').val()+'&end='+$('#txt_end_date').val(),
                type : "GET",
                cache : false,
                dataType : 'json',
                success : function(response){
                $('#tbl_frm_commission tbody').html('');
                total_comm=0
                 $.each(response.data, function(index,value){
                    total_comm = value.inv_total* ($('#commission_percentage').val()/100);
                     $('#tbl_frm_commission tbody').append(
                        '<tr>'+
                        '<td>'+value.salesperson_code+'</td>'+
                        '<td>'+value.salesperson_fullname+'</td>'+
                        '<td><input type="text" class="form-control numeric" name="inv_count[]" value="'+value.inv_count+'" readonly></td>'+
                        '<td><input type="text" class="form-control numeric" name="invoice_total[]" value="'+value.inv_total+'" readonly></td>'+
                        '<td><input type="text" class="form-control numeric" name="commission_percentage[]" value="'+$('#commission_percentage').val()+'" ></td>'+
                        '<td><input type="checkbox" class="checkbox" name="void[]" style="transform: scale(1.5);"></td>'+
                        '<td><input type="text" class="form-control" name="remarks[]"></td>'+
                        '<td class="right-align"><input type="text" name="total_commission[]" class="form-control numeric" value="'+total_comm +'" readonly></td>'+
                        '<td class=""><input type="hidden" name="salesperson_id[]" class="form-control numeric" value="'+value.salesperson_id+'" ></td>'+
                        '</tr>'
                    );
                 });
                 reComputeTotal();
                 $('.numeric').autoNumeric('init');

                }
            });
        });

        $('#tbl_frm_commission tbody').on('keyup','input.numeric',function(){
            var row=$(this).closest('tr');
            if(row.find('input.checkbox').is(":checked")) {
                $(oTableItems.total_commission,row).find('input.numeric').val(accounting.formatNumber(0,2));
            }else{
                total_invoice = parseFloat(accounting.unformat($(oTableItems.total_invoice,row).find('input.numeric').val()));
                commission_percentage = parseFloat(accounting.unformat($(oTableItems.commission_percentage,row).find('input.numeric').val()))/100;
                $(oTableItems.total_commission,row).find('input.numeric').val(accounting.formatNumber(total_invoice*commission_percentage,2));
            }
            reComputeTotal();
        });

        $('#tbl_frm_commission tbody').on('change','input.checkbox',function(){
        var row=$(this).closest('tr');
            if($(this).is(":checked")) {
                 $(oTableItems.total_commission,row).find('input.numeric').val(accounting.formatNumber(0,2));
            }else{
                total_invoice = parseFloat(accounting.unformat($(oTableItems.total_invoice,row).find('input.numeric').val()));
                commission_percentage = parseFloat(accounting.unformat($(oTableItems.commission_percentage,row).find('input.numeric').val()))/100;
                $(oTableItems.total_commission,row).find('input.numeric').val(accounting.formatNumber(total_invoice*commission_percentage,2));
            }
            reComputeTotal();
        });

        $("#searchbox_comm").keyup(function(){         
            dt
                .search(this.value)
                .draw();
        });

        $('#tbl_salesperson_comm tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.salesperson_comm_info_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            removeCommSummary().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('#btn_cancel').click(function(){
            showList(true);
        });

        $('#btn_save').click(function(){
            if(validateRequiredFields()){
                if(_txnMode=="new"){
                    createCommSummary().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields();
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }
            }
        });
    })();

    var validateRequiredFields=function(){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required]','#frm_comm_summary').each(function(){
            if($(this).val()==""){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('div.form-group').addClass('has-error');
                stat=false;
                return false;
            }
        });
        return stat;
    };

    var createCommSummary=function(){
        $('#frm_comm_summary').find('input:checkbox').each(function () {
            $(this).prop("checked") ? $(this).attr('value') : $(this).html("<input type='hidden' name='void[]' value='0' />");
        });
        var _data=$('#frm_comm_summary').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Salesperson_commission/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };


    var removeCommSummary=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Salesperson_commission/transaction/delete",
            "data":{salesperson_comm_info_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_summary_list').show();
            $('#div_summary_fields').hide();
        }else{
            $('#div_summary_list').hide();
            $('#div_summary_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(){
        $('input[required],textarea','#frm_comm_summary').val('');
        $('form').find('input:first').focus();
    };

    function format ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td>Location Name : </td><td><b>'+ d.location_name+'</b></td>' +
        '</tr>' +
        '</tbody></table><br />';
    };

    var reComputeTotal=function(){
        var rows=$('#tbl_frm_commission > tbody tr');
        var totaltotal_ =0;
        $.each(rows,function(){
            totaltotal_+=parseFloat(accounting.unformat($(oTableItems.total_commission,$(this)).find('input.numeric').val()));
        });
        $('#total_commission_all').val(accounting.formatNumber(totaltotal_,2));

    };
    
});

</script>

</body>

</html>