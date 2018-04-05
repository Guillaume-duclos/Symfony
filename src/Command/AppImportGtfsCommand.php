<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
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

    /**
     * AppImportGtfsCommand constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct(self::$defaultName);
        $this->em = $em;
    }

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('name', InputArgument::REQUIRED, 'Name of Entity');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $fileName = __DIR__.'/../../datas/'.strtolower($input->getArgument('name')).'s.txt';

        $io->note("Import du fichier : ".$fileName);

        $fp = file($fileName);
        $progressBar = new ProgressBar($output, count($fp));
        $progressBar->start();

        $i = 0;
        $keys = [];
        if (($handle = fopen($fileName, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                ++$i;
                if (1 == $i) {
                    $keys = $data;
                    continue;
                }
                $data = array_combine($keys, $data);
                // TODO
                $progressBar->advance();
            }
            fclose($handle);

        }
        $progressBar->finish();
        $io->newLine(2);
        $io->success('Fin de l\'import');
    }
}