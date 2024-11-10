<?php

namespace App\Controller;
use App\Entity\Reservation;
use App\Form\ReservationserviceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeMenuController extends AbstractController
{
    #[Route('/menu', name: 'menu')]
    public function index(): Response
    {
        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];
        return $this->render('home_menu/index.html.twig', [
            'menuItems' => $menuItems,
        ]);

        
    }
    #[Route('/coiffure', name: 'coiffure')]
    public function coiffure(Request $request, EntityManagerInterface $entityManager): Response
    {
    $reservation = new Reservation();
    $form = $this->createForm(ReservationServiceType::class, $reservation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($reservation);
        $entityManager->flush();
        // echo $reservation->getDate();
        // exit;
        return $this->redirectToRoute('confirmation', [
            'nom' => $reservation->getNom(),
            'service' => $reservation->getService(),
            'date' => $reservation->getDate()->format('d/m/Y'),
            'heure' => $reservation->getHeure()->format('H:i'),
        ]);

    }
        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];
        return $this->render('home_menu/coiffure.html.twig', [
            'menuItems' => $menuItems,
            'form' => $form->createView()
        ]);
    }

    #[Route('/spa', name: 'spa')]
    public function spa(Request $request, EntityManagerInterface $entityManager): Response
    {

        $reservation = new Reservation();
    $form = $this->createForm(ReservationServiceType::class, $reservation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($reservation);
        $entityManager->flush();
        return $this->redirectToRoute('confirmation', [
            'nom' => $reservation->getNom(),
            'service' => $reservation->getService(),
            'date' => $reservation->getDate()->format('d/m/Y'),
            'heure' => $reservation->getHeure()->format('H:i'),
        ]);
    }

        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];
        return $this->render('home_menu/spa.html.twig', [
            'menuItems' => $menuItems,
            'form' => $form->createView()
        ]);
    }

    #[Route('/manucure', name: 'manucure')]
    public function manucure(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
    $form = $this->createForm(ReservationServiceType::class, $reservation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($reservation);
        $entityManager->flush();
        return $this->redirectToRoute('confirmation', [
            'nom' => $reservation->getNom(),
            'service' => $reservation->getService(),
            'date' => $reservation->getDate()->format('d/m/Y'),
            'heure' => $reservation->getHeure()->format('H:i'),
        ]);
    }
        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier']
        ];
        return $this->render('home_menu/manucure.html.twig', [
            'menuItems' => $menuItems,
            'form' => $form->createView()
        ]);
    }

    #[Route('/barbier', name: 'barbier')]
    public function barbier(Request $request, EntityManagerInterface $entityManager): Response
    {
        
    // Créer le formulaire pour chaque page
    $reservation = new Reservation();
    $form = $this->createForm(ReservationServiceType::class, $reservation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($reservation);
        $entityManager->flush();
        return $this->redirectToRoute('confirmation', [
            'nom' => $reservation->getNom(),
            'service' => $reservation->getService(),
            'date' => $reservation->getDate()->format('d/m/Y'),
            'heure' => $reservation->getHeure()->format('H:i'),
        ]);
    }
        $menuItems=[
            ['label'=>'Acceuil','route'=>'menu'],
            ['label'=>'Coiffure','route'=>'coiffure'],
            ['label'=>'SPA','route'=>'spa'],
            ['label'=>'Manucure','route'=>'manucure'],
            ['label'=>'Barbier','route'=>'barbier'],
            
        ];

        
        return $this->render('home_menu/barbier.html.twig', [
            'menuItems' => $menuItems,
            'form' => $form->createView()
        ]);
    }

}