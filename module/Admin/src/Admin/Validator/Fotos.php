<?php

namespace Admin\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Fotos {

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
                                    'target' => 'public/uploads/galeria',
                                    'randomize' => true,
                                    'use_upload_extension' => true,
                                    'use_upload_name' => true
                                )
                            )
                        )
                    ))
            );

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
