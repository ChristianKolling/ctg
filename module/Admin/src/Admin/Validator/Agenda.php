<?php

namespace Admin\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Agenda {

    protected $inputFilter;

    public function getInputFilter() {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFactory = new InputFactory();

            $inputFilter->add($inputFactory->createInput(
                            array(
                                'name' => 'id',
                                'required' => false,
                                'filters' => array(
                                    array('name' => 'Int'),
                                ),
                            )
                    )
            );

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'nome-evento',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Dê um nome ao evento')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'local',
                        'required' => true,
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Qual o local de realização?')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'data',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Qual a data do evento?')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'status',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Um status deve ser Selecionado')
                            ),
                        ),
            )));
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'horario',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Horário que o evento terá início')
                            ),
                        ),
            )));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
