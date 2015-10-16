<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Galeria as Model;

class Galeria extends Service {

    public function fetchAll($search = null) {
        $query = $this->getObjectManager()->createQueryBuilder()
                ->select('Galeria.id', 'Galeria.titulo', 'Status.id as idstatus', 'Status.descricao', 'Galeria.imagem', 'Galeria.extensao', 'Galeria.cadastro')
                ->from('Admin\Model\Galeria', 'Galeria')
                ->join('Galeria.status', 'Status');
        return $query->getQuery()->getResult();
    }

    public function saveGaleria($values) {
        if ($values['id'] != 0) {
            $galeria = $this->getObjectmanager()->find('Admin\Model\Galeria', $values['id']);
        } else {
            $galeria = new Model();
        }
        $imagem = explode('.', $values['imagem']['tmp_name']);
        $galeria->setTitulo($values['titulo']);
        $galeria->setStatus($this->getObjectManager()->find('Admin\Model\Status', $values['status']));
        $galeria->setCadastro(new \DateTime('now'));
        $galeria->setImagem(str_replace('public', '', $imagem[0]));
        $galeria->setExtensao($imagem[1]);
        $this->getObjectManager()->persist($galeria);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Erro ao cadastrar álbum');
        }
    }
}
