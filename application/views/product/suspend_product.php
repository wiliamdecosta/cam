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
    <div class="col-xs-12">
        <!--<div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-0">
                        <i class="blue"></i>
                        <strong> List Product </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong>Suspend Product </strong>
                    </a>
                </li>
            </ul>
        </div>-->

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet red box menu-panel">
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

                                                <label class="control-label col-md-3">Status
                                                    <span class="required">  * </span>
                                                <label class="control-label col-md-6" style="text-align: left !important;" id="prod_status_code" name="prod_status_code"></label>
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="hidden" class="form-control required" name="status_code" id="status_code"  value="SU">
                                                    <input type="hidden" class="form-control " name="cust_order_number" id="cust_order_number"  >
                                                    <label  class="control-label" name="status" id="status" >Suspended </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Effective From
                                                    <span class="required">  * </span> 
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control datepicker1 required" name="eff_from" id="eff_from">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Current Status
                                                </label>
                                                <div class="col-md-2">
                                                    <label  class="control-label" name="curr_status" id="curr_status" > </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Effective Periode of Status
                                                </label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="radio">
                                                  <label class="control-label col-md-4 alfa"><input type="radio" name="eff_period_of_status">Indfinite</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="radio">
                                                  <label class="control-label col-md-4"><input type="radio" name="eff_period_of_status">Next Status Start</label>
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="text" class="form-control datepicker2" name="eff_period_of_status_tgl" id="eff_period_of_status_tgl" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Reason
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea rows="4" cols="50" class="form-control" name="reason" id="reason" > </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">                                    
                                                    <button type="submit" class="btn green btn-sm radius-4 button-submit" id="sub_form">
                                                        <i class="fa fa-check"></i>
                                                    Submit
                                                        
                                                    </button>
                                                    <button class="btn btn-danger btn-sm radius-4" id="cancel" >
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
        </div>
    </div>
</div>

<script>

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
        format: 'DD/MM/YYYY HH:mm:ss'
    });
    $('.datepicker2').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss'
    });


     $('#cancel').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.list_product", {});
    });


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

            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });
</script>
