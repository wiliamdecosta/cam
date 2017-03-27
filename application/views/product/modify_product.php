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
            <span>Modify Product</span>
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
                     <span class="caption-subject font-red bold uppercase"> Modify Product -
                         <span class="step-title"> Step 1 of 5 </span>
                     </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" action="#" id="submit_form" method="post" enctype="multipart/form-data">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Product &amp; Price Plan </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Details </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number"> 3 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Attributes </span>
                                    </a>
                                </li>
                                 <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number"> 4 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Service Address </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab" class="step">
                                        <span class="number"> 5 </span><br>
                                         <span class="desc">
                                             <i class="fa fa-check"></i> Override Price </span>
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
                                <div class="tab-pane" id="tab1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Product
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-8">
                                                        <input type="hidden" class="form-control required" name="wizard2_product_id" id="wizard2_product_id" value="<?php echo $this->input->post('product_id');?>" readonly>
                                                        <input type="text" class="form-control" name="wizard2_product_name" id="wizard2_product_name"  readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Price Plan
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control required" name="wizard2_tariff_id" id="wizard2_tariff_id" readonly>
                                                        <input type="text" class="form-control required" name="wizard2_tariff_name" id="wizard2_tariff_name"  readonly>
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
                                                    <input type="text" class="form-control" name="in_Product_Quantity" id="in_Product_Quantity" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Additions Quantity
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="in_Additions_Quantity" id="in_Additions_Quantity" readonly />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Terminations Quantity
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="in_Terminations_Quantity" id="in_Terminations_Quantity" readonly />
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo
                                           $this->security->get_csrf_hash(); ?>">
                                    <input type="hidden" name="wizard1_customer_ref" id="wizard1_customer_ref" value="<?php echo $this->input->post('customer_ref');?>">
                                    <input type="hidden" name="wizard1_account_num" id="wizard1_account_num" value="<?php echo $this->input->post('account_num');?>">
                                    <input type="hidden" name="product_seq" id="product_seq" value="<?php echo $this->input->post('product_seq');?>">
                                </div>

                                <!--- TAB 2 -->
                                <div class="tab-pane" id="tab2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Customer Order Number
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" readonly class="form-control required" name="in_Customer_Order_Number" id="in_Customer_Order_Number">
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
                                                    <div id="comboBudget"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Contract Reference
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Contract_Reference" id="in_Contract_Reference">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Product Label
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control required" name="in_Product_Label" id="in_Product_Label">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Contracted Poin of Supply
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                   <div id="comboAcc"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Tax Exemption reference
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Tax_Exemption_reference" id="in_Tax_Exemption_reference">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-6">Additional Exemption Information
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="in_Additional_Exemption_Information" id="in_Additional_Exemption_Information">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--- TAB 3 -->
                                <div class="tab-pane" id="tab3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- generate html -->
                                            <div id="step-content"></div>

                                        </div>
                                    </div>
                                </div>

                                <!--- TAB 4 -->
                                <div class="tab-pane" id="tab4">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Use an existing
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
                                                <label class="control-label col-md-5">Country
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control" name="wizard5_country_id" id="wizard5_country_id" readonly>
                                                        <input type="text" class="form-control required" name="wizard5_country_code" id="wizard5_country_code" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-country">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Address Line 1
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control required" name="wizard5_in_Address_line1" id="wizard5_in_Address_line1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Address Line 2
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="wizard5_in_Address_line2" id="wizard5_in_Address_line2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Additional address 1
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="wizard5_in_Additional_address_1" id="wizard5_in_Additional_address_1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Additional address 2
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="wizard5_in_Additional_address_2" id="wizard5_in_Additional_address_2">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">Zip Code
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control required" name="wizard5_in_Zip_Code" id="wizard5_in_Zip_Code" onkeypress="return isNumberKey(event);">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-5">City
                                                    <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control required" name="wizard5_in_City" id="wizard5_in_City">
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
                                                <!-- <div class="col-md-8">
                                                    <input type="text" class="form-control required" name="in_Start_Date">
                                                </div> -->
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control datepicker1 required" name="wizard5_in_Start_Date" id="wizard5_in_Start_Date">
                                                </div>
                                                <label class="col-md-3 control-label"> DD/MM/YYYY</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">End Date
                                                </label>
                                                <!-- <div class="col-md-8">
                                                    <input type="text" class="form-control" name="in_End_Date">
                                                </div> -->
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control datepicker2" name="wizard5_in_End_Date" id="wizard5_in_End_Date">
                                                </div>
                                                <label class="col-md-3 control-label"> DD/MM/YYYY</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Notes
                                                </label>
                                                <div class="col-md-8">
                                                    <!-- <input type="text" class="form-control" name="in_Notes"> -->
                                                    <textarea rows="4" cols="50" class="form-control" name="wizard5_in_Notes" id="wizard5_in_Notes"> </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Initiation
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <!-- <input type="text" class="form-control" name="in_Initiation"> -->
                                                    <?php echo buatcombo2 (
                                                        $name='one_off_mod_type_id',
                                                        $id='one_off_mod_type_id',
                                                        $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                        $field='s01',
                                                        $pk='n01',
                                                        $kondisi=array(),
                                                        $required='N',
                                                        ''
                                                    ); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_initiation_price" id="wizard5_initiation_price" style="display: none">
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Periodic
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <?php echo buatcombo2 (
                                                        $name='recurring_mod_type_id',
                                                        $id='recurring_mod_type_id',
                                                        $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                        $field='s01',
                                                        $pk='n01',
                                                        $kondisi=array(),
                                                        $required='N',
                                                        ''
                                                    ); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_periodic_price" id="wizard5_periodic_price" style="display: none">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Termination
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <?php echo buatcombo2 (
                                                        $name='termination_mod_type_id',
                                                        $id='termination_mod_type_id',
                                                        $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                        $field='s01',
                                                        $pk='n01',
                                                        $kondisi=array(),
                                                        $required='N',
                                                        ''
                                                    ); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_termination_price" id="wizard5_termination_price" style="display: none">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Suspension
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <?php echo buatcombo2 (
                                                            $name='susp_mod_type_id',
                                                            $id='susp_mod_type_id',
                                                            $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                            $field='s01',
                                                            $pk='n01',
                                                            $kondisi=array(),
                                                            $required='N',
                                                            ''
                                                        ); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_suspesion_price" id="wizard5_suspesion_price" style="display: none">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Suspended Periodic
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <?php echo buatcombo2 (
                                                        $name='susp_recur_mod_type_id',
                                                        $id='susp_recur_mod_type_id',
                                                        $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                        $field='s01',
                                                        $pk='n01',
                                                        $kondisi=array(),
                                                        $required='N',
                                                        ''
                                                    ); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_susp_recur_price" id="wizard5_susp_recur_price" style="display: none">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Reactivation
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                    <?php echo buatcombo2 (
                                                        $name='react_mod_type_id',
                                                        $id='react_mod_type_id',
                                                        $table="table(pack_lov.get_modtypeid_list('".getUserName()."')) order by N01 asc",
                                                        $field='s01',
                                                        $pk='n01',
                                                        $kondisi=array(),
                                                        $required='N',
                                                        ''
                                                    ); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control priceformat" name="wizard5_react_price" id="wizard5_react_price" style="display: none">
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

