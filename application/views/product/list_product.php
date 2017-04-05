<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Product</span>
             <i class="fa fa-circle"></i>
        </li>
         <li>
            <span>List Product</span>
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
                    <span class="caption-subject font-red bold uppercase"> List Product
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
            <button class="btn btn-success" id="detail-prod" disabled=""> <i class="fa fa-newspaper-o"></i>Detail Product</button>
            <button class="btn btn-warning" id="modify-prod" disabled=""> <i class="fa fa-pencil-square-o"></i>Modify Product</button>
            <button class="btn btn-primary" id="suspend-prod" disabled=""> <i class="fa fa-tasks"></i>Suspend</button>
            <button class="btn btn-default" id="reactivate-prod" disabled=""> <i class="fa fa-toggle-on"></i>Reactivate</button>
            <button class="btn btn-info" id="terminate-prod" disabled=""> <i class="fa fa-toggle-off"></i>Terminate</button>
            <button class="btn btn-danger" id="delete-prod" disabled=""> <i class="fa fa-times"></i>Delete</button>

            <div class="row">
                                <div class="col-md-12 green">
                                    <table id="grid-table-account"></table>
                                    <div id="grid-pager-account"></div>
                                </div>
                            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>
<script>
    $('#delete-prod').on('click', function(event){
        event.stopPropagation();
        swal({
              title: "Are you sure?",
              text: "You want to delete this product?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel!",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    var grid = $('#grid-table-account');
                    var rowid = grid.jqGrid ('getGridParam', 'selrow');
                    var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
                    var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');
                    var accnum = grid.jqGrid ('getCell', rowid, 'account_num');

                     $.ajax({
                        url: "<?php echo site_url('product/delete_product');?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            product_seq : prodSeq,
                            customer_ref: custRef,
                            account_num : accnum
                        },
                        success: function (data) {
                            if(data.status == "COMPLETED"){    
                                swal('',data.status);

                                setTimeout(function(){
                                     loadContentWithParams('product.list_product',{});
                                }, 3000);

                            
                            }else{
                                swal('',data.status);
                            }

                        },
                        error: function (xhr, status, error) {
                            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                        }
                    });
            } //end confirm
        });
    });

    $('#detail-prod').on('click', function(event){
        event.stopPropagation();
        var grid = $('#grid-table-account');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
        var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');

        if(rowid == null) {
            swal('Informasi','Silahkan pilih salah satu product','info');
            return false;
        }

        loadContentWithParams("product.detail_product", {
            customer_ref: custRef,
            product_seq : prodSeq
        });

    });

    $('#modify-prod').on('click', function(event){
        event.stopPropagation();
        var grid = $('#grid-table-account');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
        var accnum = grid.jqGrid ('getCell', rowid, 'account_num');
        var prodid = grid.jqGrid ('getCell', rowid, 'product_id');
        var parentprodid = grid.jqGrid ('getCell', rowid, 'parent_product_seq');
        var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');

        if(rowid == null) {
            swal('Informasi','Silahkan pilih salah satu product','info');
            return false;
        }

        loadContentWithParams("product.modify_product", {
            customer_ref: custRef,
            account_num : accnum,
            product_id : prodid,
            parent_product_id : parentprodid,
            product_seq : prodSeq
        });

    });

    $('#reactivate-prod').on('click', function(event){
        event.stopPropagation();
        var grid = $('#grid-table-account');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
        var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');
        var accnum = grid.jqGrid ('getCell', rowid, 'account_num');
        var prodLbl = grid.jqGrid ('getCell', rowid, 'product_label');

        if(rowid == null) {
            swal('Informasi','Silahkan pilih salah satu product','info');
            return false;
        }

        loadContentWithParams("product.reactivate_product", {
            customer_ref: custRef,
            product_seq : prodSeq,
            account_num : accnum,
            product_label : prodLbl
        });

    });

    $('#terminate-prod').on('click', function(event){
        event.stopPropagation();
        var grid = $('#grid-table-account');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
        var accnum = grid.jqGrid ('getCell', rowid, 'account_num');
        var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');
        var prodLbl = grid.jqGrid ('getCell', rowid, 'product_label');

        if(rowid == null) {
            swal('Informasi','Silahkan pilih salah satu product','info');
            return false;
        }

        loadContentWithParams("product.terminate_product", {
            customer_ref: custRef,
            account_num : accnum,
            product_seq : prodSeq
        });

    });

    $('#suspend-prod').on('click', function(event){
        event.stopPropagation();
        var grid = $('#grid-table-account');
        var rowid = grid.jqGrid ('getGridParam', 'selrow');
        var custRef = grid.jqGrid ('getCell', rowid, 'customer_ref');
        var accnum = grid.jqGrid ('getCell', rowid, 'account_num');
        var prodSeq = grid.jqGrid ('getCell', rowid, 'product_seq');
        

        if(rowid == null) {
            swal('Informasi','Silahkan pilih salah satu product','info');
            return false;
        }

        loadContentWithParams("product.suspend_product", {
            customer_ref: custRef,
            account_num : accnum,
            product_seq : prodSeq
        });

    });


    jQuery(function ($) {
        var grid_selector = "#grid-table-account";
        var pager_selector = "#grid-pager-account";

        jQuery("#grid-table-account").jqGrid({
            url: '<?php echo WS_JQGRID . "product.product_controller/read"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {
                    label: 'Account Number',
                    name: 'account_num',
                    width: 140,
                    align: 'left',
                    hidden: false
                },/*
                {
                    label: 'Action',
                    name: 'action',
                    hidden: false,
                    width: 150,
                    align: 'right'

                    ACCOUNT_NUM, 
                                ACCOUNT_NAME , 
                                customer_ref , 
                                product_seq , 
                                product_name , 
                                product_label , 
                                start_dat ,  
                                end_dat ,          
                                cust_order_num ,  
                                currency_code ,  
                                install ,  
                                abonemen ,  
                                product_id , 
                                parent_product_seq , 
                                kontrak , 
                                kontrak_start_dat ,  
                                kontrak_end_dat ,  
                                ba ,  
                                profit_center

                },*/
                {
                    label: 'Customer Ref',
                    name: 'customer_ref',
                    hidden: false,
                    width: 120,
                    align: 'left'
                },
                {
                    label: 'Product Seq',
                    name: 'product_seq',
                    width: 100,
                    hidden: false
                },
                {
                    label: 'Product Name',
                    name: 'product_name',
                    width: 200,
                    hidden: false
                },
                {
                    label: 'Product Label',
                    name: 'product_label',
                    hidden: false,
                    width: 170,
                    align: 'left'
                },
                {
                    label: 'Start Date',
                    name: 'start_dat',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'End Date',
                    name: 'end_dat',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'Customer Order Num',
                    name: 'cust_order_num',
                    hidden: false,
                    width: 170,
                    align: 'left'
                },
                {
                    label: 'Currency',
                    name: 'currency_code',
                    hidden: false,
                    width: 100,
                    align: 'left'
                },
                {
                    label: 'Install',
                    name: 'install',
                    hidden: false,
                    width: 150,
                    align: 'right',
                    formatter :'number', 
                    formatoptions: {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'}
                },
                {
                    label: 'Abonemen',
                    name: 'abonemen',
                    hidden: false,
                    width: 150,
                    align: 'right', 
                    formatter :'number', 
                    formatoptions: {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'}
                },
                {
                    label: 'Product ID',
                    name: 'product_id',
                    hidden: true,
                    width: 200,
                    align: 'left'
                },
                {
                    label: 'Parent Product Seq',
                    name: 'parent_product_seq',
                    hidden: false,
                    width: 150,
                    align: 'left'
                },
                {
                    label: 'Contract Start Date',
                    name: 'kontrak_start_dat',
                    hidden: false,
                    width: 120,
                    align: 'left'
                },
                {
                    label: 'Contract End Date',
                    name: 'kontrak_end_dat',
                    hidden: false,
                    width: 140,
                    align: 'left'
                },
                {
                    label: 'Business Area',
                    name: 'ba',
                    hidden: false,
                    width: 140,
                    align: 'left'
                },
                {
                    label: 'Profit Center',
                    name: 'profit_center',
                    hidden: false,
                    width: 100,
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
                
                $('#detail-prod').prop( "disabled", false );
                $('#modify-prod').prop( "disabled", false );
                $('#reactivate-prod').prop( "disabled", false );
                $('#suspend-prod').prop( "disabled", false );
                $('#terminate-prod').prop( "disabled", false );
                $('#delete-prod').prop( "disabled", false );

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
            editurl: '<?php echo WS_JQGRID . "produuct.product_controller/crud"; ?>',
            caption: "Product "

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
        $(grid_selector).jqGrid('setGridWidth', $(".form-body").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>
    $("#btn-add-account").click(function () {
        loadContentWithParams('account.add_account', {});
    });

</script>