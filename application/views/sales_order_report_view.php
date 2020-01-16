<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-cdjp-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
    <!--<link href="assets/dropdown-enhance/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">-->
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->

    <style>
        div.dataTables_filter input { 
            margin-top: 10px;
        }

        .toolbar{
            float: left;
        }

        .text-right { 
            text-align: right!important; 
        } 
 
        .text-left {  
            text-align: left!important; 
        } 

        td:nth-child(5),td:nth-child(6){
            text-align: right;
        }

        td:nth-child(7){
            text-align: right;
            font-weight: bolder;
        }
        div.dataTables_processing{ 
        position: absolute!important; 
        top: 0%!important; 
        right: -45%!important; 
        left: auto!important; 
        width: 100%!important; 
        height: 40px!important; 
        background: none!important; 
        background-color: transparent!important; 
        } 
    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >

                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb" style="margin-bottom: 0px;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="Sales_detailed_summary">Sales Report</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div_payable_list">
                                        <div class="panel-group panel-default" id="accordionA">
                                            <div class="panel panel-default" style="border-radius: 6px;min-height: 670px;">
                                                <div id="collapseTwo" class="collapse in">
                                                    <div class="panel-body">
                                                    <h2 class="h2-panel-heading">Sales Order Report</h2><hr>
                                                        <div >
                                                            <div class="row">
                                                                <div class="col-xs-12 col-lg-4">
                                                                    Period Start * :<br />
                                                                    <div class="input-group">
                                                                        <input type="text" id="txt_date" name="date_from" class="date-picker form-control" value="01/01/<?php echo date("Y"); ?>">
                                                                         <span class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                         </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-lg-4">
                                                                    Period End * :<br />
                                                                    <div class="input-group">
                                                                        <input type="text" id="txt_date" name="date_to" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>">
                                                                         <span class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                         </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <div class="tab-container tab-top tab-success">
                                                            <ul class="nav nav-tabs">
                                                                <li class="active" style=""><a data-toggle="tab" href="#customers" id="btn_customer">Customers</a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="customers" class="tab-pane fade in active">
                                                                    <div class="tab-container tab-top tab-primary">
                                                                        <ul class="nav nav-tabs">
                                                                            <li class="active">
                                                                                <a data-toggle="tab" href="#customer_detailed">Detailed</a>
                                                                            </li>
                                                                            <li>
                                                                                <a data-toggle="tab" href="#customer_summary">Summary</a>
                                                                            </li>
                                                                        </ul>
                                                                    <div class="tab-content">
                                                                        <div id="customer_detailed" class="tab-pane fade in active">
                                                                            <button class="btn btn-primary pull-left"  id="btn_print_customer_detailed"  title="Print Detailed">
                                                                            <i class="fa fa-print"></i> Print Report</button>
                                                                                <table id="tbl_detailed_customer" style="margin-top: 10px;" class="table table-striped" cellspacing="0" width="100%">
                                                                                    <thead class="">
                                                                                    <tr>
                                                                                        <th width="10%">Order #</th> 
                                                                                        <th>Date</th> 
                                                                                        <th>Customer</th>
                                                                                        <th>Product Code</th> 
                                                                                        <th>Description</th> 
                                                                                        <th>Unit Price</th> 
                                                                                        <th>Qty</th> 
                                                                                        <th>Total Amount</th> 
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    </tbody>

                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <td colspan="7" style="text-align: right!important;"><b>Current Page Total : </b></td> 
                                                                                            <td id="td_page_total_cs_detailed" align="right"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="7" style="text-align: right!important;"><b>Grand Total : </b></td> 
                                                                                            <td id="td_grand_total_cs_detailed" align="right"></td>
                                                                                        </tr>

                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                            <div id="customer_summary" class="tab-pane fade in">
                                                                                <button class="btn btn-primary pull-left" id="btn_print_customer_summary"  title="Print Summary">
                                                                                <i class="fa fa-print"></i> Print Report</button>
                                                                                <table id="tbl_summary_customer" style="margin-top: 10px;" class="table table-striped" cellspacing="0" width="100%">
                                                                                    <thead class="">
                                                                                    <tr>
                                                                                        <th>Customer</th>
                                                                                        <th>Total Sales</th> 
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    </tbody>

                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <td align="right" colspan="1" width="85%"><b>Current Page Total : </b></td> 
                                                                                            <td id="td_page_total_cs_summary" align="right"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right" colspan="1"><b>Grand Total : </b></td> 
                                                                                            <td id="td_grand_total_cs_summary" align="right"></td>
                                                                                        </tr>

                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- // END  -->
                                                            </div>
                                                        </div>
                                                    </div>
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

        <footer role="contentinfo">
            <div class="clearfix">
                <ul class="list-unstyled list-inline pull-left">
                    <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT Business Solutions</h6></li>
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

