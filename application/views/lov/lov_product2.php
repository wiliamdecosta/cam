<div id="modal_lov_product" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Data Product</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_product_id_val" value="" />
            <input type="hidden" id="modal_lov_product_code_val" value="" />

            <!-- modal body -->
            <div class="modal-body" style="height:300px; overflow-y: scroll;">
                <div>
                  <button type="button" class="btn btn-sm btn-success" id="modal_lov_product_btn_blank">
                    <span class="fa fa-pencil-square-o bigger-110" aria-hidden="true"></span> BLANK
                  </button>
                </div>
                <div class="space-4"></div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="grid-table"></table>
                    </div>
                </div>
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    $(function($) {
        $("#modal_lov_product_btn_blank").on('click', function() {
            $("#"+ $("#modal_lov_product_id_val").val()).val("");
            $("#"+ $("#modal_lov_product_code_val").val()).val("");
            $("#modal_lov_product").modal("toggle");
        });
    });

    function modal_lov_product_show(the_id_field, the_code_field, parent_product_id) {
        modal_lov_product_set_field_value(the_id_field, the_code_field);
        $("#modal_lov_product").modal({backdrop: 'static'});
        modal_lov_product_prepare_table(parent_product_id);
    }


    function modal_lov_product_set_field_value(the_id_field, the_code_field) {
         $("#modal_lov_product_id_val").val(the_id_field);
         $("#modal_lov_product_code_val").val(the_code_field);
    }

    function modal_lov_product_set_value(the_id_val, the_code_val) {
         $("#"+ $("#modal_lov_product_id_val").val()).val(the_id_val);
         $("#"+ $("#modal_lov_product_code_val").val()).val(the_code_val);
         $("#modal_lov_product").modal("toggle");

         $("#"+ $("#modal_lov_product_id_val").val()).change();
         $("#"+ $("#modal_lov_product_code_val").val()).change();
    }

    function modal_lov_product_prepare_table(parent_product_id) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."param.portofolio_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_portofolio_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Portofolio',name: 'portofolio_code',width: 150, align: "left",editable: true}
            ],
            height: '100%',
            autowidth: false,
            width:650,
            viewrecords: true,
            rowNum: 50,
            rownumbers: false, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            pgbuttons : false,
            viewrecords : false,
            pgtext : "",
            pginput : false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                responsive_jqgrid('grid-table','');
            },
            caption: "Product",
            subGrid: true, // set the subGrid property to true to show expand buttons for each row
            subGridRowExpanded: showProductFamily, // javascript function that will take care of showing the child grid
            subGridWidth : 40,
            subGridOptions : {
                reloadOnExpand :false,
                selectOnExpand : false,
                plusicon : "fa fa-folder center bigger-120 green",
                minusicon  : "fa fa-folder-open center bigger-120 green"
                // openicon : "ace-icon fa fa-chevron-right center orange"
            }

        });
    }

    function showProductFamily(parentRowID, parentRowKey) {
        var childGridID = parentRowID + "_product_family_table";

        // add a table and pager HTML elements to the parent grid row - we will render the child grid here
        $('#' + parentRowID).append('<table id="' + childGridID + '"></table>');

        $("#" + childGridID).jqGrid({
            url: '<?php echo WS_JQGRID."param.portofolio_controller/readProductFamily"; ?>',
            mtype: "POST",
            datatype: "json",
            page: 1,
            rowNum: 50,
            height: 'auto',
            autowidth: true,
            rownumbers: false, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            sortorder:'',
            postData:{ p_portofolio_id: encodeURIComponent(parentRowKey) },
            colModel: [
                {label: 'ID', name: 'product_family_id', key: true, width:125, sorttype:'number', editable: true, hidden:true },
                {label: 'Product Family', name: 'product_family_name', width: 150, align: "left", editable: false}
            ],
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    showBootDialog(true, BootstrapDialog.TYPE_WARNING, 'Attention', response.message);
                }
            },
            subGrid: true, // set the subGrid property to true to show expand buttons for each row
            subGridRowExpanded: showProduct, // javascript function that will take care of showing the child grid
            subGridWidth : 40,
            subGridOptions : {
                reloadOnExpand :false,
                selectOnExpand : false,
                plusicon : "fa fa-folder center bigger-120 green",
                minusicon  : "fa fa-folder-open center bigger-120 green"
                // openicon : "ace-icon fa fa-chevron-right center orange"
            },
            pgbuttons: false,     // disable page control like next, back button
            pgtext: null,         // disable pager text like 'Page 0 of 10'
            viewrecords: false    // disable current view record text like 'View 1-10 of 100'
        });
    }

    function showProduct(parentRowID, parentRowKey) {
        var childGridID = parentRowID + "_product_table";

        // add a table and pager HTML elements to the parent grid row - we will render the child grid here
        $('#' + parentRowID).append('<table id="' + childGridID + '"></table>');

        $("#" + childGridID).jqGrid({
            url: '<?php echo WS_JQGRID."param.portofolio_controller/readProduct"; ?>',
            mtype: "POST",
            datatype: "json",
            page: 1,
            rowNum: 50,
            height: 'auto',
            autowidth: true,
            rownumbers: false, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            sortorder:'',
            postData:{ product_family_id: encodeURIComponent(parentRowKey) },
            colModel: [
                {label: 'ID', name: 'product_id', key: true, width:125, sorttype:'number', editable: true, hidden:true },
                {label: 'Pilih',name: '',width:20 , align: "center",editable: false,
                    formatter:function(cellvalue, options, rowObject) {
                        var val = rowObject['product_id'];
                        var name = rowObject['product_name'];
                        return '<a class="btn btn-danger btn-xs" href="#" onclick="modal_lov_product_set_value(\''+ val +'\', \''+ val + '-' + name +'\')"><i class="fa fa-pencil-square-o"></i>';
                    }
                },
                {label: 'Product', name: 'product_name', width: 150, align: "left", editable: false}
            ],
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    showBootDialog(true, BootstrapDialog.TYPE_WARNING, 'Attention', response.message);
                }
            },
            pgbuttons: false,     // disable page control like next, back button
            pgtext: null,         // disable pager text like 'Page 0 of 10'
            viewrecords: false    // disable current view record text like 'View 1-10 of 100'
        });
    }

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".modal-body").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }
</script>