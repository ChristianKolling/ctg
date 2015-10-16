<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fotos")
 */
class Fotos {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $imagem;

    /**
     * @ORM\Column(type="string")
     */
    protected $extensao;

    /**
     * @ORM\ManyToOne(targetEntity="Galeria")
     * @ORM\JoinColumn(name="galeria", referencedColumnName="id")
     * 
     */
    protected $galeria;

    function getId() {
        return $this->id;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getExtensao() {
        return $this->extensao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setExtensao($extensao) {
        $this->extensao = $extensao;
    }

    function getGaleria() {
        return $this->galeria;
    }

    function setGaleria($galeria) {
        $this->galeria = $galeria;
    }

}
