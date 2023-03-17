<?php

namespace App\Controller;

//use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Model\Asset;
use Pimcore\Controller\FrontendController;
use Pimcore\Controller\ProductController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\ListHelper;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\DefaultMysql;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\ElasticSearch\AbstractElasticSearch;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\ProductListInterface;

class DefaultController extends FrontendController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function defaultAction(Request $request): Response
    {
        return $this->render('default/default.html.twig');
    }
    
   public function productAction(Request $request): Response
    {
        return $this->render('content/product.html.twig');
    }
    public function productTeaserAction(Request $request): Response
    {
        // $paramsBag = [];
        // if ($request->get('type') == 'object') {
        //     AbstractObject::setGetInheritedValues(true);
        //     $product = AbstractProduct::getById($request->get('id'));

        //     $paramsBag['product'] = $product;

        //     //track product impression
        //     $trackingManager = $ecommerceFactory->getTrackingManager();
        //     $trackingManager->trackProductImpression($product, 'teaser');

            return $this->render('product/product_teaser.html.twig');
        }

        // throw new NotFoundHttpException('Product not found.');
    // }
    
    public function galleryRenderletAction(Request $request)
    {
        $params = [];
        if ($request->get('id') && $request->get('type') === 'asset') {
            $params['asset'] =  Asset::getById($request->get('id'));
        }

        return $this->render('default/gallery_renderlet.html.twig', $params);
    }
    
    public function muddyAction(Request $request	)
    {
        return $this->render('layouts/muddy.html.twig');
    }
}
