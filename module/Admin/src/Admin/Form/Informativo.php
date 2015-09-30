<?php

namespace Admin\Form;

use Zend\Form\Form as Form;

class Informativo extends Form 
{

    public function __construct($em) 
    {
        parent::__construct('informativo');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'titulo',
            'type' => 'Text',
            'options' => array(
                'label' => 'Título',
            ),
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control input-lg',
                'placeholder' => 'Título do Informativo',
            ),
        ));

        $this->add(array(
            'name' => 'descricao',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Descrição',
            ),
            'attributes' => array(
                'id' => 'descricao',
                'class' => 'form-control input-lg',
                'placeholder' => 'Um breve resumo sobre o informativo',
            ),
        ));

        $this->add(array(
            'name' => 'texto',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Texto do Informativo',
            ),
            'attributes' => array(
                'id' => 'texto',
                'class' => 'form-control input-lg',
                'placeholder' => 'Descreva aqui seu informativo',
            ),
        ));

        $this->add(array(
            'name' => 'status',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => "Status",
                'empty_option' => 'Selecione',
                'object_manager' => $em,
                'target_class' => 'Admin\Model\Status',
                'property' => 'descricao',
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'status',
            ),
        ));

        $this->add(array(
            'type' => 'File',
            'name' => 'img',
            'options' => array(
                'label' => 'Imagem'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'img'
            )
        ));

        $this->add(array(
            'name' => 'salvar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success btn-block btn-sm',
            ),
        ));
    }

}
