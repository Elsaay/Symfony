<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ConfirmationController extends AbstractController
{
    #[Route('/reservationservice/confirmation', name: 'confirmation')]
    public function data(request $request): Response
    {
        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];

        $nom=$request->query->get('nom');
        $service=$request->query->get('service');
        $date=$request->query->get('date');
        $heure=$request->query->get('heure');

    
        return $this->render('confirmation/index.html.twig', [
            'menuItems' => $menuItems,
            'nom' => $nom,
            'date' => $date,
            'heure' => $heure,
            'service' => $service,
            

        ]);
        
    }
}
