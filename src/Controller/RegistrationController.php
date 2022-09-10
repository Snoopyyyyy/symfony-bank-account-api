<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $body = json_decode($request->getContent());
        $username = $body->username;
        $plaintext = $body->password;

        $user = new User();
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintext
        );

        $user->setEmail($body->email);
        $user->setUsername($username);
        $user->setPassword($hashedPassword);
        $user->setFirstname($body->firstname);
        $user->setLastname($body->lastname);

        $userManager = $doctrine->getManager();
        $userManager->persist($user);
        $userManager->flush();

        return $this->json(['message' => 'Registered successfully']);
    }
}
