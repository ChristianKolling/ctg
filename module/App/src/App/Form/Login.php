<?php

namespace App\Form;

use Zend\Form\Form as Form;

class Login extends Form {

    public function __construct() {
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
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control input-lg',
                'placeholder' => 'E-mail',
            ),
        ));
        
        $this->add(array(
            'name' => 'senha',
            'type' => 'Password',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'password',
                'class' => 'form-control input-lg',
                'placeholder' => 'Sua Senha',
            ),
        ));
        
        $this->add(array(
            'name' => 'login',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn btn-success',
                'id' => 'login'
            ),
        ));
    }

}
