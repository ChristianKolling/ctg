<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Banner as Model;

class Banner extends Service {

    public function fetchAll($search = null) {
        $select = $this->getObjectManager()->createQueryBuilder()
                ->select('Banner.id', 'Banner.titulo', 'Banner.descricao as descbanner', 'Banner.texto', 'Status.descricao', 'Status.id as status', 'Banner.imagem', 'Banner.extensao')
                ->from('Admin\Model\Banner', 'Banner')
                ->join('Banner.status', 'Status')
                ->where('Banner.titulo LIKE ?1 OR Banner.descricao LIKE ?1 OR Banner.texto LIKE ?1')
                ->setParameter(1, "%" . $search['search'] . "%");
        return $select->getQuery()->getResult();
    }

    public function saveBanner($values) {
        if ($values['id'] != 0) {
            $Banner = $this->getObjectmanager()->find('Admin\Model\Banner', $values['id']);
        } else {
            $Banner = new Model();
        }
        $imagem = explode('.', $values['imagem']['tmp_name']);
        $Banner->setTitulo($values['titulo']);
        $Banner->setTexto($values['texto']);
        $Banner->setStatus($this->getObjectManager()->find('Admin\Model\Status', $values['status']));
        $Banner->setDescricao($values['descricao']);
        $Banner->setImagem(str_replace('public', '', $imagem[0]));
        $Banner->setExtensao($imagem[1]);
        $this->getObjectManager()->persist($Banner);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Erro ao cadastrar banner');
        }
    }
    
    public function delete($id) {
        $Banner = $this->getObjectManager()->find('Admin\Model\Bannerormativo', $id);
        $this->getObjectManager()->remove($Banner);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('O registro não pode ser excluido, por favor tente mais tarde.');
        }
    }

    public function populate($id, $form) {
        $banne = $this->getObjectManager()->find('Admin\Model\Banner', $id);
        
        $form->get('id')->setValue($banne->getId());
        $form->get('titulo')->setValue($banne->getTitulo());
        $form->get('descricao')->setValue($banne->getDescricao());
        $form->get('texto')->setValue($banne->getTexto());
        $form->get('status')->setValue($banne->getStatus());
        $form->get('imagem')->setValue('teste');
        return $form;
    }

}
