<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    public function homepage()
    {
        return $this->render("article/homepage.html.twig");
    }

    public  function news($id)
    {
        return $this->render("article/show.html.twig", [
            'id' => $id
        ]);
    }

    public function ajaxUrl()
    {
        $num = mt_rand(1, 10);

        return $this->json($num);
    }
}