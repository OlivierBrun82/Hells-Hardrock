<?php

namespace App\Controller;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController
{
    /**
     * @Route("/", name="app_home", methods={"GET"})
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/media", name="app_media_index", methods={"GET"})
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        $media = $mediaRepository->findAll();
        return $this->render('media/index.html.twig', [
            'media' => $media,
        ]);
    }

    /**
     * @Route("/media/new", name="app_media_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $medium = new Media();
            $medium->setTitle($request->request->get('title', ''));
            $medium->setGroupName($request->request->get('group_name', ''));
            $medium->setStyle($request->request->get('style', ''));
            $medium->setYear((int)$request->request->get('year', 0));
            $medium->setMedium($request->request->get('medium', ''));
            
            $entityManager->persist($medium);
            $entityManager->flush();
            
            return $this->redirectToRoute('app_media_index');
        }
        
        return $this->render('media/new.html.twig');
    }

    /**
     * @Route("/media/{id}", name="app_media_show", methods={"GET"})
     */
    public function show(Media $medium): Response
    {
        return $this->render('media/show.html.twig', [
            'medium' => $medium,
        ]);
    }

    /**
     * @Route("/media/{id}/edit", name="app_media_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Media $medium, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $medium->setTitle($request->request->get('title', ''));
            $medium->setGroupName($request->request->get('group_name', ''));
            $medium->setStyle($request->request->get('style', ''));
            $medium->setYear((int)$request->request->get('year', 0));
            $medium->setMedium($request->request->get('medium', ''));
            
            $entityManager->flush();
            
            return $this->redirectToRoute('app_media_index');
        }
        
        return $this->render('media/edit.html.twig', [
            'medium' => $medium,
        ]);
    }

    /**
     * @Route("/media/{id}/delete", name="app_media_delete", methods={"POST"})
     */
    public function delete(Media $medium, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($medium);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_media_index');
    }
}