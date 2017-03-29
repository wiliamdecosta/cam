  <div id="modal_lov_product_adjustment" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:1000px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Data Product Adjustment</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_product_adjustment_id_val" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_code_val" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_account_num" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_account_name" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_product_label" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_customer_ref" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_product_seq" value="" />
            <input type="hidden" id="modal_lov_product_adjustment_cps_id" value="" />

            <!-- modal body -->
            <div class="modal-body">
                <div>
                  <button type="button" class="btn btn-sm btn-success" id="modal_lov_product_adjustment_btn_blank">
                    <span class="fa fa-pencil-square-o bigger-110" aria-hidden="true"></span> BLANK
                  </button>
                </div>
                <table id="modal_lov_product_adjustment_grid_selection" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                     <th data-column-id="product_id"  data-sortable="false" data-visible="false">ID Product</th>
                     <th data-header-align="center" data-align="center" data-formatter="opt-edit" data-sortable="false" data-width="100">Options</th>
                     <th data-column-id="product_label">Product Label</th>
                     <th data-column-id="product_name" >Product Name</th>
                     <th data-column-id="account_num">Account Num</th>
                     <th data-column-id="account_name">Account Name</th>
                     <th data-column-id="customer_ref" data-visible="false">Customer Ref</th>
                     <th data-column-id="product_seq" data-visible="false">Product Seq</th>
                     <th data-column-id="cps_id" data-visible="false">CPS ID</th>
                  </tr>
                </thead> 
                </table>
            </div>

            <!-- modal footer -->
            <div class="modal-footer no-margin-top">
                <div class="bootstrap-dialog-footer">
                    <div class="bootstrap-dialog-footer-buttons">
                        <button class="btn btn-danger btn-sm radius-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.end modal -->

<script>
    $(function($) {
        $("#modal_lov_product_adjustment_btn_blank").on('click', function() {
            $("#"+ $("#modal_lov_product_adjustment_id_val").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_code_val").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_account_num").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_account_name").val()).val("");

            $("#"+ $("#modal_lov_product_adjustment_product_label").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_customer_ref").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_product_seq").val()).val("");
            $("#"+ $("#modal_lov_product_adjustment_cps_id").val()).val("");
            $("#modal_lov_product_adjustment").modal("toggle");
        });
    });

    function modal_lov_product_adjustment_show(the_id_field, the_code_field,account_num,account_name,product_label,customer_ref,product_seq,cps_id) {
        modal_lov_product_adjustment_set_field_value(the_id_field, the_code_field,account_num,account_name,product_label,customer_ref,product_seq,cps_id);
        $("#modal_lov_product_adjustment").modal({backdrop: 'static'});
        modal_lov_product_adjustment_prepare_table();
    }


    function modal_lov_product_adjustment_set_field_value(the_id_field, the_code_field,account_num,account_name,product_label,customer_ref,product_seq,cps_id) {
         $("#modal_lov_product_adjustment_id_val").val(the_id_field);
         $("#modal_lov_product_adjustment_code_val").val(the_code_field);
         $("#modal_lov_product_adjustment_account_num").val(account_num);
         $("#modal_lov_product_adjustment_account_name").val(account_name);

         $("#modal_lov_product_adjustment_product_label").val(product_label);
         $("#modal_lov_product_adjustment_customer_ref").val(customer_ref);
         $("#modal_lov_product_adjustment_product_seq").val(product_seq);
         $("#modal_lov_product_adjustment_cps_id").val(cps_id);

    }

    function modal_lov_product_adjustment_set_value(the_id_val, the_code_val,account_num,account_name,product_label,customer_ref,product_seq,cps_id) {
         $("#"+ $("#modal_lov_product_adjustment_id_val").val()).val(the_id_val);
         $("#"+ $("#modal_lov_product_adjustment_code_val").val()).val(the_code_val);
         $("#"+ $("#modal_lov_product_adjustment_account_num").val()).val(account_num);
         $("#"+ $("#modal_lov_product_adjustment_account_name").val()).val(account_name);

         $("#"+ $("#modal_lov_product_adjustment_product_label").val()).val(product_label);
         $("#"+ $("#modal_lov_product_adjustment_customer_ref").val()).val(customer_ref);
         $("#"+ $("#modal_lov_product_adjustment_product_seq").val()).val(product_seq);
         $("#"+ $("#modal_lov_product_adjustment_cps_id").val()).val(cps_id);

         $("#modal_lov_product_adjustment").modal("toggle");

         $("#"+ $("#modal_lov_product_adjustment_id_val").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_code_val").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_account_num").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_account_name").val()).change();

         $("#"+ $("#modal_lov_product_adjustment_product_label").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_customer_ref").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_product_seq").val()).change();
         $("#"+ $("#modal_lov_product_adjustment_cps_id").val()).change();
    }

    function modal_lov_product_adjustment_prepare_table() {
        $("#modal_lov_product_adjustment_grid_selection").bootgrid("destroy");
        $("#modal_lov_product_adjustment_grid_selection").bootgrid({
             formatters: {
                "opt-edit" : function(col, row) { 
                    return '<a href="javascript:;" title="Set Value" onclick="modal_lov_product_adjustment_set_value(\''+ row.product_id +'\', \''+ row.product_name +'\',\''+row.account_num+'\',\''+row.account_name+'\',\''+row.product_label+'\',\''+row.customer_ref+'\',\''+row.product_seq+'\',\''+row.cps_id+'\')" class="blue"><i class="fa fa-pencil-square-o bigger-130"></i></a>';
                }
             },
             rowCount:[5,10],
             ajax: true,
             requestHandler:function(request) {
                if(request.sort) {
                    var sortby = Object.keys(request.sort)[0];
                    request.dir = request.sort[sortby];

                    delete request.sort;
                    request.sort = sortby;
                }
                return request;
             },
             responseHandler:function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }
                return response;
             },
             url: '<?php echo WS_BOOTGRID."adjustment.adjustment_controller/readLovProduct"; ?>',
             post: {},
             selection: true,
             sorting:true
        });

        $('.bootgrid-header span.glyphicon-search').removeClass('glyphicon-search')
        .html('<i class="fa fa-search"></i>');
    }
</script>