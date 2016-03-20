<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')
            ->findAllOrderedByName();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @Route("/create/", name="createproduct")
     * @return Response
     */
    public function createAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription("Some test description");

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();

        return new Response("Created Product by id: " . $product->getId());
    }

    /**
     * @param $id
     * @return Response
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id ' . $id);
        }

        return $this->render(':product:show.html.twig', ['product' => $product]);
    }
}
