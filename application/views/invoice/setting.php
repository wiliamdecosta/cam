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
            <span>Pooling Invoice</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" > <?php echo ''; ?>
                <i class="fa fa-angle-down"></i>
            </button>
        </div>
    </div>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
<input type="hidden" id="nameParamAdd" >
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
                                <div class="col-md-4 green">
                                    <table id="grid-table-account"></table>
                                    <div id="grid-pager-account"></div>
                                </div>
                                <div class="col-md-8 green">
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
 <div class="modal fade bs-modal-lg" id="modalEditSigner" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <form class="form-horizontal" role="form" id="myForm1" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" name="name" class="form-control" placeholder=""> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Position</label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa fa-"></i>
                                        <input type="text" name="position" class="form-control" placeholder=""> </div>
                                </div>
                            </div>
                             <div class="form-group">
                             <label class="col-md-3 control-label">File</label>
                                <div class="col-md-6">
                             <input type="file" name="file_upload" id="file_upload" />
                               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                             </div>
                             </div>
                             <div class="form-group">
                             <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="" alt="" id="blah"/> </div>
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
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END Edit -->

<!-- Modal Edit  -->
 <div class="modal fade bs-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Invoice Data</h4>
            </div>
            <div class="modal-body"> 
                 <h4 class="modal-title" id="MaccountNum"></h4> 
                 <hr>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END Edit -->
<script>
$(document).ready(function(){

    $("#myForm1").on('submit', (function (e) {
          e.preventDefault();
          var data = new FormData(this);

          $.ajax({
            type: 'POST',
            dataType: "json",
            url: '<?php echo WS_JQGRID."invoice.invoice_controller/uploadSigner"; ?>',
            data: data,
            // timeout: 10000,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function(response) {
              if(response.success) {

                  $('#file_upload').val('');

                  swal({title: 'Info', text: response.message, html: true, type: "info"});

              }else{
                  swal({title: 'Attention', text: response.message, html: true, type: "warning"});
              }
            }

          });

          return false;
      }));



});



function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file_upload").change(function(){
    readURL(this);
});

    jQuery(function ($) {
        var grid_selector = "#grid-table-account";
        var pager_selector = "#grid-pager-account";

        jQuery("#grid-table-account").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/readDataParameter"; ?>',
            datatype: "json",
            mtype: "POST",
            postData:{isHeader:1},
            colModel: [
               
                /*{label: 'Action', name: ' ', width: 100,  sortable:false,  align:"center", editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<button type="button" class="btn btn-xs btn-primary" title="pooling invoice" onclick="showDiskon(\''+rowObject.account_num+'\',\''+rowObject.customer_ref+'\',\''+rowObject.account_name+'\',\''+rowObject.created_date+'\',\''+rowObject.schema_id+'\')"><i class="fa fa-rocket "></i></button>';
                    }
                },*/
                {
                    label: 'Param Name',
                    name: 'name',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                
            ],
            height: '100%',
            autowidth: true,
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

                var celValue = $('#grid-table-account').jqGrid('getCell', rowid, 'name');
                $('#nameParamAdd').val(celValue);
                var grid_id = $("#grid-table-billing");
                if (rowid != null) {
                    grid_id.jqGrid('setGridParam', {
                        url: "<?php echo WS_JQGRID."invoice.invoice_controller/readDataParameter"; ?>",
                        datatype: 'json',
                        postData: {param_name: celValue},
                        userData: {row: rowid}
                    });
                    grid_id.jqGrid('setCaption', 'Data Parameter :: ' + celValue);
                    $("#grid-table-billing").trigger("reloadGrid");
                }

                responsive_jqgrid('#grid-table-billing', '#grid-table-billingPager');
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
            caption: "Parameter "

        });
        
        jQuery("#grid-table-account").jqGrid('filterToolbar', { stringResult: true, 
                                                                searchOnEnter: true, 
                                                                defaultSearch: "cn" 
                                                               });
        
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
 

    });

    jQuery(function ($) {
        var grid_selector = "#grid-table-billing";
        var pager_selector = "#grid-pager-billing";

        jQuery("#grid-table-billing").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/readDataParameter"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'param_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {
                    label: 'Param Data',
                    name: 'value',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Param Data',
                    name: 'description',
                    width: 150,
                    align: 'left',
                    hidden: true
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
            caption: "Data "

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
                del: true,
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
                    /*style_edit_form(form);*/
                     alert(form);
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
            /*.navButtonAdd('#grid-pager-billing', {
                caption: "",
                buttonicon: "fa fa-edit blue bigger-120",
                position: "first",
                title: "Edit",
                cursor: "pointer",
                onClickButton: toExcelAccount,
                id: "addParamInv2"
            })*/
            .navButtonAdd('#grid-pager-billing', {
                caption: "",
                buttonicon: "fa fa-plus green bigger-120",
                position: "first",
                title: "Add Data",
                cursor: "pointer",
                onClickButton: addDataInv,
                id: "addParamInv"
            });
            


    });

    function addDataInv(){
        name = $('#nameParamAdd').val();
        if(name == 'SIGNER'){ // change to dynamic when have time 
            $('#modalEditSigner').modal({backdrop: 'static'});
            $('#MDesc').html(name);
            $("#myForm1").closest('form').find("input[type=text],input[type=file] textarea").val("");
        }else{
            $('#modalEdit').modal({backdrop: 'static'});
            $('#MDesc').html(name);
            $("#myForm1").closest('form').find("input[type=text], textarea").val("");
        }
    }

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
        $(grid_selector).jqGrid('setGridWidth', $(".col-md").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>
    $("#btn-add-account").click(function () {
        loadContentWithParams('account.add_account', {});
    });

</script>