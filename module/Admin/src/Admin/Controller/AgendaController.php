<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Zend\View\Model\ViewModel;
use Admin\Form\Agenda as Form;
use Admin\Validator\Agenda as AgendaValidator;
use Core\Form\Busca as BuscaForm;

class AgendaController extends ActionController
{
    public function indexAction() 
    {
        $form = new BuscaForm('Pesquise por nome do evento ou local');
        if ($this->getRequest()->isPost()) {
            $search = $this->getRequest()->getPost();
            $form->setData($search);
            if ($form->isValid()) {
                $values = $form->getData();
            }
        }
        $collection = new ArrayCollection($this->getService('Admin\Service\Agenda')->fetchAll($values));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                  ->setItemCountPerPage(10);
        return new ViewModel(array(
            'agenda' => $paginator,
            'form' => $form
        ));
    }
    
    public function novoAction()
    {
        $form = new Form($this->getObjectManager());
        $validacaoAgenda = new AgendaValidator();
        if($this->getRequest()->isPost()){
            $form->setInputFilter($validacaoAgenda->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if($form->isValid()){
                $values = $form->getData();
                try {
                    $this->getService('Admin\Service\Agenda')->saveAgenda($values);
                    $this->flashMessenger()->addSuccessMessage('Evento agendado com Sucesso.');
                } catch (\Exception $ex) {
                    $this->flashMessenger()->addErrorMessage('Erro ao agendar Evento.');
                }
                $this->redirect()->toUrl('/admin/agenda');
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
            $form = $this->getService('Admin\Service\Agenda')->populate($id,$form);
        }
        $validacaoAgenda = new AgendaValidator();
        if ($this->getRequest()->isPost()) {
            $form->setInputFilter($validacaoAgenda->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $values = $form->getData();
                try {
                    $this->getService('Admin\Service\Agenda')->saveAgenda($values);
                    $this->flashMessenger()->addSuccessMessage('Evento alterado com Sucesso.');
                } catch (\Exception $ex) {
                    $this->flashMessenger()->addErrorMessage('Erro ao alterar Evento.');
                }
                $this->redirect()->toUrl('/admin/agenda');
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
            if($id > 0){
                try {
                    $this->getService('Admin\Service\Agenda')->delete($id);
                    $this->flashMessenger()->addSuccessMessage('Evento deletado com Sucesso.');
                } catch (\Exception $ex) {
                    $this->flashMessenger()->addErrorMessage('O Evento não pode ser deletado.');
                }
            }
        }
    }
}