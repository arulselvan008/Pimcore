<?php

namespace App\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Pimcore\Controller\FrontendController;


class CustomRestController extends FrontendController
{
    /**
     * @Route("/custom-pimcore-webservice/rest/get-products")
     */
    public function defaultAction(Request $request)
    {
        // do some authorization here ...

        $blogs = new DataObject\BlogArticle\Listing();

        foreach ($blogs as $key => $blog) {
            $data[] = array(
                "title" => $blog->getTitle(),
                "description" => $blog->getText(),
                "tags" => $blog->getTags());
        }

        return $this->json(["success" => true, "data" => $data]);
    }
}