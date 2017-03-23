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
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Info Customer </strong>
                    </a>
                </li>
                <li class="">
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
                            <div class="caption">Customer</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Customer reference <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="customer_ref" id="customer_ref" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="customer_name" id="customer_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Parent Customer reference
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="parent_customer_ref" id="parent_customer_ref" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="parent_customer_name" id="parent_customer_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Customer type <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="customer_type_name" id="customer_type_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Provider
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="provider_name" id="provider_name" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="password" id="password" readonly>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Invoicing company
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="invoicing_co_name" id="invoicing_co_name" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Market segment
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="market_segment_name" id="market_segment_name" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Exemption ref
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tax_exempt_ref" id="tax_exempt_ref" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">VAT registration no
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="vat_registration" id="vat_registration" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Hierarcy billing
                                        </label>
                                        <div class="col-md-1">
                                            <input type="checkbox" class="form-control" name="is_hirarcy_bill" id="is_hirarcy_bill" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Bill period
                                        </label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="bill_period" id="bill_period" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="bill_period_units" id="bill_period_units" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Next bill date
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="next_bill_dtm" id="next_bill_dtm" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Bill per statement
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bills_per_statement" id="bills_per_statement" readonly>
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

    $('#tab-2').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("customer.contact_details", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>"
        });
    });

    $('#tab-3').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("customer.additional_information", {
            customer_ref: "<?php echo $this->input->post('customer_ref');?>"
        });
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."customer.detailcustomer_controller/read_detail_customer"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.items;
                $('#customer_ref').val(dt.customer_ref);
                $('#customer_name').val(dt.customer_name);
                $('#parent_customer_ref').val(dt.parent_customer_ref);
                $('#parent_customer_name').val(dt.parent_customer_name);
                $('#customer_type_name').val(dt.customer_type_name);
                $('#provider_name').val(dt.provider_name);
                $('#password').val(dt.password);
                $('#invoicing_co_name').val(dt.invoicing_co_name);
                $('#market_segment_name').val(dt.market_segment_name);
                $('#tax_exempt_ref').val(dt.tax_exempt_ref);
                $('#vat_registration').val(dt.vat_registration);

                if(dt.is_hirarcy_bill == 'T') {
                    $('#is_hirarcy_bill').attr('checked', true);
                }
                $('#bill_period').val(dt.bill_period);
                $('#bill_period_units').val(dt.bill_period_units);
                $('#next_bill_dtm').val(dt.next_bill_dtm);
                $('#bills_per_statement').val(dt.bills_per_statement);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
