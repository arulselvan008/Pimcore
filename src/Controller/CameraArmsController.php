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

use App\Website\LinkGenerator\CameraArmsLinkGenerator;
use Pimcore\Model\DataObject\CameraArms;
use Pimcore\Model\DataObject\BoxBlinds;
use Pimcore\Model\DataObject\Apparel;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CameraArmsController extends BaseController
{

    /**
     * @Route("/cameraarms/{slug}-{cameraarmsId}", name="cameraarms_show", requirements={"slug"="[\w-]+", "cameraarmsId"="\w+"})
     *
     * @param Request $request
     * @param int $cameraarmsId
     * @return Response
     * throws \Exception
     */

    //CameraArms Listing

    public function listingAction(Request $request, PaginatorInterface $paginator)
    {

        // get a list of cameraarms objects and order them by date
        $cameraarmsList = new CameraArms\Listing();

        $paginator = $paginator->paginate(
            $cameraarmsList,
            $request->get('page', 1),
            100
        );

        return $this->render('cameraarms/listing.html.twig', [
            'cameraarms' => $paginator,
            'paginationVariables' => $paginator->getPaginationData()
        ]);
    }
    //CameraArms Listing
    /**
     * @Route("/products/muddy/cameraarms/{slug}-{cameraarmsId}", name="cameraarms_show", requirements={"slug"="[\w-]+", "cameraarmsId"="\d+"})
     *
     * @param Request $request
     * @param int $cameraarmsId
     * @return Response
     * throws \Exception
     */
    public function showAction(
        Request $request,
        int $cameraarmsId,
        CameraArmsLinkGenerator $cameraarmsLinkGenerator
    )
    {
        $cameraarms = CameraArms::getById($request->get('cameraarmsId'));

        if (empty($cameraarms)) {
            throw new \Exception('CameraArms not found.');
        }

        return $this->render('cameraarms/show.html.twig', [
            'cameraarms' => $cameraarms
        ]);
    }

    /**
     * @Route("/products/test/{categoryName}/product_list_api/", name="camera_arms_list_api", requirements={"categoryName"="\w+"})
     *
     * @param Request $request
     * @param int $categoryID
     * @return Response
     * throws \Exception
     */
    public function cameraarms_product_list_apiAction(Request $request)
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


}