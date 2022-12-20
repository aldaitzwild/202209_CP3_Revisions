<?php

namespace App\Service;

use App\Repository\CoordinateRepository;

class GameManager 
{
    private CoordinateRepository $coordinateRepository;


    public function __construct(CoordinateRepository $coordinateRepository)
    {
        $this->coordinateRepository = $coordinateRepository;
    }

    public function bombACell(int $x, int $y): string
    {
        $coordinate = $this->coordinateRepository->findOneBy([
            'x' => $x,
            'y' => $y
        ]);

        $result = "Plouf";
        if($coordinate != null) {
            $result = "Bah non tu as déjà tiré sur cette case ...";
            if($coordinate->isHasBeenBombed() != true) {
                $result = "Bravo ! Vous avez touché un bateau !!!!";
                $coordinate->setHasBeenBombed(true);

                $this->coordinateRepository->add($coordinate, true);
            }
        }

        return $result;
    }
}