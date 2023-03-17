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

use App\Website\LinkGenerator\RangeFindersLinkGenerator;
use Pimcore\Model\DataObject\RangeFinders;

use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; //RangeFinders
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; //rangefinders
use Symfony\Component\Routing\Annotation\Route; //rangefindersId

class RangeFindersController extends BaseController
{

    /**
     * @Route("/rangefinders/{slug}-{rangefindersId}", name="rangefinders_show", requirements={"slug"="[\w-]+", "rangefindersId"="\d+"})
     *
     * @param Request $request
     * @param int $rangefindersId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $rangefindersId, 
		RangeFindersLinkGenerator $rangefinders
	)
    {
        $rangefinders = RangeFinders::getById($request->get('rangefindersId'));
		
		if(empty($rangefinders)) {
			throw new \Exception('RangeFinders not found.');
		}

        return $this->render('rangefinders/show.html.twig', [
            'rangefinders' => $rangefinders
        ]);
    }

}
