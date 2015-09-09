<?php

namespace App\Form;

use Zend\Form\Form as Form;

class Cadastro extends Form {

    public function __construct() {
        parent::__construct('cadastro');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        
        $this->add(array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'nome',
                'class' => 'form-control input-lg',
                'placeholder' => 'Seu Nome',
            ),
        ));
       
        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'email-cadastro',
                'class' => 'form-control input-lg',
                'placeholder' => 'Seu E-mail',
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
            'name' => 'confirmarsenha',
            'type' => 'Password',
            'options' => array(
                'label' => ' ',
            ),
            'attributes' => array(
                'id' => 'confirm-password',
                'class' => 'form-control input-lg',
                'placeholder' => 'Confirme sua Senha',
            ),
        ));

        $this->add(array(
            'name' => 'cadastro',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Registrar-se',
                'class' => 'form-control btn-primary',
            ),
        ));
    }
    
}
