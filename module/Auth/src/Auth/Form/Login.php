<?php

namespace Auth\Form;

use Zend\Form\Form as Form;

class Login extends Form 
{
    public function __construct() 
    {
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => 'Endereço de E-mail',
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'nome@dominio.com.br',
            ),
        ));

        $this->add(array(
            'name' => 'senha',
            'type' => 'Password',
            'options' => array(
                'label' => 'Sua Senha',
            ),
            'attributes' => array(
                'id' => 'senha',
                'class' => 'form-control',
                'placeholder' => '******',
            ),
        ));

        $this->add(array(
            'name' => 'entrar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn btn-success',
            ),
        ));
    }

}
