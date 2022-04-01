<?php

namespace App\Service;

use App\Entity\GeneralConfiguration;
use App\Repository\GeneralConfigurationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalVariablesCatcher extends AbstractController
{
    // private $generalConfigurationRepository;

    public function __construct(
        GeneralConfigurationRepository $generalConfigurationRepository
    )
    {
        $this->generalConfigurationRepository = $generalConfigurationRepository;
    }

    public function websiteConfig()
    {
        $configSite = $this->generalConfigurationRepository->findLast();
        if (!$configSite) {
            $configSite = new GeneralConfiguration;
            $configSite
                ->setTitle('Titre de votre site')
                ->setTagline('Your tagline here')
            ;
        }
        
        return $configSite;
    }
}
