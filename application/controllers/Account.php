<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'language'));
        $this->load->model('M_helper');
    }

    function index() { 
        check_login();
    }

	public function excelAccountReport()
    {
        $npwp_val = $this->input->get('npwp_val');
        $output = $this->getAccountReport();

        startExcel(date("mdy") . "_" ."TELKOM_ACCOUNT_REPORT.xls");
        echo '<html>';
        echo '<head><title>Account </title></head>';
        echo '<body>';
        echo $output;
        echo '</body>';
        echo '</html>';
        exit;
    }

	public function excelAccountList()
    {
        $output = $this->getAccountList();

        startExcel(date("mdy") . "_" . "TELKOM.xls");
        echo '<html>';
        echo '<head><title>Account </title></head>';
        echo '<body>';
        echo $output;
        echo '</body>';
        echo '</html>';
        exit;
    }

    public function getAccountList()
    {
		$npwp_val = !($this->input->post('npwp_val')) ? $this->input->get('npwp_val') : $this->input->post('npwp_val');
        /*header*/
        $output = '<style>td {
                        padding:1px;
                    }</style>';
        $output .= '<table width="100%">';
        $output .= '<tr>
                       <td colspan="4" style="text-align:center;"> <span style="font-size:16px;"><b>ACCOUNT DETAILS INFORMATION</b></span></td>
                   </tr>';
        // $output .= '<tr>
                       // <td colspan="4" style="text-align:center;"><span style="font-size:16px;"><b>' . $schm_fee_arr[0] . '</b></span></td>
                   // </tr>';
        // $output .= '<tr>
                       // <td colspan="4" style="text-align:center;"><span style="font-size:14px;"><b>PERIODE TAGIHAN : ' . $bulan . ' ' . $tahun . '</b></span></td>
                   // </tr>';
        $output .= '<tr><td colspan="4">&nbsp;</td></tr>';
        $output .= '<table>';

		$sql = "SELECT a.account_num, null as action, a.account_name, 'OK' as account_status, a.currency_code,
                a.deposit_mny, c.end_dat, null as golivedtm, e.email_address as email, d.npwp as npwp,
                RTRIM(f.address_1) || ' ' || RTRIM(f.address_2) || ' ' || RTRIM(f.address_3) || ' ' || RTRIM(f.address_4) || ' ' || RTRIM(f.address_5) as address
					FROM account a
                        INNER JOIN accountdetails c ON a.ACCOUNT_NUM = c.ACCOUNT_NUM
                        INNER JOIN accountattributes d ON a.ACCOUNT_NUM = d.ACCOUNT_NUM
                        INNER JOIN contactdetails e ON a.CUSTOMER_REF = e.CUSTOMER_REF
                        INNER JOIN address f ON a.CUSTOMER_REF = f.CUSTOMER_REF
						WHERE ROWNUM <=20
						";
        $this->db = $this->load->database('ccpbb', TRUE);
		$query = $this->db->query($sql);
        $items = $query->result_array();
        /*content*/
        $output .= '<table width="100%" border="1">';
        $output .= '<tr>
                        <th style="text-align:center;">Account Number</th>
                        <th style="text-align:center;">Action</th>
                        <th style="text-align:center;">Account Name</th>
                        <th style="text-align:center;">Account Status</th>
                        <th style="text-align:center;">Currency Code</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;"></th>
                        <th style="text-align:center;">NPWP</th>
                        <th style="text-align:center;">Address</th>
                    </tr>';
		foreach ($items as $item)
		{
			$output .='<tr>';
			$output .=	'<td>'. $item['account_num'] .'</td>';
			$output .=	'<td>'. $item['action'] .'</td>';
			$output .=	'<td>'. $item['account_name'] .'</td>';
			$output .=	'<td>'. $item['account_status'] .'</td>';
			$output .=	'<td>'. $item['currency_code'] .'</td>';
			$output .=	'<td>'. $item['email'] .'</td>';
			$output .=	'<td>'. $item['npwp'] .'</td>';
			$output .=	'<td>'. $item['address'] .'</td>';
			$output .='</tr>';
		}
		$output .= '</table>';
        return $output;
    }

	public function getAccountReport()
    {
		 $npwp_val = !($this->input->post('npwp_val')) ? $this->input->get('npwp_val') : $this->input->post('npwp_val');
        /*header*/
        $output = '<style>td {
                        padding:1px;
                    }</style>';
        $output .= '<table width="100%">';
        $output .= '<tr>
                       <td colspan="4" style="text-align:center;"> <span style="font-size:16px;"><b>ACCOUNT DETAILS INFORMATION</b></span></td>
                   </tr>';
        // $output .= '<tr>
                       // <td colspan="4" style="text-align:center;"><span style="font-size:16px;"><b>' . $schm_fee_arr[0] . '</b></span></td>
                   // </tr>';
        // $output .= '<tr>
                       // <td colspan="4" style="text-align:center;"><span style="font-size:14px;"><b>PERIODE TAGIHAN : ' . $bulan . ' ' . $tahun . '</b></span></td>
                   // </tr>';
        $output .= '<tr><td colspan="4">&nbsp;</td></tr>';
        $output .= '<table>';


        /*content*/
        $output .= '<table width="100%" border="1">';
        $output .= '<tr>
                        <th style="text-align:center;">Attribute ID</th>
                        <th style="text-align:center;">Attribute Name</th>
                        <th style="text-align:center;">Attribute Value</th>
                    </tr>';

		$output	.=	'<tr><td>1</td><td>BUSINESS_AREA</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>BUSINESS_SHARE</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>REFERENSI_ACCOUNT</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>PREFIX_ACCOUNT</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>NPWP</td><td>'. $npwp_val .'</td></tr>';
		$output	.=	'<tr><td>1</td><td>NPPKP</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>BILL2PARTY</td><td></td></tr>';
		$output	.=	'<tr><td>1</td><td>REGION</td><td>1</td></tr>';

        $output .= '</table>';

        return $output;
    }

    public function genAccountNumber(){
        $pck_name = "PKG_TIBSACCOUNT.genAccountNum";
        $pIN = array(
            'prefix' => $this->input->post('prefix')
        );
        $conn_db = "default";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
        echo json_encode($out);
    }

    public function genNextBillDTM(){
        $pck_name = "PKG_TIBSACCOUNT.generateNextBillDtm";
        $pIN = array(
            'var' => 1
        );
        $conn_db = "default";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
        echo json_encode($out);
    }

    public function setRegion(){
        /*$this->db_corecrm = $this->load->database('corecrm', TRUE);
        $loc_id = $this->input->post('locId');

        $this->db_corecrm->where('ID',$loc_id);
        $db = $this->db_corecrm->get('LOCATION')->row()->xs1;
        echo json_encode($db);*/
        echo 1;
        exit;
    }

    /*public function setRegion2(){
        $pck_name = "CRMACCOUNT.setRegion";
        $pIN = array(
            'var' => $this->session->userdata('location')
        );
        $conn_db = "corecrm";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);
        echo json_encode($out);
    }*/

    public function createAccount(){
        $AccountNumber = $this->input->post('AccountNumber');
        $inNipnas = $this->input->post('inNipnas');
        $inAccountName = $this->input->post('inAccountName');
        $inAccountToGoLive = $this->input->post('inAccountToGoLive');
        $groupId = $this->input->post('groupId');
        $userId = $this->input->post('userId');
        $locId = $this->input->post('locId');
        $inContractedPointOfSupply = $this->input->post('inContractedPointOfSupply');
        $inTaxStatus = $this->input->post('inTaxStatus');
        $inAccountCurrency = $this->input->post('inAccountCurrency');
        $inInformationCurrency = $this->input->post('inInformationCurrency');
        $inNextBillDate = $this->input->post('inNextBillDate');
        $inFirstName = $this->input->post('inFirstName');
        $inLastName = $this->input->post('inLastName');
        $inCompanyName = $this->input->post('inCompanyName');
        $inNPWP = $this->input->post('inNPWP');
        $inEmail = $this->input->post('inEmail');
        $inMobileNumber = $this->input->post('inMobileNumber');
        $inContactType = $this->input->post('inContactType');
        $inContactStartDate = $this->input->post('inContactStartDate');
        $inStreetName = $this->input->post('inStreetName');
        $inBlockName = $this->input->post('inBlockName');
        $inDistrictName = $this->input->post('inDistrictName');
        $inCity = $this->input->post('inCity');
        $inProvinsi = $this->input->post('inProvinsi');
        $inZipCode = $this->input->post('inZipCode');
        $inContactIT = $this->input->post('inContactIT');
        $inITPhoneNumber = $this->input->post('inITPhoneNumber');
        $inITEmail = $this->input->post('inITEmail');
        $inITContactFinance = $this->input->post('inITContactFinance');
        $inContactAM = $this->input->post('inContactAM');
        $inAMPhoneNumber = $this->input->post('inAMPhoneNumber');
        $inAMEmail = $this->input->post('inAMEmail');
        $inDocumentName = $this->input->post('inDocumentName');
        $inBillPeriode = $this->input->post('inBillPeriode');
        $inSLBillPeriode = $this->input->post('inSLBillPeriode');
        $inPaymentMethod = $this->input->post('inPaymentMethod');
        $inAccountingMethod = $this->input->post('inAccountingMethod');
        $inBillStyle = $this->input->post('inBillStyle');
        $inBillHandlingCode = null;//$this->input->post('inBillHandlingCode');
        $inCreditClass = $this->input->post('inCreditClass');
        //$account_attr = $this->input->post('account_attr');
        $hinCreditLimitMny = $this->input->post('hinCreditLimitMny');
        $hinPackageDiscAccNum = $this->input->post('hinPackageDiscAccNum');
        $hinEventDiscAccNum = $this->input->post('hinEventDiscAccNum');
        $hinStatementFrequency = $this->input->post('hinStatementFrequency');
        //$hinInvoicingCoId = $this->input->post('hinInvoicingCoId');
        $hinInvoicingCoId = $this->input->post('invoicingCompany');
        $hinPrepayBoo = $this->input->post('hinPrepayBoo');
        $hinEventsPerDay = $this->input->post('hinEventsPerDay');
        $hinLanguageId = $this->input->post('hinLanguageId');
        $hinCountryId = $this->input->post('hinCountryId');
        $inFinancePhoneNumber = $this->input->post('inFinancePhoneNumber');
        $inFinanceEmail = $this->input->post('inFinanceEmail');
        $document_address = $this->input->post('document_address');


        // account attr
        $attr = getColomTable($table = 'accountattributes', $conn = 'default');
        //$accAttr = '';//array();
        $accAttr = '';//array();
        //$accAttr[0] = $AccountNumber;
        foreach ($attr as $key => $value) {

          //  $accAttr[$value->column_id] = $this->input->post($value->column_name);
            
            $accAttr .= "<accAttribute>
                            <attrName>".$value->column_name."</attrName>
                            <attrIndex>".$value->column_id."</attrIndex>
                            <attrType>C</attrType>
                            <attrValue>".$this->input->post($value->column_name)."</attrValue>
                            <startDat/>
                            <endDat/>
                          </accAttribute>";
        }

        $account_attr = (string)$this->getAttrValue($accAttr);
        
        $xmlHeader = "<?xml version=".'"1.0"'."?>
                        <orderHeader>
                          <orderType>B2P</orderType>
                          <orderSubType>0000</orderSubType>
                          <orderCode>B2P</orderCode>
                          <orderId>".$AccountNumber."</orderId>
                          <previousOrderId/>
                          <orderDate>".$this->makeDate(getSysdate())."</orderDate>
                          <soldToParty>".$inNipnas."</soldToParty>
                          <org/>
                          <nipnas/>
                          <bundling>F</bundling>
                          <bundlingRef/>
                          <DC>DIVES</DC>
                        </orderHeader> 
                        ";   

        $xmlDetail = "<?xml version=".'"1.0"'."?>
               <accountDoc>
                <customerRef>".$inNipnas."</customerRef>
                <accountNum>".$AccountNumber."</accountNum>
                <accountName>".$inAccountName."</accountName>
                <marketSegment/>
                <billPeriod>".$inBillPeriode."</billPeriod>
                <billPeriodUnit>".$inSLBillPeriode."</billPeriodUnit>
                <paymentMethod>".$inPaymentMethod."</paymentMethod>
                <currency>".$inAccountCurrency."</currency>
                <taxInclusive>".$inTaxStatus."</taxInclusive>
                <accountStatus>".$this->input->post('accStatus')."</accountStatus>
                <goLiveDtm>".$this->makeDate($inAccountToGoLive)."</goLiveDtm>
                <nextBillDtm>".$this->makeDate($inNextBillDate)."</nextBillDtm>
                <accountContact>
                  <firstName>".$inFirstName."</firstName>
                  <lastName>".$inLastName."</lastName>
                  <salutationName>".$inCompanyName."</salutationName>
                  <phone>".$inMobileNumber."</phone>
                  <contactAddress>
                    <addr1>".$inStreetName."</addr1>
                    <addr2>".$inBlockName."</addr2>
                    <addr3>".$inCity."</addr3>
                    <addr4>".$inDistrictName."</addr4>
                    <addr5>".$inProvinsi."</addr5>
                    <postCode>".$inZipCode."</postCode>
                    <country>INDONESIA</country>
                  </contactAddress>
                </accountContact>
                <accAttributes>
                  ".$accAttr."
                </accAttributes>
              </accountDoc>
              ";
   
       
        $i_Order_Type = 'B2P';
        $i_Order_No = $AccountNumber;
        $i_Customer_Ref = $inNipnas;
        $i_Account_Num = $AccountNumber;
        $i_UserName = getUserName();
        $i_orderHeader = $xmlHeader;
        $i_orderDoc = $xmlDetail;

        $sql = " BEGIN "
                    . " TLKCAMWEBINTERFACE.CreateBill2Party ("
                    . " :i_Order_Type, "
                    . " :i_Order_No, "
                    . " :i_Customer_Ref, "
                    . " :i_Account_Num, "
                    . " :i_UserName, "
                    . " :i_orderHeader, "
                    . " :i_orderDoc, "
                    . " :o_orderStatus "
                    . "); END;";

      
            $stmt = oci_parse($this->db->conn_id, $sql);

            //  Bind the input parameter
            oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
            oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
            oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
            oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
            oci_bind_by_name($stmt, ':i_UserName', $i_UserName);
            oci_bind_by_name($stmt, ':i_orderHeader', $i_orderHeader);
            oci_bind_by_name($stmt, ':i_orderDoc', $i_orderDoc);

            // Bind the output parameter
            oci_bind_by_name($stmt, ':o_orderStatus', $o_orderStatus, 2000000);

            ociexecute($stmt);

            $statusTrx = substr($o_orderStatus,0,5) == 'ERROR' ? 'F' : 'T';
            $dt = array('strMessage' => $o_orderStatus.' | Account Number : '.$i_Account_Num,
                         'statusCode' => $statusTrx);

            echo json_encode($dt);
            //echo $xmlHeader.'|'.$xmlDetail;
        exit;

         /*$pIN2 = array(
            'pIn_accAccountNum' => $AccountNumber,
            'pIn_accCustomerRef' => $inNipnas,
            'pIn_accAccountName' => $inAccountName,
            'pIn_accCurrencyCode' => $inAccountCurrency,
            'pIn_accNextBillDTM' => $inNextBillDate,
            'pIn_accGoLiveDTM' => $inAccountToGoLive,
            'pIn_accBillPeriod' => $inBillPeriode,
            'pIn_accBillPeriodUnits' => $inSLBillPeriode,
            'pIn_accBillStyleId' => $inBillStyle,
            'pIn_accPaymentMethodId' => $inPaymentMethod,
            'pIn_accCreditClassId' => $inCreditClass,
            'pIn_accCreditLimitMny' => $hinCreditLimitMny,
            'pIn_accInfoCurrencyCode' => $inInformationCurrency,
            'pIn_accPackageDiscAccNum' => $hinPackageDiscAccNum,
            'pIn_accEventDiscAccNum' => $hinEventDiscAccNum,
            'pIn_accAccountingMethod' => $inAccountingMethod,
            'pIn_accStatementFrequency' => $hinStatementFrequency,
            'pIn_accBillHandlingCode' => $inBillHandlingCode,
            'pIn_accInvoicingCoId' => $hinInvoicingCoId,
            'pIn_accDefaultCPSId' => $inContractedPointOfSupply,
            'pIn_accDonatedDiscountCPS' => NULL,
            'pIn_accAutoDelBilledEventBoo' => 'F',
            'pIn_accBusinessBoo' => NULL,
            'pIn_accEndCustomerBoo' => NULL,
            'pIn_accPrepayBoo' => $hinPrepayBoo,
            'pIn_accThresholdSetId' => NULL,
            'pIn_accTaxInclusiveBoo' => $inTaxStatus,
            'pIn_accInternalAccountBoo' => 'F',
            'pIn_accEventsPerDay' => $hinEventsPerDay,
            'pIn_accHolidayProfileId' => NULL,
            'pIn_accTemplateRef' => NULL,
            'pIn_cntContactTypeId' => $inContactType,
            'pIn_cntContactNotes' => NULL,
            'pIn_cntTitle' => NULL,
            'pIn_cntFirstName' => $inFirstName,
            'pIn_cntInitials' => NULL,
            'pIn_cntNamePostfix' => NULL,
            'pIn_cntLastName' => $inLastName,
            'pIn_cntAddressName' => $inCompanyName,
            'pIn_cntSalutationName' => $inCompanyName,
            'pIn_cntLanguageId' => 7, //$hinLanguageId,
            'pIn_addrAddresses' => $inStreetName.'|'.$inBlockName.'|'.$inDistrictName.'|'.$inCity.'|'.$inProvinsi,
            'pIn_addrPostCode' => $inZipCode,
            'pIn_addrCountryId' => 34, //$hinCountryId,
            'pIn_addrAddressFormatId' => 11,
            'pIn_addrJCode' => NULL,
            'pIn_addrUstinCityBoo' => NULL,
            'pIn_cntdetStartDate' => (string)$inContactStartDate,
            'pIn_cntdetDayTimeTel' => NULL,
            'pIn_cntdetDayTimeExt' => NULL,
            'pIn_cntdetEveningTel' => NULL,
            'pIn_cntdetEveningExt' => NULL,
            'pIn_cntdetFaxTel' => NULL,
            'pIn_cntdetMobileTel' => $inMobileNumber,
            'pIn_cntdetEdi' => NULL,
            'pIn_cntdetEmail' => $inEmail,
            'pIn_cntdetPosition' => NULL,
            'pIn_cntdetDepartment' => NULL,
            'pIn_accattrValue' => $account_attr
        );
*/

        // Exec Create Account SIN_CORE
        /*$conn_db = "corecrm";
        $out = $this->M_helper->exec_cursor($pck_name, $pIN, $conn_db);*/

      /*  $conn_db2 = "default";
        $pck_name2 = "PKG_TIBSACCOUNT.createAccountWrapper";
        $out = $this->M_helper->exec_cursor($pck_name2, $pIN2, $conn_db2);*/

    }
    
    private function getAttrValue($arr){
        $vAttributes = '';
        for($i = 2; $i <= count($arr); $i++){
            $vAttribute = '';
            $vAttrType = 'C';
            $vAttribute = $arr[0]."|".$i."|".$vAttrType."|".$arr[$i]."|";
            if($vAttributes != '')
            {
                $vAttributes .= "*".$vAttribute;
            }
            else
            {
                $vAttributes .= $vAttribute;
            }
        }

        return $vAttributes;
    }

    function makeDate($date){

        $dates = date_create($date);
        return date_format($dates,"Ymd H:i:s");

    }

    function gen_con(){
        $sql = "select pack_lov.f_get_order_num ('".getUserName()."') as jml from dual";
        $query = $this->db->query($sql);
        $items = $query->row(0);

        return $items->jml; 
    }

    function modifyAccount(){
        // account attr
        $attr = getColomTable($table = 'accountattributes', $conn = 'default');
        $accAttr = '';
        foreach ($attr as $key => $value) {            
            $accAttr .= "<accAttribute>
                            <attrName>".$value->column_name."</attrName>
                            <attrIndex>".$value->column_id."</attrIndex>
                            <attrType>C</attrType>
                            <attrValue>".$this->input->post($value->column_name)."</attrValue>
                            <startDat></startDat>
                            <endDat></endDat>
                          </accAttribute>";
        }

        $account_name = $this->input->post('account_name');
        $bill_period = $this->input->post('inBillPeriode');
        $period_unit = $this->input->post('inSLBillPeriode');
        $pay_method = $this->input->post('inPaymentMethod');
        $inAccountCurrency = $this->input->post('inAccountCurrency');
        $inTaxStatus = $this->input->post('inTaxStatus');
        $accStatus = $this->input->post('accStatus');
        $inAccountToGoLive = $this->input->post('inAccountToGoLive');
        $inNextBillDate = $this->input->post('inNextBillDate');
        $inFirstName = $this->input->post('inFirstName');
        $inLastName = $this->input->post('inLastName');
        $inCompanyName = $this->input->post('inCompanyName');
        $inEmail = $this->input->post('inEmail');
        $inMobileNumber = $this->input->post('inMobileNumber');
        $inStreetName = $this->input->post('inStreetName');
        $inBlockName = $this->input->post('inBlockName');
        $inCity = $this->input->post('inCity');
        $inDistrictName = $this->input->post('inDistrictName');
        $inProvinsi = $this->input->post('inProvinsi');
        $inZipCode = $this->input->post('inZipCode');
        $country = $this->input->post('wizard5_country_code');

        $i_Order_Type = 'MOACC';
        $i_Order_No = $this->gen_con();
        $i_Customer_Ref = $this->input->post('customer_ref');
        $i_Account_Num = $this->input->post('AccountNumber');
        $i_UserName = getUserName();
        $i_orderHeader = "<?xml version='1.0'?>
                            <orderHeader>
                              <orderType>".$i_Order_Type."</orderType>
                              <orderSubType>1100</orderSubType>
                              <orderCode>UB2P</orderCode>
                              <orderId>".$i_Order_No."</orderId>
                              <previousOrderId></previousOrderId>
                              <orderDate>".date('Ymd h:i:s')."</orderDate>
                              <soldToParty>".$i_Customer_Ref."</soldToParty>
                              <org></org>
                              <nipnas></nipnas>
                              <bundling>F</bundling>
                              <bundlingRef></bundlingRef>
                              <DC>DIVES</DC>
                            </orderHeader>";

        $i_orderDoc = "<?xml version='1.0'?>
                        <accountDoc>
                          <customerRef>".$i_Customer_Ref."</customerRef>
                          <accountNum>".$i_Account_Num."</accountNum>
                          <accountName>".$account_name."</accountName>
                          <marketSegment></marketSegment>
                          <billPeriod>".$bill_period."</billPeriod>
                          <billPeriodUnit>".$period_unit."</billPeriodUnit>
                          <paymentMethod>".$pay_method."</paymentMethod>
                          <currency>".$inAccountCurrency."</currency>
                          <taxInclusive>".$inTaxStatus."</taxInclusive>
                          <accountStatus>".$accStatus."</accountStatus>
                          <goLiveDtm>".$inAccountToGoLive."</goLiveDtm>
                          <nextBillDtm>".$inNextBillDate."</nextBillDtm>
                          <accountContact>
                            <firstName>".$inFirstName."</firstName>
                            <lastName>".$inLastName."</lastName>
                            <salutationName>".$inCompanyName."</salutationName>
                            <email>".$inEmail."</email>
                            <phone>".$inMobileNumber."</phone>
                            <contactAddress>
                              <addr1>".$inStreetName."</addr1>
                              <addr2>".$inBlockName."</addr2>
                              <addr3>".$inCity."</addr3>
                              <addr4>".$inDistrictName."</addr4>
                              <addr5>".$inProvinsi."</addr5>
                              <postCode>".$inZipCode."</postCode>
                              <country>".$country."</country>
                            </contactAddress>
                          </accountContact>
                          <accAttributes>
                            ".$accAttr."
                          </accAttributes>
                        </accountDoc>";
        // die($i_orderDoc); exit;

        $sql = " BEGIN "
                . " TLKCAMWEBINTERFACE.ModifyBill2Party ("
                . " :i_Order_Type, "
                . " :i_Order_No, "
                . " :i_Customer_Ref, "
                . " :i_Account_Num, "
                . " :i_UserName, "
                . " :i_orderHeader, "
                . " :i_orderDoc, "
                . " :o_orderStatus "
                . "); END;";

        $stmt = oci_parse($this->db->conn_id, $sql);

        //  Bind the input parameter
        oci_bind_by_name($stmt, ':i_Order_Type', $i_Order_Type);
        oci_bind_by_name($stmt, ':i_Order_No', $i_Order_No);
        oci_bind_by_name($stmt, ':i_Customer_Ref', $i_Customer_Ref);
        oci_bind_by_name($stmt, ':i_Account_Num', $i_Account_Num);
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