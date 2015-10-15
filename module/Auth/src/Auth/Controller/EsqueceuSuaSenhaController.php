<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Auth\Form\RecuperarSenha as Form;

class EsqueceuSuaSenhaController extends AbstractActionController
{
    public function recuperarSenhaAction()
    {   
        $form = new Form();
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
