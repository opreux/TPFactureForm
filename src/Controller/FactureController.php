<?php

namespace App\Controller;

use App\Entity\Commande;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FactureController extends AbstractController
{
    #[Route('/facture/{ncom}', name: 'facture')]
    public function type1(ManagerRegistry $doctrine, Request $request, Commande $commande) : Response
    {
        return $this->render('facture/index.html.twig', [
            'commande' => $commande,
        ]);
    }
}