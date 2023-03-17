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

use App\Website\LinkGenerator\BoxBlindsLinkGenerator;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\GSMBrands;
use Pimcore\Model\DataObject\ProductCategory;
//use Pimcore\Model\DataObject\CameraArms;
use Pimcore\Model\DataObject\BoxBlinds;
//use Pimcore\Model\DataObject\Apparel;
//use Pimcore\Model\DataObject\GroundBlinds;
use Pimcore\Model\DataObject\BoxBlinds\Listing;
//use Pimcore\Model\DataObject\GSMBrands\Listing;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;


//#[AsController]
class BoxBlindsController extends BaseController
{

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function listingAction(Request $request, PaginatorInterface $paginator)
    {

        // get a list of boxblinds objects and order them by date
        $boxblindsList = new BoxBlinds\Listing();

        $paginator = $paginator->paginate(
            $boxblindsList,
            $request->get('page', 1),
            6
        );

        return $this->render('apparel/listing.html.twig', [
            'apparel' => $paginator,
            'paginationVariables' => $paginator->getPaginationData()
        ]);
    }

    /**
     * @Route("/boxblinds/{slug}-{boxblindsId}", name="boxblinds_show", requirements={"slug"="[\w-]+", "boxblindsId"="\d+"})
     *
     * @param Request $request
     * @param int $boxblindsId
     * @return Response
     * throws \Exception
     */
    public function showAction(
        Request $request,
        int $boxblindsId,
        BoxBlindsLinkGenerator $boxblindsLinkGenerator
    )
    {
        $boxblinds = BoxBlinds::getById($request->get('boxblindsId'));

        if (empty($boxblinds)) {
            throw new \Exception('BoxBlinds not found.');
        }

        return $this->render('boxblinds/show.html.twig', [
            'boxblinds' => $boxblinds
        ]);
    }



    /**
     * @Route("/products/boxblinds/boxblinds_product_list_api/", name="boxblinds_product_list_api")
     *
     * @param Request $request
     * @return Response
	 * throws \Exception
     */
    // /**
    //  * @Route("/products/muddy/boxblinds/product-list-api/", name="apparel_product_list_api")
    //  *
    //  * @param Request $request
    //  * @return Response
    //  * throws \Exception
    //  */

