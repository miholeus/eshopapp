<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
  /**
   * @Route("/lucky/number/{count}")
   */
  public function numberAction($count, Request $request)
  {
    $numbers = [];
    for ($i=0;$i<$count;$i++) {
      $numbers[] = rand(0, 1000);
    }
    $session = $request->getSession();
    $session->set('number', rand(0, 100));

    $number = implode(",", $numbers);
    $html = $this->container->get('templating')->render(
      'lucky/number.html.twig',
      ['numberList' => $number]
    );
    return new Response($html);
  }
  /**
   * @Route("/api/lucky/number")
   */
  public function apiNumberAction()
  {
    $data = ['lucky_number' => rand(0, 1000)];

    return new JsonResponse($data);
  }
}
