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
            <span>Account</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>List Account</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Terminate Account</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet red box menu-panel">
                        <div class="portlet-title">
                            <div class="caption">Terminate Account</div>
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

                                                <label class="control-label col-md-3">Terminate Date <span class="required">  * </span></label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control datepicker1 required" name="terminate_date" id="terminate_date">

                                                    <input type="hidden" class="form-control" name="cust_order_number" id="cust_order_number">

                                                    <input type="hidden"
                                                               name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                               value="<?php echo
                                                               $this->security->get_csrf_hash(); ?>" >
                                                    <label class="control-label col-md-6" style="text-align: left !important;" id="prod_status_code" name="prod_status_code"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Terminate Reason <span class="required">  * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input type="hidden" class="form-control required" name="terminate_reason_id" id="terminate_reason_id" readonly>
                                                        <input type="text" class="form-control required" name="terminate_reason_code" id="terminate_reason_code" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" id="btn-lov-reason">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green radius-4 button-submit" id="sub_form">
                                                    <i class="fa fa-check"></i>
                                                    Submit    
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
                            </form>
                            <!-- Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_terminate_reason.php'); ?>
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



    $("#btn-lov-reason").on('click', function() {
        //alert('tes');
        modal_lov_terminate_reason_show('terminate_reason_id','terminate_reason_code');
    });

    $('.datepicker1').datetimepicker({
        format: 'DD/MM/YYYY',
        // defaultDate: new Date()
    });

    $('#cancel').on('click', function(event){
        event.stopPropagation();
        loadContentWithParams("account.list_account", {});
    });


    
</script>
