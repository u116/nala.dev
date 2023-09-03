<?php

namespace Src\Controllers;

use Src\Models\About;
use Src\Models\Contact;
use Src\Models\Interests;

abstract class AbstractController
{
    protected About $About;
    protected Contact $Contact;
    protected Interests $Interests;
    private static array $views = [
        'about' => 'about/about',
        'contact' => 'contact/contact',
        'interests' => 'interests/interests',
        'blog' => 'blog/blog',
        'index' => 'index/index',
        '404' => 'response/404',
        '400' => 'response/400'
    ];

    public function __construct()
    {
        $this->About = new About;
        $this->Contact = new Contact;
        $this->Interests = new Interests;
    }

    public function render($route, $variables = []): array
    {
        return [
            'base' => view('base.view.php'),
            'page' => [
                'route' => $route,
                'view' => $route === 'home' ? null : path('views/' . self::$views[$route] . '.view.php'),
                'var' => $variables
            ]
        ];
    }
}