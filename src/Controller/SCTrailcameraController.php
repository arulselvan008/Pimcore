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

use App\Website\LinkGenerator\SCTrailcameraLinkGenerator;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\SCTrailcamera;
use Pimcore\Model\DataObject\DigitalCameras;
use Pimcore\Model\DataObject\GSMBrands;
use Pimcore\Model\DataObject\ProductCategory;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\ImageGallery;

use Symfony\Component\Config\Definition\Exception\Exception;
use Pimcore\Model\DataObject\QuantityValue\Unit;
use Pimcore\Model\DataObject\Data\InputQuantityValue;
use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


class SCTrailcameraController extends BaseController
{
    //Listing Action for PHP Template
    public function listingAction(Request $request, PaginatorInterface $paginator)
    {

        // get a list of sctrailcamera objects and order them by date
        $sctrailcameraList = new SCTrailcamera\Listing();

        $paginator = $paginator->paginate(
            $sctrailcameraList,
            $request->get('page', 1),
            100
        );

        return $this->render('sctrailcamera/listing.html.twig', [
            'sctrailcamera' => $paginator,
            'paginationVariables' => $paginator->getPaginationData()
        ]);
    }


    /**
     * @Route("/products/stealthcam/trail-camera/{slug}-{sctrailcameraId}", name="sctrailcamera_show", requirements={"slug"="[\w-]+", "sctrailcameraId"="\d+"})
     *
     * @param Request $request
     * @param int $sctrailcameraId
     * @return Response
     * throws \Exception
     */
    public function showAction(Request $request, int $sctrailcameraId, SCTrailcameraLinkGenerator $sctrailcameraLinkGenerator)
    {
        //Getting Object
        $sctrailcamera = SCTrailcamera::getById($request->get('sctrailcameraId'));

        if (empty($sctrailcamera)) {
            throw new \Exception('Camera not found.');
        }

        return $this->render('sctrailcamera/show.html.twig', [
            'sctrailcamera' => $sctrailcamera
        ]);
    }

