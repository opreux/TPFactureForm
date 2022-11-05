<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post/new', name: 'post_new')]
    public function new(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();

        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form = $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $post = $form->getData();
            
            $em->persist($post);
           
            $em->flush();

            return $this->render('post/success.html.twig', ['post' => $post]);
        
        }
        return $this->renderForm('post/new.html.twig', [
            'form' => $form
        ]);
    }

}
