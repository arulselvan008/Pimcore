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

use App\Website\LinkGenerator\HuntingAccessoriesLinkGenerator;
use Pimcore\Model\DataObject\HuntingAccessories;

use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; //HuntingAccessories
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; //huntingaccessories
use Symfony\Component\Routing\Annotation\Route; //huntingaccessoriesId

class HuntingAccessoriesController extends BaseController
{

    /**
     * @Route("/huntingaccessories/{slug}-{huntingaccessoriesId}", name="huntingaccessories_show", requirements={"slug"="[\w-]+", "huntingaccessoriesId"="\d+"})
     *
     * @param Request $request
     * @param int $huntingaccessoriesId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $huntingaccessoriesId, 
		HuntingAccessoriesLinkGenerator $huntingaccessories
	)
    {
        $huntingaccessories = HuntingAccessories::getById($request->get('huntingaccessoriesId'));
		
		if(empty($huntingaccessories)) {
			throw new \Exception('HuntingAccessories not found.');
		}

        return $this->render('huntingaccessories/show.html.twig', [
            'huntingaccessories' => $huntingaccessories
        ]);
    }

}
