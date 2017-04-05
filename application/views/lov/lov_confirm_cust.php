  <div id="modal_lov_cust" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Customer Delete Confirm</span>
                </div>
            </div>
            <input type="hidden" id="customer_ref" value="" />
            <input type="hidden" id="parent" value="" />

            <!-- modal body -->
            <div class="modal-body">
                    <input type="radio" id="radio1" name="radio_cust" value="N"> Delete Customer <label id="lblcust1"></label> ? <br>
                    <input type="radio" id="radio2" name="radio_cust" value="Y"> Delete Customer <label id="lblcust2"></label> and their hierarchy ?
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <button class="btn btn-success btn-sm radius-4" data-dismiss="modal" type="button" id="btn-submit">
                            <i class="fa fa-check"></i>
                            Yes
                        </button>
                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    

    function modal_lov_cust_show(customer_ref, parent) {   

        modal_lov_cust_set_field_value(customer_ref, parent);
        $("#modal_lov_cust").modal({backdrop: 'static'});        
        // modal_lov_cust_prepare_table(customer_ref);
    }


    function modal_lov_cust_set_field_value(customer_ref, parent) {
         $("#lblcust1").text(customer_ref);
         $("#lblcust2").text(customer_ref);
         $("#customer_ref").val(customer_ref);
         $("#parent").val(parent);         
         $('#radio1').attr('checked', true);
         $('#radio2').attr('checked', false);
    }

    $('#btn-submit').on('click', function(){
        var check = '';
        if($('#radio1').is(':checked')){
            check = 'N';
        }else{
            check = 'Y';
        }

        $.ajax({
            url: "<?php echo site_url('customer_cont/delete_customer');?>",
            type: "POST",
            dataType: "json",
            data: {
                customer_ref: $("#customer_ref").val(),
                hierarchy : check
            },
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
    });
   
</script>