<?php

namespace DCS\Form\GeoFormFieldBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class GeocodeType extends AbstractType
{
    /**
     * @var array
     */
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (null !== $options['config'] && array_key_exists($options['config'], $this->config['configs'])) {
            $options = array_merge($options, $this->config['configs'][$options['config']]);
        }

        $view->vars = array_merge($view->vars, $options);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'config'            => null,
            'callback'          => $this->config['default']['callback'],
            'callbackWhenEmpty' => $this->config['default']['callbackWhenEmpty'],
            'loadGoogle'        => $this->config['default']['loadGoogle'],
            'apiKey'            => $this->config['default']['apiKey'],
            'preventEnter'      => $this->config['default']['preventEnter'],
            'language'          => $this->config['default']['language'],
        ));

        $resolver->setAllowedTypes(array(
            'config'            => array('string', 'null'),
            'callback'          => array('string', 'null'),
            'callbackWhenEmpty' => array('string', 'null'),
            'loadGoogle'        => 'bool',
            'apiKey'            => array('string', 'null'),
            'preventEnter'      => 'bool',
            'language'          => 'string',
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'geocode';
    }
}