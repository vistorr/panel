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
        $b = $request->query->get('b');
        
        $em = $this->getDoctrine()->getManager();
        
        $clientes = $em->getRepository('PanelCtrlwBundle:Clientes')->findBySearch($b);
        $novedades = $em->getRepository('PanelNovedadesBundle:Novedades')->findBySearch($b);
        $layout = 'resultados';
        
        if($request->query->get('wl')) $layout = 'index';
        return $this->render('PanelCtrlwBundle:Buscador:'.$layout.'.html.twig',array(
            'clientes' => $clientes,
            'novedades' => $novedades
        ));

    }
    
    
}
