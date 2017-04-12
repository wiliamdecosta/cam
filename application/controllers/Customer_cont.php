<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_cont extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->helper(array('url', 'language'));
        $this->load->model('customer/customer');
        $this->load->model('M_helper');

    }

    public function genCustRef()
    {
        if(!empty($this->input->post('custref01'))){
            return $this->input->post('custref01');
        }else{
            $pck_name = "CAMWEB.PKG_TIBSCUSTOMER.GENCUSTOMERREF";
            $pIN = array(
                'prefix' => $this->input->post('prefix')
            );
            $conn_db = "default";
            $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
            //echo json_encode($out);
            return $out['txt_custRef'][0];
        }
        
    }

    public function initTransaksi()
    {
        //$locId = (int)$this->input->post('locId');
        $locId = (int)10;
        $userId = (int)$this->input->post('userId');
        $group_id = (int)23;
        $pck_name = "SINCUSTOMER.inisialisasicreatecustomer";
        $pIN = array(
            'pIn_userId' => $userId,
            'pIn_locId' => $locId,
            'pIn_groupId' => $group_id
        );
        $conn_db = "corecrm";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
        echo json_encode($out);
    }

    public function createCustomer()
    {
        //$custReff = $this->input->post('custReff');
        $custReff = $this->genCustRef();
        $customerRef = $custReff; //$this->input->post('customerRef');
        $parentCusref = $this->input->post('parentCusref');
        $sapCodeBill = strtoupper($this->input->post('sapCodeBill'));
        $sapCodeUnBill = $this->input->post('sapCodeUnBill');
        $sold2party = $this->input->post('sold2party');
        $groupId = (int)$this->input->post('groupId');
        $idTD = (int)$this->input->post('idTD');
        $idTH = (int)$this->input->post('idTH');
        $in_AddressName = $this->input->post('in_AddressName');
        $in_BlockName = $this->input->post('in_BlockName');
        $in_CCCluster = $this->input->post('in_CCCluster');
        $in_City = $this->input->post('in_City');
        $in_ContactStartDate = $this->input->post('in_ContactStartDate');
        $in_ContactType = (int)$this->input->post('in_ContactType');
        $in_CustomerCategory = $this->input->post('in_CustomerCategory');
        $in_CustomerType = (int)$this->input->post('in_CustomerType2');
        $in_inv_co_id = (int)$this->input->post('in_CustomerType');
        $in_DistrictName = $this->input->post('in_DistrictName');
        $in_Email = $this->input->post('in_Email');
        $in_FirstName = $this->input->post('in_FirstName');
        $in_Initials = $this->input->post('in_Initials');
        $in_LastName = $this->input->post('in_LastName');
        $in_MarketGroup = $this->input->post('in_MarketGroup');
        $in_MarketSegment = (int)$this->input->post('in_MarketSegment');
        $in_Phone = $this->input->post('in_Phone');
        $in_Province = $this->input->post('in_Province');
        $in_RefNipnas = $this->input->post('in_RefNipnas');
        $in_RegID = $this->input->post('in_RegID');
        $in_SalutationName = $this->input->post('in_SalutationName');
        $in_StreetName = $this->input->post('in_StreetName');
        $in_Title = $this->input->post('in_Title');
        $in_ZipCode = $this->input->post('in_ZipCode');
        $inCountry = $this->input->post('wizard5_country_id');
        $locId = (int)$this->input->post('locId');
        $userId = (int)$this->input->post('userId');
        $custAttr = (string)$this->getAttrValue(array($custReff,$sapCodeBill,$sapCodeUnBill,$sold2party));

        // print_r($custAttr);exit;
       /* $pck_name = "SINCUSTOMER.createCustomer";
        $pIN = array(
            'pIn_customerRef' => $custReff,
            'pIn_customerName' => '',
            'pIn_custType' => $in_CustomerType,
            'pIn_marketSegment' => $in_MarketSegment,
            'pIn_userId' => $userId,
            'pIn_locId' => $locId,
            'pIn_groupId' => $groupId,
            'pIn_title' => $in_Title,
            'pIn_firstName' => $in_FirstName,
            'pIn_initials' => $in_Initials,
            'pIn_lastName' => $in_LastName,
            'pIn_addressName' => $in_AddressName,
            'pIn_salutationNam' => $in_SalutationName,
            'pIn_contactType' => $in_ContactType,
            'pIn_streetName' => $in_StreetName,
            'pIn_blockName' => $in_BlockName,
            'pIn_districtName' => $in_DistrictName,
            'pIn_city' => $in_City,
            'pIn_provice' => $in_Province,
            'pIn_zipCode' => $in_ZipCode,
            'pIn_custAttr' => $custAttr,
            'pIn_email' => $in_Email,
            'pIn_phoneNumber' => $in_Phone,
            'pIn_cntStartDat' => $in_ContactStartDate,
            'pIn_trxId' => $idTH
        );
*/
        // Untuk pck kedua
        $pIN2 = array(
            'pIn_custCustomerRef' => $custReff,
            'pIn_custCustomerTypeId' => $in_CustomerType,
            'pIn_custCompanyName' => '',
            'pIn_custTaxExemptRef' => '',
            'pIn_custParentRef' => $parentCusref,
            'pIn_custProviderId' => NULL,
            'pIn_custCustomerPassword' => '',
            'pIn_custBillPeriod' => NULL,
            'pIn_custBillPeriodUnits' => '',
            'pIn_custNextBillDTM' => NULL,
            'pIn_custStatementFreq' => NULL,
            'pIn_custVatRegNum' => '',
            'pIn_custPermissionId' => 1,
            'pIn_custSummaryContactSeq' => NULL,
            'pIn_custSummaryCurrencyCode' => '',
            'pIn_custSummaryStyleId' => NULL,
            'pIn_custConcatenateBillsBoo' => 'F',
            'pIn_custSummaryBillHandCode' => '',
            'pIn_custInvoicingCoId' => $in_inv_co_id,
            'pIn_custMarketSegmentId' => $in_MarketSegment,
            'pIn_custDomainId' => NULL,
            'pIn_custTemplateRefCustBoo' => 'F',
            'pIn_cntContactTypeId' => $in_ContactType,
            'pIn_cntContactNotes' => '',
            'pIn_cntTitle' => $in_Title,
            'pIn_cntFirstName' => $in_FirstName,
            'pIn_cntInitials' => $in_Initials,
            'pIn_cntNamePostfix' => '',
            'pIn_cntLastName' => $in_LastName,
            'pIn_cntAddressName' => $in_AddressName,
            'pIn_cntSalutationName' => $in_SalutationName,
            'pIn_cntLanguageId' => '7',
            'pIn_addrAddresses' => $in_StreetName .'|'.$in_BlockName .'|'.$in_City.'|'.$in_DistrictName.'|'.$in_Province,
            'pIn_addrPostCode' => $in_ZipCode,
            'pIn_addrCountryId' => $inCountry,
            'pIn_addrAddressFormatId' => 11,
            'pIn_addrJCode' => '',
            'pIn_addrUstinCityBoo' => '',
            'pIn_cntdetStartDate' => $in_ContactStartDate,
            'pIn_cntdetDayTimeTel' => '',
            'pIn_cntdetDayTimeExt' => '',
            'pIn_cntdetEveningTel' => '',
            'pIn_cntdetEveningExt' => '',
            'pIn_cntdetFaxTel' => '',
            'pIn_cntdetMobileTel' => $in_Phone,
            'pIn_cntdetEdi' => '',
            'pIn_cntdetEmail' => $in_Email,
            'pIn_cntdetPosition' => '',
            'pIn_cntdetDepartment' => '',
            'pIn_custattrValue' => $custAttr
        );

        // Exec Create Customer SIN_CORE
      /*  $conn_db = "corecrm";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
*/
            $conn_db2 = "default";
            $pck_name2 = "PKG_TIBSCUSTOMER.createCustomer";
            $out = array();
            $out['custreff'] = $custReff;
            $out['ret'] = $this->M_helper->exec_cursor($pck_name2, $pIN2, $conn_db2);
       /* if($out['statusCode'][0] == "T"){
            // Exec Create Customer TOSDB
            $conn_db2 = "tosdb";
            $pck_name2 = "SINCUSTOMER.createCustomer";
            $out = $this->M_helper->exec_cursor($pck_name2, $pIN2, $conn_db2);
        }*/

        echo json_encode($out);
        //echo $custAttr;
    }

    private function getAttrValue($arr){
        // print_r($arr); exit;
        $vAttributes = '';
        for($i = 1; $i < count($arr); $i++){
            $vAttribute = '';
            $vAttrType = 'C';
            $vAttribute = $arr[0]."|".$i."|".$vAttrType."|".$arr[$i]."|";
            if($vAttributes != '')
            {
                $vAttributes .= "~".$vAttribute;
            }
            else
            {
                $vAttributes .= $vAttribute;
            }
        }

        return $vAttributes;
    }


    function gen_con(){
        $sql = "select pack_lov.f_get_order_num ('".getUserName()."') as jml from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        return $items->jml;
    }

    function updateCustomer() {

        $i_orderNo = $this->gen_con();
        $i_customer_Ref = $this->input->post('custref01');
        $i_UserName = getUserName();

        $i_Order_Type = 'ZSPDBS';
        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType>1110</orderSubType>
                              <orderCode>S2P</orderCode>
                              <orderId>".$i_orderNo."</orderId>
                              <previousOrderId/>
                              <orderDate>".date('Ymd h:i:s')."</orderDate>
                              <soldToParty>".$i_customer_Ref."</soldToParty>
                              <org/>
                              <nipnas></nipnas>
                              <bundling>F</bundling>
                              <bundlingRef/>
                              <DC>DBS</DC>
                            </orderHeader>";


        $i_orderDoc = "<?xml version='1.0'?>
                        <customerDoc>
                          <customerRef>".$i_customer_Ref."</customerRef>
                          <customerType>".$this->input->post('in_CustomerType')."</customerType>
                          <marketSegment>".$this->input->post('in_MarketSegment')."</marketSegment>
                          <invoicingCompany>".$this->input->post('in_inv_co_id')."</invoicingCompany>
                          <customerStartDat>".date('Ymd h:i:s')."</customerStartDat>
                          <customerContact>
                            <firstName>".$this->input->post('in_FirstName')."</firstName>
                            <lastName>".$this->input->post('in_LastName')."</lastName>
                            <salutationName>".$this->input->post('in_SalutationName')."</salutationName>
                            <phone>".$this->input->post('in_Phone')."</phone>
                            <contactAddress>
                              <addr1>".$this->input->post('in_StreetName')."</addr1>
                              <addr2>".$this->input->post('in_BlockName')."</addr2>
                              <addr3>".$this->input->post('in_City')."</addr3>
                              <addr4>".$this->input->post('in_DistrictName')."</addr4>
                              <addr5>".$this->input->post('in_Province')."</addr5>
                              <postCode>".$this->input->post('in_ZipCode')."</postCode>
                              <country>".$this->input->post('wizard5_country_code')."</country>
                            </contactAddress>
                          </customerContact>
                          <custAttributes>
                            <custAttribute>
                              <attrName>SAP_CODE_BILL</attrName>
                              <attrType>C</attrType>
                              <attrValue>".$this->input->post('sapCodeBill')."</attrValue>
                            </custAttribute>
                            <custAttribute>
                              <attrName>SAP_CODE_UNBILL</attrName>
                              <attrType>C</attrType>
                              <attrValue>".$this->input->post('sapCodeUnBill')."</attrValue>
                            </custAttribute>
                            <custAttribute>
                              <attrName>SOLD2PARTY</attrName>
                              <attrType>C</attrType>
                              <attrValue>".$this->input->post('sold2party')."</attrValue>
                            </custAttribute>
                          </custAttributes>
                        </customerDoc>
                        ";

        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.ModifySold2Party ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_orderNo);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_customer_Ref);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;
    }

    function delete_customer() {

        $i_orderNo = $this->gen_con();
        $i_customer_Ref = $this->input->post('customer_ref');
        $hierarchy = $this->input->post('hierarchy');
        $i_UserName = getUserName();
        $i_Order_Type = 'CUSTDEL';

        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType></orderSubType>
                              <orderCode>". $i_Order_Type."</orderCode>
                              <orderId>".$i_orderNo."</orderId>
                              <previousOrderId/>
                              <orderDate>".date('Ymd')."</orderDate>
                              <soldToParty>".$i_customer_Ref."</soldToParty>
                              <org></org>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DBS</DC>
                            </orderHeader>";

        $i_orderDoc = "<?xml version='1.0'?>
                        <customerStatus>
                          <customerRef>".$i_customer_Ref."</customerRef>
                          <custStatus>DEL</custStatus>
                          <custOrderNumber>".$i_orderNo."</custOrderNumber>
                          <startDate>".date('Ymd h:i:s')."</startDate>
                          <hierarchy>". $hierarchy."</hierarchy>
                          <endDate/>
                        </customerStatus>
                        ";
        // die($i_orderDoc);
        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.CreateOrderCUSTDEL ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_orderNo);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_customer_Ref);
        oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
        oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
        oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

        // Bind the output parameter
        oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

        ociexecute($stmt);

        $dt = array('status' => $o_orderStatus);

        echo json_encode($dt);
        exit;
    }
}