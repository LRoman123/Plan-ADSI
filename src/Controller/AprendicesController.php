<?php

namespace App\Controller;

use App\Entity\Aprendices;
use App\Form\AprendicesType;
use App\Repository\AprendicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class AprendicesController extends AbstractController
{
    /**
     * @Route("/", name="aprendices_index", methods={"GET"})
     */
    public function index(AprendicesRepository $aprendicesRepository): Response
    {
        return $this->render('aprendices/index.html.twig', [
            'aprendices' => $aprendicesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aprendices_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $aprendice = new Aprendices();
        $form = $this->createForm(AprendicesType::class, $aprendice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aprendice);
            $entityManager->flush();

            return $this->redirectToRoute('aprendices_index');
        }

        return $this->render('aprendices/new.html.twig', [
            'aprendice' => $aprendice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aprendices_show", methods={"GET"})
     */
    public function show(Aprendices $aprendice): Response
    {
        return $this->render('aprendices/show.html.twig', [
            'aprendice' => $aprendice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aprendices_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Aprendices $aprendice): Response
    {
        $form = $this->createForm(AprendicesType::class, $aprendice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aprendices_index');
        }

        return $this->render('aprendices/edit.html.twig', [
            'aprendice' => $aprendice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aprendices_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Aprendices $aprendice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aprendice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aprendice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aprendices_index');
    }
}
