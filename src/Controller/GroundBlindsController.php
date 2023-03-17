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

use App\Website\LinkGenerator\GroundBlindsLinkGenerator;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\GroundBlinds;
use Pimcore\Model\DataObject\GSMBrands;
use Pimcore\Model\DataObject\ProductCategory;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\ImageGallery;

use Pimcore\Model\DataObject\QuantityValue\Unit;
use Pimcore\Model\DataObject\Data\InputQuantityValue;
use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GroundBlindsController extends BaseController
{

    /**
     * @Route("/products/muddy/groundblinds/{slug}-{groundblindsId}", name="groundblinds_show", requirements={"slug"="[\w-]+", "groundblindsId"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindsId
     * @return Response
     * throws \Exception
     */
    public function showAction(Request $request,int $groundblindsId,GroundBlindsLinkGenerator $groundblindsLinkGenerator)
    {
        //Getting Object
        $groundblinds = GroundBlinds::getById($request->get('groundblindsId'));

        if (empty($groundblinds)) {
            throw new \Exception('GroundBlinds not found.');
        }

        return $this->render('groundblinds/show.html.twig', [
            'groundblinds' => $groundblinds
        ]);
    }

    /**
     * @Route("/products/muddy/groundblinds/{groundblindID}/edit-product/", name="groundblinds_edit_product", requirements={"groundblindID"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindID
     * @return Response
     * throws \Exception
     */
    public function groundblinds_edit_productAction(Request $request)
    {
        //Getting Object
        $myObject = DataObject\GroundBlinds::getById($request->get('groundblindID'));

        //Product Features
        if ($request->get('Description')) {
            $myObject->setDescription($request->get('Description'));
        }

        //Product Specs
        if ($request->get('ProductWidth')) {
            $myObject->setProductWidth(new DataObject\Data\InputQuantityValue($request->get('ProductWidth'), "Inches"));
        }
        if ($request->get('ProductHeight')) {
            $myObject->setProductHeight(new DataObject\Data\InputQuantityValue($request->get('ProductHeight'), "Inches"));
        }
        if ($request->get('ProductDepth')) {
            $myObject->setProductDepth(new DataObject\Data\InputQuantityValue($request->get('ProductDepth'), "Inches"));
        }
        if ($request->get('Windows')) {
            $myObject->setWindows($request->get('Windows'));
        }
        if ($request->get('Construction')) {
            $myObject->setConstruction($request->get('Construction'));
        }
        if ($request->get('ShootingWidth')) {
            $myObject->setShootingWidth(new DataObject\Data\InputQuantityValue($request->get('ShootingWidth'), "Inches"));
        }
        if ($request->get('StandingHeight')) {
            $myObject->setStandingHeight(new DataObject\Data\InputQuantityValue($request->get('StandingHeight'), "Inches"));
        }
        if ($request->get('HeightToBottomOfWindows')) {
            $myObject->setHeightToBottomOfWindows(new DataObject\Data\InputQuantityValue($request->get('HeightToBottomOfWindows'), "Inches"));
        }
        if ($request->get('CarryingBag')) {
            $myObject->setCarryingBag($request->get('CarryingBag'));
        }
        if ($request->get('Stakes')) {
            $myObject->setStakes($request->get('Stakes'));
        }
        if ($request->get('Door')) {
            $myObject->setDoor($request->get('Door'));
        }
        if ($request->get('TotalWeight')) {
            $myObject->setTotalWeight(new DataObject\Data\InputQuantityValue($request->get('TotalWeight'), "Pound"));
        }
        if ($request->get('WindowsSecuring')) {
            $myObject->setWindowsSecuring($request->get('WindowsSecuring'));
        }
        if ($request->get('BrushStrips')) {
            $myObject->setBrushStrips($request->get('BrushStrips'));
        }
        if ($request->get('OtherFeatures')) {
            $myObject->setOtherFeatures($request->get('OtherFeatures'));
        }
        if ($request->get('Size')) {
            $myObject->setSize($request->get('Size'));
        }
        if ($request->get('OzoneGearPockets')) {
            $myObject->setOzoneGearPockets($request->get('OzoneGearPockets'));
        }
        if ($request->get('Footprint')) {
            $myObject->setFootprint($request->get('Footprint'));
        }

        //Pricing & Availability
        if ($request->get('Price')) {
            $myObject->setPrice($request->get('Price'));
        }
        if ($request->get('Availability')) {
            $myObject->setAvailability("In Stock");
        }
        if ($request->get('ItemStatus')) {
            $myObject->setItemStatus("Active");
        }

        $myObject->save(["versionNote" => "Product Edited From Frontend"]);

        return new Response("Product edited Sucessfully");
    }

    /**
     * @Route("/products/muddy/groundblinds/{groundblindID}/product-delete-api/", name="groundblinds_product_delete_api", requirements={"groundblindID"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindID
     * @return Response
     * throws \Exception
     */
    public function groundblinds_product_delete_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\GroundBlinds::getById($request->get('groundblindID'));

        $myObject->setPublished(0);

        //Creating and saving object
        $myObject->save(["versionNote" => "Product deleted from Frontend"]);

        return new Response("Product deleted Sucessfully");
    }

    #[Route('/products/muddy/groundblinds/create-product/', name: 'groundblinds_create_product')]
    public function groundblinds_create_productAction(Request $request)
    {
        //Create a custom log for the Function 
        $name = "GroundBlindsController";
        \Pimcore\Log\Simple::log($name, "create_productAction");
        \Pimcore\Log\Simple::log($name, $request->get('ProductName'));
        $myObject = new GroundBlinds;

        //In this case, Static ParentId is declared to be dynamic.
        $myObject->setParentId(18);
        $myObject->setKey($request->get('ProductName'));

        //Product Details & Media		
        $myObject->setProductName($request->get('ProductName'));
        $myObject->setSKU($request->get('SKU'));
        $myObject->setUPC($request->get('UPC'));
        $myObject->setGlobalTradeItemNumber($request->get('GlobalTradeItemNumber'));

        //Product Features
        $myObject->setDescription($request->get('Description'));

        //Product Specs
        $myObject->setProductWidth(new DataObject\Data\InputQuantityValue($request->get('ProductWidth'), "Inches"));
        $myObject->setProductHeight(new DataObject\Data\InputQuantityValue($request->get('ProductHeight'), "Inches"));
        $myObject->setProductDepth(new DataObject\Data\InputQuantityValue($request->get('ProductDepth'), "Inches"));
        $myObject->setWindows($request->get('Windows'));
        $myObject->setConstruction($request->get('Construction'));
        $myObject->setShootingWidth(new DataObject\Data\InputQuantityValue($request->get('ShootingWidth'), "Inches"));
        $myObject->setStandingHeight(new DataObject\Data\InputQuantityValue($request->get('StandingHeight'), "Inches"));
        $myObject->setHeightToBottomOfWindows(new DataObject\Data\InputQuantityValue($request->get('HeightToBottomOfWindows'), "Inches"));
        $myObject->setCarryingBag($request->get('CarryingBag'));
        $myObject->setStakes($request->get('Stakes'));
        $myObject->setDoor($request->get('Door'));
        $myObject->setTotalWeight(new DataObject\Data\InputQuantityValue($request->get('TotalWeight'), "Pound"));
        $myObject->setWindowsSecuring($request->get('WindowsSecuring'));
        $myObject->setBrushStrips($request->get('BrushStrips'));
        $myObject->setOtherFeatures($request->get('OtherFeatures'));
        $myObject->setSize($request->get('Size'));
        $myObject->setOzoneGearPockets($request->get('OzoneGearPockets'));
        $myObject->setFootprint($request->get('Footprint'));

        //Pricing & Availability
        $myObject->setPriceType($request->get('PriceType'));
        $myObject->setPrice($request->get('Price'));
        $myObject->setAvailability("In Stock");
        $myObject->setItemStatus("Active");

        //Creating and saving new asset
        if ($request->get('Thumbnail')) {
            $newAsset = new \Pimcore\Model\Asset();
            $assetext = pathinfo($request->get('Thumbnail'), PATHINFO_EXTENSION);
            $newAsset->setFilename($request->get('ProductName') . "." . $assetext);
            $newAsset->setData(file_get_contents($request->get('Thumbnail')));
            $newAsset->setParent(\Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Ground Blinds/"));
            $newAsset->save(["versionNote" => "Custom Image from frontend"]);

            $image = \Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Ground Blinds/" . $request->get('ProductName') . "." . $assetext);
            $advancedImage = new DataObject\Data\Hotspotimage();
            $advancedImage->setImage($image);

            $myObject->setAssetAdvanced($advancedImage);
        }

        //Creating and saving object
        $myObject->setPublished(1);
        $myObject->save(["versionNote" => "Product created from Frontend"]);
        \Pimcore\Log\Simple::log($name, "Product created Sucessfully");
        return new Response("Product created Sucessfully");

    }

    /**
     * @Route("/products/muddy/groundblinds/product-list-api/", name="groundblinds_product_list_api")
     *
     * @param Request $request
     * @return Response
     * throws \Exception
     */
    public function groundblinds_product_list_apiAction(Request $request)
    {
        $offset = $request->get('offset');
        $perPage = $request->get('perpage');

        $totalcountarray = DataObject\GroundBlinds::getList();
        $totalcount = count($totalcountarray);

        $items = DataObject\GroundBlinds::getList([
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
            $data[$i]['Size'] = $myObject->getSize();

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
            if ($myObject->getProductWidth() != "") {
                $data[$i]['feature']['ProductWidth'] = $myObject->getProductWidth()->getValue();
                $data[$i]['feature']['ProductWidthUnit'] = $myObject->getProductWidth()->getunitId();
            }
            if ($myObject->getProductHeight() != "") {
                $data[$i]['feature']['ProductHeight'] = $myObject->getProductHeight()->getValue();
                $data[$i]['feature']['ProductHeightUnit'] = $myObject->getProductHeight()->getunitId();
            }
            if ($myObject->getProductDepth() != "") {
                $data[$i]['feature']['ProductDepth'] = $myObject->getProductDepth()->getValue();
                $data[$i]['feature']['ProductDepthUnit'] = $myObject->getProductDepth()->getunitId();
            }

            $data[$i]['feature']['Windows'] = $myObject->getWindows();
            $data[$i]['feature']['Construction'] = $myObject->getConstruction();

            if ($myObject->getShootingWidth() != "") {
                $data[$i]['feature']['ShootingWidth'] = $myObject->getShootingWidth()->getValue();
                $data[$i]['feature']['ShootingWidthUnit'] = $myObject->getShootingWidth()->getunitId();
            }
            if ($myObject->getStandingHeight() != "") {
                $data[$i]['feature']['StandingHeight'] = $myObject->getStandingHeight()->getValue();
                $data[$i]['feature']['StandingHeightUnit'] = $myObject->getStandingHeight()->getunitId();
            }
            if ($myObject->getHeightToBottomOfWindows() != "") {
                $data[$i]['feature']['HeightToBottomOfWindows'] = $myObject->getHeightToBottomOfWindows()->getValue();
                $data[$i]['feature']['HeightToBottomOfWindowsUnit'] = $myObject->getHeightToBottomOfWindows()->getunitId();
            }
            if ($myObject->getTotalWeight() != "") {
                $data[$i]['feature']['TotalWeight'] = $myObject->getTotalWeight()->getValue();
                $data[$i]['feature']['TotalWeightUnit'] = $myObject->getTotalWeight()->getunitId();
            }
            $data[$i]['feature']['CarryingBag'] = $myObject->getCarryingBag();
            $data[$i]['feature']['Stakes'] = $myObject->getStakes();
            $data[$i]['feature']['Door'] = $myObject->getDoor();

            //Pricing & Availability
            $data[$i]['PriceType'] = $myObject->getPriceType();
            $data[$i]['Price'] = $myObject->getPrice();
            $data[$i]['Availability'] = $myObject->getAvailability();
            $data[$i]['ItemStatus'] = $myObject->getItemStatus();

            //Brand & Category
            if ($myObject->getBrand() != "") {
                $data[$i]['BrandId'] = $myObject->getBrand()->getID();
                $data[$i]['Brand'] = $myObject->getBrand()->getBrandName();
            }
            if ($myObject->getCategory() != "") {
                $data[$i]['CategoryId'] = $myObject->getCategory()->getID();
                $data[$i]['Category'] = $myObject->getCategory()->getCategory();
            }

            $i++;
        }

        //Count of products in category
        // $data['totalcount'] = $totalcount;

        return $this->json(["success" => true, "data" => $data]);
    }


        /**
     * @Route("/products/muddy/groundblinds/{groundblindID}/product-single-api/", name="groundblinds_product_single_api", requirements={"groundblindID"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindID
     * @return Response
     * throws \Exception
     */
    public function groundblinds_product_single_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\GroundBlinds::getById($request->get('groundblindID'));

        $hostURL = \Pimcore\Tool::getHostUrl();

        //Product Details & Media
        $data['id'] = $myObject->getID();
        $data['title'] = $myObject->getProductName();
        $data['SKU'] = $myObject->getSKU();
        $data['UPC'] = $myObject->getUPC();
        $data['GlobalTradeItemNumber'] = $myObject->getGlobalTradeItemNumber();
        $data['Size'] = $myObject->getSize();

        $asset = \Pimcore\Model\Asset::getByPath($myObject->getAssetAdvanced());
        if ($asset != "") {
            $data['AssetAdvanced'] = $hostURL . $asset->getFullPath();
        }

        $galleryData = $myObject->getAssets();
        $j = 0;
        foreach ($galleryData as $img) {
            $imagepath = \Pimcore\Model\Asset::getByPath($img);
            $data['Asset'][$j] = $hostURL . $imagepath;
            $j++;
        }

        //Product Features
        $data['Description'] = $myObject->getDescription();

        //Product Specs
        $data['feature']['ProductWidth'] = $myObject->getProductWidth()->getValue();
        $data['feature']['ProductWidthUnit'] = $myObject->getProductWidth()->getunitId();
        $data['feature']['ProductHeight'] = $myObject->getProductHeight()->getValue();
        $data['feature']['ProductHeightUnit'] = $myObject->getProductHeight()->getunitId();
        $data['feature']['ProductDepth'] = $myObject->getProductDepth()->getValue();
        $data['feature']['ProductDepthUnit'] = $myObject->getProductDepth()->getunitId();
        $data['feature']['Windows'] = $myObject->getWindows();
        $data['feature']['Construction'] = $myObject->getConstruction();
        $data['feature']['ShootingWidth'] = $myObject->getShootingWidth()->getValue();
        $data['feature']['ShootingWidthUnit'] = $myObject->getShootingWidth()->getunitId();
        $data['feature']['StandingHeight'] = $myObject->getStandingHeight()->getValue();
        $data['feature']['StandingHeightUnit'] = $myObject->getStandingHeight()->getunitId();
        $data['feature']['HeightToBottomOfWindows'] = $myObject->getHeightToBottomOfWindows()->getValue();
        $data['feature']['HeightToBottomOfWindowsUnit'] = $myObject->getHeightToBottomOfWindows()->getunitId();
        $data['feature']['TotalWeight'] = $myObject->getTotalWeight()->getValue();
        $data['feature']['TotalWeightUnit'] = $myObject->getTotalWeight()->getunitId();
        $data['feature']['CarryingBag'] = $myObject->getCarryingBag();
        $data['feature']['Stakes'] = $myObject->getStakes();
        $data['feature']['Door'] = $myObject->getDoor();

        //Pricing & Availability
        $data['PriceType'] = $myObject->getPriceType();
        $data['Price'] = $myObject->getPrice();
        $data['Availability'] = $myObject->getAvailability();
        $data['ItemStatus'] = $myObject->getItemStatus();

        //Brand & Category
        if ($myObject->getBrand() != "") {
            $data['BrandId'] = $myObject->getBrand()->getId();
            $data['Brand'] = $myObject->getBrand()->getBrandName();
        }
        if ($myObject->getCategory() != "") {
            $data['CategoryId'] = $myObject->getCategory()->getId();
            $data['Category'] = $myObject->getCategory()->getCategory();
        }

        return $this->json(["success" => true, "data" => $data]);
    }

}
