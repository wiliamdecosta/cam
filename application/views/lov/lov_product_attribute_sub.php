<div id="modal_lov_product_attribute_sub" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Data Product Attribute Sub</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_product_attribute_sub_id_val" value="" />
            <input type="hidden" id="modal_lov_product_attribute_sub_code_val" value="" />

            <!-- modal body -->
            <div class="modal-body">
                <div>
                  <button type="button" class="btn btn-sm btn-success" id="modal_lov_product_attribute_sub_btn_blank">
                    <span class="fa fa-pencil-square-o bigger-110" aria-hidden="true"></span> BLANK
                  </button>
                </div>
                <table id="modal_lov_product_attribute_sub_grid_selection" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                     <th data-header-align="center" data-align="center" data-formatter="opt-edit" data-sortable="false" data-width="100">Options</th>
                     <th data-column-id="product_attribute_subid" data-sortable="true" data-visible="false">Product Attribute Sub ID</th>
                     <th data-column-id="product_id" data-visible="false">Product ID</th>
                     <th data-column-id="attribute_ua_name">Attribute Ua Name</th>
                     <th data-column-id="attribute_bill_name">Attribute Bill Name</th>
                     <th data-column-id="mandatory_boo">Mandatory Boo</th>
                     <th data-column-id="attribute_units">Attribute Units</th>
                     <th data-column-id="display_position">Display Position</th>
                     <th data-column-id="val_type">Val Type</th>
                     <th data-column-id="val_refference">Val Type</th>
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
        $("#modal_lov_product_attribute_sub_btn_blank").on('click', function() {
            $("#"+ $("#modal_lov_product_attribute_sub_id_val").val()).val("");
            $("#"+ $("#modal_lov_product_attribute_sub_code_val").val()).val("");
            $("#modal_lov_product_attribute_sub").modal("toggle");
        });
    });

    function modal_lov_product_attribute_sub_show(the_id_field, the_code_field, product_id) {
        modal_lov_product_attribute_sub_set_field_value(the_id_field, the_code_field);
        $("#modal_lov_product_attribute_sub").modal({backdrop: 'static'});
        modal_lov_product_attribute_sub_prepare_table(product_id);
    }


    function modal_lov_product_attribute_sub_set_field_value(the_id_field, the_code_field) {
         $("#modal_lov_product_attribute_sub_id_val").val(the_id_field);
         $("#modal_lov_product_attribute_sub_code_val").val(the_code_field);
    }

    function modal_lov_product_attribute_sub_set_value(the_id_val, the_code_val) {
         $("#"+ $("#modal_lov_product_attribute_sub_id_val").val()).val(the_id_val);
         $("#"+ $("#modal_lov_product_attribute_sub_code_val").val()).val(the_code_val);
         $("#modal_lov_product_attribute_sub").modal("toggle");

         $("#"+ $("#modal_lov_product_attribute_sub_id_val").val()).change();
         $("#"+ $("#modal_lov_product_attribute_sub_code_val").val()).change();
    }

    function modal_lov_product_attribute_sub_prepare_table(product_id) {
        $("#modal_lov_product_attribute_sub_grid_selection").bootgrid("destroy");
        $("#modal_lov_product_attribute_sub_grid_selection").bootgrid({
             formatters: {
                "opt-edit" : function(col, row) {
                    return '<a href="javascript:;" title="Set Value" onclick="modal_lov_product_attribute_sub_set_value(\''+ row.product_attribute_subid +'\', \''+ row.product_attribute_subid + '-' + row.attribute_ua_name +'\')" class="blue"><i class="fa fa-pencil-square-o bigger-130"></i></a>';
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
             url: '<?php echo WS_BOOTGRID."param.mapping_attribute_controller/readLovProductAttribute"; ?>',
             post: {product_id:product_id},
             selection: true,
             sorting:true
        });

        $('.bootgrid-header span.glyphicon-search').removeClass('glyphicon-search')
        .html('<i class="fa fa-search"></i>');
    }
</script>