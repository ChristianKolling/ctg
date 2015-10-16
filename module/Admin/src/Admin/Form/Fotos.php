<?php

namespace Admin\Form;

use Zend\Form\Form as Form;

class Fotos extends Form 
{

    public function __construct() 
    {
        parent::__construct('fotos');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'imagem',
            'options' => array(
                'label' => 'Fotos para publicar neste álbum',
            ),
            'type' => 'file',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'imagem',
                'multiple' => true
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