    /**
     * @Route("/products/stealthcam/trail-camera/{sctrailcameraID}/edit-product/", name="sctrailcamera_edit_product", requirements={"sctrailcameraID"="\d+"})
     *
     * @param Request $request
     * @param int $sctrailcameraID
     * @return Response
     * throws \Exception
     */
    public function sctrailcamera_edit_productAction(Request $request)
    {
        //Getting Object
        $myObject = DataObject\SCTrailcamera::getById($request->get('sctrailcameraID'));

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
        if ($request->get('ProductSizeWidth')) {
            $myObject->setProductSizeWidth(new DataObject\Data\InputQuantityValue($request->get('ProductSizeWidth'), "Inches"));
        }
        if ($request->get('ProductSizeHeight')) {
            $myObject->setProductSizeHeight(new DataObject\Data\InputQuantityValue($request->get('ProductSizeHeight'), "Inches"));
        }
        if ($request->get('ProductSizeDepth')) {
            $myObject->setProductSizeDepth(new DataObject\Data\InputQuantityValue($request->get('ProductSizeDepth'), "Inches"));
        }
        if ($request->get('PhotoResolutions')) {
            $myObject->setPhotoResolutions($request->get('PhotoResolutions'));
        }
        if ($request->get('PhotoUploadResolutions')) {
            $myObject->setPhotoUploadResolutions($request->get('PhotoUploadResolutions'));
        }
        if ($request->get('VideoResolutions')) {
            $myObject->setVideoResolutions($request->get('VideoResolutions'));
        }
        if ($request->get('VideoUploadResolutions')) {
            $myObject->setVideoUploadResolutions($request->get('VideoUploadResolutions'));
        }
        if ($request->get('VideoAudio')) {
            $myObject->setVideoAudio($request->get('VideoAudio'));
        }
        if ($request->get('DetectionIRRange') && $request->get('DetectionIRRangeUnit')) {
            $myObject->setDetectionIRRange(new DataObject\Data\InputQuantityValue($request->get('DetectionIRRange'), $request->get('DetectionIRRangeUnit')));
        }
        if ($request->get('LEDs')) {
            $myObject->setLEDs($request->get('LEDs'));
        }
        if ($request->get('LEDFlashType')) {
            $myObject->setLEDFlashType($request->get('LEDFlashType'));
        }
        if ($request->get('TriggerSpeed')) {
            $myObject->setTriggerSpeed($request->get('TriggerSpeed'));
        }
        if ($request->get('BurstMode')) {
            $myObject->setBurstMode($request->get('BurstMode'));
        }
        if ($request->get('Recoverytime')) {
            $myObject->setRecoverytime($request->get('Recoverytime'));
        }
        if ($request->get('PIRComboMode')) {
            $myObject->setPIRComboMode($request->get('PIRComboMode'));
        }
        if ($request->get('PIRIRArray')) {
            $myObject->setPIRIRArray($request->get('PIRIRArray'));
        }
        if ($request->get('ImageStamp')) {
            $myObject->setImageStamp($request->get('ImageStamp'));
        }
        if ($request->get('SDCardSupport')) {
            $myObject->setSDCardSupport($request->get('SDCardSupport'));
        }
        if ($request->get('BatteriesRequired')) {
            $myObject->setBatteriesRequired($request->get('BatteriesRequired'));
        }
        if ($request->get('LockLatch')) {
            $myObject->setLockLatch($request->get('LockLatch'));
        }
        if ($request->get('Externalpowerjack')) {
            $myObject->setExternalpowerjack($request->get('Externalpowerjack'));
        }
        if ($request->get('CellularProvider')) {
            $myObject->setCellularProvider($request->get('Cellularprovider'));
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

        //Creating and saving object
        $myObject->save(["versionNote" => "Product edited from Frontend"]);

        return new Response("Product edited Sucessfully");

    }

    /**
     * @Route("/products/stealthcam/trail-camera/{sctrailcameraID}/product-delete-api/", name="sctrailcamera_product_delete_api",  requirements={"sctrailcameraID"="\d+"})
     *
     * @param Request $request
     * @param int $sctrailcameraID
     * @return Response
     * throws \Exception
     */
    public function sctrailcamera_product_delete_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\SCTrailcamera::getById($request->get('sctrailcameraID'));

        $myObject->setPublished(0);

        //Creating and saving object
        $myObject->save(["versionNote" => "Product deleted from Frontend"]);

        return new Response("Product deleted Sucessfully");
    }

