<?php

namespace Admin\Form;

use Zend\Form\Form as Form;

class Agenda extends Form 
{

    public function __construct($em) 
    {
        parent::__construct('agenda');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'name' => 'nome-evento',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome do Evento',
            ),
            'attributes' => array(
                'id' => 'nome-evento',
                'class' => 'form-control input-lg',
                'placeholder' => 'Ex: Acampamento Farroupilha 2015',
            ),
        ));

        $this->add(array(
            'name' => 'local',
            'type' => 'Text',
            'options' => array(
                'label' => 'Local de Realização',
            ),
            'attributes' => array(
                'id' => 'local',
                'class' => 'form-control input-lg',
                'placeholder' => 'Ex: CTG - Potro Sem Dono',
            ),
        ));

        $this->add(array(
            'name' => 'data',
            'type' => 'Text',
            'options' => array(
                'label' => 'Data de Realização',
            ),
            'attributes' => array(
                'id' => 'data-realizacao',
                'class' => 'form-control input-lg',
            ),
        ));
        
        $this->add(array(
            'name' => 'horario',
            'type' => 'Text',
            'options' => array(
                'label' => 'Horário de Início',
            ),
            'attributes' => array(
                'id' => 'horario',
                'class' => 'form-control input-lg',
                'placeholder' => '20:30h',
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
            'name' => 'salvar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success btn-block btn-sm',
            ),
        ));
    }

}
