<style>
    input.uppercase {
        text-transform: uppercase;
    }
</style>

<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#" id="back-manage-account">Account</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Modify Account</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
						<span class="caption-subject font-red bold uppercase"> Modify Account -
						<span class="step-title"> Step 1 of 3 </span>
						</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" action="#" id="submit_form" method="POST">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span><br>
									<span class="desc">
									<i class="fa fa-check"></i> Billing Contact </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span><br>
									<span class="desc">
									<i class="fa fa-check"></i> Billing Detail </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number"> 3 </span><br>
									<span class="desc">
									<i class="fa fa-check"></i> Additional Information </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped active" role="progressbar">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                                </div>
                                <div class="tab-pane" id="tab1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Account Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="AccountNumber"
                                                           readonly="" value="<?php echo $this->input->post('account_num');?>" name="AccountNumber">
													<span class="help-block">
													</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">First Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required uppercase"
                                                           name="inFirstName" id="inFirstName">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Last Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required uppercase"
                                                           name="inLastName" id="inLastName">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Account Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control uppercase required"
                                                           id="account_name" name="account_name" value="<?php echo $this->input->post('account_name');?>">
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required"
                                                           placeholder="Enter Email Address" name="inEmail"
                                                           id="inEmail">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Mobile Number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required"
                                                           name="inMobileNumber" id="inMobileNumber">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Contact Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <?php echo buatcombo('inContactType',
                                                        'inContactType',
                                                        'gparams',
                                                        'name',
                                                        'rfid',
                                                        array('rfen' => 'CONTACTTYPE'),
                                                        'Y',
                                                        '- Pilih Contact Type -'
                                                    ); ?>
                                                </div>
                                            </div>

                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" name="customer_ref" id="customer_ref" value="<?php echo $this->input->post('customer_ref');?>">
                                            
                                            <input type="hidden" name="inNextBillDate" id="inNextBillDate">
                                            <input type="hidden" name="inTaxStatus" id="inTaxStatus">
                                            <input type="hidden" name="accStatus" id="accStatus">
                                            <input type="hidden" name="inAccountToGoLive" id="inAccountToGoLive">
                                            <input type="hidden" name="inAccountCurrency" id="inAccountCurrency">
                                            <input type="hidden" name="tax_inclusive_boo" id="tax_inclusive_boo">
                                            <input type="hidden" name="cps_id" id="cps_id">
                                            <input type="hidden" name="accounting_method_id" id="accounting_method_id">
                                            <input type="hidden" name="account_status" id="account_status">

                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="control-label col-md-4">Use an existing
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control" name="wizard5_exst_addr" id="wizard5_exst_addr" readonly>
                                                        <input type="text" class="form-control " name="wizard5_exst_addr_code" id="wizard5_exst_addr_code" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-addr">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                                <label class="control-label col-md-4">Country
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control" name="wizard5_country_id" id="wizard5_country_id" readonly value="34">
                                                        <input type="text" class="form-control required" name="wizard5_country_code" id="wizard5_country_code" readonly value="Indonesia">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-country">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Street Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required uppercase"
                                                           placeholder="Enter Street Name" id="inStreetName"
                                                           name="inStreetName" value=""
                                                           >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Block Name  <span class="required"> * </span></label>

                                                <div class="col-md-8">
                                                    <input type="text" class="form-control uppercase required"
                                                           placeholder="Enter Block Name" id="inBlockName"
                                                           name="inBlockName" value=""
                                                            required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">District Name  <span class="required"> * </span></label>

                                                <div class="col-md-8">
                                                    <input type="text" class="form-control uppercase required"
                                                           placeholder="Enter District Name" id="inDistrictName"
                                                           name="inDistrictName" value=""
                                                            required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">City  <span class="required"> * </span></label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control uppercase required"
                                                           placeholder="Enter City" id="inCity"
                                                           name="inCity"
                                                           value=""  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Province <span class="required"> * </span></label>

                                                <div class="col-md-8">
                                                    <input type="text" class="form-control uppercase required"
                                                           placeholder="Enter Province" id="inProvinsi"
                                                           name="inProvinsi" value=""
                                                            required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Zip Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control required"
                                                           placeholder="Enter ZIP Code" maxlength="5"
                                                           id="inZipCode"
                                                           name="inZipCode" required>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <label class="col-md-4 control-label">Document Address
                                                </label>
                                                <div class="col-md-8">
                                                        <textarea class="form-control  uppercase"
                                                                  id="document_address" name="document_address" readonly></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Bill Periode</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder=""
                                                           name="inBillPeriode" id="inBillPeriode" value="1">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="inSLBillPeriode" id="inSLBillPeriode">
                                                        <option>Default</option>
                                                        <option value="D">Daily</option>
                                                        <option value="W">Weekly</option>
                                                        <option selected="selected" value="M">Monthly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Accounting
                                                    Method</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="inAccountingMethod" id="inAccountingMethod">
                                                        <option value="1">Balance Forward</option>
                                                        <option value="2">Open Item</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Payment Method</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="inPaymentMethod" id="inPaymentMethod">
                                                        <option value="1">Normal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Bill Style</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="inBillStyle" id="inBillStyle">
                                                        <option value="1">Normal Billing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="col-md-4 control-label">Bill Handling Code</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="inBillHandlingCode">
                                                        <option value="SINGLEBILL">Account Single Billing</option>
                                                        <option value="INV_DETAIL" selected>Invoice Detail View</option>
                                                        <option value="INV_GROUP">Invoice Group View</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Credit Class</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="inCreditClass" id="inCreditClass">
                                                        <option value="1">IDR Standard Interface</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="row">
                                     <div class="col-md-6">
                                        <?php echo genAttr('accountattributes','default'); 
                                        ?>
                                      </div>
                                        <!-- <div class="col-md-12">
                                            <table id="grid"></table>
                                            <div id="pager"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back </a>
                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <button type="submit" class="btn green button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


