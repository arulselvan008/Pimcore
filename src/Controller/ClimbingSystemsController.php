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

use App\Website\LinkGenerator\ClimbingSystemsLinkGenerator;
use Pimcore\Model\DataObject\ClimbingSystems;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Twig\Extension\Templating\HeadTitle;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ClimbingSystemsController extends BaseController
{
    
    //ClimbingSystems Listing
    public function listingAction(Request $request, PaginatorInterface $paginator)
    {

        // get a list of climbingsystems objects and order them by date
        $climbingsystemsList = new ClimbingSystems\Listing();
		
		$paginator = $paginator->paginate(
            $climbingsystemsList,
            $request->get('page', 1),
            100
        );

        return $this->render('climbingsystems/listing.html.twig', [
            'climbingsystems' => $paginator,
			'paginationVariables' => $paginator->getPaginationData()
        ]);
    }
    //ClimbingSystems Listing

    /**
     * @Route("/climbingsystems/{slug}-{climbingsystemsId}", name="climbingsystems_show", requirements={"slug"="[\w-]+", "climbingsystemsId"="\d+"})
     *
     * @param Request $request
     * @param int $climbingsystemsId
     * @return Response
	 * throws \Exception
     */
    public function showAction(
		Request $request, 
		int $climbingsystemsId, 
		ClimbingSystemsLinkGenerator $climbingsystemsLinkGenerator
	)
    {
        $climbingsystems = ClimbingSystems::getById($request->get('climbingsystemsId'));
		
		if(empty($climbingsystems)) {
			throw new \Exception('ClimbingSystems not found.');
		}

        return $this->render('climbingsystems/show.html.twig', [
            'climbingsystems' => $climbingsystems
        ]);
    }

}
