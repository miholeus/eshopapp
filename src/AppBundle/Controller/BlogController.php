<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    public function showAction($slug)
    {
        return new Response("<html><body>" . $slug . "</body></html>");
    }

    public function indexAction($page)
    {
        return new Response("<html><body>This is index blog page</body></html>");
    }

    public function apiAction()
    {
        $data = ['lucky_number' => rand(0, 1000)];

        return new JsonResponse($data);
    }

    public function welcomeAction(Request $request)
    {
        return new Response("<html><body>Welcome, Mac user!</body></html>");
    }
}
