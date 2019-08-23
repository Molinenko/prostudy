<?php

namespace App\Controller;

use App\Entity\Tema;
use App\Form\TemaType;
use App\Repository\TemaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemaController extends AbstractController
{

    public function index(TemaRepository $temaRepository): Response
    {
        return $this->render('tema/index.html.twig', [
            'temas' => $temaRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $tema = new Tema();
        $form = $this->createForm(TemaType::class, $tema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tema);
            $entityManager->flush();

            return $this->redirectToRoute('tema_index');
        }

        return $this->render('tema/new.html.twig', [
            'tema' => $tema,
            'form' => $form->createView(),
        ]);
    }

    public function show(Tema $tema): Response
    {
        return $this->render('tema/show.html.twig', [
            'tema' => $tema,
        ]);
    }

    public function edit(Request $request, Tema $tema): Response
    {
        $form = $this->createForm(TemaType::class, $tema);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tema_index');
        }

        return $this->render('tema/edit.html.twig', [
            'tema' => $tema,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Tema $tema): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tema->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tema);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tema_index');
    }
}
