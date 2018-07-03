<?php

namespace App\Controller;

use App\Service\MarkdownHelper;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    public function homepage()
    {
        return $this->render("article/homepage.html.twig");
    }

    public  function news($id, LoggerInterface $logger)
    {
        $logger->info("Was request news page");

        return $this->render("article/show.html.twig", [
            'id' => $id
        ]);
    }

    public function ajaxUrl()
    {
        $num = mt_rand(1, 10);

        return $this->json($num);
    }

    public function mark(MarkdownHelper $markdownHelper)
    {
        $mark = <<<EOF
HERE **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
lorem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
labore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
turkey shank eu pork belly meatball non cupim.
EOF;

        $mark = $markdownHelper->parse($mark);

        return $this->render('article/mark.html.twig', [
            'mark' => $mark
        ]);
    }
}