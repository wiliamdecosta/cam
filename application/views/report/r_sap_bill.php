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
            <span>Sap Bill</span>
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
                    <span class="caption-subject font-red bold uppercase"> List Of Sap Bill
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
            <div class="row">
                <div class="col-md-12 green">
                    <div class="form-group col-md-7">
                        <label class="control-label col-md-2">Filter File</label>
                        <div class="col-md-4">
                            <select class="form-control" name="in_generated" id="in_generated">
                                <option value="ungenerated">Ungenerated File</option>
                                <option value="generated">Generated File</option>
                            </select>
                        <span class="help-block">
                        </span>
                        </div>
                    </div><br><br>
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
                    </div><br><br><br><br>
                    
                    <table id="grid-table-sap-bill"></table>
                    <div id="grid-pager-sap-bill"></div>
                </div>
            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table-sap-bill";
        var pager_selector = "#grid-pager-sap-bill";

        jQuery("#grid-table-sap-bill").jqGrid({
            url: '<?php echo WS_JQGRID . "report.r_sap_bill_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {
                    label: 'Journal No',
                    name: 'journal_no',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'File Name',
                    name: 'file_name',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'Line Item',
                    name: 'line_item',
                    hidden: false,
                    width: 100,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'CO Code',
                    name: 'co_code',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'Doc Type',
                    name: 'doc_type',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'Periode',
                    name: 'period',
                    width: 100,
                    align: 'left',
                    hidden: false,
                    sorttype :'number'
                },
                {
                    label: 'Curr',
                    name: 'curr',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Profit Center',
                    name: 'profit_center',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Reference',
                    name: 'reference',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'Doc Header',
                    name: 'doc_header',
                    width: 250,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Doc Date',
                    name: 'doc_date',
                    hidden: false,
                    width: 100,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'Post Date',
                    name: 'post_date',
                    hidden: false,
                    width: 100,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'Post Key',
                    name: 'post_key',
                    hidden: false,
                    width: 150,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'Customer GL',
                    name: 'customer_gl',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'BA',
                    name: 'ba',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'Cost Center',
                    name: 'cost_center',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Profit Center',
                    name: 'profit_center',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Activity Type',
                    name: 'activity_type',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Assignment',
                    name: 'assignment',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Text',
                    name: 'text',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'Amount Doc',
                    name: 'amount_doc',
                    hidden: false,
                    width: 200,
                    align: 'left'
                },
                {
                    label: 'Amount Local',
                    name: 'amount_local',
                    hidden: false,
                    width: 200,
                    align: 'right',
                    sorttype :'number'
                },
                {
                    label: 'Cust GL Type',
                    name: 'cust_gl_type',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'D_C',
                    name: 'd_c',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Trade Partner',
                    name: 'trade_partner',
                    hidden: false,
                    width: 250,
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
            pager: '#grid-pager-sap-bill',
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
            //editurl: '<?php echo WS_JQGRID . "report.r_sap_bill_controller/read"; ?>',
            caption: "Sap Bill"

        });

        jQuery('#grid-table-sap-bill').jqGrid('navGrid', '#grid-pager-sap-bill',
            {   //navbar options
                excel: false,
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
            .navButtonAdd('#grid-pager-sap-bill', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: toExcel,
                id: "excel"
            });
            /*.navButtonAdd('#grid-pager-sap-bill', {
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

    function toExcel() {
        // alert("Convert to Excel");

        var url = "<?php echo WS_JQGRID . "report.r_sap_bill_controller/excel/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&_search=" + $("#grid-table-sap-bill").getGridParam("postData")._search;
        url += "&searchField=" + $("#grid-table-sap-bill").getGridParam("postData").searchField;
        url += "&searchOper=" + $("#grid-table-sap-bill").getGridParam("postData").searchOper;
        url += "&searchString=" + $("#grid-table-sap-bill").getGridParam("postData").searchString;
        url += "&periode=" + $("#grid-table-sap-bill").getGridParam("postData").periode;
        window.location = url;
        
    }
    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>


    $('.datepicker1').datetimepicker({
        format: 'YYYYMM',
        // defaultDate: new Date()
    });

    $("#btn-search").on('click', function() {
        var periode = $('#in_Periode').val();
        // alert(periode);
        $('#grid-table-sap-bill').jqGrid('setGridParam', {
            url: '<?php echo WS_JQGRID . "report.r_sap_bill_controller/read"; ?>',
            postData: {periode: periode}
        });

        $('#grid-table-sap-bill').jqGrid('setCaption', 'Sap Bill :: ' + periode);
        $("#grid-table-sap-bill").trigger("reloadGrid");
    });

    $('#in_generated').change(function(){
        var isgenerate = $('#in_generated option:selected').val();
        var periode = $('#in_Periode').val();
        //alert(filter);
        if(isgenerate == 'ungenerated'){
            $('#excel').css('display','block');
        }else if(isgenerate == 'generated'){
            $('#excel').css('display','none');
        }

        $('#grid-table-sap-bill').jqGrid('setGridParam', {
            url: '<?php echo WS_JQGRID . "report.r_sap_bill_controller/read"; ?>',
            postData: {periode: periode, isgenerate : isgenerate}
        });

        $('#grid-table-sap-bill').jqGrid('setCaption', 'Sap Bill :: ' + periode);
        $("#grid-table-sap-bill").trigger("reloadGrid");

    });

</script>