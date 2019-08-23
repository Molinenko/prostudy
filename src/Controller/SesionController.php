<?php

namespace App\Controller;

use App\Entity\Sesion;
use App\Form\SesionType;
use App\Repository\SesionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sesion")
 */
class SesionController extends AbstractController
{

    public function index(SesionRepository $sesionRepository): Response
    {
        return $this->render('sesion/index.html.twig', [
            'sesions' => $sesionRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $sesion = new Sesion();
        $form = $this->createForm(SesionType::class, $sesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sesion);
            $entityManager->flush();

            return $this->redirectToRoute('sesion_index');
        }

        return $this->render('sesion/new.html.twig', [
            'sesion' => $sesion,
            'form' => $form->createView(),
        ]);
    }

    public function show(Sesion $sesion): Response
    {
        return $this->render('sesion/show.html.twig', [
            'sesion' => $sesion,
        ]);
    }

    public function edit(Request $request, Sesion $sesion): Response
    {
        $form = $this->createForm(SesionType::class, $sesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sesion_index');
        }

        return $this->render('sesion/edit.html.twig', [
            'sesion' => $sesion,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Sesion $sesion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sesion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sesion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sesion_index');
    }
}
