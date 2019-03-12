<?php
namespace Passwonsole;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NewCommand extends Command{

    public function configure()
    {
        $this->setName('gen')
            ->setDescription('Generate password (8 characters by default)')
            ->setHelp('This command can generate new password for you!')
            ->addArgument('characters',  InputArgument::OPTIONAL, 'Number of characters', 8)
            ->addOption('number','N', InputOption::VALUE_NONE, 'Include numbers')
            ->addOption('symbols', 'S', InputOption::VALUE_NONE, 'Include other symbols')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $numOfCharacters = (int) $input->getArgument('characters');
        $useNumbers = (bool) $input->getOption('number');
        $useSymbols = (bool) $input->getOption('symbols');

        $charObj= new CharacterCollection();
        $charactersCollection = $charObj->getCharacterCollection($useNumbers, $useSymbols);
        $password = $charObj->generatePassword($charactersCollection, $numOfCharacters);

        $output->writeln('<comment>Your password:  '. $password.'</comment>');
    }


}