<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppImportGtfsCommand extends Command
{
    /** @var EntityManagerInterface */
    private $em;


    protected static $defaultName = 'app:import-gtfs';

    public function __construct(EntityManagerInterface $em) {
        parent::__construct(self::$defaultName);
        $this->em = $em;
    }

    protected function configure() {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('name', InputArgument::REQUIRED, 'Name of Entity')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $io = new SymfonyStyle($input, $output);
        $fileName = __DIR__. '/../../datas/'.strtolower($input->getArgument('name')).'s.txt';

        $io->note("Import du fichier : " . $fileName);

        $row = 1;
        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num champs à la ligne $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }

        $io->success('Fin de l\'import');
    }
}