<?php $this->load->view('lov/lov_price_plan.php'); ?>
<?php $this->load->view('lov/lov_addr.php'); ?>
<?php $this->load->view('lov/lov_country.php'); ?>
<?php $this->load->view('lov/lov_profit_center.php'); ?>
<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
};

$(".priceformat").number( true, 0 , '.',','); /* price number format */
$(".priceformat").css("text-align", "right");

$(".numberformat").number( true, 0 , '.',',');
$(".numberformat").css("text-align", "right");

$("#btn-lov-bm").on('click', function() {
    //alert('test');
    modal_lov_bm_show('wizard1_bm_code');
});


$("#btn-lov-price-plan").on('click', function() {
    var account_num = $('#wizard1_account_num').val();
    var product_id = $('#wizard2_product_id').val();
    //alert(product_id);
    if(account_num == "") {
        swal('Info','Account harus diisi terlebih dahulu','info');
        return;
    }
    if(product_id == "") {
        swal('Info','Product harus diisi terlebih dahulu','info');
        return;
    }
    modal_lov_price_plan_show('wizard2_tariff_id','wizard2_tariff_name',account_num,product_id);
});

$("#btn-lov-addr").on('click', function() {
    var customer_ref = $('#wizard1_customer_ref').val();
    if(customer_ref == "") {
        swal('Info','Customer harus diisi terlebih dahulu','info');
        return;
    }
     modal_lov_addr_show('wizard5_exst_addr','wizard5_exst_addr_code','wizard5_country_id','wizard5_country_code','wizard5_in_Address_line1','wizard5_in_Address_line2','wizard5_in_Additional_address_1','wizard5_in_Additional_address_2','wizard5_in_Zip_Code','wizard5_in_City',customer_ref);
});

$("#btn-lov-country").on('click', function() {
     modal_lov_country_show('wizard5_country_id','wizard5_country_code');
});

