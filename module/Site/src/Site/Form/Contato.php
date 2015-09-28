<?php

namespace Site\Form;

use Zend\Form\Form;

class Contato extends Form
{
    public function __construct() 
    {
        parent::__construct('contato');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');
        $this->setAttribute('class', 'wpcf7-form');

        $this->add(array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'nome',
                'class' => 'large_cont',
                'placeholder' => 'Nome',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'large_cont',
                'placeholder' => 'E-mail',
            ),
        ));

        $this->add(array(
            'name' => 'cidade',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'cidade',
                'class' => 'small_cont',
                'placeholder' => 'Chapecó'
            ),
        ));
        
        $this->add(array(
            'name' => 'telefone',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'telefone',
                'class' => 'small_cont',
                'placeholder' => '(00) 0000-0000',
            ),
        ));

        $this->add(array(
            'name' => 'mensagem',
            'type' => 'Textarea',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'mensagem',
                'placeholder' => 'Mensagem',
            ),
        ));


        $this->add(array(
            'name' => 'enviar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Enviar',
                'class' => 'submit',
            ),
        ));
    }
}
