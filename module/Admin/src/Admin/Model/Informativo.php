<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="informativo")
 */
class Informativo
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
     * @ORM\Column(type="string", length=500)
     * 
     */
    protected $descricao;
    
    /**
     * @ORM\Column(type="string", length=1500)
     * 
     */
    protected $texto;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $cadastro;
    
    /**
     * @ORM\Column(type="string", length=500)
     * 
     */
    protected $img;

    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     * 
     */
    protected $status;    

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getTexto() {
        return $this->texto;
    }

    function getCadastro() {
        return $this->cadastro;
    }

    function getImg() {
        return $this->img;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setCadastro($cadastro) {
        $this->cadastro = $cadastro;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}