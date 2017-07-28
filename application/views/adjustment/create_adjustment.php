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
        <div class="portlet blue box menu-panel">
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
                                    <label class="control-label col-md-4">Product <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-group">  
                                            <input type="hidden" class="form-control required" name="product_id" id="product_id" readonly>                                          
                                            <input type="text" class="form-control required" name="product_name" id="product_name" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn-lov-product">
                                                <i class="fa fa-search"></i></button>
                                            </span>

                                            <input type="hidden" class="form-control required" name="product_label" id="product_label" readonly>
                                            <input type="hidden" class="form-control required" name="customer_ref" id="customer_ref" readonly>
                                            <input type="hidden" class="form-control required" name="product_seq" id="product_seq" readonly>
                                            <input type="hidden" class="form-control required" name="cps_id" id="cps_id" readonly>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Account <span class="required">  * </span>
                                    </label>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="account" id="account" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Account Name <span class="required">  * </span>
                                    </label>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="account_name" id="account_name" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Adjustment Type <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-group">  
                                            <input type="hidden" class="form-control required" name="adjestment_type_id" id="adjestment_type_id" readonly>                                          
                                            <input type="text" class="form-control required" name="adjestment_type" id="adjestment_type" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn-lov-adjusment-type">
                                                <i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Balance Type <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">        
                                        <select class="form-control required" name="balance_type">
                                            <option value="-1">Penambah Bill</option>
                                            <option value="1">Pengurang Bill</option>
                                        </select>
                                        <span class="help-block"></span>                                   
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Value <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control priceformat required" name="val" id="val">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Adjustment Date <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-3">                                           
                                        <input type="text" class="form-control datepicker required" name="adjestment_date" id="adjestment_date">
                                    </div>
                                    <label class="control-label col-md-1">DD/MM/YYYY</label>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Invoice ? </span>
                                    </label>
                                    <div class="col-md-6">                                           
                                       <input id="checkbox-inv" type="checkbox" class="form-control" value="" style="width: auto; box-shadow: none; !important">
                                    </div>
                                </div>

                                <div class="form-group" id="group-inv" style="display: none;">
                                    <label class="control-label col-md-4"></label>
                                    <div class="col-md-4">
                                        <div class="input-group">  
                                            <input type="hidden" class="form-control required" name="invoice_no" id="invoice_no" readonly>                                          
                                            <input type="text" class="form-control required" name="invoice_name" id="invoice_name" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn-lov-invoice">
                                                <i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-4">Description 
                                    </label>
                                    <div class="col-md-4">                                           
                                        <textarea rows="4" cols="50" class="form-control" name="description" id="description"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"></label>
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

<?php $this->load->view('lov/lov_adjustment_type.php'); ?>
<?php $this->load->view('lov/lov_product_adjustment.php'); ?>

<script>

$('#checkbox-inv').on('change', function(){
    // alert('test');
    $('#group-inv').slideToggle( "slow" );
});

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
    format: 'DD/MM/YYYY',
    defaultDate: new Date()
});

$(".datepicker").keypress(function(event) {event.preventDefault();});

$('.datepickerRO').datetimepicker({
    format: 'DD/MM/YYYY',
    defaultDate: new Date()
});

$(".datepickerRO").keypress(function(event) {event.preventDefault();});

$("#btn-lov-adjusment-type").on('click',function(){
    modal_lov_adjustment_type_show('adjestment_type_id','adjestment_type');
});
$("#btn-lov-product").on('click',function(){
    modal_lov_product_adjustment_show('product_id','product_name','account','account_name','product_label','customer_ref','product_seq','cps_id');
});

$('#submit_form').on('submit', (function (e) {
    if(!$("#submit_form").valid()) {
        return false;
    }
    // Stop form from submitting normally
    e.preventDefault();

    var postData = new FormData(this),
        url = "<?php echo site_url('home/save_adjustment');?>";
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

                // setTimeout(function(){
                //      loadContentWithParams('product.list_product',{});
                // }, 3000);
            }else{
                swal('',data.status);
            }

        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
}));

</script>
