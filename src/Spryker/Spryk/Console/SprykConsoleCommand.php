<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Spryk\Console;

use Spryker\Spryk\Model\Spryk\Definition\Argument\Resolver\OptionsContainer;
use Spryker\Spryk\SprykFacade;
use Spryker\Spryk\Style\SprykStyle;
use Spryker\Spryk\Style\SprykStyleInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SprykConsoleCommand extends Command
{
    const ARGUMENT_SPRYK = 'spryk';
    const ARGUMENT_SPRYK_SHORT = 's';

    const ARGUMENT_MODULE = 'module';
    const ARGUMENT_MODULE_SHORT = 'm';

    const OPTION_DRY_RUN = 'dry-run';
    const OPTION_DRY_RUN_SHORT = 'd';

    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    /**
     * @var \Spryker\Spryk\Style\SprykStyleInterface
     */
    protected $output;

    /**
     * @var bool
     */
    protected $isDryRun;

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('spryker:spryk')
            ->setDescription('Runs a Spryk build process.')
            ->addArgument(static::ARGUMENT_SPRYK, InputArgument::REQUIRED, 'Name of the Spryk which should be build.')
            ->addOption(static::OPTION_DRY_RUN, static::OPTION_DRY_RUN_SHORT, InputOption::VALUE_NONE, 'Dry runs the Spryk, nothing will be executed.')
            ->addOption('module', 'm', InputOption::VALUE_REQUIRED, 'Module name to run for')
            ->addOption('targetPath', 't', InputOption::VALUE_REQUIRED, 'TargetPath');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->input = $input;
        $this->output = $this->createOutput($input, $output);

        OptionsContainer::setOptions($input->getOptions());

        $sprykName = $this->getSprykName($input);
        $this->getFacade()->executeSpryk($sprykName, $this->output);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Spryker\Spryk\Style\SprykStyleInterface
     */
    protected function createOutput(InputInterface $input, OutputInterface $output): SprykStyleInterface
    {
        return new SprykStyle(
            $input,
            $output
        );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @return string
     */
    protected function getSprykName(InputInterface $input): string
    {
        return $input->getArgument(static::ARGUMENT_SPRYK);
    }

    /**
     * @return \Spryker\Spryk\SprykFacade
     */
    protected function getFacade(): SprykFacade
    {
        return new SprykFacade();
    }
}
