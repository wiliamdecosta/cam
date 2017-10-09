<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Invoice</span>
             <i class="fa fa-circle"></i>
        </li>
         <li>
            <span>Print Invoice</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">

  <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Print Invoice
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
            <div class="row">
                <div class="col-md-12 green">
                    <table id="grid-table-account"></table>
                    <div id="grid-pager-account"></div>
                </div>
            </div>
            <div class="space-4"></div>
            <div class="row">
                <div class="col-md-12 green" style="display:none">
                    <table id="grid-table-billing"></table>
                    <div id="grid-pager-billing"></div>
                </div>
            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>

<!-- Modal Edit  -->
 <!-- Modal Edit  -->
 <div class="modal fade bs-modal-lg" id="modalEditSigner" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Invoice Data</h4>
            </div>
            <div class="modal-body">

                 <h4 class="modal-title" id="MDesc">Signer Data</h4>
                 <hr>
                 <div class="space-4"></div>
                 <div id="formAdd">
                 <div class="portlet-body">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"> Data </a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab"> Update Data </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_1_1">
                             <div class="form-horizontal" role="form"  >
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Signer</label>
                                <div class="col-md-6">
                                 <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" id="signer" class="form-control readonly" readonly placeholder=""> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">UP</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" id="up" class="form-control readonly" readonly placeholder=""> </div>
                                         </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank Account</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" id="ba" class="form-control readonly" readonly placeholder=""> </div>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label">Invoice Date</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" id="inv_date" class="form-control readonly" readonly placeholder=""> </div>
                                         </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contract No</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <textarea type="text" id="contract_no" row="10" class="form-control readonly" readonly placeholder=""></textarea> </div>
                                         </div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label">Contract Date</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" id="contract_date" class="form-control readonly" placeholder="" readonly> </div>
                                         </div>
                                </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Perihal</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <textarea height="2" type="text" id="perihal" class="form-control readonly" readonly placeholder=""> </textarea></div>
                                </div>
                            </div>

                        </div>

                        </div>
                        </div>
                        <div class="tab-pane fade" id="tab_1_2">
                        <form class="form-horizontal" role="form" id="myForm1"  >
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Signer</label>
                                <div class="col-md-6">
                                  <?php echo buatcombo2($nama = 'signer',
                                                        $id= 'signer',
                                                        $table= "invoice.parameter_invoice",
                                                        $field= 'value',
                                                        $pk = 'param_id',
                                                        $kondisi = array("name" => "SIGNER"),
                                                        $required ='N',
                                                        $default =''
                                                    ); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">UP</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" name="up" class="form-control" placeholder=""> </div>
                                        <input type="hidden" id="account_num" name="account_num" class="form-control" placeholder="">
                                        <input type="hidden" id="periode" name="periode" class="form-control" placeholder="">
                                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                         </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank Account</label>
                                <div class="col-md-6">
                                   <?php echo buatcombo2($nama = 'bank',
                                                        $id= 'bank',
                                                        $table= "invoice.parameter_invoice",
                                                        $field= 'value',
                                                        $pk = 'param_id',
                                                        $kondisi = array("name" => "BANK_ACCOUNT"),
                                                        $required ='N',
                                                        $default =''
                                                    ); ?>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label">Invoice Date</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" name="inv_date" class="form-control datepicker" placeholder=""> </div>
                                         </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contract No</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <textarea type="text" name="contract_no" class="form-control" placeholder=""></textarea> </div>
                                         </div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label">Contract Date</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" name="contract_date" class="form-control datepicker" placeholder=""> </div>
                                         </div>
                                </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Perihal</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <textarea height="2" type="text" name="perihal" class="form-control" placeholder=""> </textarea></div>
                                </div>
                            </div>
                            <div class="form-group">
                             <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                             </div>

                        </div>

                    </form>
                        </div>

                    </div>
                    </div>

                 </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END Edit -->
<!-- END Edit -->

