<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/', name: "home")]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/about', name: "about")]
    public function about(): Response
    {

        return $this->render('about.html.twig');
    }

    #[Route('/report', name: "report")]
    public function report(): Response
    {

        return $this->render('report.html.twig');
    }

    #[Route('/lucky', name: "lucky")]
    public function lucky(): Response
    {
        // Generate a random number between 1 and 7 for the first picture
        $pictureNumber1 = rand(1, 4);

        // Generate another random number between 1 and 7 for the second picture
        do {
            $pictureNumber2 = rand(1, 4);
        } while ($pictureNumber2 == $pictureNumber1); // Make sure the second picture is different from the first

        // Define the picture paths
        $picture1 = 'img/charizard.png';
        $picture2 = 'img/gengar.webp';
        $picture3 = 'img/swellow.png';
        $picture4 = 'img/totodile.png';

        // Select the pictures based on the random numbers
        $picturePath1 = ${'picture' . $pictureNumber1};
        $picturePath2 = ${'picture' . $pictureNumber2};

        // Generate a random number between 1 and 10 for the lucky number
        $luckynumber = rand(1, 100);

        return $this->render('lucky.html.twig', [
            'luckynumber' => $luckynumber,
            'picture1' => $picturePath1,
            'picture2' => $picturePath2,
        ]);
    }
}
