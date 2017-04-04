<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script><!-- breadcrumb -->
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
            <span>Terminate Product</span>
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
                        <strong>Terminate Product </strong>
                    </a>
                </li>
            </ul>
        </div>-->

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet red box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Terminate Product</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">                      
                            <!-- Product -->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="form-body">
                                        <div class="form-group">

                                            <label class="control-label col-md-3">Status</label>
                                            <label class="control-label col-md-6" style="text-align: left !important;" id="prod_status_code" name="prod_status_code"></label>
                                            <div class="col-md-3">
                                                <label class="control-label col-md-3" style="text-align: left !important;" id="prod_status_code" name="prod_status_code">Terminated</label>
                                                <input type="hidden" class="form-control required" name="prod_status_code1" id="prod_status_code1" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Effective From</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control datepicker1" name="current_effective_dtm" id="current_effective_dtm">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Current Status</label>
                                            <div class="col-md-3">
                                                <label class="control-label col-md-3" style="text-align: left !important;" id="current_status" name="current_status"></label>
                                                <input type="hidden" class="form-control required" name="current_status1" id="current_status1" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Reason</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="current__reason_txt" id="current__reason_txt"></textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green button-submit"> Submit
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-danger radius-4" id="cancel" >
                                                    <i class="fa fa-times"></i>
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.datepicker1').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss',
        // defaultDate: new Date()
    });

    $('#tab-0').on('click', function(event){
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
                $('#prod_status_code1').val(dt.prod_status_code);
                $('#current_effective_dtm').val(dt.current_effective_dtm);
                $('#current_status').text(dt.current_status);
                $('#current_status1').text(dt.current_status);
                $('#current__reason_txt').val(dt.current__reason_txt);
            }
            // console.log(dt.product_name);
        },
        error: function (xhr, status, error) {
            swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
        }
    });

    $('#cancel').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("product.list_product", {});
    });
</script>
