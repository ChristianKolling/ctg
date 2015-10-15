<?php

namespace Admin\Form;

use Zend\Form\Form as Form;

class Banner extends Form 
{

    public function __construct($em) 
    {
        parent::__construct('banner');
        $this->setAttribute('method', 'post');
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
                'placeholder' => 'Título do Banner',
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
                'placeholder' => 'Uma breve descrição sobre o banner',
            ),
        ));

        $this->add(array(
            'name' => 'texto',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Texto',
            ),
            'attributes' => array(
                'id' => 'texto',
                'class' => 'form-control input-lg',
                'placeholder' => 'Descreva sobre o banner',
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
                'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'status',
            ),
        ));

        $this->add(array(
            'name' => 'imagem',
            'options' => array(
                'label' => ' ',
            ),
            'type' => 'file',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'imagem',
            ),
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
