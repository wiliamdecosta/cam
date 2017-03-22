<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Business Area</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-4">
                    <div class="portlet red box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Business Area Hirarki</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="tree-ba">

                            </div>
                        </div>
                    </div>
                </div>
    <div class="col-md-8">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>

<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."param.business_area_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_business_area_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {label: 'Code',name: 'business_area_code',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 30,
                        maxlength:8
                    }, 
                    editrules: {required: true}
                },
                {label: 'Name',name: 'business_area_name',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 40,
                        maxlength:64
                    },
                    editrules: {required: true}
                },
                {label: 'Business Area Type',name: 'code',width: 150, align: "left",editable: false,
                    editoptions: {
                        size: 40,
                        maxlength:64
                    },
                },
                {label: 'Business Area Type',name: 'p_business_area_type_id',width: 120, align: "left",editable: true,  hidden: true, editrules: {edithidden: true, required: true},
                    edittype: 'select',
                    editoptions: {
                        style: "width: 250px", 
                        dataUrl: '<?php echo WS_JQGRID."param.business_area_controller/combo"; ?>'
                    }
                },
                {label: 'Parent ID',name: 'parent_id',width: 5, sorttype: 'number',align: "left",editable: true,hidden:true,
                },
                {label: 'Valid From', name: 'valid_from', width: 120, editable: true,
                    edittype:"text",
                    editrules: {required: true},
                    editoptions: {
                        // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                        // use it to place a third party control to customize the toolbar
                        dataInit: function (element) {
                           $(element).datepicker({
                                autoclose: true,
                                format: 'yyyy-mm-dd',
                                orientation : 'top',
                                todayHighlight : true
                            });
                        }
                    }
                },
                {label: 'Valid To', name: 'valid_to', width: 120, editable: true,
                    edittype:"text",
                    editrules: {required: false},
                    editoptions: {
                        // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                        // use it to place a third party control to customize the toolbar
                        dataInit: function (element) {
                           $(element).datepicker({
                                autoclose: true,
                                format: 'yyyy-mm-dd',
                                orientation : 'top',
                                todayHighlight : true
                            });
                        }
                    }
                },
                {label: 'Address',name: 'address',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 40,
                        maxlength:64
                    }, 
                    
                },
                {label: 'City',name: 'city',width: 150, align: "left",editable: true,
                    editoptions: {
                        size: 40,
                        maxlength:64
                    },
                    
                },
                {label: 'Description',name: 'description',width: 200, align: "left",editable: true,
                    edittype:'textarea',
                    editoptions: {
                        rows: 2,
                        cols:50
                    }
                }
            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: true,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
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
            editurl: '<?php echo WS_JQGRID."param.business_area_controller/crud"; ?>',
            caption: "Business Area"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: true,
                editicon: 'fa fa-pencil blue bigger-120',
                add: true,
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
                    reloadTreeMenu();
                    return [true,"",response.responseText];
                }
            },
            {
                //new record form
                editData: {
                    parent_id: function() {
                            var item = $('#tree-ba').jqxTree('getSelectedItem');
                            var id = $(item).attr('id');
                            return id;
                        }
                },
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

                    reloadTreeMenu();
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
<script>
    function reloadTreeMenu() {
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'id' },
                { name: 'parentid' },
                { name: 'text' },
                { name: 'expanded' },
                { name: 'selected' },
                { name: 'icon' }
            ],
            id: 'id',
            url: '<?php echo WS_JQGRID."param.business_area_controller/tree_json"; ?>',
            async: false
        };

        $('#tree-ba').jqxTree('clear');

        // create data adapter.
        var dataAdapter = new $.jqx.dataAdapter(source);
        dataAdapter.dataBind();
        var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items', [{ name: 'text', map: 'label'}]);
        $('#tree-ba').jqxTree({
            source: records
        });

    }

    $(function($) {
        reloadTreeMenu();

        $('#tree-ba').on('select', function (event) {
            var item = $('#tree-ba').jqxTree('getItem', event.args.element);
            $('#grid-table').jqGrid('setGridParam', {
                url: '<?php echo WS_JQGRID."param.business_area_controller/crud"; ?>',
                postData: {parent_id: item.id }
            });

            $('#grid-table').jqGrid('setCaption', 'Business Area :: ' + item.label);
            $("#grid-table").trigger("reloadGrid");
        });
    });
</script>