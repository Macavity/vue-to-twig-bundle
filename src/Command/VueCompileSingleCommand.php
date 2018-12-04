<?php

namespace Macavity\VueToTwigBundle\Command;

use Macavity\VueToTwigBundle\Services\VueToTwigCompiler;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class VueCompileSingleCommand extends ContainerAwareCommand
{
    /**
     * @var VueToTwigCompiler
     */
    protected $compiler;

    public function __construct(VueToTwigCompiler $compiler)
    {
        parent::__construct('vuetotwig:single');

        $this->compiler = $compiler;
    }

    protected function configure()
    {
        $this
            ->setDescription('Compile a vue template to a twig template')
            ->addArgument(
                'sourceFile',
                InputArgument::REQUIRED,
                'Which file do you want to convert?'
            )
            ->addArgument(
                'targetFile',
                InputArgument::REQUIRED,
                'Name of the target twig file?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sourceFile = $input->getArgument('sourceFile');
        $targetFile = $input->getArgument('targetFile');

        $this->compiler;
    }
}