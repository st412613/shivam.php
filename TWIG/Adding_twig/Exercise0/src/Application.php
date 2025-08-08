<?php
namespace Shivam;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Application
{
    const PATH_TO_TEMPLATES = __DIR__ . '/../template';
    
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(self::PATH_TO_TEMPLATES);
        $this->twig = new Environment($loader);
    }

    public function run()
    {
        $name = 'Matt';
        $template = 'hello.html.twig';
        $args = [
            'name' => $name,
            'lname' => 'Tiwari'
        ];

        $html = $this->twig->render($template, $args);
        print $html;
    }
}
