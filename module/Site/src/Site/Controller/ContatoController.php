<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;
use Site\Form\Contato;
use Site\Validator\Contato as ValidacaoContato;

class ContatoController extends ActionController
{
    public function indexAction()
    {
        $form = new Contato();
        $validacaoContato = new ValidacaoContato();
        if($this->getRequest()->isPost()){
            $form->setInputFilter($validacaoContato->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if($form->isValid()){
                $dados = $form->getData();
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
