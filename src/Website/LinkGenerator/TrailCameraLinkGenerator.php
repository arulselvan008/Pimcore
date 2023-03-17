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

namespace App\Website\LinkGenerator;

use Pimcore\Model\DataObject\TrailCamera;
use Pimcore\Model\DataObject\ClassDefinition\LinkGeneratorInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Tool;
use Pimcore\Twig\Extension\Templating\PimcoreUrl;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrailCameraLinkGenerator implements LinkGeneratorInterface
{

    /**
     * TrailCameraLinkGenerator constructor.
     *
     * @param DocumentResolver $documentResolver
     * @param RequestStack $requestStack
     * @param PimcoreUrl $pimcoreUrl
     * @param LocaleServiceInterface $localeService
     */
    public function __construct(
		private SluggerInterface $slugger,
		private PimcoreUrl $pimcoreUrl,
		private ContainerInterface $container
	)
    {

    }
	
    /**
     * @param Concrete $object
     * @param array $params
     *
     * @return string
     */
    public function generate(Concrete $object, array $params = []): string
    {
        if (!($object instanceof TrailCamera)) {
            throw new \InvalidArgumentException('Given object is no TrailCamera');
        }
		
		$slug = $this->slugger->slug($object->getProductName());
		
		$link = $this->pimcoreUrl->__invoke(
			[
				'slug' => $slug,
				'trailcameraId' => $object->getId()
			],
			'trailcamera_show',
			true
        );
			
		return $link;
    }
}
