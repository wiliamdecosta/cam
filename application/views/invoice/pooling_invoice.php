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

  <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Pooling Invoice
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
             <form method="post" action="" class="form-horizontal" id="myForm">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-body">
                    <div class="clearfix">
                <div class="clearfix margin-bottom-10"> </div>
                <div class="btn-group btn-group-solid">
                    <button type="button" class="btn red" id="TotalAccount">
                        <i class="fa fa-shield"></i> Total Account  &nbsp; :  &nbsp; &nbsp; <span id="jmlAcc">0</span></button>
                        <input type="hidden" id="rowidData" name="rowidData">
                        <input type="hidden" id="oper" name="oper" value="add">
                        &nbsp;&nbsp;
                    <button type="button" class="btn green" id="StartPooling">
                        <i class="fa fa-rocket"></i> &nbsp; Start Pooling &nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
         </div>
          </form>
             

        <div class="space-4"></div>

            <div class="row">
            <div class="col-md-12 green">
                <table id="grid-table-account"></table>
                <div id="grid-pager-account"></div>
            </div>
            </div>

            <div class="space-4"></div>

            <div class="row">
                <div class="col-md-6 green">
                    <table id="grid-table-billing"></table>
                    <div id="grid-pager-billing"></div>
                </div>
                 <div class="col-md-6 green">
                    
                </div>
            </div>

            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){

        $('#StartPooling').click(function(){

            totalAcc = $('#jmlAcc').html();
            //rowid = totalAcc;
            //account1 = $('#grid-table-account').jqGrid('getCell', rowid, 'account_num');
            data = $('#rowidData').val().split('|');
            if(totalAcc > 0){
                swal({
                  title: "Confirm Pooling Invoice",
                  text: "Total Account : "+totalAcc ,
                  type: "info",
                  showCancelButton: true,
                  confirmButtonColor: "",
                  confirmButtonText: "Yes",
                  cancelButtonText: "No",
                  closeOnConfirm: true,
                  closeOnCancel: true
                },
                function(isConfirm){
                  if (isConfirm) {
                    StartPooling(data);
                  }
                });
            }else{
                swal("Oops !", "Please Choose Account Number !", "info");
            }
            
        });

    });

    function StartPooling(data){

        var items = [];
        var len = data.length;
        for (var i = 0; i < len; i++) {
            items.push({
                account_num: $('#grid-table-account').jqGrid('getCell',  data[i], 'account_num'),
                bill_prd: $('#grid-table-account').jqGrid('getCell',  data[i], 'bill_prd'),
                oper:'add'
            });
        }
        var url = '<?php echo WS_JQGRID."invoice.invoice_controller/crud"; ?>';
        $.ajax({
            type: "POST",
            url: url,
            dataType : 'json',
            data: {items: JSON.stringify(items),oper:'add'},
            success: function(response) {

                if(response.success != true){
                    swal('Warning',response.message,'warning');
                }else{
                    loadContentWithParams('invoice.pooling_invoice',{});
                }

            }
        });
    }

    function loadGridBilling(account_num, periode){
                    
        var celValue = account_num; //$('#grid-table-account').jqGrid('getCell', rowid, 'account_num');
        var prd = periode; //$('#grid-table-account').jqGrid('getCell', rowid, 'bill_prd');
        var grid_id = $("#grid-table-billing");

            grid_id.jqGrid('setGridParam', {
                url: "<?php echo WS_JQGRID."invoice.invoice_controller/readDataBilling"; ?>",
                datatype: 'json',
                postData: {accountNum: celValue, periode:prd}
            });
            grid_id.jqGrid('setCaption', 'Billing Data For Account :: ' + celValue + '|'+prd);
            $("#grid-table-billing").trigger("reloadGrid");

        responsive_jqgrid('#grid-table-billing', '#grid-table-billingPager');

    }
    jQuery(function ($) {
        var grid_selector = "#grid-table-account";
        var pager_selector = "#grid-pager-account";

        jQuery("#grid-table-account").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/readDataRBill"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
               
                {label: 'Billing', name: ' ', width: 50,  sortable:false,  align:"center", editable: false,
                    formatter: function(cellvalue, options, rowObject) {
                        return '<button type="button" class="btn btn-xs btn-primary" title="Billing Data" onclick="loadGridBilling(\''+rowObject.account_num+'\',\''+rowObject.bill_prd+'\')"><i class="fa fa-dollar "></i></button>';
                    }
                },
                {
                    label: 'Customer Ref',
                    name: 'customer_ref',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                 {
                    label: 'Account Number',
                    name: 'account_num',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Account Name',
                    name: 'account_name',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
				 {
                    label: 'Periode',
                    name: 'bill_prd',
                    width: 100,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Bill Number',
                    name: 'invoice_num',
                    hidden: false,
                    width: 120,
                    align: 'left'
                },
                {
                    label: 'Product Group',
                    name: 'product_group',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'Product Name',
                    name: 'product_name',
                    hidden: false,
                    width: 250,
                    align: 'left'
                },
                {
                    label: 'Bill Periode',
                    name: 'bill_prd',
                    hidden: true,
                    width: 250,
                    align: 'left'
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
            multiselect: true,
            shrinkToFit: true,
            multiboxonly: true,
            gridview: true,
            /*beforeSelectRow: function(rowid, e) {
                totalCheck = jQuery('#grid-table-account').jqGrid('getGridParam', 'selarrrow');
                $('#jmlAcc').html(totalCheck.length);
                return false;
            },*/
            onSelectRow: function (rowid, status) {
                /*do something when selected*/

                totalCheck = jQuery('#grid-table-account').jqGrid('getGridParam', 'selarrrow');
                $('#jmlAcc').html(totalCheck.length);
                var str = totalCheck+'';
                var data = str.split(',');
                var str  = '';
                for (var i = data.length - 1; i >= 0; i--) {
                    /*account = $('#grid-table-account').jqGrid('getCell',  data[i], 'account_num');
                    prd = $('#grid-table-account').jqGrid('getCell',  data[i], 'bill_prd');
                    str += account+'-'+prd+'|';*/
                    str += data[i]+'|';
                }
                $('#jmlAcc').html(data.length);
                $('#rowidData').val(str);


               
            },
            onSelectAll : function(rowid, status){
                
                if(status){
                    
                    var str = rowid+'';
                    var data = str.split(',');
                    var str  = '';

                    for (var i = data.length - 1; i >= 0; i--) {
                        /*account = $('#grid-table-account').jqGrid('getCell',  data[i], 'account_num');
                        prd = $('#grid-table-account').jqGrid('getCell',  data[i], 'bill_prd');
                        str += account+'-'+prd+'|';*/
                        str += data[i]+'|';
                    }
                    
                    $('#jmlAcc').html(data.length);
                    $('#rowidData').val(str);

                }else{
                    
                    $('#jmlAcc').html(0);
                    $('#rowidData').val('');

                }
                
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
            caption: "Customer Data "

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
            /*.navButtonAdd('#grid-pager-account', {
                caption: "",
                buttonicon: "fa fa-file-excel-o green bigger-120",
                position: "last",
                title: "Export To Excel",
                cursor: "pointer",
                onClickButton: function({}),
                id: "excel"
            }
            );*/
 

    });

    jQuery(function ($) {
        var grid_selector = "#grid-table-billing";
        var pager_selector = "#grid-pager-billing";

        jQuery("#grid-table-billing").jqGrid({
            url: '<?php echo WS_JQGRID . "invoice.invoice_controller/readDataBilling"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [

               
                 {
                    label: 'Product',
                    name: 'product',
                    width: 150,
                    align: 'left',
                    hidden: false
                },
                {
                    label: 'Value',
                    name: 'value',
                    hidden: false,
                    width: 100,
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
            caption: "Billing Data "

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
        $(grid_selector).jqGrid('setGridWidth', $(".col-md").width());
        $(pager_selector).jqGrid('setGridWidth', parent_column.width());

    }
</script>
<script>
    $("#btn-add-account").click(function () {
        loadContentWithParams('account.add_account', {});
    });

</script>