<?php
namespace Shivam;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

abstract class Controller {
    const PATH_TO_TEMPLATES = __DIR__ . '/../templates';
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(self::PATH_TO_TEMPLATES);
        $this->twig = new Environment($loader);
    }
}