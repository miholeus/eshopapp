<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route("/article/list")
     */
    public function recentArticlesAction($max = 3)
    {
        $articles = [
            ['id' => 10, 'title' => 'test', 'slug' => 'test'],
            ['id' => 20, 'title' => 'new article', 'slug' => 'new-article']
        ];

        return $this->render('article/recent_list.html.twig', ['articles' => $articles]);
    }
}
