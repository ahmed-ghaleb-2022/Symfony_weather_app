<?php

namespace App\Controller;

use App\Repository\ForecastRepository;
use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/weather', name: 'app_weather')]
final class WeatherController extends AbstractController
{
    #[Route('/')]
    public function index(): Response
    {
        return $this->render('weather/forecast.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }



    #[Route('/{countryCode}/{city}')]
    public function forecast(
        LocationRepository $locationRepository,
        ForecastRepository $forecastRepository,
        string $countryCode,
        string $city
    ): Response
    {
        $allLocations = $locationRepository->findAll();
        $location = $locationRepository->findOneBy(['name' => $city, 'countryCode' => $countryCode]);

        if (!$location) {
            throw $this->createNotFoundException('Location not found');
        }


        $forecasts = $forecastRepository->findForcasts($location);

        $response=  $this->render('weather/forecast.html.twig', [
            'forecasts' => $forecasts,
            'location' => $location,
            'allLocations' => $allLocations
        ]);

        return $response;
    }
}
