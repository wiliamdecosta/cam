<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Detail Product</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Product </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Status </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Finance </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong> Attributes </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-5">
                        <i class="blue"></i>
                        <strong> Service Addresses </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-6">
                        <i class="blue"></i>
                        <strong> Price Plan </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-7">
                        <i class="blue"></i>
                        <strong> Override Price </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-xs-12">
                   <table id="grid-table"></table>
                   <div id="grid-pager"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tab-1').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.detail_product", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
    $('#tab-2').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.status", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
    $('#tab-3').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.finance", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
    $('#tab-4').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.attributes", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
    
    $('#tab-5').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.service_address", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
    $('#tab-6').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.price_plan", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });
</script>
<script type="text/javascript">
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_override_price"; ?>',
            datatype: "json",
            mtype: "POST",
            postData: { 
                customer_ref: "<?php echo $this->input->post('customer_ref');?>",
                product_seq : "<?php echo $this->input->post('product_seq');?>"
            },
            colModel: [
                {label: 'Start Date',name: 'start_dat',width: 150, align: "left",editable: false },
                {label: 'End Date',name: 'end_dat',width: 150, align: "left",editable: false },
                {label: 'Initiation',name: 'initiation',width: 200, align: "left",editable: false },
                {label: 'Periodic',name: 'periodic',width: 200, align: "left",editable: false },
                {label: 'Termination',name: 'termination',width: 200, align: "left",editable: false },
                {label: 'Suspension',name: 'suspension',width: 200, align: "left",editable: false },
                {label: 'Suspension_periodic',name: 'suspension_periodic',width: 200, align: "left",editable: false },
                {label: 'Reactivation',name: 'reactivation',width: 200, align: "left",editable: false },
                {label: 'Notes_txt',name: 'notes_txt',width: 200, align: "left",editable: false }            
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 5,
            rowList: [5, 10, 20],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager' ,
            jsoncruder: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '',
            caption: "Status"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
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
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
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
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
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
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();

                    return [true,"",response.responseText];
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
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
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
        );

    });

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }
</script>
