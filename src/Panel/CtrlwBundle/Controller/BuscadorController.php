<?php

namespace Panel\CtrlwBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BuscadorController extends Controller
{
    /*
     * Muestra la caja de busqueda del sistema
     */
    public function searchAction()
    {
        return $this->render('PanelCtrlwBundle:Buscador:search.html.twig');
    }
    
    /**
     * Busca coincidencias en los objetos
     * @Route("resultados.html",name="resultados")
     */
    public function resultadosAction(Request $request)
    {
//        $b = $request->request->get('nStr');
//        
//        $em = $this->getDoctrine()->getManager();
//        
//        $clientes = $em->getRepository('PanelCtrlwBundle:Clientes')->findAll();
//        
//        return $this->render('PanelCtrlwBundle:Buscador:resultados.html.twig',array(
//            'clientes' => $clientes
//        ));

    }
    
    
}
