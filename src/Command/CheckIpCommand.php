<?php

namespace App\Command;

use App\Services\IpDataService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckIpCommand extends Command
{
    private $ipDataService;

    public function __construct(IpDataService $ipDataService)
    {
        parent::__construct();
        $this->ipDataService = $ipDataService;
    }

    protected function configure() {
        $this->setName('app:check-ip')
            ->addArgument('ip', InputArgument::REQUIRED, 'Ip address');;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $ipAddress = $this->ipDataService->getData($input->getArgument('ip'));
        if ($ipAddress != null) {
            $output->writeln("Ip Address: {$ipAddress->getIp()}");
            $output->writeln("Country Code: {$ipAddress->getCountryCode()}");
            $output->writeln("Country: {$ipAddress->getCountry()}");
            $output->writeln("Region: {$ipAddress->getRegion()}");
            $output->writeln("City: {$ipAddress->getCity()}");
            $output->writeln("Latitude: {$ipAddress->getLatitude()}");
            $output->writeln("Longitude: {$ipAddress->getLongitude()}");
            $output->writeln("Zip Code: {$ipAddress->getZipCode()}");
            $output->writeln("Time Zone: {$ipAddress->getTimeZone()}");
        } else {
            $output->writeln("An error occurred");
        }
    }
}
