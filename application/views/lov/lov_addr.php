  <div id="modal_lov_addr" class="modal fade" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog" style="width:1000px;">
        <div class="modal-content">
            <!-- modal title -->
            <div class="modal-header no-padding">
                <div class="table-header">
                    <span class="form-add-edit-title"> Data Address</span>
                </div>
            </div>
            <input type="hidden" id="modal_lov_addr_id_val" value="" />
            <input type="hidden" id="modal_lov_addr_code_val" value="" />
            <input type="hidden" id="modal_lov_addr_id_country_val" value="" />
            <input type="hidden" id="modal_lov_addr_code_country_val" value="" />
            <input type="hidden" id="modal_lov_addr_address_1_val" value="" />
            <input type="hidden" id="modal_lov_addr_address_2_val" value="" />
            <input type="hidden" id="modal_lov_addr_additional_address_1_val" value="" />
            <input type="hidden" id="modal_lov_addr_additional_address_2_val" value="" />
            <input type="hidden" id="modal_lov_addr_zip_code_val" value="" />
            <input type="hidden" id="modal_lov_addr_city_val" value="" />

            <!-- modal body -->
            <div class="modal-body">
                <div>
                  <button type="button" class="btn btn-sm btn-success" id="modal_lov_addr_btn_blank">
                    <span class="fa fa-pencil-square-o bigger-110" aria-hidden="true"></span> BLANK
                  </button>
                </div>
                <table id="modal_lov_addr_grid_selection" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                     <th data-column-id="address_format_id" data-sortable="false" data-visible="false">ID ADDRESs</th>
                     <th data-header-align="center" data-align="center" data-formatter="opt-edit" data-sortable="false" data-width="100">Options</th>
                     <th data-column-id="address_1">Addreas Line 1</th>
                     <th data-column-id="address_2" >Addreas Line 2</th>
                     <th data-column-id="address_3">City</th>
                     <th data-column-id="address_4" data-visible="false">Additional address 1</th>
                     <th data-column-id="address_5" data-visible="false">Additional address 2</th>
                     <th data-column-id="zipcode">ZIPCODE</th>
                     <th data-column-id="country_name">COUNTRY</th>
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
        $("#modal_lov_addr_btn_blank").on('click', function() {
            $("#"+ $("#modal_lov_addr_id_val").val()).val("");
            $("#"+ $("#modal_lov_addr_code_val").val()).val("");
            $("#"+ $("#modal_lov_addr_id_country_val").val()).val("");
            $("#"+ $("#modal_lov_addr_code_country_val").val()).val("");
            $("#"+ $("#modal_lov_addr_address_1_val").val()).val("");
            $("#"+ $("#modal_lov_addr_address_2_val").val()).val("");
            $("#"+ $("#modal_lov_addr_additional_address_1_val").val()).val("");
            $("#"+ $("#modal_lov_addr_additional_address_2_val").val()).val("");
            $("#"+ $("#modal_lov_addr_zip_code_val").val()).val("");
            $("#"+ $("#modal_lov_addr_city_val").val()).val("");
            $("#modal_lov_addr").modal("toggle");
        });
    });

    function modal_lov_addr_show(the_id_field, the_code_field,country_id,country_code,address_1,address_2,additional_address_1,additional_address_2,zip_code,city,customer_ref) {
        modal_lov_addr_set_field_value(the_id_field, the_code_field,country_id,country_code,address_1,address_2,additional_address_1,additional_address_2,zip_code,city);
        $("#modal_lov_addr").modal({backdrop: 'static'});
        modal_lov_addr_prepare_table(customer_ref);
    }


    function modal_lov_addr_set_field_value(the_id_field, the_code_field,country_id,country_code,address_1,address_2,additional_address_1,additional_address_2,zip_code,city) {
         $("#modal_lov_addr_id_val").val(the_id_field);
         $("#modal_lov_addr_code_val").val(the_code_field);
         $("#modal_lov_addr_id_country_val").val(country_id);
         $("#modal_lov_addr_code_country_val").val(country_code);
         $("#modal_lov_addr_address_1_val").val(address_1);
         $("#modal_lov_addr_address_2_val").val(address_2);
         $("#modal_lov_addr_additional_address_1_val").val(additional_address_1);
         $("#modal_lov_addr_additional_address_2_val").val(additional_address_2);
         $("#modal_lov_addr_zip_code_val").val(zip_code);
         $("#modal_lov_addr_city_val").val(city);

    }

    function modal_lov_addr_set_value(the_id_val, the_code_val,country_id,country_code,address_1,address_2,additional_address_1,additional_address_2,zip_code,city) {
         $("#"+ $("#modal_lov_addr_id_val").val()).val(the_id_val);
         $("#"+ $("#modal_lov_addr_code_val").val()).val(the_code_val);
         $("#"+ $("#modal_lov_addr_id_country_val").val()).val(country_id);
         $("#"+ $("#modal_lov_addr_code_country_val").val()).val(country_code);
         $("#"+ $("#modal_lov_addr_address_1_val").val()).val(address_1);
         
         var addr2;
         var addr3;
         var addr4;

         if(address_2 == 'null'){
            addr2 = '';
         }else{
            addr2 = address_2;
         }

         if(additional_address_1 == 'null'){
            addr3 = '';
         }else{
             addr3 = additional_address_1;
         }

         if(additional_address_2 == 'null'){
            addr4 = '';
         }else{
            addr4 = additional_address_2;
         }

         $("#"+ $("#modal_lov_addr_address_2_val").val()).val(addr2);
         $("#"+ $("#modal_lov_addr_additional_address_1_val").val()).val(addr3);
         $("#"+ $("#modal_lov_addr_additional_address_2_val").val()).val(addr4);
         $("#"+ $("#modal_lov_addr_zip_code_val").val()).val(zip_code);
         $("#"+ $("#modal_lov_addr_city_val").val()).val(city);

         $("#modal_lov_addr").modal("toggle");

         $("#"+ $("#modal_lov_addr_id_val").val()).change();
         $("#"+ $("#modal_lov_addr_code_val").val()).change();
         $("#"+ $("#modal_lov_addr_id_country_val").val()).change();
         $("#"+ $("#modal_lov_addr_code_country_val").val()).change();
         $("#"+ $("#modal_lov_addr_address_1_val").val()).change();
         $("#"+ $("#modal_lov_addr_address_2_val").val()).change();
         $("#"+ $("#modal_lov_addr_additional_address_1_val").val()).change();
         $("#"+ $("#modal_lov_addr_additional_address_2_val").val()).change();
         $("#"+ $("#modal_lov_addr_zip_code_val").val()).change();
         $("#"+ $("#modal_lov_addr_city_val").val()).change();
    }

    function modal_lov_addr_prepare_table(customer_ref) {
        $("#modal_lov_addr_grid_selection").bootgrid("destroy");
        $("#modal_lov_addr_grid_selection").bootgrid({
             formatters: {
                "opt-edit" : function(col, row) {
                    /*if(empty(row.address_4)){
                        row.address_4 = ""; 
                    } */
                    return '<a href="javascript:;" title="Set Value" onclick="modal_lov_addr_set_value(\''+ row.address_format_id +'\', \''+ row.address_1 + ' ,' + row.zipcode+ ' ,' + row.address_3+ ' ,' + row.country_name +'\',\'' + row.country_id +'\',\''+row.country_name+'\',\''+row.address_1+'\',\''+row.address_2+'\',\''+row.address_4+'\',\''+row.address_5+'\',\''+row.zipcode+'\',\''+row.address_3+'\')" class="blue"><i class="fa fa-pencil-square-o bigger-130"></i></a>';
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
             url: '<?php echo WS_BOOTGRID."product.product_controller/readLovAnddress"; ?>',
             post: {customer_ref: customer_ref },
             selection: true,
             sorting:true
        });

        $('.bootgrid-header span.glyphicon-search').removeClass('glyphicon-search')
        .html('<i class="fa fa-search"></i>');
    }
</script>