    public function boxblinds_product_list_apiAction(Request $request)
    {
        $offset = $request->get('offset');
        $perPage = $request->get('perpage');

        $totalcountarray = DataObject\BoxBlinds::getList();
        $totalcount = count($totalcountarray);

        $items = DataObject\BoxBlinds::getList([
            "offset" => $offset,
            "limit" => $perPage
        ]);

        $i = 0;
        $hostURL = \Pimcore\Tool::getHostUrl();
        foreach ($items as $myObject) {

            //Product Details & Media
            $data[$i]['id'] = $myObject->getID();
            $data[$i]['title'] = $myObject->getProductName();
            $data[$i]['SKU'] = $myObject->getSKU();
            $data[$i]['UPC'] = $myObject->getUPC();
            $data[$i]['GlobalTradeItemNumber'] = $myObject->getGlobalTradeItemNumber();

            $asset = \Pimcore\Model\Asset::getByPath($myObject->getAssetAdvanced());
            if ($asset != "") {
                $data[$i]['AssetAdvanced'] = $hostURL . $asset->getFullPath();
            }

            $galleryData = $myObject->getAssets();
            $j = 0;
            foreach ($galleryData as $img) {
                $imagepath = \Pimcore\Model\Asset::getByPath($img);
                $data[$i]['Asset'][$j] = $hostURL . $imagepath;
                $j++;
            }

            //Product Features
            $data[$i]['Description'] = $myObject->getDescription();

            //Product Specs
            $data[$i]['Width']['ProductWidth'] = $myObject->getProductWidth()->getValue();
            $data[$i]['Width']['ProductUnit'] = $myObject->getProductWidth()->getunitId();

            $data[$i]['Height']['ProductHeight'] = $myObject->getProductHeight()->getValue();
            $data[$i]['Height']['ProductUnit'] = $myObject->getProductHeight()->getunitId();

            $data[$i]['Depth']['ProductDepth'] = $myObject->getProductDepth()->getValue();
            $data[$i]['Depth']['ProductUnit'] = $myObject->getProductDepth()->getunitId();

            $data[$i]['Width']['BlindWidth'] = $myObject->getBlindWidth()->getValue();
            $data[$i]['Width']['ProductUnit'] = $myObject->getBlindWidth()->getunitId();

            $data[$i]['Height']['BlindHeight'] = $myObject->getBlindHeight()->getValue();
            $data[$i]['Height']['ProductUnit'] = $myObject->getBlindHeight()->getunitId();

            $data[$i]['Depth']['BlindDepth'] = $myObject->getBlindDepth()->getValue();
            $data[$i]['Depth']['ProductUnit'] = $myObject->getBlindDepth()->getunitId();

            $data[$i]['CombinedWeight']['CombinedWeight'] = $myObject->getCombinedWeight()->getValue();
            $data[$i]['CombinedWeight']['ProductUnit'] = $myObject->getCombinedWeight()->getunitId();

            $data[$i]['Compatibility'] = $myObject->getCompatibility();

            $data[$i]['Width']['DoorWidth'] = $myObject->getDoorWidth()->getValue();
            $data[$i]['Width']['ProductUnit'] = $myObject->getDoorWidth()->getunitId();

            $data[$i]['Height']['DoorHeight'] = $myObject->getDoorHeight()->getValue();
            $data[$i]['Height']['ProductUnit'] = $myObject->getDoorHeight()->getunitId();

            $data[$i]['WindowsWidth']['HorizontalWindowsWidth'] = $myObject->getHorizontalWindowsWidth()->getValue();
            $data[$i]['WindowsWidth']['ProductUnit'] = $myObject->getHorizontalWindowsWidth()->getunitId();

            $data[$i]['WindowsHeight']['HorizontalWindowsHeight'] = $myObject->getHorizontalWindowsHeight()->getValue();
            $data[$i]['WindowsHeight']['ProductUnit'] = $myObject->getHorizontalWindowsHeight()->getunitId();

            $data[$i]['LandingWidth']['LandingWidth'] = $myObject->getBlindHeight()->getValue();
            $data[$i]['LandingWidth']['ProductUnit'] = $myObject->getBlindHeight()->getunitId();

            $data[$i]['LandingHeight']['LandingHeight'] = $myObject->getLandingWidth()->getValue();
            $data[$i]['LandingHeight']['ProductUnit'] = $myObject->getLandingWidth()->getunitId();

            $data[$i]['FloorDetails'] = $myObject->getFloorDetails();
            $data[$i]['LadderDetails'] = $myObject->getLadderDetails();
            $data[$i]['LandingDetails'] = $myObject->getLandingDetails();
            $data[$i]['WallDetails'] = $myObject->getWallDetails();
            $data[$i]['WindowDetails'] = $myObject->getWindowDetails();
            $data[$i]['TowerDetails'] = $myObject->getTowerDetails();
            $data[$i]['RoofDetails'] = $myObject->getRoofDetails();
            $data[$i]['Stakes'] = $myObject->getStakes();

            $data[$i]['WindowsWidth']['VerticalWindowsWidth'] = $myObject->getVerticalWindowsWidth()->getValue();
            $data[$i]['WindowsWidth']['ProductUnit'] = $myObject->getVerticalWindowsWidth()->getunitId();

            $data[$i]['WindowsHeight']['VerticalWindowsHeight'] = $myObject->getVerticalWindowsHeight()->getValue();
            $data[$i]['WindowsHeight']['ProductUnit'] = $myObject->getVerticalWindowsHeight()->getunitId();

            $data[$i]['WeightRating']['WeightRating'] = $myObject->getWeightRating()->getValue();
            $data[$i]['WeightRating']['ProductUnit'] = $myObject->getWeightRating()->getunitId();

            // 			//Pricing & Availability
            $data[$i]['PriceType'] = $myObject->getPriceType();
            $data[$i]['Price'] = $myObject->getPrice();
            $data[$i]['Availability'] = $myObject->getAvailability();
            $data[$i]['ItemStatus'] = $myObject->getItemStatus();

            //Brand & Category
            if ($myObject->getBrand() != "") {
                $data[$i]['BrandId'] = $myObject->getBrand()->getID();
                $data[$i]['Brand'] = $myObject->getBrand()->getBrandName();
            }
            // 			if($myObject->getCategory()!=""){
//       		    $data[$i]['CategoryId'] = $myObject->getCategory()->getID();
//       		    $data[$i]['Category'] = $myObject->getCategory()->getCategory();
// 			}

            $i++;
        }

        //Count of products in category
        $data['totalcount'] = $totalcount;

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/boxblinds/{boxblindsID}/boxblinds_product_single_api/", name="boxblinds_product_single_api", requirements={"boxblindsID"="\d+"})
     *
     * @param Request $request
     * @param int $apparelID
     * @return Response
     * throws \Exception
     */


    public function boxblinds_product_single_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\BoxBlinds::getById($request->get('boxblindsID'));

        $hostURL = \Pimcore\Tool::getHostUrl();
        $asset = \Pimcore\Model\Asset::getByPath($myObject->getAssetAdvanced());

        //Product Details & Media
        $data['id'] = $myObject->getID();
        $data['title'] = $myObject->getProductName();
        $data['SKU'] = $myObject->getSKU();
        $data['UPC'] = $myObject->getUPC();
        $data['GlobalTradeItemNumber'] = $myObject->getGlobalTradeItemNumber();

        if ($asset != "") {
            $data['AssetAdvanced'] = $hostURL . $asset->getFullPath();
        }

        //Product Features
        $data['Description'] = $myObject->getDescription();

        //Product Specs
        //Product Specs
        $data['Width']['ProductWidth'] = $myObject->getProductWidth()->getValue();
        $data['Width']['ProductUnit'] = $myObject->getProductWidth()->getunitId();

        $data['Height']['ProductHeight'] = $myObject->getProductHeight()->getValue();
        $data['Height']['ProductUnit'] = $myObject->getProductHeight()->getunitId();

        $data['Depth']['ProductDepth'] = $myObject->getProductDepth()->getValue();
        $data['Depth']['ProductUnit'] = $myObject->getProductDepth()->getunitId();

        $data['BlindWidth']['BlindWidth'] = $myObject->getBlindWidth()->getValue();
        $data['BlindWidth']['ProductUnit'] = $myObject->getBlindWidth()->getunitId();

        $data['BlindHeight']['BlindHeight'] = $myObject->getBlindHeight()->getValue();
        $data['BlindHeight']['ProductUnit'] = $myObject->getBlindHeight()->getunitId();

        $data['BlindDepth']['BlindDepth'] = $myObject->getBlindDepth()->getValue();
        $data['BlindDepth']['ProductUnit'] = $myObject->getBlindDepth()->getunitId();

        $data['Weight']['CombinedWeight'] = $myObject->getCombinedWeight()->getValue();
        $data['Weight']['ProductUnit'] = $myObject->getCombinedWeight()->getunitId();

        $data['Compatibility'] = $myObject->getCompatibility();

        $data['DoorWidth']['DoorWidth'] = $myObject->getDoorWidth()->getValue();
        $data['DoorWidth']['ProductUnit'] = $myObject->getDoorWidth()->getunitId();

        $data['DoorHeight']['DoorHeight'] = $myObject->getDoorHeight()->getValue();
        $data['DoorHeight']['ProductUnit'] = $myObject->getDoorHeight()->getunitId();

        $data['WindowsWidth']['HorizontalWindowsWidth'] = $myObject->getHorizontalWindowsWidth()->getValue();
        $data['WindowsWidth']['ProductUnit'] = $myObject->getHorizontalWindowsWidth()->getunitId();

        $data['WindowsHeight']['HorizontalWindowsHeight'] = $myObject->getHorizontalWindowsHeight()->getValue();
        $data['WindowsHeight']['ProductUnit'] = $myObject->getHorizontalWindowsHeight()->getunitId();

        $data['LandingWidth']['LandingWidth'] = $myObject->getBlindHeight()->getValue();
        $data['LandingWidth']['ProductUnit'] = $myObject->getBlindHeight()->getunitId();

        $data['LandingHeight']['LandingHeight'] = $myObject->getLandingWidth()->getValue();
        $data['LandingHeight']['ProductUnit'] = $myObject->getLandingWidth()->getunitId();

        $data['FloorDetails'] = $myObject->getFloorDetails();
        $data['LadderDetails'] = $myObject->getLadderDetails();
        $data['LandingDetails'] = $myObject->getLandingDetails();
        $data['WallDetails'] = $myObject->getWallDetails();
        $data['WindowDetails'] = $myObject->getWindowDetails();
        $data['TowerDetails'] = $myObject->getTowerDetails();
        $data['RoofDetails'] = $myObject->getRoofDetails();
        $data['Stakes'] = $myObject->getStakes();

        $data['Windows Width']['VerticalWindowsWidth'] = $myObject->getVerticalWindowsWidth()->getValue();
        $data['Windows Width']['ProductUnit'] = $myObject->getVerticalWindowsWidth()->getunitId();

        $data['Windows Height']['VerticalWindowsHeight'] = $myObject->getVerticalWindowsHeight()->getValue();
        $data['Windows Height']['ProductUnit'] = $myObject->getVerticalWindowsHeight()->getunitId();

        $data['Weight Rating']['WeightRating'] = $myObject->getWeightRating()->getValue();
        $data['Weight Rating']['ProductUnit'] = $myObject->getWeightRating()->getunitId();

        // 		//Pricing & Availability
        $data['PriceType'] = $myObject->getPriceType();
        $data['Price'] = $myObject->getPrice();
        $data['Availability'] = $myObject->getAvailability();
        $data['ItemStatus'] = $myObject->getItemStatus();

        //Brand & Category
        if ($myObject->getBrand() != "") {
            $data['BrandId'] = $myObject->getBrand()->getId();
            $data['Brand'] = $myObject->getBrand()->getBrandName();
        }
        // 		if($myObject->getCategory()!=""){
//  		    $data['CategoryId'] = $myObject->getCategory()->getId();
//  		    $data['Category'] = $myObject->getCategory()->getCategory();
// 	    }

        return $this->json(["success" => true, "data" => $data]);
    }



