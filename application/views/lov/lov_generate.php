<link href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<div id="modal_lov_generate" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Generate Data</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_generate_id_val" value="" />
            <input type="hidden" id="modal_lov_generate_code_val" value="" />

            <!-- modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="#" id="submit_form" method="post">
                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Periode
                                </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker1" name="periode" id="periode">
                                </div>
                                <label class="col-md-1 control-label"> YYYYMM</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Description
                                </label>
                                <div class="col-md-4">
                                    <!-- <input type="text" class="form-control" name="in_Notes"> -->
                                    <textarea rows="4" cols="50" class="form-control" name="desc" id="desc" maxlength="255"> </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                                        <i class="fa fa-times"></i>
                                        Close
                                    </button>
                                    <button type="submit" class="btn green btn-sm radius-4 button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <!-- <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Close
                        </button> -->
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    $('.datepicker1').datetimepicker({
        format: 'YYYYMM',
        // defaultDate: new Date()
    });

    function modal_lov_generate_show() {
        $("#modal_lov_generate").modal({backdrop: 'static'});
    }

    $('#submit_form').on('submit', (function (e) {
        if(!$("#submit_form").valid()) {
            return false;
        }
        $.ajax({
        url: '<?php echo WS_JQGRID."invoice.generate_sap_unbill_controller/submit_sap"; ?>',
            type: "POST",
            dataType: "json",
            data: {
                i_nper: $('#periode').val(),
                i_desc : $('#desc').val()
            },
            success: function (data) {

                if(data.success){
                    swal( 'SUCCESS!', 'Generate SUCCESS', 'success' );
                    $('#grid-table').trigger("reloadGrid");
                }    

            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
    }));
    
</script>