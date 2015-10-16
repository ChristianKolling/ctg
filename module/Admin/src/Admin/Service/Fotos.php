<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Fotos as ModelFotos;

class Fotos extends Service {

    public function fetchAll($search = null) {
        $query = $this->getObjectManager()->createQueryBuilder()
                ->select('Fotos.id', 'Fotos.imagem', 'Fotos.extensao', 'Galeria.id as id_galeria', 'Galeria.titulo')
                ->from('Admin\Model\Fotos', 'Fotos')
                ->join('Fotos.galeria', 'Galeria')
                ->where('Galeria.id LIKE ?1')
                ->setParameter(1, "%" . $search['search'] . "%");
        return $query->getQuery()->getResult();
    }

    public function saveFotos($values, $id) {
        foreach ($values['imagem'] as $item) {
            $fotos = new ModelFotos();
            $imagem = explode('.', $item['tmp_name']);
            $fotos->setImagem(str_replace('public', '', $imagem[0]));
            $fotos->setExtensao($imagem[1]);
            $fotos->setGaleria($id);
            $this->getObjectManager()->persist($fotos);
            try {
                $this->getObjectManager()->flush();
            } catch (\Exception $ex) {
                var_dump($ex->getMessage());
                throw new \Exception('Erro ao cadastrar fotos');
            }
        }
    }

}
