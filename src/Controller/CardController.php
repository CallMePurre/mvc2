<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\card\CardGraphic;

class CardController extends AbstractController {
    #[Route('card', name: "card")]
    public function home(): Response
    {
        $cardRepresentations = [];
        for ($i = 1; $i <= 52; $i++) {
            $card = new CardGraphic();
            $card->value = $i;
            $cardRepresentations[] = $card->getAsString();
        }
    
        return $this->render('card.html.twig', [
            'cards' => $cardRepresentations,
        ]);
    }
}