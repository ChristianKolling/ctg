<?php

namespace App\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

use App\Form\Login as LoginForm;
use App\Form\EsqueceuSuaSenha as EsqueceuSuaSenhaForm;
use App\Form\Cadastro as CadastroForm;

use App\Validator\Cadastro as validacaoCadastro;

class IndexController extends ActionController
{
    public function indexAction()
    {   
        $form = new LoginForm();
        if($this->getRequest()->isPost()){
            $this->redirect()->toUrl('/main');
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function cadastreSeAction()
    {
        $form = new CadastroForm();
        $validacaoCadastro = new validacaoCadastro();
        $request = $this->getRequest();
        if($request->isPost()){
            $form->setInputFilter($validacaoCadastro->getInputFilter());
            $form->setData($request->getPost());
            if($form->isValid()){
                $dados = $form->getData();
                try {
                    $this->getService('App\Service\Usuario')->saveUsuario($dados);
                    $this->flashMessenger()->addSuccessMessage('Bem-Vindo a plataforma One, sua ferramenta online para integrações.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Houve um erro durante o cadastro, tente novamente mais tarde.');
                }
                return $this->redirect()->toUrl('/app');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function esqueceuSuaSenhaAction()
    {
        $form = new EsqueceuSuaSenhaForm();
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