<?php $this->load->view('lov/lov_addr.php'); ?>
<?php $this->load->view('lov/lov_country.php'); ?>

<script type="text/javascript">
    //load tab 1
    $.ajax({
        url: '<?php echo WS_JQGRID."account.detailaccount_controller/read_modify_acc"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            account_num: "<?php echo $this->input->post('account_num'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#inAccountCurrency').val(dt.currency_code);                
                $('#inAccountToGoLive ').val(dt.go_live_date );
                $('#accStatus').val(dt.account_status );
                $('#inTaxStatus').val(dt.tax_status );
                $('#inNextBillDate').val(dt.next_bill_dtm );
                $('#AccountNumber').val(dt.account_num );
                $('#customer_ref').val(dt.customer_ref );
                $('#inFirstName').val(dt.first_name );
                $('#inLastName').val(dt.last_name );
                $('#inEmail').val(dt.email );
                $('#inMobileNumber').val(dt.mobile_contact_tel );
                $('#inContactType').val(dt.acontact_id );
                $('#wizard5_country_id').val(dt.country_id );
                $('#wizard5_country_code').val(dt.country_name );
                $('#inStreetName').val(dt.address1 );
                $('#inBlockName').val(dt.address2 );
                $('#inDistrictName').val(dt.address4 );
                $('#inCity').val(dt.address3 );
                $('#inProvinsi').val(dt.address5 );
                $('#inZipCode').val(dt.zipcode );

                $('#tax_inclusive_boo').val(dt.tax_inclusive_boo);                
                $('#cps_id ').val(dt.cps_id);
                $('#accounting_method_id').val(dt.accounting_method_id);
                $('#account_status').val(dt.account_status);
            }
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
   
    //load tab 2 dan 3
    $.ajax({
        url: '<?php echo WS_JQGRID."account.detailaccount_controller/read_modify_billinfo"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            account_num: "<?php echo $this->input->post('account_num'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#inBillPeriode').val(dt.bill_period);                
                $('#inSLBillPeriode ').val(dt.slbill_period );
                $('#inAccountingMethod ').val(dt.acounting_method );
                $('#inPaymentMethod ').val(dt.payment_method_id );
                $('#inBillStyle ').val(dt.bill_style_id );
                $('#inCreditClass ').val(dt.credit_class_id );
                $('#BUSINESS_SHARE ').val(dt.business_share );
                $('#NPWP ').val(dt.npwp );
                $('#IS_MONTHLY_INVOICE ').val(dt.is_monthly_invoice );
                $('#SAP_ACCOUNT ').val(dt.sap_account );
            }
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
    
