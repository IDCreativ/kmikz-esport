<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(TranslatorInterface $translator): Response
    {
        // Test de traduction dans un controller
        $controller_name = $translator->trans('menu.home');
        // $message_flash = $translator->trans('message.flash.test');

        // $this->addFlash('success', $message_flash);
        return $this->render('app/index.html.twig', [
            'controller_name' => $controller_name,
        ]);
    }

    /**
     * @Route("/modeles", name="modeles")
     */
    public function modeles(TranslatorInterface $translator): Response
    {
        // Test de traduction dans un controller
        $controller_name = $translator->trans('menu.home');
        $message_flash = $translator->trans('message.flash.test');

        $this->addFlash('success', $message_flash);
        return $this->render('__modeles/index.html.twig', [
            'controller_name' => 'Modèles',
        ]);
    }
}
