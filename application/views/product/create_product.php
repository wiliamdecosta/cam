<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Product</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Create Product</span>
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
                     <span class="caption-subject font-red bold uppercase"> Create Product -
                         <span class="step-title"> Step 1 of 5 </span>
                     </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" action="#" id="submit_form" method="post">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span><br>
                                         <span class="desc">
                                            <i class="fa fa-check"></i> Account &amp; Dates </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Product &amp; Price Plan </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number"> 3 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Details </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number"> 4 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Attributes </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab" class="step">
                                        <span class="number"> 5 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Add Override Price </span>
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
                                <!--- TAB 1 -->
                                <div class="tab-pane active" id="tab1">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Customer <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control required" id="wizard1_customer_ref">
                                                        <input type="text" class="form-control required" id="wizard1_customer_code" readonly="">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-customer">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Account
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control required" id="wizard1_account_num">
                                                        <input type="text" class="form-control required" id="wizard1_account_name" readonly="">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-account">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Parent Product
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="in_Parent_Product">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Subscription
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="in_Subscription">
                                                        <option value="">none</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Start Date Time 
                                                <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control datepicker1 required" name="in_Start_Date_Time">
                                                </div>
                                                <label class="col-md-3 control-label"> MM/DD/YYYY</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Termination Date Time
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control datepicker2" name="in_Termination_Date_Time">
                                                </div>
                                                <label class="col-md-3 control-label"> MM/DD/YYYY</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Product Status 
                                                <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control required" name="in_Product_Status">
                                                        <option value="OK">Active</option>
                                                        <option value="SU">Suspend</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo
                                           $this->security->get_csrf_hash(); ?>">
                                </div>

                                <!--- TAB 2 -->
                                <div class="tab-pane" id="tab2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Product
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                    <input type="hidden" class="form-control required" id="wizard2_product_id">

                                                        <input type="text" class="form-control required" id="wizard2_product_name">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-product">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Price Plan
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control required" id="wizard2_tariff_id">
                                                        <input type="text" class="form-control required" id="wizard2_tariff_name">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-price-plan">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Product Quantity
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control required" name="in_Product_Quantity"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Additions Quantity
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="in_Additions_Quantity"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Terminations Quantity
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="in_Terminations_Quantity"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--- TAB 3 -->
                                <div class="tab-pane" id="tab3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Customer Order Number
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Customer_Order_Number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Supplier Order Number
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Supplier_Order_Number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Budget Center
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Budget_Center">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Contract Reference
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Contract_Reference">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Product Label
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Product_Label">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Contracted Poin of Supply
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control required" name="in_Contracted_PoS"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Tax Exemption reference
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Tax_Exemption_reference">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Additional Exemption Information
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Additional_Exemption_Information">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--- TAB 4 -->
                                <div class="tab-pane" id="tab4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Contract
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_Contract">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Start Date Contract
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Start_Date_Contract">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">End Date Contract
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_End_Date_Contract">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Surat Pesanan
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Surat_Pesanan">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Amandemen
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Amandemen">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">BAPP
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_BAPP">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">BAR
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_BAR">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Contract Layanan
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Contract Layanan">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">BAST
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_BAST">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">BASTOS
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_BASTOS">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">BAUT
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_BAUT">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mitra
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Mitra">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--- TAB 5 -->
                                <div class="tab-pane" id="tab5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Start Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_Start_Date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">End Date
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_End_Date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Notes
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Notes">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Initiation
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Initiation">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Periodic
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Periodic">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Termination
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Termination">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Suspension
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Suspension">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Reactivation
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Reactivation">
                                                </div>
                                            </div>
                                        </div>
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

<?php $this->load->view('lov/lov_customer.php'); ?>
<?php $this->load->view('lov/lov_account.php'); ?>

<script>
$("#btn-lov-customer").on('click', function() {
    modal_lov_customer_show('wizard1_customer_ref','wizard1_customer_code');
});

$('#wizard1_customer_ref').on('change', function() {
    $('#wizard1_account_num').val('');
    $('#wizard1_account_name').val('');
});

