<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="galeria")
 */
class Galeria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     * 
     */
    protected $titulo;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $cadastro;
   
    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     * 
     */
    protected $status;    

    /**
     * @ORM\Column(type="string")
     */
    protected $imagem;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $extensao;
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getCadastro() {
        return $this->cadastro;
    }

    function getStatus() {
        return $this->status;
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

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setCadastro($cadastro) {
        $this->cadastro = $cadastro;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setExtensao($extensao) {
        $this->extensao = $extensao;
    }

}