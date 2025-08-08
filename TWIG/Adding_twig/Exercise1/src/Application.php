<?php
namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application
{
    private const PATH_TO_TEMPLATES = __DIR__ . '/../templates'; 

    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(self::PATH_TO_TEMPLATES);
        $this->twig = new Environment($loader);
    }

    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');
        print $action;
        switch ($action) {
            case 'privacy':
                $this->privacy();
                break;

            case 'hello':
                $this->hello();
                break;

            case 'home':
            default:
                $this->privacy();
                break;
        }
    }

    private function privacy(): void
    {
        $template = 'privacy.html.twig';
        $args = [
            'pageTitle' => 'Privacy',
            'name' => 'Shivam'
        ];
        $html = $this->twig->render($template, $args);
        echo $html;
    }

    private function hello(): void
    {
        $template = 'hello.html.twig';
        $args = [
            'name' => 'Shivam'
        ];
        $html = $this->twig->render($template, $args);
        echo $html;
    }
}
