<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use App\Security\UserSecurity;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserService $userService,
        private readonly UserSecurity $userSecurity,
    ) {}

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('shop/profile.html.twig');
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dto = $form->getData();
            $this->userService->register($dto);
            $this->addFlash('success', 'Account created successfully. Please login.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('shop/login.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        if ($this->userSecurity->isAuthenticated()) {
            return $this->redirectToRoute('app_profile');
        }

        $error = $this->userSecurity->getLastAuthenticationError();
        $lastEmail = $this->userSecurity->getLastUsername();

        $form = $this->createForm(RegistrationFormType::class);

        return $this->render('shop/login.html.twig', [
            'last_email' => $lastEmail,
            'error' => $error,
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
