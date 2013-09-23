<?php

namespace Panel\NovedadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Panel\NovedadesBundle\Entity\Novedades;
use Panel\NovedadesBundle\Form\NovedadesType;

/**
 * Novedades controller.
 *
 * @Route("/novedades")
 */
class NovedadesController extends Controller
{
    /**
     * Lists all Novedades entities.
     *
     * @Route("/pagina/{page}.html", name="novedades")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page=1)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PanelNovedadesBundle:Novedades')->createQueryBuilder('m');
        
        $adapter = new DoctrineOrmAdapter($entities);
        
        $pager = new Pager(
            $adapter,
            array('page' => $page, 'limit' => 20));
            return $this->render('PanelNovedadesBundle:Novedades:index.html.twig',
            array('pager' => $pager)
        );
        
    }

    /**
     * Creates a new Novedades entity.
     *
     * @Route("/", name="novedades_create")
     * @Method("POST")
     * @Template("PanelNovedadesBundle:Novedades:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Novedades();
        $form = $this->createForm(new NovedadesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('novedades'));

        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Novedades entity.
     *
     * @Route("/new", name="novedades_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Novedades();
        $form   = $this->createForm(new NovedadesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Novedades entity.
     *
     * @Route("/{id}", name="novedades_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PanelNovedadesBundle:Novedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Novedades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Novedades entity.
     *
     * @Route("/{id}/edit", name="novedades_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PanelNovedadesBundle:Novedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Novedades entity.');
        }

        $editForm = $this->createForm(new NovedadesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Novedades entity.
     *
     * @Route("/{id}", name="novedades_update")
     * @Method("PUT")
     * @Template("PanelNovedadesBundle:Novedades:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PanelNovedadesBundle:Novedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Novedades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new NovedadesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('novedades_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('novedades'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Novedades entity.
     *
     * @Route("/{id}", name="novedades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PanelNovedadesBundle:Novedades')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Novedades entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('novedades'));
    }

    /**
     * Creates a form to delete a Novedades entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
