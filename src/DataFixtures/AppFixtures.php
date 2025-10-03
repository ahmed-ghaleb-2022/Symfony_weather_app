<?php
namespace App\DataFixtures;

use App\Entity\Forecast;
use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $berlin  = $this->addLocation($manager, 'Berlin', 'DE', 52.5200, 13.4050);
        $cairo   = $this->addLocation($manager, 'Cairo', 'EG', 30.0444, 31.2357);
        $newYork = $this->addLocation($manager, 'New York', 'US', 40.7128, -74.0060);

        $this->addForecast(
            $manager,
            $berlin,
            new \DateTime('2023-09-25 08:24:03'),
            10,
            10,
            1100,
            51,
            10.0,
            180,
            50,
            'sun',
        );

        $this->addForecast(
            $manager,
            $berlin,
            new \DateTime('2023-09-25 11:15:00'),
            10,
            10,
            1200,
            52,
            10.0,
            180,
            50,
            'cloud',
        );

        $this->addForecast($manager, $berlin,new \DateTime('2023-09-25 03:10:50'),
            10,
            10,
            1000,
            53,
            10.0,
            180,
            50,
            'sun',
        );
        $this->addForecast(
            $manager,
            $cairo,
            new \DateTime('2023-09-25 08:24:03'),
            10,
            10,
            1100,
            51,
            10.0,
            180,
            50,
            'sun',
        );

        $this->addForecast(
            $manager,
            $cairo,
            new \DateTime('2023-09-25 11:15:00'),
            10,
            10,
            1200,
            52,
            10.0,
            180,
            50,
            'cloud',
        );

        $this->addForecast($manager, $cairo,new \DateTime('2023-09-25 03:10:50'),
            10,
            10,
            1000,
            53,
            10.0,
            180,
            50,
            'sun',
        );
        $this->addForecast(
            $manager,
            $newYork,
            new \DateTime('2023-09-25 08:24:03'),
            10,
            10,
            1100,
            51,
            10.0,
            180,
            50,
            'sun',
        );

        $this->addForecast(
            $manager,
            $newYork,
            new \DateTime('2023-09-25 11:15:00'),
            10,
            10,
            1200,
            52,
            10.0,
            180,
            50,
            'cloud',
        );

        $this->addForecast($manager, $newYork,new \DateTime('2023-09-25 03:10:50'),
            10,
            10,
            1000,
            53,
            10.0,
            180,
            50,
            'sun',
        );

        $manager->flush();
    }

    private function addLocation(
        ObjectManager $manager,
        string $name,
        string $countryCode,
        float $latitude,
        float $longitude,
    ): Location {
        $location = new Location();
        $location->setName($name)
            ->setCountryCode($countryCode)
            ->setLatitude($latitude)
            ->setLongitude($longitude);

        $manager->persist($location);

        return $location;
    }

    private function addForecast(
        ObjectManager $manager,
        Location $location,
        \DateTime $date,
        int $temperatureCelsius,
        int $flTemperatureCelsius,
        ?int $pressure,
        ?int $humidity,
        ?float $windSpeed,
        ?int $windDeg,
        ?int $cloudiness,
        string $icon,
    ): Forecast {
        $forecast = new Forecast();
        $forecast->setLocation($location)
            ->setDate($date)
            ->setTemperatureCelsius($temperatureCelsius)
            ->setFlTemperatureCelsius($flTemperatureCelsius)
            ->setPressure($pressure)
            ->setHumidity($humidity)
            ->setWindSpeed($windSpeed)
            ->setWindDeg($windDeg)
            ->setCloudiness($cloudiness)
            ->setIcon($icon);

        $manager->persist($forecast);

        return $forecast;
    }
}
