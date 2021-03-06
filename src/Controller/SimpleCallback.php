<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleCallback extends ControllerBase
{

    public function noArgumentAction()
    {
        return [
            '#markup' => 'Hello Simple Callback!'
        ];
    }

    public function argumentAwareAction($a1, $a2 = 'American')
    {
        return [
            '#prefix' => '<pre>',
            '#markup' => print_r([$a1, $a2], true),
            '#suffix' => '</pre>',
        ];
    }

    public function requestAwareAction(Request $request)
    {
        # echo '<pre>', $request, '</pre>';
        return [
            '#prefix' => '<pre>',
            '#markup' => print_r($request->query->all(), true)
            . print_r($request, true),
            '#suffix' => '</pre>'
        ];
    }

    public function directResponseAction()
    {
        return new Response('Hi there!', 200);
    }

    public function sayHiAction($name = 'there')
    {
        return 'Hi ' . $name . '!';
    }

    public function hiParamConverterAction($country)
    {
        return 'Hi ' . $country;
    }

}
