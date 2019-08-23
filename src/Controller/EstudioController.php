<?php

namespace App\Controller;

use App\Entity\Estudio;
use App\Form\EstudioType;
use App\Repository\EstudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EstudioController extends AbstractController
{
    
    public function index(EstudioRepository $estudioRepository): Response
    {
        return $this->render('estudio/index.html.twig', [
            'estudios' => $estudioRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $estudio = new Estudio();
        $form = $this->createForm(EstudioType::class, $estudio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estudio);
            $entityManager->flush();

            return $this->redirectToRoute('estudio_index');
        }

        return $this->render('estudio/new.html.twig', [
            'estudio' => $estudio,
            'form' => $form->createView(),
        ]);
    }

    public function show(Estudio $estudio): Response
    {
        return $this->render('estudio/show.html.twig', [
            'estudio' => $estudio,
        ]);
    }

    public function edit(Request $request, Estudio $estudio): Response
    {
        $form = $this->createForm(EstudioType::class, $estudio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estudio_index');
        }

        return $this->render('estudio/edit.html.twig', [
            'estudio' => $estudio,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Estudio $estudio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estudio->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($estudio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('estudio_index');
    }
}
