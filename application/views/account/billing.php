<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Account</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>List Account</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Billing</span>
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
                        <strong> List Account </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong> Account </strong>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Finance </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Billing </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-4">
                        <i class="blue"></i>
                        <strong> Service Address </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-5">
                        <i class="blue"></i>
                        <strong> Additional Information </strong>
                    </a>
                </li>
                 <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-6">
                        <i class="blue"></i>
                        <strong> Suspension </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet red box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Details</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                      
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Hierarchy billing is off
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-5">Bill period <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control required" name="bill_period" id="bill_period" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" name="bill_period_units" id="bill_period_units" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Accounting Method <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="accounting_method" id="accounting_method" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Statement Every <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" name="bills_per_statement" id="bills_per_statement" readonly>
                                        </div>
                                        <label class="control-label col-md-2">Bill(s)
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Payment Method<span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="payment_method_name" id="payment_method_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Bill Style<span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="bill_style_name" id="bill_style_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Bill Handling Code
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bill_handling_code" id="bill_handling_code" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Credit Class<span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="credit_class_name" id="credit_class_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Payment Trem Description
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <textarea rows="4" cols="50" class="form-control col-md-6" name="payment_term_desc" id="payment_term_desc" readonly> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Credit Limit
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="credit_limit_mny" id="credit_limit_mny" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn "> Get </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Package Discount Account
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="package_disc_account_num" id="package_disc_account_num" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Product / Event Discount Account
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="event_disc_account_num" id="event_disc_account_num" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Discount CPS
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="discount_cps" id="discount_cps" readonly>
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
                            <div class="caption">Contact</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                            
                            <!-- Information -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name  </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="address_name" id="address_name" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address  </label>
                                        <div class="col-md-6">
                                            <textarea rows="4" cols="50" class="form-control col-md-4" name="ls_address" id="ls_address" readonly> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email  </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email_address" id="email_address" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Daytime Tel  </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="daytime_contact_tel" id="daytime_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Evening Tel  </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="evening_contact_tel" id="evening_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mobile  </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="mobile_contact_tel" id="mobile_contact_tel" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fax  </label>
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
    $('#tab-0').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.list_account", {});
    });
    $('#tab-1').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.detail_account", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });
    $('#tab-2').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.finance", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });   
    $('#tab-4').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.service_address", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });
    $('#tab-5').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.additional_information", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });
    $('#tab-6').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.suspension", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."account.detailaccount_controller/read_billing"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            account_num: "<?php echo $this->input->post('account_num'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#bill_period').val(dt.bill_period);
                $('#bill_period_units').val(dt.bill_period_units);
                $('#accounting_method').val(dt.accounting_method);
                $('#bills_per_statement').val(dt.bills_per_statement);
                $('#payment_method_name').val(dt.payment_method_name);
                $('#bill_style_name').val(dt.bill_style_name);
                $('#bill_handling_code').val(dt.bill_handling_code);
                $('#credit_class_name').val(dt.credit_class_name);
                $('#payment_term_desc').text(dt.payment_term_desc);
                $('#credit_limit_mny').val(dt.credit_limit_mny);
                $('#package_disc_account_num').val(dt.package_disc_account_num);
                $('#event_disc_account_num').val(dt.event_disc_account_num);


                $('#address_name').val(dt.address_name);
                $('#ls_address').text(dt.ls_address);
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
