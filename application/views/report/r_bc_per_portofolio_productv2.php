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
            <span>BC per Portofolio Product</span>
             <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">

  <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> List Of BC per Portofolio Product
                    </span>
                </div>
            </div>
            <!-- CONTENT PORTLET -->
            <div class="form-body">
            <div class="row">
                <div class="col-md-12 green">
                    <div class="form-group col-md-7" style="text-align: left;">
                        <label class="control-label col-md-2">Periode</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker1" name="in_Periode" id="in_Periode">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" id="btn-search">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                        <label class="col-md-2 control-label"> YYYYMM</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <table id="table-bc-per-portofolio" class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="red">Area</th>
                            <th class="red">Portofolio</th>
                            <th class="red">Jumlah BC</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- END CONTENT PORTLET -->
        </div>
    </div>
</div>

<script>

    $('.datepicker1').datetimepicker({
        format: 'YYYYMM',
        // defaultDate: new Date()
    });

    $("#btn-search").on('click', function() {
        var periode = $('#in_Periode').val();
        var url =  '<?php echo WS_JQGRID . "report.r_bc_per_portofolio_product_controller/tableBcPerPortofolioProduct"; ?>';
        $.ajax({
            type: "POST",
            url: url,
            data: {periode:periode},
            success: function(response) {
                $('#tbody').html(response);
            }
        });
    });

</script>