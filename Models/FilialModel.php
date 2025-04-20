<?php
class FilialModel {
    private $idFilial;
    private $nomeFilial;
    private $endereco;
    private $email;
    private $livros=[];

    public function __construct($idFilial="", $nomeFilial="", $endereco="", $email=""){
        $this->idFilial = $idFilial;
        $this->nomeFilial = $nomeFilial;
        $this->endereco = $endereco;   
        $this->email = $email;  
    }

    public function getIdFilial()
    {
        return $this->idFilial;
    }
    public function setIdFilial($idFilial)
    {
        $this->idFilial = $idFilial;
    }

    public function getNomeFilial(){
		return $this->nomeFilial;
	}
	public function setNomeFilial($nomeFilial){
		$this->nomeFilial = $nomeFilial;
	}

    public function getEndereco()
    {
    return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEmail()
    {
    return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function addLivros($livro)
    {
        $this->livros[] = $livro;
    }

    public function toArray() {
        return [
            'idFilial' => $this->idFilial,
            'nomeFilial' => $this->nomeFilial,
            'endereco' => $this->endereco,
            'email' => $this->email,
        ];
    }

}



?>