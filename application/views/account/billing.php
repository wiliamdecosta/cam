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
                                        <label class="control-label col-md-5">Accounting method <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="accounting_method" id="accounting_method" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Statement every <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" name="account_name" id="account_name" readonly>
                                        </div>
                                        <label class="control-label col-md-2">Bill(s)
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Account Status <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="account_status" id="account_status" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Go Live Date And Time
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="go_live_dat" id="go_live_dat" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="go_live_time" id="go_live_time" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Invoicing Company <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="invoicing_co_name" id="invoicing_co_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Contracted Poin of Supply
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="cps_name" id="cps_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-5">Tax Status <span class="required">  * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio" id="radio1" value="TAX_EXCLUSIVE" readonly>Tax Exclusive
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio" id="radio2" value="IN_EXCLUSIVE" readonly>Tax Inclusive
                                            </label>
                                            <!-- <input type="text" class="form-control" name="tax_status" id="tax_status" readonly> -->
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
                                        <label class="control-label col-md-6">Account in use since : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="account_in_use" name="account_in_use"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6">Last Billed : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="last_bill_dtm" name="last_bill_dtm"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6">Default Service Address From : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="prod_billed_to" name="prod_billed_to"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6">Termination Date : </label>
                                        <label class="control-label col-md-6" style="text-align: left !important;" id="termination_dat" name="termination_dat"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6">Termination Reason : </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <textarea rows="4" cols="50" class="form-control col-md-6" name="termination_reason_name" id="termination_reason_name" readonly> </textarea>
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
                $('#customer_ref').val(dt.customer_ref);
                $('#account_num').val(dt.account_num);
                $('#account_name').val(dt.account_name);
                $('#go_live_dat').val(dt.go_live_dat);
                $('#go_live_time ').val(dt.go_live_time );
                $('#account_status').val(dt.account_status);
                $('#account_in_use').text(dt.account_in_use);
                $('#invoicing_co_name').val(dt.invoicing_co_name);
                $('#cps_name').val(dt.cps_name);
                $('#last_bill_dtm').text(dt.last_bill_dtm);
                $('#termination_dat').text(dt.termination_dat);
                $('#termination_reason_name').text(dt.termination_reason_name);
                if(dt.tax_status == 'TAX_EXCLUSIVE'){
                    $('#radio1').attr('checked', true);
                    $('#radio2').attr('checked', false);
                }else{
                    $('#radio1').attr('checked', false);
                    $('#radio2').attr('checked', true);
                }
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
