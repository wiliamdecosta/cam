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
            <a href="#">Adjustment</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Create Adjustment</span>
        </li>
    </ul>
</div>

<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet red box menu-panel">
            <div class="portlet-title">
                <div class="caption">Create Adjustment</div>
                <div class="tools">
                    <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
                <div class="portlet-body">
                    <form class="form-horizontal" action="#" id="submit_form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Account <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control required" name="wizard1_customer_ref" id="wizard1_customer_ref" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">                                            
                                            <input type="text" class="form-control required" name="wizard1_customer_code" id="wizard1_customer_code" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn-lov-customer">
                                                <i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2">Account Name <span class="required">  * </span>
                                    </label>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control required" name="account_name" id="account_name" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Adjustment Type <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-group">                                            
                                            <input type="text" class="form-control required" name="adjestment_type" id="adjestment_type" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn-lov-customer">
                                                <i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Balance Type <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control required" name="balance_type" id="balance_type">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2">Value
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control" name="val" id="val">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Adjustment Date <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control datepicker required" name="adjestment_date" id="adjestment_date">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-2">Description 
                                    </label>
                                    <div class="col-md-4">                                           
                                        <textarea rows="4" cols="50" class="form-control" name="description" id="description"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Send Date <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control datepickerRO" readonly="" name="send_date" id="send_date">
                                    </div>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control" readonly="" name="sender" id="sender">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Update Date <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control datepickerRO" readonly="" name="update_date" id="update_date">
                                    </div>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control" readonly="" name="update_by" id="update_by">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Create Date <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control datepickerRO" readonly="" name="create_date" id="create_date">
                                    </div>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control" readonly="" name="create_by" id="create_by">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2"></label>
                                    <div class="col-md-3">
                                        <button class="btn green button-submit"> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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

$('.datepicker').datetimepicker({
    format: 'DD/MM/YYYY'
});

$('.datepickerRO').datetimepicker({
    format: 'DD/MM/YYYY',
    defaultDate: new Date()
});


</script>