$("#btn-lov-account").on('click', function() {
    var customer_ref = $('#wizard1_customer_ref').val();
    if(customer_ref == "") {
        swal('Info','Customer harus diisi terlebih dahulu','info');
        return;
    }
    modal_lov_account_show('wizard1_account_num','wizard1_account_name',customer_ref);
});

$("#btn-lov-price-plan").on('click', function() {
    var account_num = $('#wizard1_account_num').val();
    var product_id = $('#wizard2_product_id').val();
    if(product_id == "") {
        swal('Info','Product harus diisi terlebih dahulu','info');
        return;
    }
    modal_lov_price_plan_show('wizard2_tariff_id','wizard2_tariff_name',account_num,product_id);
});

</script>
<script>
    // $(document).ready(function () {
    //     $('#btn-lov-nipsos').on('click', function () {
    //         modal_lov_nipsos_show('nipsos', 'customer_name');
    //     });
    // });

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

                        // var custReff = $('#custReff').val();
                        // var prefix = $('#prefix').val();
                        // var userId = $('#userId').val();
                        // var idTD = $('#idTD').val();
                        // var idTH = $('#idTH').val();
                        // var groupId = $('#groupId').val();

                        // if (!idTH) {
                        //     $.ajax({
                        //         url: "<?php echo site_url('customer_cont/initTransaksi'); ?>",
                        //         type: "POST",
                        //         dataType: "json",
                        //         data: {
                        //             custReff: custReff,
                        //             prefix: prefix
                        //         },
                        //         success: function (data) {
                        //             $("#trx_no").val(data.txt_noTransaksi);
                        //             $("#idTD").val(data.idTD);
                        //             $("#idTH").val(data.idTH);
                        //         },
                        //         error: function (xhr, status, error) {
                        //             swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                        //         }
                        //     });
                        // }

                        // if (!custReff) {
                        //     $.ajax({
                        //         url: "<?php echo site_url('customer_cont/genCustRef'); ?>",
                        //         type: "POST",
                        //         dataType: "json",
                        //         data: {
                        //             custReff: custReff,
                        //             prefix: prefix
                        //         },
                        //         success: function (data) {
                        //             $("#txt_cusReff").html(data.strMessage);
                        //             $("#custReff").val(data.txt_custRef);
                        //             setval('nipnas',data.txt_custRef);
                        //         },
                        //         error: function (xhr, status, error) {
                        //             swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                        //         }
                        //     });

                        // }

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
                        success.hide();
                        error.hide();

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

        /* Init Transaction*/
        // setval('txt_noTransaction',loc_code+'-CUST/'+dt_tgl3+'-???');
        // setval('txt_trxDate',dt_tgl2);
        // setval('txt_lokasi',loc_name);
        // setval('txt_petugas',username);
        /* End Init Transaction */

        // $('#submit_form').on('submit', (function (e) {
        //     // Stop form from submitting normally
        //     e.preventDefault();

        //     var postData = $('#submit_form').serialize(),
        //         url = "<?php echo site_url('Customer_cont/createCustomer');?>";

        //     // Send the data using post
        //     $.ajax({
        //         url: url,
        //         type: "POST",
        //         dataType: "json",
        //         data: postData,
        //         success: function (data) {
        //             if(data.statusCode == "T"){
        //                 swal('',data.strMessage);
        //                 $('#submit_form')[0].reset();
        //                 // Redirect
        //             }else{
        //                 swal('',data.strMessage);
        //             }

        //         },
        //         error: function (xhr, status, error) {
        //             swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        //         }
        //     });
        // }));

    });

    $('.datepicker1').datetimepicker({
        sideBySide: true,
        defaultDate: new Date()
    });

    $('.datepicker2').datetimepicker({
        sideBySide: true
    });

    $('.datepicker').datetimepicker({
        format: 'MM/DD/YYYY'
    });
    // $('.datepicker').datepicker({
    //     todayHighlight: true,
    //     format: "mm/dd/yyyy",
    //     autoclose: true
    // });
</script>
