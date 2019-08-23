<?php

namespace App\Controller;

use App\Entity\Materia;
use App\Form\MateriaType;
use App\Repository\MateriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MateriaController extends AbstractController
{

    public function index(MateriaRepository $materiaRepository): Response
    {
        return $this->render('materia/index.html.twig', [
            'materias' => $materiaRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $materia = new Materia();
        $form = $this->createForm(MateriaType::class, $materia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($materia);
            $entityManager->flush();

            return $this->redirectToRoute('materia_index');
        }

        return $this->render('materia/new.html.twig', [
            'materia' => $materia,
            'form' => $form->createView(),
        ]);
    }

    public function show(Materia $materia): Response
    {
        return $this->render('materia/show.html.twig', [
            'materia' => $materia,
        ]);
    }

    public function edit(Request $request, Materia $materia): Response
    {
        $form = $this->createForm(MateriaType::class, $materia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materia_index');
        }

        return $this->render('materia/edit.html.twig', [
            'materia' => $materia,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Materia $materia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$materia->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($materia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('materia_index');
    }
}
