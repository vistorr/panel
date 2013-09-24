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
            ->add('titulo',null,array('attr'=> array('style' => 'width:450px')))
            ->add('resumen', 'genemu_tinymce',array('configs' => array('max_width' => '200', 'menubar' => false, 'width' => 550,'clear' => 'both')))
            ->add('cuerpo', 'genemu_tinymce',array('configs' => array('max_width' => '200', 'menubar' => false, 'width' => 550,'clear' => 'both')))
            ->add('created_at', 'date',array(
                    'input'  => 'timestamp',
                    'widget' => 'choice',
                    'format' => 'dd-MM-yyyy',
                    'label'  => 'Fecha Publicación'
                ));
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