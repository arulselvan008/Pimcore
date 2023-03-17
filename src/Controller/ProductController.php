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

use Pimcore\Model\DataObject\Apparel;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\GSMBrands;
use Pimcore\Model\DataObject\ProductCategory;
use \Pimcore\Model\Asset;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends BaseController
{

    /**
     * @Route("/products/brand_list_api/", name="brand_list_api")
     *
     * @param Request $request
     * @return Response
     * throws \Exception
     */
    public function brand_list_apiAction()
    {
        //Getting the list of brand objects
        $items = DataObject\GSMBrands::getList();

        $i = 0;
        $hostURL = \Pimcore\Tool::getHostUrl();

        foreach ($items as $myObject) {

            //Brand Details & Media
            $data[$i]['id'] = $myObject->getID();
            $data[$i]['BrandName'] = $myObject->getBrandName();
            
            //Asset Details
            $asset = \Pimcore\Model\Asset::getByPath($myObject->getLogo());
            if ($asset != "") {
                $data[$i]['Logo'] = $hostURL . $asset->getFullPath();
            }

            $i++;
        }

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/brand_single_api/{brandID}/", name="brand_single_api", requirements={"brandID"="\d+"})
     *
     * @param Request $request
     * @param int $brandID
     * @return Response
     * throws \Exception
     */
    public function brand_single_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\GSMBrands::getById($request->get('brandID'));

        $hostURL = \Pimcore\Tool::getHostUrl();
        $asset = \Pimcore\Model\Asset::getByPath($myObject->getLogo());

        //Brand Details & Media
        $data['id'] = $myObject->getID();
        $data['BrandName'] = $myObject->getBrandName();
        if ($asset != "") {
            $data['AssetAdvanced'] = $hostURL . $asset->getFullPath();
        }

        return $this->json(["success" => true, "data" => $data]);
    }

    /**
     * @Route("/products/category_list_api/", name="category_list_api")
     *
     * @param Request $request
     * @return Response
     * throws \Exception
     */
    public function category_list_apiAction(Request $request)
    {
        //Getting the list of Category objects
        $items = DataObject\ProductCategory::getList();

        $brandID = $request->get('brandID');

        $i = 0;
        foreach ($items as $myObject) {

            //To filter Categories based on Brand
            if (isset($brandID) && $brandID != $myObject->getBrand()->getId()) {
                continue;
            }

            //Category Details
            $data[$i]['id'] = $myObject->getID();
            $data[$i]['Category'] = $myObject->getCategory();

            if ($myObject->getBrand() != "") {
                $data[$i]['BrandId'] = $myObject->getBrand()->getId();
                $data[$i]['Brand'] = $myObject->getBrand()->getBrandName();
            }

            $i++;
        }

        return $this->json(["success" => true, "data" => $data]);
    }
    
    /**
     * @Route("/products/category_single_api/{categoryID}/", name="category_single_api", requirements={"categoryID"="\d+"})
     *
     * @param Request $request
     * @param int $categoryID
     * @return Response
     * throws \Exception
     */
    public function category_single_apiAction(Request $request)
    {
        //Getting Objects
        $myObject = DataObject\ProductCategory::getById($request->get('categoryID'));

        //Category Details
        $data['id'] = $myObject->getID();
        $data['Category'] = $myObject->getCategory();
        if ($myObject->getBrand() != "") {
            $data['BrandId'] = $myObject->getBrand()->getId();
            $data['Brand'] = $myObject->getBrand()->getBrandName();
        }

        return $this->json(["success" => true, "data" => $data]);
    }

}