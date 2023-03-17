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
use \Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Apparel;
use Pimcore\Model\DataObject\Apparel\Listing;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


class ImageUploadController extends BaseController
{
    
    
    #[Route(name: "add_Product")]
    public function imageUploadAction(Request $request	)
    {
        // print_r('-----------------------*******12****------------------------');
        return $this->render('apparel/imageUpload.html.twig');
    }
    
    
    #[Route(name: "image_upload")]
    public function uploadAction(Request $request)
    {
		$myObject = new Apparel;
		
		$myObject->setParentID(12);
		$myObject->setSKU($request->get('SKU'));
		$myObject->setKey($request->get('newProductName'));
        $myObject->setProductName($request->get('newProductName'));
        
		print_r('-----------------------***********------------------------');
		print_r($request->get('SKU'));
	
// 		$myObject->save();
		
	    return new Response ("New Product Created successfully!!!");
    }
}
