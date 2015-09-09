<?php

namespace Main\Form;

use Zend\Form\Form as Form;

class Usuario extends Form {

    public function __construct() {
        parent::__construct('usuario');
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
                'label' => 'Nome de Usuário',
            ),
            'attributes' => array(
                'id' => 'nome',
                'class' => 'form-control input-group-sm',
                'placeholder' => 'Seu Nome',
            ),
        ));
       
        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => 'Endereço de E-mail',
            ),
            'attributes' => array(
                'id' => 'email-cadastro',
                'class' => 'form-control input-group-sm',
                'placeholder' => 'Seu E-mail',
            ),
        ));
        
        $this->add(array(
            'name' => 'senha',
            'type' => 'Password',
            'options' => array(
                'label' => 'Senha',
            ),
            'attributes' => array(
                'id' => 'password',
                'class' => 'form-control input-group-sm',
                'placeholder' => 'Sua Senha',
            ),
        ));
        
        $this->add(array(
            'name' => 'confirmarsenha',
            'type' => 'Password',
            'options' => array(
                'label' => 'Confirmação da Senha',
            ),
            'attributes' => array(
                'id' => 'confirm-password',
                'class' => 'form-control input-group-sm',
                'placeholder' => 'Confirme sua Senha',
            ),
        ));
        
        $this->add(array(
            'name' => 'telefone',
            'type' => 'Text',
            'options' => array(
                'label' => 'Telefone para Contato',
            ),
            'attributes' => array(
                'id' => 'telefone',
                'class' => 'form-control input-group-sm',
                'placeholder' => '(00) 0000-0000',
            ),
        ));
        
        $this->add(array(
            'type' => 'Select',
            'name' => 'sexo',
            'options' => array(
                'label' => ' ',
                'value_options' => array(
                    '1' => 'Masculino',
                    '2' => 'Feminino',
                ),
            ),
            'attributes' => array(
                'id' => 'sexo',
                'class' => 'form-control input-group-sm',
            ),
        ));
        
        $this->add(array(
            'name' => 'salvar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => ' btn btn-primary btn-block btn-sm',
            ),
        ));
    }
    
}
