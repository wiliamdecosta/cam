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
            <span>Finance</span>
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
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-2">
                        <i class="blue"></i>
                        <strong> Finance </strong>
                    </a>
                </li>
                <li class="">
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
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Finance</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                      
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Account Currency
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="currency_code_acc" id="currency_code_acc" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Information Currenncy
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="currency_code_inf" id="currency_code_inf" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Billing Status
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="billing_status" id="billing_status" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Next Bill Date
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="next_bill_dtm" id="next_bill_dtm" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Pre-pay
                                        </label>
                                        <div class="col-md-5">
                                             <input type="checkbox" value="F" name="prepay_boo" id="prepay_boo" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Auto-delete Billed Events
                                        </label>
                                        <div class="col-md-5">
                                            <input type="checkbox" value="F" name="delete_events_on_billing_boo" id="delete_events_on_billing_boo" disabled readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Holiday Profile
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="holiday_profile_id" id="holiday_profile_id" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Event per Day
                                        </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="events_per_day" id="events_per_day" readonly>
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
        loadContentWithParams("account.list_account", {});
    });
    $('#tab-1').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.detail_account", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });
    $('#tab-4').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.service_address", {
            account_num: "<?php echo $this->input->post('account_num');?>"
        });
    });
    $('#tab-3').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.billing", {
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
        url: '<?php echo WS_JQGRID."account.detailaccount_controller/read_finance"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            account_num: "<?php echo $this->input->post('account_num'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#currency_code_acc').val(dt.currency_code_acc);
                $('#currency_code_inf').val(dt.currency_code_inf);
                $('#billing_status').val(dt.billing_status);
                $('#next_bill_dtm').val(dt.next_bill_dtm);
                if(dt.prepay_boo == 'F'){
                    $("#prepay_boo").prop("checked", false);
                }else{
                    $("#prepay_boo").prop("checked", true);
                }

                if(dt.delete_events_on_billing_boo == 'F'){
                    $("#delete_events_on_billing_boo").prop("checked", false);
                }else{
                    $("#delete_events_on_billing_boo").prop("checked", true);
                }
                
                // $('#prepay_boo').val(dt.prepay_boo);
                // $('#delete_events_on_billing_boo').val(dt.delete_events_on_billing_boo);
                $('#holiday_profile_id').val(dt.holiday_profile_id);
                $('#events_per_day').val(dt.events_per_day);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
