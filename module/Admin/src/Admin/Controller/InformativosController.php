<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Zend\View\Model\ViewModel;
use Admin\Form\Informativo as Form;
use Admin\Validator\Informativo as InformativoValidator;

class InformativosController extends ActionController
{
    public function indexAction()
    {
        $collection = new ArrayCollection($this->getService('Admin\Service\Informativo')->fetchAll());
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                  ->setItemCountPerPage(10);
        return new ViewModel(array(
            'informativos' => $paginator
        ));
    }
    
    public function novoAction()
    {
        $form = new Form($this->getObjectManager());
        $validacaoInformativo = new InformativoValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validacaoInformativo->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Informativo')->saveInformativo($dados);
                    $this->flashMessenger()->addSuccessMessage('Informativo salvo com Sucesso.');
                } catch (\Exception $e) {
                    die($e->getMessage());exit;
                    $this->flashMessenger()->addErrorMessage('Erro ao salvar informativo, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/informativos');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function editarAction()
    {
        $form = new Form($this->getObjectManager());
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($id > 0){
            $form = $this->getService('Admin\Service\Informativo')->populate($id,$form);
        }
        $validacaoInformativo = new InformativoValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validacaoInformativo->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Informativo')->saveInformativo($dados);
                    $this->flashMessenger()->addSuccessMessage('Informativo alterado com Sucesso.');
                } catch (\Exception $e) {
                    die($e->getMessage());exit;
                    $this->flashMessenger()->addErrorMessage('Erro ao alterar informativo, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/informativos');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function deletarAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        
        if($id > 0){
            try {
                $this->getService('Admin\Service\Informativo')->delete($id);
                $this->flashMessenger()->addSuccessMessage('Informativo deletado com Sucesso.');   
            } catch (\Exception $ex) {
                $this->flashMessenger()->addErrorMessage('O Informativo não pode ser deletado.');
            }
        }
        $this->redirect()->toUrl('/admin/informativos');
    }
}