    #[Route('/products/muddy/boxblinds/boxblinds_create_product/', name: 'boxblinds_create_product')]
    public function boxblinds_create_productAction(Request $request)
    {
        $myObject = new BoxBlinds;

        $myObject->setParentId(11);
        $myObject->setKey($request->get('ProductName'));

        //Product Details & Media		
        $myObject->setProductName($request->get('ProductName'));
        $myObject->setSKU($request->get('SKU'));
        $myObject->setUPC($request->get('UPC'));
        $myObject->setGlobalTradeItemNumber($request->get('GlobalTradeItemNumber'));

        //Product Features
        $myObject->setDescription($request->get('Description'));

        //Product Features
        // $myObject->setProductWidth($request->get('ProductWidth'));
        // $myObject->setProductHeight($request->get('ProductHeight'));
        // $myObject->setProductDepth($request->get('ProductDepth'));
        // $myObject->setBlindWidth($request->get('BlindWidth'));
        // $myObject->setBlindHeight($request->get('BlindHeight'));
        // $myObject->setBlindDepth($request->get('BlindDepth'));
        // $myObject->setCombinedWeight($request->get('CombinedWeight'));

        $myObject->setCompatibility($request->get('Compatibility'));

        // $myObject->setDoorWidth($request->get('DoorWidth'));
        // $myObject->setDoorHeight($request->get('DoorHeight'));
        // $myObject->setHorizontalWindowsWidth($request->get('HorizontalWindowsWidth'));
        // $myObject->setHorizontalWindowsHeight($request->get('HorizontalWindowsHeight'));
        // $myObject->setLandingWidth($request->get('LandingWidth'));
        // $myObject->setLandingHeight($request->get('LandingHeight'));

        $myObject->setFloorDetails($request->get('FloorDetails'));
        $myObject->setLadderDetails($request->get('LadderDetails'));
        $myObject->setLandingDetails($request->get('LandingDetails'));
        $myObject->setWallDetails($request->get('WallDetails'));
        $myObject->setWindowDetails($request->get('WindowDetails'));
        $myObject->setTowerDetails($request->get('TowerDetails'));
        $myObject->setRoofDetails($request->get('RoofDetails'));
        $myObject->setStakes($request->get('Stakes'));

        // $myObject->setVerticalWindowsWidth($request->get('VerticalWindowsWidth'));
        // $myObject->setVerticalWindowsHeight($request->get('VerticalWindowsHeight'));
        // $myObject->setWeightRating($request->get('WeightRating'));

        //Pricing & Availability
        $myObject->setPriceType($request->get('PriceType'));
        $myObject->setPrice($request->get('Price'));
        $myObject->setAvailability($request->get('Availability'));
        $myObject->setItemStatus($request->get('ItemStatus'));

        //Creating and saving new asset
        if ($request->get('Thumbnail')) {
            $newAsset = new \Pimcore\Model\Asset();
            $assetext = pathinfo($request->get('Thumbnail'), PATHINFO_EXTENSION);
            $newAsset->setFilename($request->get('ProductName') . "." . $assetext);
            $newAsset->setData(file_get_contents($request->get('Thumbnail')));
            $newAsset->setParent(\Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Box Blinds/"));
            $newAsset->save(["versionNote" => "Custom Image from frontend"]);

            $image = \Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Box Blinds/" . $request->get('ProductName') . "." . $assetext);
            $advancedImage = new DataObject\Data\Hotspotimage();
            $advancedImage->setImage($image);

            $myObject->setAssetAdvanced($advancedImage);
        }

        //Creating and saving object
        $myObject->setPublished(1);
        $myObject->save(["versionNote" => "Product created from Frontend"]);

        return new Response("Product created Sucessfully");
    }

    /**
     * @Route("/products/muddy/boxblinds/{boxblindsID}/product-delete-api/", name="boxblinds_product_delete_api", requirements={"boxblindsID"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindID
     * @return Response
     * throws \Exception
     */
    public function boxblinds_product_delete_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\BoxBlinds::getById($request->get('boxblindsID'));

        $myObject->setPublished(0);

        //Creating and saving object
        $myObject->save(["versionNote" => "Product deleted from Frontend"]);

        return new Response("Product deleted Sucessfully");
    }
    /**
     * @Route("/products/test/{categoryName}/products_list_api/", name="products_list_api", requirements={"categoryName"="\w+"})
     *
     * @param Request $request
     * @param int $categoryID
     * @return Response
     * throws \Exception
     */
    public function products_list_apiAction(Request $request)
    {
        $offset = $request->get('offset');
        $perPage = $request->get('perpage');

        $ab = $request->get("categoryName");
        // 		print_r($ab);
        switch ($request->get("categoryName")) {

            case ($request->get("categoryName") == 'Apparel'):
                $totalcountarray = Apparel::getList();
                $items = Apparel::getList(["offset" => $offset, "limit" => $perPage]);
                break;

            case ($request->get("categoryName") == 'CameraArms'):
                $totalcountarray = CameraArms::getList();
                $items = CameraArms::getList(["offset" => $offset, "limit" => $perPage]);
                break;

            case ($request->get("categoryName") == 'BoxBlinds'):
                $totalcountarray = BoxBlinds::getList();
                $items = BoxBlinds::getList(["offset" => $offset, "limit" => $perPage]);
                break;
        }
        $totalcount = count($totalcountarray);
        $i = 0;
        $hostURL = \Pimcore\Tool::getHostUrl();
        foreach ($items as $myObject) {

            //Product Details & Media
            $data[$i]['id'] = $myObject->getID();
            $data[$i]['title'] = $myObject->getProductName();
            $data[$i]['SKU'] = $myObject->getSKU();
            $data[$i]['UPC'] = $myObject->getUPC();
            $data[$i]['GlobalTradeItemNumber'] = $myObject->getGlobalTradeItemNumber();

            $asset = \Pimcore\Model\Asset::getByPath($myObject->getAssetAdvanced());
            if ($asset != "") {
                $data[$i]['AssetAdvanced'] = $hostURL . $asset->getFullPath();
            }

            $galleryData = $myObject->getAssets();
            $j = 0;
            foreach ($galleryData as $img) {
                $imagepath = \Pimcore\Model\Asset::getByPath($img);
                $data[$i]['Asset'][$j] = $hostURL . $imagepath;
                $j++;
            }

            //Product Features
            $data[$i]['Description'] = $myObject->getDescription();

            //Pricing & Availability
            $data[$i]['PriceType'] = $myObject->getPriceType();
            $data[$i]['Price'] = $myObject->getPrice();
            $data[$i]['Availability'] = $myObject->getAvailability();
            $data[$i]['ItemStatus'] = $myObject->getItemStatus();

            //Count of products in category
            $data['totalcount'] = $totalcount;

            $i++;
        }

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/{categoryName}/allproduct_list/", name="allproducts_listAction", requirements={"categoryName"="\w+"})
     *
     * @param Request $request
     * @param int $categoryID
     * @return Response
     * throws \Exception
     */

    public function allproducts_listAction(request $request)
    {
        $ab = $request->get("categoryName");

        switch ($request->get("categoryName")) {

            case ($request->get("categoryName") == 'Apparel'):
                $response = $this->forward('App\Controller\ApparelController::apparel_product_list_apiAction', [
                    //'request'  => $request,

                ]);
                return $response;
                break;

            //return $this->json(["success" => true, "data" => $data]);
            case ($request->get("categoryName") == 'GroundBlinds'):
                $response = $this->forward('App\Controller\GroundBlindsController::groundblinds_product_list_apiAction', [
                    'request' => $request,

                ]);
                return $response;
                break;

            case ($request->get("categoryName") == 'BoxBlinds'):
                $response = $this->forward('App\Controller\BoxBlindsController::boxblinds_product_list_apiAction', [
                    'request' => $request,

                ]);
                return $response;
                break;

            case ($request->get("categoryName") == 'DigitalCameras'):
                $response = $this->forward('App\Controller\SCTrailcameraController::sctrailcamera_product_list_apiAction', [
                    'request' => $request,

                ]);
                return $response;
                break;


        }
    }
}