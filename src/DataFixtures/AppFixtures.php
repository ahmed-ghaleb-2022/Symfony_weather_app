<?php

namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $Location = new Location();
        $Location->setName('Berlin');
        $Location->setCountryCode('DE');
        $Location->setLatitude();
        $Location->setLongitude();

        $manager->flush();
    }
}
