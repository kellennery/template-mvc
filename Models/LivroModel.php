<?php

class LivroModel {

    private $idLivro;
    private $isbn;
    private $titulo;
    private $anoPublicacao;
    private $filial;

    public function __construct($idLivro="", $isbn="", $titulo="", $anoPublicacao="", $filial = null) {
        $this->idLivro = $idLivro;
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anoPublicacao = $anoPublicacao;
        // Se $filial for null, cria uma nova instância de FilialModel
        if ($filial !== null) {
            $this->filial = $this->setFilial($filial);
        } else {
            $this->filial = new FilialModel();
        }
    }

    public function getIdLivro(){
        return $this->idLivro;
    }
    public function setIdLivro($idLivro){
        $this->idLivro = $idLivro;
    }

    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAnoPublicacao(){
        return $this->anoPublicacao;
    }
    public function setAnoPublicacao($anoPublicacao){
        $this->anoPublicacao = $anoPublicacao;
    }

    public function getFilial(){
        return $this->filial;
    }
    public function setFilial($filial){
        $this->filial = $filial;
        if ($filial !== null && !empty($filial))
            $filial->addLivros($this);
    }

    public function toArray() {
        return [
            'idLivro' => $this->idLivro,
            'isbn' => $this->isbn,
            'titulo' => $this->titulo,
            'anoPublicacao' => $this->anoPublicacao
        ];
    }


}




?>