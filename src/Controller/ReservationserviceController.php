<?php

namespace App\Controller;
use App\Entity\Reservation;
use App\Form\ReservationserviceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class ReservationserviceController extends AbstractController
{
    
    #[Route('/reservationservice', name: 'reservation')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $donnesForm=NULL;
        $reservation = new Reservation();
        $form = $this->createForm(ReservationServiceType::class,$reservation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder la réservation dans la base de données
            $entityManager->persist($reservation);
            $entityManager->flush();
            // var_dump($reservation);
            // exit;
            // Rediriger vers la page de confirmation avec les données
            return $this->redirectToRoute('confirmation', [
                'nom' => $reservation->getNom(),
                'service' => $reservation->getService(),
                'date' => $reservation->getDate(),
                'heure' => $reservation->getHeure(),
            ]);
        }

        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];
        
        return $this->render('reservationservice/index.html.twig', [
            'form' => $form->createView(),
            'menuItems' => $menuItems,
        ]);
    }
}