    #[Route('/products/stealthcam/trail-camera/create-product/', name: 'sctrailcamera_create_product')]
    public function sctrailcamera_create_productAction(Request $request)
    {
        //Create a custom log for the Function 
        $name = "SCTrailcameraController";
        \Pimcore\Log\Simple::log($name, "create_productAction");
        \Pimcore\Log\Simple::log($name, $request->get('ProductName'));
        $myObject = new DataObject\SCTrailcamera;

        //In this case, Static ParentId is declared to be dynamic.
        $myObject->setParentId(132);
        $myObject->setKey($request->get('ProductName'));

        //Product Details & Media		
        if ($request->get('SKU') != "" && $request->get('ProductName') != "") {
            $myObject->setProductName($request->get('ProductName'));
            $myObject->setSKU($request->get('SKU'));
            $myObject->setUPC($request->get('UPC'));
        } else {
            throw new Exception("ProductName and SKU mandatory to Create Product");
            //return response("Product Name and SKU mandatory to Create Product");
            // echo ("Product Name and SKU mandatory to Create Product");

        }
        $myObject->setGlobalTradeItemNumber($request->get('GlobalTradeItemNumber'));

        //Product Features
        $myObject->setDescription($request->get('Description'));

        //Product Specs
        $myObject->setProductWidth(new DataObject\Data\InputQuantityValue($request->get('ProductWidth'), "Inches"));
        $myObject->setProductHeight(new DataObject\Data\InputQuantityValue($request->get('ProductHeight'), "Inches"));
        $myObject->setProductDepth(new DataObject\Data\InputQuantityValue($request->get('ProductDepth'), "Inches"));
        $myObject->setProductSizeWidth(new DataObject\Data\InputQuantityValue($request->get('ProductSizeWidth'), "Inches"));
        $myObject->setProductSizeHeight(new DataObject\Data\InputQuantityValue($request->get('ProductSizeHeight'), "Inches"));
        $myObject->setProductSizeDepth(new DataObject\Data\InputQuantityValue($request->get('ProductSizeDepth'), "Inches"));
        $myObject->setPhotoResolutions($request->get('PhotoResolutions'));
        $myObject->setPhotoUploadResolutions($request->get('PhotoUploadResolutions'));
        $myObject->setVideoResolutions($request->get('VideoResolutions'));
        $myObject->setVideoUploadResolutions($request->get('VideoUploadResolutions'));
        $myObject->setVideoAudio($request->get('VideoAudio'));
        $myObject->setDetectionIRRange(new DataObject\Data\InputQuantityValue($request->get('DetectionIRRange'),"Feet"));
        $myObject->setLEDs($request->get('LEDs'));
        $myObject->setLEDFlashType($request->get('LEDFlashType'));
        $myObject->setTriggerSpeed($request->get('TriggerSpeed'));
        $myObject->setBurstMode($request->get('BurstMode'));
        $myObject->setRecoverytime($request->get('Recoverytime'));
        $myObject->setPIRComboMode($request->get('PIRComboMode'));
        $myObject->setPIRIRArray($request->get('PIRIRArray'));
        $myObject->setImageStamp($request->get('ImageStamp'));
        $myObject->setSDCardSupport($request->get('SDCardSupport'));
        $myObject->setBatteriesRequired($request->get('BatteriesRequired'));
        $myObject->setLockLatch($request->get('LockLatch'));
        $myObject->setExternalpowerjack($request->get('Externalpowerjack'));

        $CellularProviderarray = explode(",", $request->get('CellularProvider'));
        $myObject->setCellularProvider($CellularProviderarray);

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
            $newAsset->setParent(\Pimcore\Model\Asset::getByPath("/GSM Outdoors/Stealth Cam/Products/Trail Cameras/Digital Cameras/"));
            $newAsset->save(["versionNote" => "Custom Image from frontend"]);

            $image = \Pimcore\Model\Asset::getByPath("/GSM Outdoors/Stealth Cam/Products/Trail Cameras/Digital Cameras/" . $request->get('ProductName') . "." . $assetext);
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
     * @Route("/products/stealthcam/trail-camera/product-list-api/", name="sctrailcamera_product_list_api")
     *
     * @param Request $request
     * @return Response
     * throws \Exception
     */
    public function sctrailcamera_product_list_apiAction(Request $request)
    {

        $offset = $request->get('offset');
        $perPage = $request->get('perpage');

        $items = DataObject\SCTrailcamera::getList([
            "offset" => $offset,
            "limit" => $perPage
        ]);

        $i = 0;
        $hostURL = \Pimcore\Tool::getHostUrl();
        $totalcount = 0;
        foreach ($items as $myObject) {
            if ($myObject->getParentId() == "132") {

                $totalcount++;
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
                if ($myObject->getProductWidth() != "") {
                    $data[$i]['Width']['ProductWidth'] = $myObject->getProductWidth()->getValue();
                    $data[$i]['Width']['ProductUnit'] = $myObject->getProductWidth()->getunitId();
                }
                if ($myObject->getProductHeight() != "") {
                    $data[$i]['Height']['ProductHeight'] = $myObject->getProductHeight()->getValue();
                    $data[$i]['Height']['ProductUnit'] = $myObject->getProductHeight()->getunitId();
                }
                if ($myObject->getProductDepth() != "") {
                    $data[$i]['Depth']['ProductDepth'] = $myObject->getProductDepth()->getValue();
                    $data[$i]['Depth']['ProductUnit'] = $myObject->getProductDepth()->getunitId();
                }
                if ($myObject->getProductSizeWidth() != "") {
                    $data[$i]['SizeWidth']['ProductSizeWidth'] = $myObject->getProductSizeWidth()->getValue();
                    $data[$i]['SizeWidth']['ProductUnit'] = $myObject->getProductSizeWidth()->getunitId();
                }
                if ($myObject->getProductSizeHeight() != "") {
                    $data[$i]['SizeHeight']['ProductSizeHeight'] = $myObject->getProductSizeHeight()->getValue();
                    $data[$i]['SizeHeight']['ProductUnit'] = $myObject->getProductSizeHeight()->getunitId();
                }
                if ($myObject->getProductSizeDepth() != "") {
                    $data[$i]['SizeDepth']['ProductSizeDepth'] = $myObject->getProductSizeDepth()->getValue();
                    $data[$i]['SizeDepth']['ProductUnit'] = $myObject->getProductSizeDepth()->getunitId();
                }
                $data[$i]['PhotoResolutions'] = $myObject->getPhotoResolutions();
                $data[$i]['PhotoUploadResolutions'] = $myObject->getPhotoUploadResolutions();
                $data[$i]['VideoResolutions'] = $myObject->getVideoResolutions();
                $data[$i]['VideoUploadResolutions'] = $myObject->getVideoUploadResolutions();
                $data[$i]['VideoAudio'] = $myObject->getVideoAudio();

                if ($myObject->getDetectionIRRange() != "") {
                    $data[$i]['DetectionRange']['DetectionIRRange'] = $myObject->getDetectionIRRange()->getValue();
                    $data[$i]['DetectionRange']['ProductUnit'] = $myObject->getDetectionIRRange()->getunitId();
                }
                $data[$i]['LEDs'] = $myObject->getLEDs();
                $data[$i]['LEDFlashType'] = $myObject->getLEDFlashType();
                $data[$i]['TriggerSpeed'] = $myObject->getTriggerSpeed();
                $data[$i]['BurstMode'] = $myObject->getBurstMode();
                $data[$i]['Recoverytime'] = $myObject->getRecoverytime();
                $data[$i]['PIRComboMode'] = $myObject->getPIRComboMode();
                $data[$i]['PIRIRArray'] = $myObject->getPIRIRArray();
                $data[$i]['ImageStamp'] = $myObject->getImageStamp();
                $data[$i]['SDCardSupport'] = $myObject->getSDCardSupport();
                $data[$i]['BatteriesRequired'] = $myObject->getBatteriesRequired();
                $data[$i]['LockLatch'] = $myObject->getLockLatch();
                $data[$i]['CellularProvider'] = $myObject->getCellularProvider();
                $data[$i]['Externalpowerjack'] = $myObject->getExternalpowerjack();

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
        }

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/stealthcam/trail-camera/{sctrailcameraID}/product-single-api/", name="sctrailcamera_product_single_api", requirements={"sctrailcameraID"="\d+"})
     *
     * @param Request $request
     * @param int $sctrailcameraID
     * @return Response
     * throws \Exception
     */
    public function sctrailcamera_product_single_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\SCTrailcamera::getById($request->get('sctrailcameraID'));

        $hostURL = \Pimcore\Tool::getHostUrl();

        //Product Details & Media
        $data['id'] = $myObject->getID();
        $data['title'] = $myObject->getProductName();
        $data['SKU'] = $myObject->getSKU();
        $data['UPC'] = $myObject->getUPC();
        $data['GlobalTradeItemNumber'] = $myObject->getGlobalTradeItemNumber();

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
        if ($myObject->getProductWidth() != "") {
            $data['Width']['ProductWidth'] = $myObject->getProductWidth()->getValue();
            $data['Width']['ProductUnit'] = $myObject->getProductWidth()->getunitId();
        }

        if ($myObject->getProductHeight() != "") {
            $data['Height']['ProductHeight'] = $myObject->getProductHeight()->getValue();
            $data['Height']['ProductUnit'] = $myObject->getProductHeight()->getunitId();
        }

        if ($myObject->getProductDepth() != "") {
            $data['Depth']['ProductDepth'] = $myObject->getProductDepth()->getValue();
            $data['Depth']['ProductUnit'] = $myObject->getProductDepth()->getunitId();
        }

        if ($myObject->getProductSizeWidth() != "") {
            $data['SizeWidth']['ProductSizeWidth'] = $myObject->getProductSizeWidth()->getValue();
            $data['SizeWidth']['ProductUnit'] = $myObject->getProductSizeWidth()->getunitId();
        }

        if ($myObject->getProductSizeHeight() != "") {
            $data['SizeHeight']['ProductSizeHeight'] = $myObject->getProductSizeHeight()->getValue();
            $data['SizeHeight']['ProductUnit'] = $myObject->getProductSizeHeight()->getunitId();
        }

        if ($myObject->getProductSizeDepth() != "") {
            $data['SizeDepth']['ProductSizeDepth'] = $myObject->getProductSizeDepth()->getValue();
            $data['SizeDepth']['ProductUnit'] = $myObject->getProductSizeDepth()->getunitId();
        }

        $data['PhotoResolutions'] = $myObject->getPhotoResolutions();
        $data['PhotoUploadResolutions'] = $myObject->getPhotoUploadResolutions();
        $data['VideoResolutions'] = $myObject->getVideoResolutions();
        $data['VideoUploadResolutions'] = $myObject->getVideoUploadResolutions();
        $data['VideoAudio'] = $myObject->getVideoAudio();

        if ($myObject->getDetectionIRRange() != "") {
            $data['DetectionRange']['DetectionIRRange'] = $myObject->getDetectionIRRange()->getValue();
            $data['DetectionRange']['ProductUnit'] = $myObject->getDetectionIRRange()->getunitId();
        }
        $data['LEDs'] = $myObject->getLEDs();
        $data['LEDFlashType'] = $myObject->getLEDFlashType();
        $data['TriggerSpeed'] = $myObject->getTriggerSpeed();
        $data['BurstMode'] = $myObject->getBurstMode();
        $data['Recoverytime'] = $myObject->getRecoverytime();
        $data['PIRComboMode'] = $myObject->getPIRComboMode();
        $data['PIRIRArray'] = $myObject->getPIRIRArray();
        $data['ImageStamp'] = $myObject->getImageStamp();
        $data['SDCardSupport'] = $myObject->getSDCardSupport();
        $data['BatteriesRequired'] = $myObject->getBatteriesRequired();
        $data['LockLatch'] = $myObject->getLockLatch();
        $data['CellularProvider'] = $myObject->getCellularProvider();
        $data['Externalpowerjack'] = $myObject->getExternalpowerjack();

        //Pricing & Availability
        $data['PriceType'] = $myObject->getPriceType();
        $data['Price'] = $myObject->getPrice();
        $data['Availability'] = $myObject->getAvailability();
        $data['ItemStatus'] = $myObject->getItemStatus();

        //Brand & Category
        if ($myObject->getBrand() != "") {
            $data['BrandId'] = $myObject->getBrand()->getID();
            $data['Brand'] = $myObject->getBrand()->getBrandName();
        }
        if ($myObject->getCategory() != "") {
            $data['CategoryId'] = $myObject->getCategory()->getID();
            $data['Category'] = $myObject->getCategory()->getCategory();
        }

        return $this->json(["success" => true, "data" => $data]);
    }


}
