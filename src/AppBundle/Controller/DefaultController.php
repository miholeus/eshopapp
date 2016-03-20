<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
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
        $books = $em->getRepository('AppBundle:Book')
            ->findAllOrderedByName();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'books' => $books
        ));
    }

    /**
     * @Route("/create/", name="createproduct")
     * @return Response
     */
    public function createAction()
    {
        $book = new Book();
        $book->setName('A Foo Bar');
        $book->setPrice('19.99');
        $book->setDescription("Some test description");

        $em = $this->getDoctrine()->getManager();

        $em->persist($book);
        $em->flush();

        return new Response("Created Product by id: " . $book->getId());
    }

    /**
     * @param $id
     * @return Response
     */
    public function showAction($id)
    {
        $book = $this->getDoctrine()->getRepository('AppBundle:Book')
            ->find($id);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $id);
        }

        return $this->render(':book:show.html.twig', ['book' => $book]);
    }
}