<!-- Select2-->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!---<script src="assets/plugins/dropdown-enhance/dist/js/bootstrap-select.min.js"></script>-->

<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/ellipsis.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        var _cboAccounts; 
        var dtCustomerDetailed; 
        var dtCustomerSummary;
        var dtSalesmanDetailed;
        var dtSalesmanSummary; 
        var dtProductDetailed;
        var dtProductSummary;
        var dtProduct; 
        var type;
        var _date_from = $('input[name="date_from"]');
        var _date_to = $('input[name="date_to"]');


        var initializeControls=function(){
            $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            reloadCustomerList();

        }();

        var bindEventControls=function(){
            $('.date-picker').on('change',function(){
                     $('#tbl_detailed_customer').DataTable().ajax.reload()
                     $('#tbl_summary_customer').DataTable().ajax.reload()
                     // dtCustomerSummary.DataTable().ajax.reload()
                
            });

            $(document).on('click','#btn_print_customer_detailed',function(){
                window.open('Sales_order_report/transaction/detailed-report-print-sales-order?startDate='+_date_from.val()+'&endDate='+_date_to.val()+'&type=c');
            });

            $(document).on('click','#btn_print_customer_summary',function(){
                window.open('Sales_order_report/transaction/summary-report-print-sales-order?startDate='+_date_from.val()+'&endDate='+_date_to.val()+'&type=c');
            });


            $('#btn_customer').click(function(){
                type=1;
                $('#').destroy();
                dtCustomerSummary.destroy();
                reloadCustomerList();
            });

         
        }();


    var showSpinningProgress=function(e){
        $(e).toggleClass('disabled');
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };


    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

        function reloadCustomerList(){
            dtCustomerDetailed=$('#tbl_detailed_customer').DataTable({
                "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "bDestroy": true,
            oLanguage: {
                    sProcessing: '<center><br /><img src="assets/img/loader/ajax-loader-sm.gif" /><br /><br /></center>'
            },
            processing : true,
                "bPaginate":true, 
                "aaSorting": [],
                language: { 
                    "searchPlaceholder": "Search Customer" 
                }, 
                "ajax": {
                    "url": "Sales_order_report/transaction/per-sales-detailed-customers",
                    "type": "GET",
                    "bDestroy": true,
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "startDate":_date_from.val(),
                            "endDate":_date_to.val()
                        });
                    }
                },
                "columns": [
                    { targets:[0],data: "so_no" }, 
                    { targets:[1],data: "date_order" }, 
                    {
                        targets:[2],data: "customer_name"  
                        ,render: $.fn.dataTable.render.ellipsis(50)
                    }, 
                    { "searchable": false,targets:[3],data: "product_code" }, 
                    {  
                        className: "text-left", 
                        "searchable": false,
                        targets:[4],data: "product_desc"  
                        ,render: $.fn.dataTable.render.ellipsis(45)
                    }, 
                    {  
                        className: "text-right", 
                        "searchable": false,targets:[5],data: "so_price", 
                        render: function(data){ 
                            return accounting.formatNumber(data,2); 
                        }  
                    }, 
                    { targets:[6],data: "so_qty" }, 
                    {
                        className: "text-right", 
                        "searchable": false,targets:[7],data: 
                        "total", 
                        render: function(data){ 
                            return '<b>'+accounting.formatNumber(data,2)+'</b>'; 
                        } 
                    } 
                ],
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    $('#td_page_total_cs_detailed').html('<b>'+accounting.formatNumber(pageTotal,2)+'</b>');
                    $('#td_grand_total_cs_detailed').html('<b>'+accounting.formatNumber(total,2)+'</b>');
                }
            });


            dtCustomerSummary=$('#tbl_summary_customer').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "bPaginate":true, 
                language: { 
                    "searchPlaceholder": "Search Customer" 
                }, 
                "ajax": {
                    "url": "Sales_order_report/transaction/per-sales-summary-customers",
                    "type": "GET",
                    "bDestroy": true,
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "startDate":_date_from.val(),
                            "endDate":_date_to.val()
                        });
                    }
                },
                "columns": [
                    {
                        targets:[0],data: "customer_name" 
                    },
                    {  
                        className: "text-right", 
                        "searchable": false,
                        targets:[1],data: "customer_total", 
                        render: function(data){ 
                            return accounting.formatNumber(data,2); 
                        }  
                    }
                ],
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 1 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 1, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                     $('#td_page_total_cs_summary').html('<b>'+accounting.formatNumber(pageTotal,2)+'</b>');
                    $('#td_grand_total_cs_summary').html('<b>'+accounting.formatNumber(total,2)+'</b>');
                }
            });
        };
    });
</script>


</body>

</html>