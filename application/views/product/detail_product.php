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
                <li class="active">
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
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-7">
                        <i class="blue"></i>
                        <strong> Override Price </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet red box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Product</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                      
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Product <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="product_name" id="product_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Customer Order Number
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="cust_order_num" id="cust_order_num" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Supplier Order Number
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="supplier_order_num" id="supplier_order_num" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Information</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <!-- Information -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Package : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="package_name" name="package_name"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Parent Product : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="parent_prod_name" name="parent_prod_name"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Product Billed To : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="prod_billed_to" name="prod_billed_to"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Changes Allowed From : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="chg_alow_from" name="chg_alow_from"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Current Product Status : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="cur_product_status" name="cur_product_status"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Invoicing Company : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="inv_co_name" name="inv_co_name"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- Information -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tab-2').on('click', function(){
        return false;
    });
    $('#tab-3').on('click', function(){
        return false;
    });
    $('#tab-4').on('click', function(){
        return false;
    });
    $('#tab-5').on('click', function(){
        return false;
    });
    $('#tab-6').on('click', function(){
        return false;
    });
    $('#tab-7').on('click', function(){
        return false;
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#product_name').val(dt.product_name);
                $('#cust_order_num').val(dt.cust_order_num);
                $('#supplier_order_num').val(dt.supplier_order_num);
                $('#package_name').text(dt.package_name);
                $('#parent_prod_name').text(dt.parent_prod_name);
                $('#prod_billed_to').text(dt.prod_billed_to);
                $('#chg_alow_from').text(dt.chg_alow_from);
                $('#cur_product_status').text(dt.cur_product_status);
                $('#inv_co_name').text(dt.inv_co_name);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
