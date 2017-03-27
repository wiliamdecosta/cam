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
            <span>Service Address</span>
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
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-3">
                        <i class="blue"></i>
                        <strong> Billing </strong>
                    </a>
                </li>
                 <li class="active">
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
                            <div class="caption">Service Address</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                      
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Country
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="country_name" id="country_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Address Line 1
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address_1" id="address_1" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Address Line 2
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address_2" id="address_2" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Zip Code
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">City
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address_3" id="address_3" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Country
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="country_2" id="country_2" readonly>
                                        </div>
                                    </div>

                                    <br><br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">
                                        </label>
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="use_address" id="use_address" value="Y">Use an Existing Address</label>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address" id="address" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Product -->

                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Information</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">  
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
                        </div>
                    </div>
                </div> -->
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
        url: '<?php echo WS_JQGRID."account.detailaccount_controller/read_service_address"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            account_num: "<?php echo $this->input->post('account_num'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#country_name').val(dt.country_name);
                $('#address_1').val(dt.address_1);
                $('#address_2').val(dt.address_2);
                $('#address_3').val(dt.address_3);
                $('#country_2').val(dt.country_2);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
