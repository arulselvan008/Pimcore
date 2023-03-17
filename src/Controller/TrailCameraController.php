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

use App\Website\LinkGenerator\TrailCameraLinkGenerator;
use Pimcore\Model\DataObject\TrailCamera;

use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TrailCameraController extends BaseController
{

    /**
     * @Route("/trailcamera/{slug}-{trailcameraId}", name="trailcamera_show", requirements={"slug"="[\w-]+", "trailcameraId"="\d+"})
     *
     * @param Request $request
     * @param int $trailcameraId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $trailcameraId, 
		TrailCameraLinkGenerator $trailcameraLinkGenerator
	)
    {
        $trailcamera = TrailCamera::getById($request->get('trailcameraId'));
		
		if(empty($trailcamera)) {
			throw new \Exception('TrailCamera not found.');
		}

        // return $this->render('trailcamera/show.html.twig', [
         return $this->render('trailcamera/show.html.twig', [
            'trailcamera' => $trailcamera
        ]);
    }

}
