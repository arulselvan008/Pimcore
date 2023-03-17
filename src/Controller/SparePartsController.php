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

use App\Website\LinkGenerator\SparePartsLinkGenerator;
use Pimcore\Model\DataObject\SpareParts;

use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SparePartsController extends BaseController
{

    /**
     * @Route("/spareparts/{slug}-{sparepartsId}", name="spareparts_show", requirements={"slug"="[\w-]+", "sparepartsId"="\d+"})
     *
     * @param Request $request
     * @param int $groundblindsId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $sparepartsId, 
		SparePartsLinkGenerator $sparepartsLinkGenerator
	)
    {
        $spareparts = SpareParts::getById($request->get('sparepartsId'));
		
		if(empty($spareparts)) {
			throw new \Exception('SpareParts not found.');
		}

        return $this->render('spareparts/show.html.twig', [
            'spareparts' => $spareparts
        ]);
    }

}
