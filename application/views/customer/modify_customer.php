<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Customer</span>
             <i class="fa fa-circle"></i>
        </li>
         <li>
            <span>Create Customer</span>
        </li>
    </ul>
</div>
<?php //print_r($this->session->all_userdata());?>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12" style="display: none;">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-info font-red"></i>
  					<span class="caption-subject font-red bold uppercase"> Data Transaksi
  					</span>
                </div>
            </div>
            <form role="form">
                <div class="row">
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="txt_noTransaction" value=""
                                       disabled>
                                <div class="form-control-focus"></div>
                                <label for="form_control_1">Nomor Transaksi</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" readonly
                                       value="" id="txt_trxDate">
                                <div class="form-control-focus"></div>
                                <label for="form_control_1">Tanggal Transaksi</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="txt_petugas"
                                       value="" readonly>
                                <div class="form-control-focus"></div>
                                <label for="form_control_1">Petugas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="txt_lokasi" value="" readonly>
                                <div class="form-control-focus"></div>
                                <label for="form_control_1">Lokasi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1" value="NEW TRANSACTION"
                                       readonly>
                                <div class="form-control-focus"></div>
                                <label for="form_control_1">Status</label>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>

    <div class="col-md-12">
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                     <span class="caption-subject font-red bold uppercase"> Create Customer -
                         <span class="step-title"> Step 1 of 3 </span>
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
                                        <span class="number"> 1 </span>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Customer </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Contact Detail </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
                                        <span class="number"> 3 </span>
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
                                <div class="tab-pane active" id="tab1">
                                    <!--- TAB 1 -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Customer Ref
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="nipnas" id="nipnas" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Parent Customer Ref
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control " id="parentCusref"
                                                               name="parentCusref" placeholder="Parent Customer Ref" readonly=""/>
                                                        <input type="hidden" class="form-control " id="invoicingCompany"/>
                                                       <span class="input-group-btn">
                                                         <button class="btn btn-success" type="button"
                                                                 id="btn-lov-nipnas">
                                                             <i class="fa fa-search"></i>
                                                         </button>
                                                       </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" class="form-control" id="customer_name"
                                                           readonly="" placeholder="Customer Name"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Invoicing Company
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" id="in_inv_co_name"
                                                           readonly name="in_inv_co_name"/>
                                                     <input type="hidden" class="form-control required" id="in_inv_co_id"
                                                           readonly name="in_inv_co_id"/>
                                                    <input type="hidden" class="form-control required" id="temp_customer_type_id"
                                                           readonly/>
                                                    <input type="hidden" class="form-control required" id="temp_market_segment_id"
                                                           readonly/>
                                                    <input type="hidden" class="form-control required" id="temp_contact_type_id"
                                                           readonly/>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Customer Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8"  id="comboCustomerType">
                                                    <select name="in_CustomerType" class="form-control required">
                                                        <option value="">- Pilih Customer Type -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Market Segment
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8"  id="comboMS">
                                                    <select name="in_CustomerType" class="form-control required">
                                                        <option value="">- Pilih Market Segment -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="">
                                         <input type="hidden" value="22" name="groupId" id="groupId">
                                         <input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>"
                                                name="userId" id="userId">
                                         <input type="hidden"
                                                value="<?php echo $this->session->userdata('location_id'); ?>" name="locId"
                                                id="locId">
                                         <input type="hidden" value="" name="idTD" id="idTD">
                                         <input type="hidden" value="" name="idTH" id="idTH">
                                         <br>
                                     </span>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo
                                           $this->security->get_csrf_hash(); ?>">
                                    <input type="hidden" id="custReff" name="custReff" value="">
                                    <input type="hidden" id="prefix" name="prefix"
                                           value="">
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="control-label col-md-4">Customer Ref
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="custref01" id="custref01" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Title
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Title" id="in_Title"/>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">First Name
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_FirstName" id="in_FirstName"/>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Initials
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Initials" id="in_Initials"/>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Last Name
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_LastName" id="in_LastName"/>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Customer Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_AddressName" id="in_AddressName"
                                                           required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Salutation Name

                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_SalutationName" id="in_SalutationName"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Contact Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8" id="comboContactType">
                                                    <?php echo buatcombo('in_ContactType',
                                                        'in_ContactType',
                                                        'gparams',
                                                        'name',
                                                        'rfid',
                                                        array('rfen' => 'CONTACTTYPE'),
                                                        'Y',
                                                        '- Pilih Contact Type -'
                                                    ); ?>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_Email" id="in_Email"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Street Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_StreetName" id="in_StreetName"
                                                           required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Block Name
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_BlockName" id="in_BlockName" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">District Name
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_DistrictName" id="in_DistrictName" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">City
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_City" id="in_City" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Province

                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_Province" id="in_Province" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">ZIP Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_ZipCode" id="in_ZipCode" required/>
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
                                                <label class="control-label col-md-4">Mobile Number
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_Phone" id="in_Phone"/>
                                                </div>
                                            </div>

                                            <div class="form-group" style="display:none;">
                                                <label class="control-label col-md-4">Contact Start Date (mm/dd/yyyy)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input class="form-control datepicker " type="text" value=""
                                                           id="in_ContactStartDate" name="in_ContactStartDate" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label col-md-4">SAP Code Bill
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="sapCodeBill" id="sapCodeBill" style="text-transform:uppercase" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">SAP Code Unbill
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control required" name="sapCodeUnBill" id="sapCodeUnBill" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Sold2party
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="sold2party" id="sold2party">
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
<?php $this->load->view('lov/lov_parent_customer.php'); ?>
<?php $this->load->view('lov/lov_country.php'); ?>


