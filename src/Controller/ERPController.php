<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */
namespace App\Controller;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Import;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect;
use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ERPController extends BaseController
{

  #[Route('/products/ERP/get_products/', name: 'get_products_ERP')]
  public function get_products_ERPAction(Request $request)
  {
    $array = $this->getCurlObjects($request);
    return $array;
  }

  public function getCurlObjects(Request $request)
  {
    $name = "myLog";
    $curl = curl_init();

    if (!$curl) {
      \Pimcore\Log\Simple::log($name, "curl_init Validation ****");
      die("Couldn't initialize a cURL handle");
    }
    ///config/pimcore/constants.php    
    $username = API_USERNAME;
    $password = API_PASSWORD;
    $headers = array(
      "Content-type: text/xml;charset=UTF-8",
      "SOAPAction: ReadMultiple",
    );
    $iteamCount = $request->get('IteamCount');
    $brand = $request->get('Brand');
    $ret = curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "https://aznavwebapi.gsmoutdoors.com:5047/GSMNAVSB/WS/GSM/Page/ItemListAPI",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>
        "<soap:Envelope
	        xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
	        <soap:Body>\n
		       <ReadMultiple\n
		         	xmlns=\"urn:microsoft-dynamics-schemas/page/itemlistapi\">
			          <filter>\n
				        <Field>Global_Dimension_1_Code</Field>\n
				        <Criteria>$brand</Criteria>\n
			          </filter>\n
			          <setSize>$iteamCount</setSize>\n
		        </ReadMultiple>\n 
        	</soap:Body>\n
        </soap:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
      )
    );
    $ret = curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    $ret = curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    $ret = curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $ret = curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $ret = curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $ret = curl_setopt($curl, CURLOPT_HEADER, 0);
    $ret = curl_exec($curl); // print_r($ret);

    // \Pimcore\Log\Simple::log($name, "**************Response ret**************************");
    // \Pimcore\Log\Simple::log($name, $ret); // print_r($ret);

    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $ret);
    // \Pimcore\Log\Simple::log($name, "**************Response regex **************************");
    // \Pimcore\Log\Simple::log($name, $response); // print_r($response);

    $array = json_decode(json_encode((array) simplexml_load_string($response)), 1);
    // \Pimcore\Log\Simple::log($name, "**************Response SimpleXMLElement 2**********"); // print_r($array);

    $count = count(reset($array));
    $counts = array_map('count', $array); // print_r($counts);

    $totValue = count($array['SoapBody']['ReadMultiple_Result']['ReadMultiple_Result']['ItemListAPI']); //print_r($totValue);

    $av = $array['SoapBody']['ReadMultiple_Result']['ReadMultiple_Result']['ItemListAPI']; //print_r($av);

    $ii = 0;
    if ($iteamCount == "1") {
      if ($key = "No") {
        $sku = $av[$key];
      }
      if ($key = "Global_Dimension_1_Code") {
        $brand = $av[$key];
      }
      foreach ($av as $key => $value) {
        if (strcmp($key, "Key") !== 0) {
          $product = new Import();
          $Attname = $key;
          $Attvalue = $av[$key];
          $product->setParentId(12);
          //Random String Function --> // $str=rand(); // $result=md5($str);
          $product->setKey($sku);
          $product->setSku($sku);
          $product->setDescription($av["Description"]);
          $product->setBrand($brand);
          $product->setAttname($Attname);
          $product->setAttvalue($Attvalue);
          $product->save($product);
        }
      }

    } else {
      foreach (range(0, $totValue - 1) as $i) {
        $avv = $av[$i];
        if ($key = "No") {
          $sku = $avv[$key];
        }
        if ($key = "Global_Dimension_1_Code") {
          $brand = $avv[$key];
        }
        foreach ($avv as $key => $value) {
          if (strcmp($key, "Key") !== 0) {
            $product = new Import();
            $Attname = $key;
            $Attvalue = $avv[$key];
            $product->setParentId(12);
            $product->setKey($sku);
            $product->setSku($sku);
            $product->setBrand($brand);
            $product->setAttname($Attname);
            $product->setAttvalue($Attvalue);
            $product->save($product);
          }
        }
      }
    }
    $response = new Response(json_encode($product));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

  //Update the NAV Product  
  #[Route('/products/ERP/update_product/', name: 'update_product_ERP')]
  public function update_product_ERPAction(Request $request)
  {
    $response = $this->updateCurlObject($request);
    return new JsonResponse($response);
  }

  public function updateCurlObject(Request $request)
  {
    $name = "myLogUpdate";
    $curl = curl_init();

    if (!$curl) {
      \Pimcore\Log\Simple::log($name, "curl_init Validation ****");
      die("Couldn't initialize a cURL handle");
    }
    $username = API_USERNAME;
    $password = API_PASSWORD;
    $headers = array(
      "Content-type: text/xml;charset=UTF-8",
      "SOAPAction: Update",
    );

    $No = $request->get('No');
    $key = $this->getObjectKey($request);
    if ($request->get('Description') != null) {
      $Description = $request->get('Description');
    }

    $ret = curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "https://aznavwebapi.gsmoutdoors.com:5047/GSMNAVSB/WS/GSM/Page/ItemListAPI",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>
        "<soap:Envelope
	        xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
	        <soap:Body>\n
		       <Update\n
		         	xmlns=\"urn:microsoft-dynamics-schemas/page/itemlistapi\">
			          <ItemListAPI>\n
			            <Key>$key</Key>\n
				         //<No>$No</No>\n
				        <Description>$Description</Description>\n
			          </ItemListAPI>\n
		        </Update>\n 
        	</soap:Body>\n
        </soap:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
      )
    );
    $ret = curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    $ret = curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    $ret = curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $ret = curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $ret = curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $ret = curl_setopt($curl, CURLOPT_HEADER, 0);
    $ret = curl_exec($curl);

    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $ret);
    $array = json_decode(json_encode((array) simplexml_load_string($response)), 1);
    $av = $array['SoapBody']['Update_Result']['ItemListAPI']; //print_r($av);

    if ($av) {
      if ($Description1 = "Description") {
        $Description = $av[$Description1];
      }
    }

    $response = ($request->get('Description') == $Description) ? "Updated Success!" : "Product Not Updated!";

    return $response;
  }

  //Get Object Key 
  public function getObjectKey(Request $request)
  {
    $curl = curl_init();
    if (!$curl) {
      die("Couldn't initialize a cURL handle");
    }
    $username = API_USERNAME;
    $password = API_PASSWORD;
    $headers = array(
      "Content-type: text/xml;charset=UTF-8",
      "SOAPAction: Read",
    );
    $No = $request->get('No');
    $ret = curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "https://aznavwebapi.gsmoutdoors.com:5047/GSMNAVSB/WS/GSM/Page/ItemListAPI",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>
        "<soap:Envelope
	        xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
	        <soap:Body>\n
		       <Read\n
		         	xmlns=\"urn:microsoft-dynamics-schemas/page/itemlistapi\">
				    <No>$No</No>\n
		       </Read>\n 
        	</soap:Body>\n
        </soap:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
      )
    );
    $ret = curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    $ret = curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    $ret = curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $ret = curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $ret = curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $ret = curl_setopt($curl, CURLOPT_HEADER, 0);
    $ret = curl_exec($curl);

    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $ret);
    $array = json_decode(json_encode((array) simplexml_load_string($response)), 1);
    $av = $array['SoapBody']['Read_Result']['ItemListAPI']; //print_r($av);

    if ($av) {
      if ($keyValue = "Key") {
        $key = $av[$keyValue];
      }
    }
    return $key;
  }


  #[Route('/products/ERP/get_product/', name: 'get_product_ERP')]
  public function get_product_ERPAction(Request $request)
  {
    $array = $this->getCurlObject($request);
    return $array;
  }

  public function getCurlObject(Request $request)
  {
    $name = "myLog";
    $curl = curl_init();

    if (!$curl) {
      \Pimcore\Log\Simple::log($name, "curl_init Validation ****");
      die("Couldn't initialize a cURL handle");
    }
    ///config/pimcore/constants.php    
    $username = API_USERNAME;
    $password = API_PASSWORD;
    $headers = array(
      "Content-type: text/xml;charset=UTF-8",
      "SOAPAction: Read",
    );
    $No = $request->get('No');
    $ret = curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => "https://aznavwebapi.gsmoutdoors.com:5047/GSMNAVSB/WS/GSM/Page/ItemListAPI",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>
        "<soap:Envelope
	        xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
	        <soap:Body>\n
		       <Read\n
		         	xmlns=\"urn:microsoft-dynamics-schemas/page/itemlistapi\">
				    <No>$No</No>\n
		       </Read>\n 
        	</soap:Body>\n
        </soap:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
      )
    );
    $ret = curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    $ret = curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    $ret = curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $ret = curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $ret = curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $ret = curl_setopt($curl, CURLOPT_HEADER, 0);
    $ret = curl_exec($curl); // print_r($ret);

    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $ret);
    $array = json_decode(json_encode((array) simplexml_load_string($response)), 1);
    $av = $array['SoapBody']['Read_Result']['ItemListAPI']; //print_r($av);

    if ($key = "No") {
      $sku = $av[$key];
    }
    if ($key = "Global_Dimension_1_Code") {
      $brand = $av[$key];
    }
    foreach ($av as $key => $value) {
      if (strcmp($key, "Key") !== 0) {
        $product = new Import();
        $Attname = $key;
        $Attvalue = $av[$key];
        $product->setParentId(12);
        $product->setKey($sku);
        $product->setSku($sku);
        $product->setBrand($brand);
        $product->setAttname($Attname);
        $product->setAttvalue($Attvalue);
        $product->save($product);
      }
    }

    $response = new Response(json_encode($product));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }



  #[Route('/products_test_update/', name: 'products_test_update')]
  public function products_test_updateAction(Request $request)
  {

    $ItemNo = $request->get('ItemNo');
    $re = "";
    $servername = "localhost";
    $username = "developer";
    $password = "01Explore@1234";
    $dbname = "pimcore";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `object_Import` Where SKU='$ItemNo'";
    $result = mysqli_query($conn, $sql);
    $id=null;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["oo_id"] . "";
      }
    }

    if ($id && $myObject = Import::getById($id)) {
      $myObject->setDescription($request->get('Description'));
      $myObject->save(["versionNote" => "Updated from NAV system"]);
      $re = new Response("Product updated Sucessfully");
    } else {
      $re = new Response("ItemNo Not Found !!");
    //   throw new \Exception('ItemNo Not Found !! '.$ItemNo);try
    //   throw new \Exception('Camera not found.');
    }
    return $re;
  }


}
