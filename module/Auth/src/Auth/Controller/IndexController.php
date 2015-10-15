<?php

namespace Auth\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Auth\Form\Login as Form;
use Auth\Validator\Index as Validacao;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $form = new Form();
        $validacao = new Validacao();
        if ($this->getRequest()->isPost()) {
            $form->setInputFilter($validacao->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Auth\Service\Index')->authenticate($dados);
                    return $this->redirect()->toUrl('/admin');
                } catch (\Exception $ex) {
                    $this->flashMessenger()->addErrorMessage($ex->getMessage());
                }
                return $this->redirect()->toUrl('/auth');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
