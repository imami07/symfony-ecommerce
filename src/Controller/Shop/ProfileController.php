<?php

namespace App\Controller\Shop;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Form\UserType;

#[Route('/profile')]
#[IsGranted('ROLE_USER')]
class ProfileController extends AbstractController
{
    #[Route('', name: 'app_shop_profile')]
    public function index(): Response
    {
        return $this->render('shop/profile/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/edit', name: 'app_shop_profile_edit')]
    public function edit(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user, [
            'is_profile_edit' => true
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a été mis à jour avec succès');
            return $this->redirectToRoute('app_shop_profile');
        }

        return $this->render('shop/profile/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}