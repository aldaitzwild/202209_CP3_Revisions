<?php

namespace App\Controller;

use App\Repository\CoordinateRepository;
use App\Service\GameManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/', name: 'welcome_game')]
    #[Route('/game', name: 'app_game')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig');
    }

    #[Route('/bomb/{x}/{y}', name: 'app_game_bomb', methods: ['GET'], requirements: ['x' => '\d+', 'y' => '\d+'])]
    public function bomb(int $x, int $y, GameManager $gameManager): Response
    {
        $result = $gameManager->bombACell($x, $y);
        return new Response($result);
    }
}
