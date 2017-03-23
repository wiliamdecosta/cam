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
                 <li class="active">
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
                                        <label class="control-label col-md-5">Account <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="account_num" id="account_num" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Subscription
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="subscription" id="subscription" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Budget Centre 
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="budget_centre_name" id="budget_centre_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Contract Refference
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contract_reff" id="contract_reff" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Product Label
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="product_label" id="product_label" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Contracted Point of Supply <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="cps_name" id="cps_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Tax Exemption Refference 
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tax_exempt_ref" id="tax_exempt_ref" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Additional Exemption Information 
                                        </label>
                                        <div class="col-md-6">
                                            <textarea rows="4" cols="50" class="form-control" name="tax_exempt_txt" id="tax_exempt_txt" readonly> </textarea>
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
                            <div class="caption">Contact Information</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <!-- Information -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contact_name" id="contact_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Address
                                        </label>
                                        <div class="col-md-6">
                                            <textarea rows="4" cols="50" class="form-control" name="adress" id="adress" readonly> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Email 
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email" id="email" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Daytime Tel
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="daytime_contact_tel" id="daytime_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Evening Tel
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="evening_contact_tel" id="evening_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Mobile
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="mobile_contact_tel" id="mobile_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Fax
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="fax_contact_tel" id="fax_contact_tel" readonly>
                                        </div>
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
    $('#tab-7').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.override_price", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>",
            product_seq : "<?php echo $this->input->post('product_seq');?>"
        });
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_finance"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#account_num').val(dt.account_num);
                $('#subscription').val(dt.subscription);
                $('#budget_centre_name').val(dt.budget_centre_name);
                $('#contract_reff').val(dt.contract_reff);
                $('#product_label').val(dt.product_label);
                $('#cps_name').val(dt.cps_name);
                $('#tax_exempt_ref').val(dt.tax_exempt_ref);
                $('#tax_exempt_txt').text(dt.tax_exempt_txt);
                $('#contact_name').val(dt.contact_name);
                $('#daytime_contact_tel').val(dt.daytime_contact_tel);
                $('#evening_contact_tel').val(dt.evening_contact_tel);
                $('#fax_contact_tel').val(dt.fax_contact_tel);
                $('#mobile_contact_tel').val(dt.mobile_contact_tel);
                $('#email').val(dt.email);
                $('#adress').text(dt.adress);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
