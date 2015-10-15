<?php

namespace Admin\Form;

use Zend\Form\Form as Form;

class Galeria extends Form 
{

    public function __construct($em) 
    {
        parent::__construct('galeria');
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
                'label' => 'Título do Álbum',
            ),
            'attributes' => array(
                'id' => 'titulo',
                'class' => 'form-control input-lg',
                'placeholder' => 'Título do Álbum',
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
                'label' => 'Capa do Álbum',
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
