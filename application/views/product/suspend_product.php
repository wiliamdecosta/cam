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
            <span>Product</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>List Product</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Suspend Product</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet blue box menu-panel">
            <div class="portlet-title">
                <div class="caption">Suspend</div>
                <div class="tools">
                    <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">                      
                <form class="form-horizontal" action="#" id="submit_form" method="POST">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="form-body">
                        
                                <div class="form-group">
                                    <label class="control-label col-md-4">Status
                                        <span class="required">  * </span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="hidden" class="form-control required" name="status_code" id="status_code"  value="SU">
                                        <input type="hidden" class="form-control " name="cust_order_number" id="cust_order_number"  >
                                        <label  class="control-label" name="status" id="status" >Suspended </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Effective From
                                        <span class="required">  * </span> 
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control datepicker1 required" name="eff_from" id="eff_from">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Current Status
                                    </label>
                                    <div class="col-md-2">
                                        <label  class="control-label" name="curr_status" id="curr_status" > </label>
                                    </div>
                                </div>
                                
                               <!--  <div class="form-group">
                                    <label class="control-label col-md-4">
                                        Effective Periode of Status
                                    </label>
                                    <div class="col-md-4">
                                          <label class="radio-inline"><input type="radio" value="1" id="radio1" name="eff_period_of_status">Indfinite</label>
                                          <label class="radio-inline"><input type="radio" value="2" id="radio2" name="eff_period_of_status">Next Status Start</label>
                                          <input type="text" class="form-control datepicker1" name="eff_period_of_status_tgl" id="eff_period_of_status_tgl">
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Reason
                                    </label>
                                    <div class="col-md-5">
                                        <textarea rows="4" cols="50" class="form-control" name="reason" id="reason" > </textarea>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control required" name="prod_status_code1" id="prod_status_code1">
                                <input type="hidden" class="form-control required" name="customer_ref" id="customer_ref" value="<?php echo $this->input->post('customer_ref'); ?>">
                                <input type="hidden" class="form-control required" name="product_seq" id="product_seq" value="<?php echo $this->input->post('product_seq'); ?>">
                                <input type="hidden" class="form-control required" name="account_num" id="account_num" value="<?php echo $this->input->post('account_num'); ?>">
                                <input type="hidden" class="form-control required" name="product_label" id="product_label" value="<?php echo $this->input->post('product_label'); ?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                            
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-9">                                    
                                        <button type="submit" class="btn green radius-4 button-submit" id="sub_form">
                                            <i class="fa fa-check"></i>
                                        Submit
                                            
                                        </button>
                                        <button type="button" class="btn btn-danger radius-4" id="btn-cancel" >
                                            <i class="fa fa-times"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script>

    // $('#radio2').on('change', function(){
    //     $('#eff_period_of_status_tgl').attr('readonly', false);
    // });

    // $('#radio1').on('change', function(){
    //     $('#eff_period_of_status_tgl').attr('readonly', true);
    //     $('#eff_period_of_status_tgl').val('');
    // });


    $.ajax({

        url: '<?php echo WS_JQGRID."product.detailproduct_controller/read_reactivate_product"; ?>',
        type: "POST",
        dataType: "json",
        data: {
            customer_ref: "<?php echo $this->input->post('customer_ref'); ?>",
            product_seq : "<?php echo $this->input->post('product_seq'); ?>"
        },
        success: function (data) {
            if(data.success){
                var dt = data.rows[0];
                
                $('#eff_from').val(dt.current_effective_dtm);
                $('#curr_status').text(dt.current_status);
                $('#prod_status_code1').val(dt.prod_status_code);
                $('#reason').val(dt.current__reason_txt);
                // $('#radio1').attr('checked', true);
                // $('#radio2').attr('checked', false);
                 // $('#eff_period_of_status_tgl').attr('readonly', true);
                 // $('#eff_period_of_status_tgl').val('');

                $('.datepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    minDate: new Date(dt.current_effective_dtm)
                });

            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $('#btn-cancel').on('click', function(){
        loadContentWithParams("product.list_product", {});
    });

    $('#submit_form').on('submit', (function (e) {
        if(!$("#submit_form").valid()) {
            return false;
        }

        if($('#prod_status_code1').val() != 'OK'){
            swal('', 'Current Status is Not Active', 'error');
            return false;
        }
        // Stop form from submitting normally
        e.preventDefault();



        var postData = new FormData(this),
            url = "<?php echo site_url('product/suspend_product');?>";
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
                         loadContentWithParams('product.list_product',{});
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
</script>
