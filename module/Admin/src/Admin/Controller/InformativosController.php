<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Zend\View\Model\ViewModel;
use Admin\Form\Informativo as Form;
use Admin\Validator\Informativo as InformativoValidator;
use Core\Form\Busca as BuscaForm;

class InformativosController extends ActionController
{
    public function indexAction()
    {   
        $form = new BuscaForm('Ṕesquise pelo título, descrição, ou texto');
        if ($this->getRequest()->isPost()) {
            $search = $this->getRequest()->getPost();
            $form->setData($search);
            if ($form->isValid()) {
                $values = $form->getData();
            }
        }
        $collection = new ArrayCollection($this->getService('Admin\Service\Informativo')->fetchAll($values));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                  ->setItemCountPerPage(10);
        
        return new ViewModel(array(
            'informativos' => $paginator,
            'form' => $form
        ));
    }
    
    public function novoAction()
    {
        $form = new Form($this->getObjectManager());
        $validacaoInformativo = new InformativoValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validacaoInformativo->getInputFilter());
            $form->setData(array_merge_recursive(
                $this->getRequest()->getPost()->toArray(), 
                $this->getRequest()->getFiles()->toArray()));
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Informativo')->saveInformativo($dados);
                    $this->flashMessenger()->addSuccessMessage('Informativo salvo com Sucesso.');
                } catch (\Exception $e) {
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
            $form->setData(array_merge_recursive(
                $this->getRequest()->getPost()->toArray(), 
                $this->getRequest()->getFiles()->toArray()));
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
        if($this->getRequest()->isPost()){
            $id = (int) $this->getRequest()->getPost()['id'];
            if ($id > 0) {
                try {
                    $this->getService('Admin\Service\Informativo')->delete($id);
                } catch (\Exception $ex) {
                    throw new Exception('Falha ao excluir registro');
                }
            }
            $this->redirect()->toUrl('/admin/informativos');
        }
    }
}
