<?php

namespace Auth\Form;

use Zend\Form\Form as Form;

class RecuperarSenha extends Form 
{
    public function __construct() 
    {
        parent::__construct('recuperar-senha');
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
                'label' => '',
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'nome@dominio.com.br',
            ),
        ));
        
        $this->add(array(
            'name' => 'recuperar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Recuperar Senha',
                'class' => 'btn btn-success',
            ),
        ));
    }

}
