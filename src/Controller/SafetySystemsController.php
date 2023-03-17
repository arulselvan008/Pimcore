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

use App\Website\LinkGenerator\SafetySystemsLinkGenerator;
use Pimcore\Model\DataObject\SafetySystems;

use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; //SafetySystems
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; //safetysystems
use Symfony\Component\Routing\Annotation\Route; //safetysystemsId

class SafetySystemsController extends BaseController
{

    /**
     * @Route("/safetysystems/{slug}-{safetysystemsId}", name="safetysystems_show", requirements={"slug"="[\w-]+", "safetysystemsId"="\d+"})
     *
     * @param Request $request
     * @param int $safetysystemsId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $safetysystemsId, 
		SafetySystemsLinkGenerator $safetysystems
	)
    {
        $safetysystems = SafetySystems::getById($request->get('safetysystemsId'));
		
		if(empty($safetysystems)) {
			throw new \Exception('SafetySystems not found.');
		}

        return $this->render('safetysystems/show.html.twig', [
            'safetysystems' => $safetysystems
        ]);
    }

}