<script>

 $(document).ready(function(){

    $("#myForm1").on('submit', (function (e) {
          e.preventDefault();
          var data = new FormData(this);

          $.ajax({
            type: 'POST',
            dataType: "json",
            url: '<?php echo WS_JQGRID."invoice.invoice_controller/UpdDataInv"; ?>',
            data: data,
            // timeout: 10000,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function(response) {
              if(response.success) {

                  swal({title: 'Info', text: response.message, html: true, type: "info"});

              }else{
                  swal({title: 'Attention', text: response.message, html: true, type: "warning"});
              }
            }

          });

          return false;
      }));



});

    function get_paramInv(inv_num){

        $.ajax({
            type: "POST",
            url:  '<?php echo WS_JQGRID . "invoice.invoice_controller/getDataParam"; ?>',
            data: { invoice_num:inv_num },
            success: function (data) {
                  data = JSON.parse(data);
                  setDataParam(data.item[0]);
                }
             });

    }

    function setDataParam(data){
        $('#signer').val(data.signer);
        $('#up').val(data.up);
        $('#ba').val(data.bank);
        $('#perihal').val(data.perihal);
        $('#inv_date').val(data.tgl2);
        $('#contract_no').val(data.redaksi);
        //$('#contract_no').val(data.contract_no);
        $('#contract_date').val(data.contract_date);
    }

    function openEdit(account_num, periode, account_name, inv_num){
        $('#modalEditSigner').modal({backdrop: 'static'});
        $('#MDesc').html('Account : <b>'+ account_num +' - '+periode+ ' | '+ account_name+ '</b>');
        $('#account_num').val(account_num);
        $('#periode').val(periode);
        get_paramInv(inv_num);
    }

    $(document).ready(function(){
         $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            // defaultDate: new Date()
        });


    });


    jQuery(function ($) {
        var grid_selector = "#grid-table-account";
        var pager_selector = "#grid-pager-account";

        jQuery("#grid-table-account").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                /*{
                    label: 'Action',
                    name: 'address',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },*/
                {label: 'Action', name: ' ', width: 150,  sortable:false,  align:"center", editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<button type="button" class="btn btn-xs btn-primary" title="print" onclick="printInvoice(\''+rowObject.account_num+'\',\''+rowObject.bill_prd+'\')"><i class="fa fa-print"></i></button> '+ '<button type="button" class="btn btn-xs btn-default" title="Edit Data" onclick="openEdit(\''+rowObject.account_num+'\',\''+rowObject.bill_prd+'\', \''+rowObject.account_name+'\', \''+rowObject.invoice_num+'\')"><i class="fa fa-edit"></i></button>';
                    }
                },
                {
                    label: 'Printed',
                    name: 'print_seq',
                    width: 75,
                    align: 'center',
                    hidden: false
                },
                {
                    label: 'Customer Ref',
                    name: 'customer_ref',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                 {
                    label: 'Customer Name',
                    name: 'address_name',
                    hidden: false,
                    width: 300,
                    align: 'left'
                },
                 {
                    label: 'Account Number',
                    name: 'account_num',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Account Name',
                    name: 'account_name',
                    hidden: false,
                    width: 300,
                    align: 'left'
                },
                {
                    label: 'Periode',
                    name: 'bill_prd',
                    hidden: false
                },
                {
                    label: 'Amount',
                    name: 'invoice_mny',
                    align: 'right',
                    formatter :'number',
                    formatoptions: {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'}
                },
                {
                    label: 'PPN',
                    name: 'invoice_tax',
                    hidden: false,
                    width: 180,
                    align: 'right',
                    formatter :'number',
                    formatoptions: {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'}
                },
                {
                    label: 'Total Amount',
                    name: 'tot_bill',
                    hidden: false,
                    width: 180,
                    align: 'right',
                    formatter :'number',
                    formatoptions: {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'}
                }

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            //multiSort:true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/
                /*var celValue = $('#grid-table-account').jqGrid('getCell', rowid, 'account_num');
                var grid_id = $("#grid-table-billing");
                if (rowid != null) {
                    grid_id.jqGrid('setGridParam', {
                        url: "<?php echo WS_JQGRID."invoice.invoice_controller/readDataParameter"; ?>",
                        datatype: 'json',
                        postData: {accountNum: celValue},
                        userData: {row: rowid}
                    });
                    grid_id.jqGrid('setCaption', 'Invoice Data For Account :: ' + celValue);
                    $("#grid-table-billing").trigger("reloadGrid");
                }

                responsive_jqgrid('#grid-table-billing', '#grid-table-billingPager');*/

            },
            sortorder: '',
            pager: '#grid-pager-account',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if (response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                responsive_jqgrid(grid_selector, pager_selector);
            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID . "invoice.invoice_controller/crud"; ?>',
            caption: "Invoice "

        });

        /*jQuery("#grid-table-account").jqGrid('filterToolbar', { stringResult: true,
                                                                searchOnEnter: true,
                                                                defaultSearch: "cn" ,
                                                                //searchOperators : true
                                                               });*/

        jQuery('#grid-table-account').jqGrid('navGrid', '#grid-pager-account',
            {   //navbar options
                edit: false,
                excel: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape: true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }
                    return [true, "", response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd: true,
                closeOnEscape: true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();


                    return [true, "", response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }
                    return [true, "", response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);
                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
            )
       /*     .navButtonAdd('#grid-pager-account', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: toExcelAccount,
                id: "excel"
            }
            );*/


    });

     jQuery(function ($) {
        var grid_selector = "#grid-table-billing";
        var pager_selector = "#grid-pager-billing";

        jQuery("#grid-table-billing").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/readDataParameter"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                 {
                    label: 'Name',
                    name: 'name',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Data',
                    name: 'value',
                    hidden: false,
                    width: 300,
                    align: 'left'
                }

            ],
            height: '100%',
            autowidth: false,
            viewrecords: true,
            rowNum: 10,
            rowList: [10, 20, 50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder: '',
            pager: '#grid-pager-billing',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if (response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                responsive_jqgrid(grid_selector, pager_selector);
            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID . "invoice.invoice_controller/crud"; ?>',
            caption: "Invoice Data "

        });

        jQuery("#grid-table-billing").jqGrid('filterToolbar', { stringResult: true,
                                                                searchOnEnter: true,
                                                                defaultSearch: "cn"
                                                               });

        jQuery('#grid-table-billing').jqGrid('navGrid', '#grid-pager-billing',
            {   //navbar options
                edit: false,
                excel: false,
                editicon: 'fa fa-pencil blue bigger-120',
                add: false,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: false,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape: true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }
                    return [true, "", response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd: true,
                closeOnEscape: true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);
                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();


                    return [true, "", response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function (form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit: function (response, postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if (response.success == false) {
                        return [false, response.message, response.responseText];
                    }
                    return [true, "", response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);
                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
            )

    });


    function toExcelAccount() {
        // alert("Convert to Excel");

        var url = "<?php echo WS_JQGRID . "account.account_controller/excelAccountList/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&_search=" + $("#grid-table-account").getGridParam("postData")._search;
        url += "&searchField=" + $("#grid-table-account").getGridParam("postData").searchField;
        url += "&searchOper=" + $("#grid-table-account").getGridParam("postData").searchOper;
        url += "&searchString=" + $("#grid-table-account").getGridParam("postData").searchString;
        window.location = url;
    }

    function printInvoice(acc, prd){
        url = '<?php echo base_url(); ?>'+'pdf/invoice/'+acc+'/'+prd+'/0';
        openInNewTab(url);
        //http://127.0.0.1/telpro/pdf/invoice/ACC0001/201701/0
    }
    function openInNewTab(url) {
      var win = window.open(url, '_blank');
      win.focus();
    }

    $('#cari_account').click(function () {
            alert();
            var myGrid = jQuery("#grid-table-account").jqGrid({
                url: '<?php echo WS_JQGRID . "account.account_controller/crud"; ?>',
                postData: {
                    account_number: function () {
                        return jQuery("#kata_kunci").val();
                    }
                }
                // ...
            });
            var myReload = function () {
                myGrid.trigger('reloadGrid');
            };
            var keyupHandler = function (e, refreshFunction, obj) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 33 /*page up*/ || keyCode === 34 /*page down*/ ||
                    keyCode === 35 /*end*/ || keyCode === 36 /*home*/ ||
                    keyCode === 38 /*up arrow*/ || keyCode === 40 /*down arrow*/) {

                    if (typeof refreshFunction === "function") {
                        refreshFunction(obj);
                    }
                }
            };
            $("#kata_kunci").change(myReload).keyup(function (e) {
                keyupHandler(e, myReload, this);
            })
        }
    )

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>
    $("#btn-add-account").click(function () {
        loadContentWithParams('account.add_account', {});
    });

</script>
