<?php
// src/Controller/MicroController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroController extends AbstractController
{
    /**
     * @Route("/random/{limit}")
     */
    public function randomNumber(int $limit): Response
    {
        $number = random_int(0, $limit);

        return $this->render('micro/random.html.twig', [
            'number' => $number,
        ]);
    }
    
    /**
     * @Route("/random_text")
     */
    public function randomText(): Response
    {
        $number = 6565654;

        return $this->render('micro/random.html.twig', [
            'number' => $number,
        ]);
    }
}