<?php

namespace App\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Cadastro 
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
                        'name' => 'nome',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Qual é seu nome?')
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
                                'options' => array('message' => 'Campo e-mail esta em branco')
                            ),
                            array(
                                'name' => 'EmailAddress',
                                'options' => array(
                                    'message' => 'E-mail Inválido'
                                ),
                            ),
                        ),
            )));
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'senha',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Escolha uma Senha')
                            ),
                        ),
            )));
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'confirmarsenha',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Confirme sua Senha')
                            ),
                        ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
