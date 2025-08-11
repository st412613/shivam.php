<?php
namespace Shivam;

class DefaultController extends Controller
{

public function homepage()
{
    $template = 'homepage.html.twig';
    $args = [];
    $html = $this->twig->render($template, $args);
    print $html;
}
public function contactUs()
{
    $template = 'contactUs.html.twig';
    $args = [];
    $html = $this->twig->render($template, $args);
    print $html;
}

public function privacy()
{

 $template = 'privacy.html.twig';
    $args = [];
    $html = $this->twig->render($template, $args);
    print $html;
}

public function staffList()
{

 $template = 'companyStaff.html.twig';
 $staff = ["Shivam", "Raju"];
    $args = [
        'staffs'=>$staff
    ];
    $html = $this->twig->render($template, $args);
    print $html;
}
}