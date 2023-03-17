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

use App\Website\LinkGenerator\ApparelLinkGenerator;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Apparel;
use Pimcore\Model\DataObject\GSMBrands;
use Pimcore\Model\DataObject\ProductCategory;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\ImageGallery;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Log\ApplicationLogger;

class ApparelController extends BaseController
{

    public function listingAction(Request $request, PaginatorInterface $paginator)
    {

        // get a list of apparel objects and order them by dates
        $apparelList = new Apparel\Listing();

        $paginator = $paginator->paginate(
            $apparelList,
            $request->get('page', 1),
            100
        );

        return $this->render('apparel/listing.html.twig', [
            'apparel' => $paginator,
            'paginationVariables' => $paginator->getPaginationData()
        ]);
    }

    /**
     * @Route("/products/muddy/apparel/{slug}-{apparelId}", name="apparel_show", requirements={"slug"="[\w-]+", "apparelId"="\d+"})
     *
     * @param Request $request
     * @param int $apparelId
     * @return Response
     * throws \Exception
     */
    public function showAction(Request $request, int $apparelId, ApparelLinkGenerator $apparelLinkGenerator)
    {
        $apparel = Apparel::getById($request->get('apparelId'));

        if (empty($apparel)) {
            throw new \Exception('Apparel not found.');
        }

        return $this->render('apparel/show.html.twig', [
            'apparel' => $apparel
        ]);
    }

    /**
     * @Route("/products/muddy/apparel/{apparelID}/edit-product/", name="apparel_edit_product", requirements={"apparelID"="\d+"})
     *
     * @param Request $request
     * @param int $apparelID
     * @return Response
     * throws \Exception
     */
    public function apparel_edit_productAction(Request $request)
    {
        //Getting Object
        $myObject = DataObject\Apparel::getById($request->get('apparelID'));

        //Product Specs
        if ($request->get('Material')) {
            $myObject->setMaterial($request->get('Material'));
        }
        if ($request->get('Color')) {
            $myObject->setColor($request->get('Color'));
        }
        if ($request->get('Logo')) {
            $myObject->setLogo($request->get('Logo'));
        }
        if ($request->get('Neckline')) {
            $myObject->setNeckline($request->get('Neckline'));
        }
        if ($request->get('MaterialSpecs')) {
            $myObject->setMaterialSpecs($request->get('MaterialSpecs'));
        }

        //Pricing & Availability
        if ($request->get('Price')) {
            $myObject->setPrice($request->get('Price'));
        }
        if ($request->get('Availability')) {
            $myObject->setAvailability($request->get('Availability'));
        }
        if ($request->get('ItemStatus')) {
            $myObject->setItemStatus($request->get('ItemStatus'));
        }

        $myObject->save(["versionNote" => "My New Version"]);

        return new Response("Product edited Sucessfully");
    }

    /**
     * @Route("/products/muddy/apparel/{apparelID}/product-delete-api/", name="apparel_product_delete_api", requirements={"apparelID"="\d+"})
     *
     * @param Request $request
     * @param int $apparelID
     * @return Response
     * throws \Exception
     */
    public function apparel_product_delete_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\Apparel::getById($request->get('apparelID'));

        $myObject->setPublished(0);

        //Creating and saving object
        $myObject->save(["versionNote" => "Product deleted from Frontend"]);

        return new Response("Product deleted Sucessfully");
    }

    #[Route('/products/muddy/apparel/add-product/', name: 'apparel_add_product')]
    public function add_productAction()
    {
        return $this->render('apparel/form.html.twig');
    }

    #[Route('/products/muddy/apparel/create-product/', name: 'apparel_create_product')]
    public function create_productAction(Request $request)
    {
        $name = "ApparelController";
        \Pimcore\Log\Simple::log($name, "create_productAction");

        try {
            //Create the Static Apparel Object
            $myObject = new Apparel;

            //In this case, Static ParentId is declared to be dynamic.
            $myObject->setParentId(12);
            $myObject->setKey($request->get('ProductName'));

            //Product Details & Media		
            $myObject->setProductName($request->get('ProductName'));
            $myObject->setSKU($request->get('SKU'));
            $myObject->setUPC($request->get('UPC'));
            $myObject->setGlobalTradeItemNumber($request->get('GlobalTradeItemNumber'));
            $myObject->setSize($request->get('Size'));

            //Product Features
            $myObject->setDescription($request->get('Description'));

            //Product Specs
            $myObject->setMaterial($request->get('Material'));
            $myObject->setColor($request->get('Color'));
            $myObject->setLogo($request->get('Logo'));
            $myObject->setNeckline($request->get('Neckline'));
            $myObject->setMaterialSpecs($request->get('MaterialSpecs'));

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
                $newAsset->setParent(\Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Apparel/"));
                $newAsset->save(["versionNote" => "Custom Image from frontend"]);
                $image = \Pimcore\Model\Asset::getByPath("/GSM Outdoors/Muddy/Products/Apparel/" . $request->get('ProductName') . "." . $assetext);
                $advancedImage = new DataObject\Data\Hotspotimage();
                $advancedImage->setImage($image);

                $myObject->setAssetAdvanced($advancedImage);
            }

            //Creating and saving object
            $myObject->setPublished(1);

            $myObject->save(["versionNote" => "Product created from Frontend"]);
        } catch (Exception $e) {
            //display custom message
            echo $e->errorMessage();
        }

        \Pimcore\Log\Simple::log($name, "Product created Sucessfully");


        return new Response("Product created Sucessfully");
    }

    /**
     * @Route("/products/muddy/apparel/product-list-api/", name="apparel_product_list_api")
     *
     * @param Request $request
     * @return Response
     * throws \Exception
     */
    public function apparel_product_list_apiAction(Request $request)
    {
        $offset = $request->get('offset');
        $perPage = $request->get('perpage');

        $totalcountarray = DataObject\Apparel::getList();

        $totalcount = count($totalcountarray);

        $items = DataObject\Apparel::getList([
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
            $data[$i]['feature']['Material'] = $myObject->getMaterial();
            $data[$i]['feature']['Color'] = $myObject->getColor();
            $data[$i]['feature']['Logo'] = $myObject->getLogo();
            $data[$i]['feature']['Neckline'] = $myObject->getNeckline();
            $data[$i]['feature']['MaterialSpecs'] = $myObject->getMaterialSpecs();

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

            //Count of products in category
            $data['totalcount'] = $totalcount;

            $i++;
        }

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/muddy/apparel/{apparelID}/product-single-api/", name="apparel_product_single_api", requirements={"apparelID"="\d+"})
     *
     * @param Request $request
     * @param int $apparelID
     * @return Response
     * throws \Exception
     */
    public function apparel_product_single_apiAction(Request $request)
    {
        //Getting Objects based on request Apparel Id
        $myObject = DataObject\Apparel::getById($request->get('apparelID'));

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
        $data['feature']['Material'] = $myObject->getMaterial();
        $data['feature']['Color'] = $myObject->getColor();
        $data['feature']['Logo'] = $myObject->getLogo();
        $data['feature']['Neckline'] = $myObject->getNeckline();
        $data['feature']['MaterialSpecs'] = $myObject->getMaterialSpecs();

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