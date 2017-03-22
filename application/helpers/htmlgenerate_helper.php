<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('generatehtml')) {

    function inputan($type, $names, $class, $placeholder, $required, $values, $tags)
    {
        if (empty($tags)) {
            $tagtemp = "";
        } else {
            $tagtemp = "";
            foreach ($tags as $name => $tag) {
                $tagtemp = $tagtemp . " $name='$tag' ";
            }
        }
        $requred = $required == 0 ? '' : "required='required'";
        return "<div class='$class'><input type='$type' name='$names' placeholder='$placeholder' class='form-control' $requred value='$values' $tagtemp></div>";
    }


    // ---------------------------------- Textarea --------------------------------------------
    function textarea($name, $id, $class, $rows, $values)
    {
        return "<div class='$class'><textarea name='" . $name . "' id='" . $id . "' rows='" . $rows . "' class='form-control'>" . $values . "</textarea></div>";
    }


    function email($name, $placeholder, $required, $value)
    {
        $requred = $required == 0 ? '' : "required='required'";
        return "<input type='email' placeholder='$placeholder' name='$name' $required class='input-large' value='$value'>";
    }

    function combodumy($name, $id)
    {
        return "<select name='$name' id='$id' class='form-control'><option value='0'>Pilih data</option></select>";
    }

    function bulan($default_select, $selected)
    {
        $arr_bulan = array('01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember');

        echo "<select name='bulan' id='bulan' class='form-control'>";
        if ($default_select != "") {
            echo "<option value=''> " . $default_select . " </option> ";
        }
        foreach ($arr_bulan as $key => $value) {
            if ($selected == $key) {
                echo "<option value=" . $key . " selected>" . $value . "</option>";
            } else {
                echo "<option value=" . $key . ">" . $value . "</option>";
            }

        }
        echo "</select>";
    }

    function tahun($default_select, $selected)
    {
        echo "<select name='tahun' id='tahun' class='form-control'>";

        if ($default_select != "") {
            echo "<option value=''> " . $default_select . " </option> ";
        }

        $year = date("Y");
        for ($i = ($year); $i >= $year - 5; $i--) {

            if ($selected == $i) {
                echo "<option value=" . $i . " selected>" . $i . "</option>";
            } else {
                echo "<option value=" . $i . ">" . $i . "</option>";
            }

        }
        echo "</select>";


    }


    function buatcombo($nama, $id, $table, $field, $pk, $kondisi,$required, $default_select)
    {
        $CI =& get_instance();
        $CI->load->model('M_helper');

        if ($kondisi == null) {
            $data = $CI->M_helper->getCombo($table, $field, $pk)->result();
        } else {
            $data = $CI->M_helper->getComboByID($table, $field, $pk, $kondisi)->result();

        }

        if($required == "Y"){
            echo "<select name='" . $nama . "' id='" . $id . "'  class='form-control required' required>";
        }else{
            echo "<select name='" . $nama . "' id='" . $id . "'  class='form-control'>";
        }


        if ($default_select != "") {
            echo "<option value=''> " . $default_select . " </option> ";
        }

        foreach ($data as $r) {
            echo " <option value=" . $r->$pk . ">" . strtoupper($r->$field) . "</option>";
        }
        echo "</select>";
    }

     function buatcombo2($nama, $id, $table, $field, $pk, $kondisi,$required, $default_select)
    {
        $CI =& get_instance();
        $CI->load->model('M_helper');

        if ($kondisi == null) {
            $data = $CI->M_helper->getCombo2($table, $field, $pk)->result();
        } else {
            $data = $CI->M_helper->getComboByID2($table, $field, $pk, $kondisi)->result();

        }

        if($required == "Y"){
            echo "<select name='" . $nama . "' id='" . $id . "'  class='form-control required' required>";
        }else{
            echo "<select name='" . $nama . "' id='" . $id . "'  class='form-control'>";
        }


        if ($default_select != "") {
            echo "<option value=''> " . $default_select . " </option> ";
        }

        foreach ($data as $r) {
            echo " <option value=" . $r->$pk . ">" . strtoupper($r->$field) . "</option>";
        }
        echo "</select>";
    }


    function buatcombo_new($nama, $id, $table, $field, $pk, $kondisi, $default_select,$order_by,$order_type)
    {
        $CI =& get_instance();
        $CI->load->model('M_helper');

        if ($kondisi == null) {
            $data = $CI->M_helper->getComboNew($table, $field, $pk,$order_by,$order_type)->result();
        } else {
            $data = $CI->M_helper->getComboByIDNew($table, $field, $pk, $kondisi,$order_by,$order_type)->result();
        }
        echo "<select name='" . $nama . "' id='" . $id . "'  class='form-control'>";

        if ($default_select != "") {
            echo "<option value=''> " . $default_select . " </option> ";
        }

        foreach ($data as $r) {
            echo " <option value=" . $r->$pk . ">" . strtoupper($r->$field) . "</option>";
        }
        echo "</select>";
    }

    function combo_segmen()
    {
        $CI =& get_instance();
        $CI->load->model('M_helper');

        $pgl_id = $CI->session->userdata('d_pgl_id');
        if ($pgl_id) {
            $q = $CI->db->query("SELECT DISTINCT(CODE_SGM) SEGMENS,CODE_SGM||' - '||SEGMENT_NAME SEGMEN_NAME
                                  FROM MV_PARAM_SEGMENT_CC
                                  WHERE ID IN
                                (
                                SELECT ID_CC FROM P_MAP_MIT_CC
                                    WHERE PGL_ID = " . $pgl_id . "
                                ) ORDER BY SEGMENS
                                ")->result();
        } else {
            $q = $CI->db->query("SELECT DISTINCT(CODE_SGM) SEGMENS,CODE_SGM||' - '||SEGMENT_NAME SEGMEN_NAME
                                  FROM MV_PARAM_SEGMENT_CC ORDER BY SEGMENS")->result();
        }

        echo "<select name='segment' id='segment'  class='form-control'>";

        echo "<option value=''> Pilih Segmen </option> ";


        foreach ($q as $r) {
            echo " <option value=" . $r->SEGMENS . ">" . $r->SEGMEN_NAME . "</option>";
        }
        echo "</select>";
    }

    function editcombo($nama, $table, $class, $field, $pk, $kondisi, $tags, $value)
    {
        $CI =& get_instance();
        $CI->load->model('M_helper');
        if (empty($tags)) {
            $tagtemp = "";
        } else {
            $tagtemp = "";
            foreach ($tags as $name => $tag) {
                $tagtemp = $tagtemp . " $name='$tag' ";
            }
        }
        if ($kondisi == null) {
            $data = $CI->M_helper->getAll($table)->result();
        } else {
            $data = $CI->db->get_where($table, $kondisi)->result();
        }
        echo "<div class='$class'><select class='form-control' name='" . $nama . "' $tagtemp>";
        foreach ($data as $r) {
            echo "<option value='" . $r->$pk . "' ";
            echo $r->$pk == $value ? "selected='selected'" : "";
            echo ">" . strtoupper($r->$field) . "</option>";
        }
        echo "</select></div>";
    }

    function getStringMonth($bulan)
    {
        $arr_bulan = array('01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember');

        return $arr_bulan[$bulan];
    }

    function getUserName(){
        $CI =& get_instance();
        return $CI->session->userdata('user_name');
    }


    function genAttributesHTML($items = array()){
        $html = '';
        $req = '';
        foreach ($items as $data){
            $html .= "<div class='form-group'>";
            $html .= "<label class='control-label col-md-4'>".$data['attribute_ua_name'];
            if($data['mandatory_boo'] == "T"){
                $html .= '<span class="required"> * </span>';
                $req = " required";
            }else{
                $req = "";
            }
            $html .= "</label>";

            if($data['attribute_units'] == "TX"){

                if($data['val_type'] == 'TEXT_BOX') {
                    $html .= "<div class='col-md-8'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesType[]' value='C'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesId[]' value='".$data['attribute_bill_name']."'>";                 
                    $html .= "<input type='text' class='form-control".$req."' name='attributes[]'>";
                }else if($data['val_type'] == 'UPLOAD_FILE') {
                    $html .= "<div class='col-md-8'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesType[]' value='C'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesId[]' value='".$data['attribute_bill_name']."'>";
                    $html .= "<input type='hidden' class='form-control' name='subAttributesId[]' value='".$data['product_attribute_subid']."'>";
                    $html .= "<input type='text' class='form-control".$req."' name='attributes[]'>";
                    $html .= "<input type='file' class='".$req."' name='attributesImage[]'>";
                }else if($data['val_type'] == 'LOV') {
                    $html .= "<div class='col-md-8'>";
                    $html .= "<div class='input-group'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesType[]' value='C'>";
                    $html .= "<input type='hidden' class='form-control' name='attributesId[]' value='".$data['attribute_bill_name']."'>";
                    $html .= "<input type='text' class='form-control".$req."' id='".$data['attribute_bill_name']."' name='attributes[]'>";
                    $html .= '<span class="input-group-btn">
                                 <button class="btn btn-success" type="button" onclick="modal_lov_'.strtolower($data['attribute_bill_name']).'_show(\''.$data['attribute_bill_name'].'\')">
                                     <i class="fa fa-search"></i>
                                 </button>
                               </span>';
                    $html .= '</div>';
                }


            }else if($data['attribute_units'] == "IN"){
                $html .= "<div class='col-md-5'>";
                $html .= "<input type='hidden' class='form-control' name='attributesType[]' value='I'>";
                $html .= "<input type='hidden' class='form-control' name='attributesId[]' value='".$data['attribute_bill_name']."'>";
                $html .= "<input type='text' class='form-control numberformat".$req."' name='attributes[]'>";

            }else{

                $html .= "<div class='col-md-4'>";
                $html .= "<input type='hidden' class='form-control' name='attributesType[]' value='D'>";
                $html .= "<input type='hidden' class='form-control' name='attributesId[]' value='".$data['attribute_bill_name']."'>";
                $html .= "<input type='text' class='form-control datepickerON".$req."' name='attributes[]'>";
            }


            $html .= "</div>";
            $html .= "</div>";

            $html .= "<script>";
            $html .= "$('.datepickerON').datetimepicker({
                            format: 'DD/MM/YYYY'
                        });";
            $html .= "</script>";
        }

        return $html;
    }

    function array_to_xml($array, &$xml_user_info) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    array_to_xml($value, $subnode);
                }else{
                    $subnode = $xml_user_info->addChild("item$key");
                    array_to_xml($value, $subnode);
                }
            }else {
                $xml_user_info->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }

    function change_date_format($source = ''){
        if($source != ''){
            $date = DateTime::createFromFormat('d/m/Y', $source);
            $data = $date->format('Ymd').' 00:00:00';
            return $data;
        }else{
            return '';
        }
    }
}







