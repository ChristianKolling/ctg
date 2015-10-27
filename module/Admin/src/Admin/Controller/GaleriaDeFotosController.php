<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Core\Form\Busca as BuscaForm;
use Zend\View\Model\ViewModel;
use Admin\Form\Galeria as Form;
use Admin\Validator\Galeria as GaleriaValidaor;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Admin\Form\Fotos as FotosForm;
use Admin\Validator\Fotos as FotosValidator;

class GaleriaDeFotosController extends ActionController {

    public function indexAction() {
        $form = new BuscaForm('Pesquisar por álbuns');
        if ($this->getRequest()->isPost()) {
            $search = $this->getRequest()->getPost();
            $form->setData($search);
            if ($form->isValid()) {
                $values = $form->getData();
            }
        }
        $collection = new ArrayCollection($this->getService('Admin\Service\Galeria')->fetchAll($values));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                ->setItemCountPerPage(8);
        return new ViewModel(array(
            'form' => $form,
            'galeria' => $paginator
        ));
    }

    public function adicionarAlbumAction() {
        $form = new Form($this->getObjectManager());
        $fotosValidator = new GaleriaValidaor();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($fotosValidator->getInputFilter());
            $form->setData(array_merge_recursive(
                            $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray())
            );
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Galeria')->saveGaleria($dados);
                    $this->flashMessenger()->addSuccessMessage('Álbum criado com Sucesso.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Erro ao criar álbum, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/galeria-de-fotos');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function publicarAction() {
        $form = new FotosForm();
        $id = (int) $this->params()->fromRoute('id', 0);
        $fotosValidator = new FotosValidator();
        $request = $this->getRequest();
        $album = $this->getObjectManager()->find('Admin\Model\Galeria', $id);
        $collection = new ArrayCollection($this->getService('Admin\Service\Fotos')->fetchAll($id));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                ->setItemCountPerPage(12);
        if (!$album) {
            $this->redirect()->toUrl('/admin/galeria-de-fotos');
            $this->flashMessenger()->addErrorMessage('Álbum não localizado');
        }
        if ($request->isPost()) {
            $form->setInputFilter($fotosValidator->getInputFilter());
            $form->setData(array_merge_recursive(
                            $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray())
            );
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Fotos')->saveFotos($dados, $album);
                    $this->flashMessenger()->addSuccessMessage('Fotos Publicadas com Sucesso.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Erro ao publicar fotos, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/galeria-de-fotos');
            }
        }
        return new ViewModel(array(
            'form' => $form,
            'fotos' => $collection
        ));
    }

    public function excluirFotoAction() {
        $idalbum = $this->params()->fromRoute('id',0);
        if ($this->getRequest()->isXmlHttpRequest()) {
            $data = $this->getRequest()->getPost();
            $id = (int) $data['id'];
            $foto = $this->getObjectManager()->getRepository('Admin\Model\Fotos')
                    ->findOneBy(array(
                'id' => $id
            ));
            $arquivo = 'public/'.$foto->getImagem().'.'.$foto->getExtensao();
            unlink($arquivo);
            $this->getObjectManager()->remove($foto);
            try {
                $this->getObjectManager()->flush();
            } catch (\Exception $ex) {
                throw new Exception('Falha ao excluir registro');
            }
            $this->redirect()->toUrl('/admin/galeria-de-fotos/'.$idalbum);
        }
    }

}
