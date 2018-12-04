<?php

namespace Macavity\VueToTwigBundle\Services;

use DOMDocument;
use Macavity\VueToTwig\Compiler;
use Macavity\VueToTwig\Component;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Tests\Controller\ContainerAwareController;

class VueToTwigCompiler extends ContainerAwareController
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    protected $sourceDirectory;

    /**
     * @var string
     */
    protected $buildDirectory;

    public function __construct(string $assetPath, string $targetPath, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->sourceDirectory = $assetPath;
        $this->buildDirectory = $targetPath;

    }

    public function convert()
    {
        $component = new Component($this->sourceDirectory, $this->buildDirectory);
        $document = $this->createDocumentWithHtml($template);
        $compiler = new Compiler($document, $this->createLogger());
    }

    protected function createDocumentWithHtml(string $html): DOMDocument
    {
        $vueDocument = new DOMDocument();
        $vueDocument->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        return $vueDocument;
    }
}