<?php

namespace App\DataFixtures;

use App\Entity\Boat;
use App\Entity\Coordinate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BoatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $largeBoat = new Boat();
        $smallBoat1 = new Boat();
        $smallBoat2 = new Boat();

        $largeBoat->setSize('Large')
                    ->addCoordinate((new Coordinate())->setX(1)->setY(1))
                    ->addCoordinate((new Coordinate())->setX(1)->setY(2))
                    ->addCoordinate((new Coordinate())->setX(1)->setY(3))
                    ->addCoordinate((new Coordinate())->setX(1)->setY(4))
                    ->addCoordinate((new Coordinate())->setX(1)->setY(5))
        ;

        $smallBoat1->setSize('Small')
                    ->addCoordinate((new Coordinate())->setX(5)->setY(5))
                    ->addCoordinate((new Coordinate())->setX(6)->setY(5))
                    ->addCoordinate((new Coordinate())->setX(7)->setY(5))
        ;

        $smallBoat2->setSize('Small')
                    ->addCoordinate((new Coordinate())->setX(8)->setY(6))
                    ->addCoordinate((new Coordinate())->setX(8)->setY(7))
                    ->addCoordinate((new Coordinate())->setX(8)->setY(8))
        ;

        $manager->persist($largeBoat);
        $manager->persist($smallBoat1);
        $manager->persist($smallBoat2);

        $manager->flush();
    }
}