<script>
$.ajax({
    url: "<?php echo WS_JQGRID.'customer.modify_customer_controller/customer_detail'; ?>",
    type: "POST",
    dataType: "json",
    data: { customer_ref:'<?php echo $this->input->post("customer_ref"); ?>'},
    success: function (data) {
        var customer_detail = data.customer_detail;
        var contact_address = data.contact_address;
        var attributes = data.attributes;

        //wizard 1
        $('#nipnas').val(customer_detail.customer_ref);
        $('#parentCusref').val(customer_detail.parent_customer_ref);
        $('#in_inv_co_id').val(customer_detail.invoicing_co_id);
        $('#in_inv_co_name').val(customer_detail.invoicing_co_name);
        $('#temp_customer_type_id').val(customer_detail.customer_type_id);
        $('#temp_market_segment_id').val(customer_detail.market_segment_id);

        //wizard 2
        $('#custref01').val(customer_detail.customer_ref);
        $('#in_Title').val(contact_address.title);
        $('#in_FirstName').val(contact_address.first_name);
        $('#in_Initials').val(contact_address.initials);
        $('#in_LastName').val(contact_address.last_name);
        $('#in_AddressName').val(contact_address.customer_name); /*customer name*/
        $('#in_SalutationName').val(contact_address.salutation_name);
        $('#temp_contact_type_id').val(contact_address.contact_type_id);

        $('#in_Email').val(contact_address.email_address);
        $('#in_StreetName').val(contact_address.street_name);
        $('#in_BlockName').val(contact_address.block_name);
        $('#in_DistrictName').val(contact_address.district_name);
        $('#in_City').val(contact_address.city_name);
        $('#in_Province').val(contact_address.province);
        $('#in_ZipCode').val(contact_address.zipcode);
        $('#wizard5_country_id').val(contact_address.country_id);
        $('#wizard5_country_code').val(contact_address.country_name);
        $('#in_Phone').val(contact_address.mobile_contact_tel);


        //wizard 3
        $('#sapCodeBill').val(attributes.sap_code_bill);
        $('#sapCodeUnBill').val(attributes.sap_code_unbill);
        $('#sold2party').val(attributes.sold2party);

        f_getComboMSSelected();
        f_getComboCustomerTypeSelected();
        f_getComboContactTypeSelected();
    },
    error: function (xhr, status, error) {
        swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        return false;
    }
});

</script>


<script>
function f_getComboMS(){
invcoid = $('#in_inv_co_id').val();
    $.ajax({
          url: "<?php echo WS_JQGRID.'customer.customer_controller/getComboMS'; ?>",
          type: "POST",
          data: { invoicing_co_id:invcoid},
          success: function (data) {
           $('#comboMS').html(data);
          },
          error: function (xhr, status, error) {
              swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
              return false;
          }
      });

}

