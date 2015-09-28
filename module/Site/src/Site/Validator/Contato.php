<?php

namespace Site\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Contato 
{

    protected $inputFilter;

    public function getInputFilter() 
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFactory = new InputFactory();

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'nome',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Informe seu nome')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'cidade',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Informe sua cidade')
                            ),
                        ),
            )));
            
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'email',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Informe seu endereço de e-mail')
                            ),
                                array(
                                'name' => 'EmailAddress',
                                'options' => array('message' => 'E-mail inválido')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'telefone',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Informe seu telefone')
                            ),
                        ),
            )));
            
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'mensagem',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Deixe a sua mensagem')
                            ),
                        ),
            )));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