$('#susp_mod_type_id').on('change', function() {

    var cek_susp = $('#susp_mod_type_id').val();
    var y = document.getElementById("wizard5_suspesion_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
});

$('#react_mod_type_id').on('change', function() {

    var cek_susp = $('#react_mod_type_id').val();
    var y = document.getElementById("wizard5_react_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
});

$('#one_off_mod_type_id').on('change', function() {

    var cek_susp = $('#one_off_mod_type_id').val();
    var y = document.getElementById("wizard5_initiation_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
});

$('#recurring_mod_type_id').on('change', function() {

    var cek_susp = $('#recurring_mod_type_id').val();
    var y = document.getElementById("wizard5_periodic_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
});

$('#termination_mod_type_id').on('change', function() {

    var cek_susp = $('#termination_mod_type_id').val();
    var y = document.getElementById("wizard5_termination_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
});

$('#susp_recur_mod_type_id').on('change', function() {

    var cek_susp = $('#susp_recur_mod_type_id').val();
    var y = document.getElementById("wizard5_susp_recur_price");
    if(cek_susp == 0){
        y.style.display = "none";
        y.value = "";
    }else{
        y.style.display = "";
    }
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


        $('#submit_form').on('submit', (function (e) {
            if(!$("#submit_form").valid()) {
                return false;
            }
            // Stop form from submitting normally
            e.preventDefault();

            var postData = new FormData(this),
                url = "<?php echo site_url('home/modify_product');?>";
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

                        
                        swal({title: data.status, text: data.msg, html: true, type: "info"});

                        setTimeout(function(){
                             loadContentWithParams('product.list_product',{});
                        }, 3000);

                        // $('#submit_form')[0].reset();
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

    $.ajax({
        url: "<?php echo base_url().'home/gen_prod/'.$this->input->post('account_num'); ?>",
        type: "POST",
        dataType: "json",
        data: {},
        success: function (data) {
            $('#in_Product_Label').val(data.jml);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'home/load_combo_budg/'.$this->input->post('account_num'); ?>",
        type: "POST",
        data: {},
        success: function (data) {
            $( "#comboBudget" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'home/load_combo_acc/'.$this->input->post('account_num'); ?>",
        type: "POST",
        data: {},
        success: function (data) {
            $( "#comboAcc" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: "<?php echo base_url().'home/get_date/'; ?>" ,
        type: "POST",
        dataType: "json",
        data: {},
        success: function (data) {
            $('.datepicker1').val(data.dates);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $('.datepicker1').datetimepicker({
        format: 'DD/MM/YYYY',
        // defaultDate: new Date()
    });

    $('.datepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $.ajax({
        url: "<?php echo base_url().'home/load_html/'.$this->input->post('product_id'); ?>",
        type: "POST",
        data: {},
        success: function (data) {
            $( "#step-content" ).html( data );
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });


     $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_detail_prod"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#wizard2_product_name').val(dt.product_name);
                $('#in_Customer_Order_Number').val(dt.cust_order_num);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_price_plan"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>",
            _search : false
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#wizard2_tariff_name').val(dt.tariff_name);
                $('#in_Product_Quantity').val(dt.product_quantity);
                $('#in_Additions_Quantity').val(dt.additions_quantity);
                $('#wizard2_tariff_id').val(dt.tariff_id);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
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
                $('#in_Supplier_Order_Number').val(dt.subscription);
                $('#in_BudgetCenter').val(dt.budget_centre_seq);
                $('#in_Contract_Reference').val(dt.contract_reff);
                $('#in_Product_Label').val(dt.product_label);
                $('#in_cps').val(dt.cps_id);
                $('#in_Tax_Exemption_reference').val(dt.tax_exempt_ref);
                $('#in_Additional_Exemption_Information').text(dt.tax_exempt_txt);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_service_address"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>",
            _search : false
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#wizard5_country_code').val(dt.country_name);
                $('#wizard5_country_id').val(dt.country_id);
                $('#wizard5_in_Address_line1').val(dt.address_1);
                $('#wizard5_in_Address_line2').val(dt.address_2);
                $('#wizard5_in_Additional_address_1').val(dt.address_4);
                $('#wizard5_in_Additional_address_2').val(dt.address_5);
                $('#wizard5_in_Zip_Code').val(dt.zipcode);
                $('#wizard5_in_City').val(dt.address_3);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $.ajax({
        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_override_price"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>",
            _search : false
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                $('#wizard5_in_Start_Date').val(dt.start_dat);
                $('#wizard5_in_End_Date').val(dt.end_dat);
                $('#wizard5_in_Notes').val(dt.notes_txt);
                if(dt.initiation){
                    $('#one_off_mod_type_id').val(1);
                    $('#wizard5_initiation_price').val(dt.initiation);
                    $('#wizard5_initiation_price').css("display", "block");
                }
                if(dt.periodic){
                    $('#recurring_mod_type_id').val(1);
                    $('#wizard5_periodic_price').val(dt.periodic);
                    $('#wizard5_periodic_price').css("display", "block");
                }
                if(dt.termination){
                    $('#termination_mod_type_id').val(1);
                    $('#wizard5_termination_price').val(dt.termination);
                    $('#wizard5_termination_price').css("display", "block");
                }
                if(dt.suspension){
                    $('#susp_mod_type_id').val(1);
                    $('#wizard5_suspesion_price').val(dt.suspension);
                    $('#wizard5_suspesion_price').css("display", "block");
                }
                if(dt.suspension_periodic){
                    $('#susp_recur_mod_type_id').val(1);
                    $('#wizard5_susp_recur_price').val(dt.suspension_periodic);
                    $('#wizard5_susp_recur_price').css("display", "block");
                }
                if(dt.reactivation){
                    $('#react_mod_type_id').val(1);
                    $('#wizard5_react_price').val(dt.reactivation);
                    $('#wizard5_react_price').css("display", "block");
                }
                
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

</script>