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
            <span>BC per Portofolio Product</span>
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
                    <span class="caption-subject font-red bold uppercase"> List Of BC per Portofolio Product
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
                    <table id="grid-table-billing-complete-per-portofolio-product"></table>
                    <div id="grid-pager-billing-complete-per-portofolio-product"></div>
                </div>
            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        var grid_selector = "#grid-table-billing-complete-per-portofolio-product";
        var pager_selector = "#grid-pager-billing-complete-per-portofolio-product";

        jQuery("#grid-table-billing-complete-per-portofolio-product").jqGrid({
            url: '<?php echo WS_JQGRID . "report.r_bc_per_portofolio_product_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {
                    label: 'Area',
                    name: 'area',
                    width: 300,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'PORTOFOLIO',
                    name: 'portofolio',
                    width: 300,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Jumlah BC',
                    name: 'jml_bc',
                    hidden: false,
                    width: 270,
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
            pager: '#grid-pager-billing-complete-per-portofolio-product',
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
            //editurl: '<?php echo WS_JQGRID . "report.r_bc_per_portofolio_product_controller/read"; ?>',
            caption: "Billing Complete per Portofolio Product"

        });

        jQuery('#grid-table-billing-complete-per-portofolio-product').jqGrid('navGrid', '#grid-pager-billing-complete-per-portofolio-product',
            {   //navbar options
                edit: false,
                excel: true,
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
            .navButtonAdd('#grid-pager-billing-complete-per-portofolio-product', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: toExcelAccount,
                id: "excel"
            });


    });

    function toExcelAccount() {
        // alert("Convert to Excel");

        var url = "<?php echo WS_JQGRID . "report.r_bc_per_portofolio_product_controller/excelAccountList/?"; ?>";
        url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
        url += "&_search=" + $("#grid-table-billing-complete-per-portofolio-product").getGridParam("postData")._search;
        url += "&searchField=" + $("#grid-table-billing-complete-per-portofolio-product").getGridParam("postData").searchField;
        url += "&searchOper=" + $("#grid-table-billing-complete-per-portofolio-product").getGridParam("postData").searchOper;
        url += "&searchString=" + $("#grid-table-billing-complete-per-portofolio-product").getGridParam("postData").searchString;
        url += "&periode=" + $("#grid-table-billing-complete-per-portofolio-product").getGridParam("postData").periode;
        window.location = url;
    }

    $('#cari_account').click(function () {
            alert();
            var myGrid = jQuery("#grid-table-billing-complete-per-portofolio-product").jqGrid({
                url: '<?php echo WS_JQGRID . "account.account_controller/read"; ?>',
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
    // $("#btn-add-account").click(function () {
    //     loadContentWithParams('account.add_account', {});
    // });

    /*$.ajax({
        url: "<?php echo base_url().'home/get_date/'; ?>" ,
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
        //alert(periode);
        $('#grid-table-billing-complete-per-portofolio-product').jqGrid('setGridParam', {
            url: '<?php echo WS_JQGRID . "report.r_bc_per_portofolio_product_controller/read"; ?>',
            postData: {periode: periode}
        });

        $('#grid-table-billing-complete-per-portofolio-product').jqGrid('setCaption', 'Billing Complete Area :: ' + periode);
        $("#grid-table-billing-complete-per-portofolio-product").trigger("reloadGrid");
    });

</script>