function f_getComboMSSelected() {
    invcoid = $('#in_inv_co_id').val();

    $.ajax({
          url: "<?php echo WS_JQGRID.'customer.customer_controller/getComboMS'; ?>",
          type: "POST",
          data: { invoicing_co_id:invcoid, market_segment_id: $('#temp_market_segment_id').val()},
          success: function (data) {
            $('#comboMS').html(data);
          },
          error: function (xhr, status, error) {
              swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
              return false;
          }
      });
}


function f_getComboCustomerTypeSelected() {

    $.ajax({
          url: "<?php echo WS_JQGRID.'customer.customer_controller/getComboCustomerType'; ?>",
          type: "POST",
          data: { customer_type_id :  $('#temp_customer_type_id').val()},
          success: function (data) {
            $('#comboCustomerType').html(data);
          },
          error: function (xhr, status, error) {
              swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
              return false;
          }
      });
}


function f_getComboContactTypeSelected() {

    $.ajax({
          url: "<?php echo WS_JQGRID.'customer.customer_controller/getComboContactType'; ?>",
          type: "POST",
          data: { contact_type_id :  $('#temp_contact_type_id').val()},
          success: function (data) {
            $('#comboContactType').html(data);
          },
          error: function (xhr, status, error) {
              swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
              return false;
          }
      });
}

    $(document).ready(function () {
        $('#btn-lov-nipsos').on('click', function () {
            modal_lov_nipsos_show('nipsos', 'customer_name');
        });
        $('#btn-lov-nipnas').on('click', function () {
            modal_lov_customer_show('parentCusref', 'in_inv_co_id');
        });
        $("#btn-lov-country").on('click', function() {
            modal_lov_country_show('wizard5_country_id','wizard5_country_code');
        });

        $('#parentCusref').change(function(){
           // f_getCombo();
            //$('#in_inv_co_id').val()
                f_getComboMS();
        });
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

                        var custReff = $('#custReff').val();
                        var prefix = $('#prefix').val();
                        var userId = $('#userId').val();
                        var idTD = $('#idTD').val();
                        var idTH = $('#idTH').val();
                        var groupId = $('#groupId').val();

                        if (!idTH) {
                           /* $.ajax({
                                url: "<?php echo site_url('customer_cont/initTransaksi'); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    custReff: custReff,
                                    prefix: prefix
                                },
                                success: function (data) {
                                    $("#trx_no").val(data.txt_noTransaksi);
                                    $("#idTD").val(data.idTD);
                                    $("#idTH").val(data.idTH);
                                },
                                error: function (xhr, status, error) {
                                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                                }
                            });*/
                        }

                        /*if (!custReff) {

                            $.ajax({
                                url: "<?php echo site_url('customer_cont/genCustRef'); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    custReff: custReff,
                                    prefix: prefix
                                },
                                success: function (data) {
                                    $("#txt_cusReff").html(data.strMessage);
                                    $("#custReff").val(data.txt_custRef);
                                    setval('nipnas',data.txt_custRef);
                                    setval('custref01',data.txt_custRef);
                                    $('#in_CustomerType').hide();
                                    $('#in_inv_co_name').show();
                                },
                                error: function (xhr, status, error) {
                                    swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                                }
                            });

                        }*/

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

                        // validate next button
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
                     /*if(form.valid()){
                     form.submit();
                     }*/
                }).hide();


            }

        };

    }();

    jQuery(document).ready(function () {
        FormWizard.init();

        /* Init Transaction*/
        setval('txt_noTransaction',loc_code+'-CUST/'+dt_tgl3+'-???');
        setval('txt_trxDate',dt_tgl2);
        setval('txt_lokasi',loc_name);
        setval('txt_petugas',username);
        /* End Init Transaction */

        $('#submit_form').on('submit', (function (e) {
            // Stop form from submitting normally
            if(!$(this).valid()) {
                return false;
            }
            e.preventDefault();

            var postData = $('#submit_form').serialize(),
                url = "<?php echo site_url('Customer_cont/updateCustomer');?>";

            // Send the data using post
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: postData,
                success: function (data) {
                    if(data.status == "COMPLETED"){
                        swal('',data.status);
                        setTimeout(function(){
                             loadContentWithParams('customer.list_customer',{});
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

        $('#in_inv_co_id').change(function(){

            $('#prefix').val($(this).val());

        });

    });

    $('.datepicker').datepicker({
        todayHighlight: true,
        format: "mm/dd/yyyy",
        autoclose: true
    });
</script>
