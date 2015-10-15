<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Core\Form\Busca as BuscaForm;
use Admin\Form\Banner as Form;
use Admin\Validator\Banner as BannerValidator;

class BannersController extends ActionController {

    public function indexAction() {
        $form = new BuscaForm('Pesquise por um banner');
        if ($this->getRequest()->isPost()) {
            $search = $this->getRequest()->getPost();
            $form->setData($search);
            if ($form->isValid()) {
                $values = $form->getData();
            }
        }
        $collection = new ArrayCollection($this->getService('Admin\Service\Banner')->fetchAll($values));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                ->setItemCountPerPage(10);

        return new ViewModel(array('form' => $form, 'banners' => $paginator));
    }

    public function novoAction() {
        $form = new Form($this->getObjectManager());
        $validacaoBanner = new BannerValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validacaoBanner->getInputFilter());
            $form->setData(array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), 
                    $this->getRequest()->getFiles()->toArray())
                );
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Banner')->saveBanner($dados);
                    $this->flashMessenger()->addSuccessMessage('Banner salvo com Sucesso.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Erro ao salvar Banner, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/banners');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function editarAction() {
        $form = new Form($this->getObjectManager());
        $id = (int) $this->params()->fromRoute('id', 0);

        if ($id > 0) {
            $form = $this->getService('Admin\Service\Banner')->populate($id, $form);
        }
        $validacaoBanner = new BannerValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validacaoBanner->getInputFilter());
            $form->setData(array_merge_recursive(
                $this->getRequest()->getPost()->toArray(), 
                $this->getRequest()->getFiles()->toArray()));
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Banner')->saveBanner($dados);
                    $this->flashMessenger()->addSuccessMessage('Banner alterado com Sucesso.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Erro ao alterar Banner, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/banners');
            }
            var_dump($form->getMessages());
            exit;
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }

}
