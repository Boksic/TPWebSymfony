<?php

namespace tp\mathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('tpmathBundle:Default:index.html.twig');
    }

    function fiboAction(Request $request)
    {
        return $this->render('tpmathBundle:Default:fibo.html.twig');
    }

    function fiboPostAction(Request $request)
    {
        $response = [];
        if ($request->isMethod('Post'))
        {
            $nombre = $request->request->getInt('number');
            $response = $this->fibo($nombre);
        }

        return $this->render('tpmathBundle:Default:fibo.html.twig', array(
            'response' => $response
        ));
    }

    function factoAction()
    {
        return $this->render('tpmathBundle:Default:facto.html.twig');
    }

    function factoPostAction(Request $request)
    {
        $response = [];
        if ($request->isMethod('Post'))
        {
            $nombre = $request->request->getInt('number');
            $response = $this->fact($nombre);
        }

        return $this->render('tpmathBundle:Default:facto.html.twig', array(
            'response' => $response
        ));
    }

    function fact($num)
    {
        $res = 1;
        for ($n = $num; $n >= 1; $n--)
            $res = $res*$n;
        return $res;
    }

    function fibo($num)
    {
        for( $l = array(1,1), $i = 2, $x = 0; $i < $num; $i++ )
        {
            $l[] = $l[$x++] + $l[$x];
        }

        return $l;
    }
}
