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
            <span>Detail Tagihan</span>
             <i class="fa fa-circle"></i>
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
                    <span class="caption-subject font-red bold uppercase"> List Of Detail Tagihan
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
            <div class="row">
                <div class="col-md-12 green">
                    <div class="form-group col-md-7" style="text-align: left;">
                        <label class="control-label col-md-2">Periode</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker1" name="in_Periode" id="in_Periode">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-search">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                        <label class="col-md-2 control-label"> YYYYMM</label>
                    </div><br><br>
                    <table id="grid-table-detail-tagihan"></table>
                    <div id="grid-pager-detail-tagihan"></div>
                </div>
            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table-detail-tagihan";
        var pager_selector = "#grid-pager-detail-tagihan";

        jQuery("#grid-table-detail-tagihan").jqGrid({
            url: '<?php echo WS_JQGRID . "report.r_detail_tagihan_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {
                    label: 'Customer Ref',
                    name: 'customer_ref',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Account Num',
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
                    label: 'Invoice Num',
                    name: 'invoice_num',
                    hidden: false,
                    width: 150,
                    align: 'left'
                }, 
                {
                    label: 'NPWP',
                    name: 'npwp',
                    width: 300,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Revenue Code id',
                    name: 'revenue_code_id',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Product Group',
                    name: 'product_group',
                    hidden: false,
                    width: 300,
                    align: 'left'
                },
                {
                    label: 'Product Name',
                    name: 'product_name',
                    hidden: false,
                    width: 270,
                    align: 'left'
                },//-----
                {
                    label: 'Product Label',
                    name: 'product_label',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Prod Period',
                    name: 'prod_period',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Gl Account',
                    name: 'gl_account',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Curr Type',
                    name: 'curr_type',
                    hidden: false,
                    width: 100,
                    align: 'left'
                }, 
                {
                    label: 'Bill Mny',
                    name: 'bill_mny',
                    width: 150,
                    align: 'right',
                    hidden: false,
                    sorttype :'number'
                },
                {
                    label: 'Installation',
                    name: 'installation',
                    width: 150,
                    align: 'right',
                    hidden: false,
                    sorttype :'number'
                },
                {
                    label: 'Abonemen',
                    name: 'abonemen',
                    hidden: false,
                    width: 150,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'Charge Start Dat',
                    name: 'charge_start_dat',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Cust Order Num',
                    name: 'cust_order_num',
                    hidden: false,
                    width: 150,
                    align: 'left'
                }, 
                /*{
                    label: 'Product Id',
                    name: 'product_id',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Product Seq',
                    name: 'product_seq',
                    width: 100,
                    align: 'left',
                    hidden: false
                },*/
                {
                    label: 'Sap Code Bill',
                    name: 'sap_code_bill',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Sap Code Unbill',
                    name: 'sap_code_unbill',
                    hidden: false,
                    width: 150,
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
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder: '',
            pager: '#grid-pager-detail-tagihan',
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
            //editurl: '<?php echo WS_JQGRID . "report.r_detail_tagihan_controller/read"; ?>',
            caption: "Detail Tagihan"

        });

        jQuery('#grid-table-detail-tagihan').jqGrid('navGrid', '#grid-pager-detail-tagihan',
            {   //navbar options
                excel: true,
                excelicon: 'fa fa-file-excel-o blue bigger-120',
                edit: false,
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
                view: true,
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
            .navButtonAdd('#grid-pager-detail-tagihan', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: toExcelBilCurr,
                id: "excel"
            });
            /*.navButtonAdd('#grid-pager-detail-tagihan', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: toExcelAccount,
                id: "excel"
            });
*/

    });

    function toExcelBilCurr() {
        // alert("Convert to Excel");

        var url = "<?php echo WS_JQGRID . "report.r_detail_tagihan_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&_search=" + $("#grid-table-detail-tagihan").getGridParam("postData")._search;
        url += "&searchField=" + $("#grid-table-detail-tagihan").getGridParam("postData").searchField;
        url += "&searchOper=" + $("#grid-table-detail-tagihan").getGridParam("postData").searchOper;
        url += "&searchString=" + $("#grid-table-detail-tagihan").getGridParam("postData").searchString;
        window.location = url;
    }
    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>

    /*$.ajax({
        url: // echo base_url().'home/get_date/'; ?>" ,
        type: "POST",
        dataType: "json",
        data: {},
        success: function (data) {
            $('.datepicker1').val(data.dates);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });*/

    $('.datepicker1').datetimepicker({
        format: 'YYYYMM',
        // defaultDate: new Date()
    });

    $("#btn-search").on('click', function() {
        var periode = $('#in_Periode').val();
        // alert(periode);
        $('#grid-table-detail-tagihan').jqGrid('setGridParam', {
            url: '<?php echo WS_JQGRID . "report.r_detail_tagihan_controller/read"; ?>',
            postData: {periode: periode}
        });

        $('#grid-table-detail-tagihan').jqGrid('setCaption', 'Detail Tagihan :: ' + periode);
        $("#grid-table-detail-tagihan").trigger("reloadGrid");
    });

</script>