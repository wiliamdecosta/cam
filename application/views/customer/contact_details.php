<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Detail Customer</span>
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
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-0">
                        <i class="blue"></i>
                        <strong> List Customer </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Info Customer </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Contact Details </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Additional Information </strong>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Contact Details</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="customer_name" id="customer_name" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="address" id="address" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email_address" id="email_address" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Daytime tel
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="daytime_contact_tel" id="daytime_contact_tel" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Evening tel
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="evening_contact_tel" id="evening_contact_tel" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mobile
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="mobile_contact_tel" id="mobile_contact_tel" readonly>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3">Fax
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="fax_contact_tel" id="fax_contact_tel" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tab-0').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("customer.list_customer", {});
    });

    $('#tab-1').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("customer.detail_customer", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>"
        });
    });

    $('#tab-3').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("customer.additional_information", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>"
        });
    });

</script>
<script>
    $.ajax({
        url: '<?php echo WS_JQGRID."customer.detailcustomer_controller/read_contact_details"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.items;
                $('#customer_name').val(dt.customer_name);
                $('#address').val(dt.address);
                $('#email_address').val(dt.email_address);
                $('#daytime_contact_tel').val(dt.daytime_contact_tel);
                $('#evening_contact_tel').val(dt.evening_contact_tel);
                $('#mobile_contact_tel').val(dt.mobile_contact_tel);
                $('#fax_contact_tel').val(dt.fax_contact_tel);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>