</script>

<script type="text/javascript">
    $(document).ready(function () {


        $('#acc_name_page1').attr('autocomplete', 'off');
        // $('#btn-lov-nipnas').on('click', function () {
        //     modal_lov_nipnas_show('inNipnas', 'customer_name');
        // });
        $("#btn-lov-country").on('click', function() {
            modal_lov_country_show('wizard5_country_id','wizard5_country_code');
        });
       

        $("#btn-lov-addr").on('click', function() {
            var customer_ref = $('#customer_ref').val();
            if(customer_ref == "") {
                swal('Info','Customer harus diisi terlebih dahulu','info');
                return;
            }

             modal_lov_addr_show('wizard5_exst_addr',
                                 'wizard5_exst_addr_code',
                                 'wizard5_country_id',
                                 'wizard5_country_code',
                                 'inStreetName',
                                 'inBlockName',
                                 'inCity',
                                 'inProvinsi',
                                 'inZipCode',
                                 'inDistrictName',
                                 customer_ref);
             
        });


        $('#back-manage-account').on('click', function () {
            loadContentWithParams('account.list_account', {});
        });

        $('.datepicker').datepicker({
            todayHighlight: true,
            format: "mm/dd/yyyy",
            autoclose: true
        });


        var FormWizard = function () {
            return {
                //main function to initiate the module
                init: function () {
                    if (!jQuery().bootstrapWizard) {
                        return;
                    }


                    var form = $('#submit_form');
                    var error = $('.alert-danger', form);
                    var success = $('.alert-success', form);

                    form.validate({
                        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                        errorElement: 'span', //default input error message container
                        errorClass: 'help-block help-block-error', // default input error message class
                        focusInvalid: false, // do not focus the last invalid input
                        rules: {},

                        messages: { // custom messages for radio buttons and checkboxes
                            'payment[]': {
                                required: "Please select at least one option",
                                minlength: jQuery.validator.format("Please select at least one option")
                            }
                        },

                        errorPlacement: function (error, element) { // render error placement for each input type
                            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                                error.insertAfter("#form_gender_error");
                            } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                                error.insertAfter("#form_payment_error");
                            } else {
                                error.insertAfter(element); // for other inputs, just perform default behavior
                            }
                        },

                        invalidHandler: function (event, validator) { //display error alert on form submit
                            success.hide();
                            error.show();
                            App.scrollTo(error, -200);
                        },

                        highlight: function (element) { // hightlight error inputs
                            $(element)
                                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                        },

                        unhighlight: function (element) { // revert the change done by hightlight
                            $(element)
                                .closest('.form-group').removeClass('has-error'); // set error class to the control group
                        },

                        success: function (label) {
                            if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                                label
                                    .closest('.form-group').removeClass('has-error').addClass('has-success');
                                label.remove(); // remove error label here
                            } else { // display success icon for other inputs
                                label
                                    .addClass('valid') // mark the current input as valid and display OK icon
                                    .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                            }
                        },

                        submitHandler: function (form) {
                            success.show();
                            error.hide();
                            /*if (form.valid() == true) {
                             alert('tes');
                             return false;
                             form.submit();
                             }*/


                            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax

                        }

                    });


                    var handleTitle = function (tab, navigation, index) {
                        var total = navigation.find('li').length;
                        var current = index + 1;
                        // set wizard title
                        $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                        // set done steps
                        jQuery('li', $('#form_wizard_1')).removeClass("done");
                        var li_list = navigation.find('li');
                        for (var i = 0; i < index; i++) {
                            jQuery(li_list[i]).addClass("done");
                        }

                        if (current == 1) {
                            $('#form_wizard_1').find('.button-previous').hide();
                        } else {
                            $('#form_wizard_1').find('.button-previous').show();
                        }


                        if (current >= total) {
                            $('#form_wizard_1').find('.button-next').hide();
                            $('#form_wizard_1').find('.button-submit').show();
                        } else {
                            $('#form_wizard_1').find('.button-next').show();
                            $('#form_wizard_1').find('.button-submit').hide();


                            var AccountNumber = $('#AccountNumber').val();
                            var userId = $('#userId').val();
                            var groupId = $('#groupId').val();


                            

                        }
                        //App.scrollTo($('.page-title'));
                    };

                    // default form wizard
                    $('#form_wizard_1').bootstrapWizard({
                        'nextSelector': '.button-next',
                        'previousSelector': '.button-previous',
                        onTabClick: function (tab, navigation, index, clickedIndex) {
                            return false;

                            success.hide();
                            error.hide();
                            if (form.valid() == false) {
                                return false;
                            }

                            handleTitle(tab, navigation, clickedIndex);
                        },
                        onNext: function (tab, navigation, index) {
                            //var current =  + 1;
                            //validasi step 2
                            // if(index == 2){
                            //     setval('inCompanyName',getval('inAccountName'));

                            //     var nextBillDat = getval('inNextBillDate');
                            //     var subnextBillDat = nextBillDat.substring(3,5);
                            //     if (subnextBillDat != 01){
                            //         swal('','Next Bill Date harus diisi tanggal 1 (tanggal akan dibilling)')
                            //         return false;
                            //     }

                            // }
                            success.hide();
                            error.hide();

                            // button continue validation 
                            if (form.valid() == false) {
                                return false;
                            }

                            handleTitle(tab, navigation, index);
                        },
                        onPrevious: function (tab, navigation, index) {
                            success.hide();
                            error.hide();

                            handleTitle(tab, navigation, index);
                        },
                        onTabShow: function (tab, navigation, index) {
                            var total = navigation.find('li').length;
                            var current = index + 1;
                            var $percent = (current / total) * 100;
                            $('#form_wizard_1').find('.progress-bar').css({
                                width: $percent + '%'
                            });
                        }
                    });

                    $('#form_wizard_1').find('.button-previous').hide();
                    $('#form_wizard_1 .button-submit').click(function () {
                        /* if(form.valid() == true){
                         form.submit();
                         }*/
                    }).hide();


                }

            };

        }();


        jQuery(document).ready(function () {
            FormWizard.init();

            $('#submit_form').on('submit', (function (e) {
                // Stop form from submitting normally
                if(!$("#submit_form").valid()) {
                    return false;
                }
                e.preventDefault();

                var postData = new FormData(this),
                    url = "<?php echo site_url('Account/modifyAccount');?>";

                // Send the data using post
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: postData,
                    success: function (data) {
                        if(data.status == "COMPLETED"){                        

                            
                            swal('',data.status);

                            setTimeout(function(){
                                 loadContentWithParams('account.list_account',{});
                            }, 3000);

                        }else{
                            swal('',data.status);
                        }

                    },
                    error: function (xhr, status, error) {
                        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                    }
                });
            }));

        });

    });
</script>
<script type="text/javascript">    

    function getAttrValue(accountnum) {

        var rowdata = jQuery("#grid").jqGrid('getRowData');
        var attrs = '';

        for (var i = 1; i < rowdata.length; i++) {
            attr = '';
            vAttrType = 1;

            attr = accountnum + '|' + rowdata[i].attr_id + '|' + vAttrType + '|' + rowdata[i].xs2 + '|';

            if(attrs != '')
            {
                attrs += '*'+attr;
            }
            else
            {
                attrs += attr;
            }
        }
        return attrs;
    }

    function setNPWP() {
        var npwp = $("#inNPWP").val();
        /*var rowData = jQuery("#grid").jqGrid('getRowData', 2);
        rowData.xs2 = npwp;
        jQuery("#grid").jqGrid('setRowData', 2, rowData);*/
        $('#NPWP').val(npwp);
    }

</script>