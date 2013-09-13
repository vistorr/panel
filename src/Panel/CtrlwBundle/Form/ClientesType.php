<?php

namespace Panel\CtrlwBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apenom', null, array('label' => 'Apellido y Nombre'))
            ->add('cuit', null, array('label' => 'C.U.I.T.'))
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('direccion', null, array('label' => 'Dirección'))
            ->add('email', null, array('label' => 'E-mail'))
            ->add('tipoIva', null, array('label' => 'Tipo de Iva'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panel\CtrlwBundle\Entity\Clientes'
        ));
    }

    public function getName()
    {
        return 'panel_ctrlwbundle_clientestype';
    }
}
