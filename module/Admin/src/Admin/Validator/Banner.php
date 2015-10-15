<?php

namespace Admin\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Banner {

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
                                'options' => array('message' => 'Qual o título do banner?')
                            ),
                        ),
            )));

            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'status',
                        'required' => true,
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Opção não selecionada')
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
                                'options' => array('message' => 'Descreva este banner')
                            ),
                        ),
            )));

            $inputFilter->add(
                    $inputFactory->createInput(array(
                        'name' => 'imagem',
                        'required' => true,
                        'validators' => array(
                            array(
                                'name' => 'Zend\Validator\File\UploadFile',
                                'options' => array(
                                    'messages' => array(
                                        'fileUploadFileErrorNoFile' => 'Arquivo não foi carregado',
                                    )
                                )
                            ),
                            array(
                                'name' => 'Zend\Validator\File\Extension',
                                'options' => array(
                                    'extension' => 'png,jpg',
                                    'messages' => array(
                                        'fileExtensionNotFound' => 'Extensão de arquivo não encontrada',
                                        'fileExtensionFalse' => 'Extensão não permitida'
                                    ),
                                ),
                            ),
                        ),
                        'filters' => array(
                            array(
                                'name' => 'Zend\Filter\File\RenameUpload',
                                'options' => array(
                                    'target' => 'public/uploads/banners',
                                    'randomize' => true,
                                    'use_upload_extension' => true,
                                    'use_upload_name' => true
                                )
                            )
                        )
                    ))
            );

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
                                'options' => array('message' => 'Comente sobre este banner')
                            ),
                        ),
            )));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
