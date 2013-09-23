<?php

namespace Panel\NovedadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NovedadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('resumen')
            ->add('cuerpo')
            ->add('created_at','genemu_jquerydate',array('label'=> 'Fecha','widget' => 'single_text','format'=>'dd/MM/yyyy'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panel\NovedadesBundle\Entity\Novedades'
        ));
    }

    public function getName()
    {
        return 'panel_novedadesbundle_novedadestype';
    }
}