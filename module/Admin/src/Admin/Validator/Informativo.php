<?php

namespace Admin\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Informativo 
{
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
                        'name' => 'titulo',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Qual o título do informativo?')
                            ),
                        ),
            )));
           
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'descricao',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Descreva este informativo')
                            ),
                        ),
            )));
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'texto',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Comente sobre este informativo')
                            ),
                        ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
