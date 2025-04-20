<?php
require_once 'Conexao.php';

class FilialDAO{
    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    private function carregarObjeto($item)
    {
        $obj = new FilialModel();
		$obj->setIdFilial($item['id_filial']);
		$obj->setNomeFilial($item['nome']);
		$obj->setEndereco($item['endereco']);
        $obj->setEmail($item['email']);

		return $obj;
    }

    public function listar()
    {
        $dados = array();
        $qry = $this->con->query('select * from filial');
        $dados = $qry->fetchall(PDO::FETCH_ASSOC);

        $listaObjs = array();
        foreach($dados as $dado)
        {
            $listaObjs[] = $this->carregarObjeto($dado);
        }

        return $listaObjs;
    }

    public function inserir($obj)
    {
        $qry = $this->con->prepare('INSERT INTO filial (nome, endereco, email) VALUES (:nome, :endereco, :email)' );
        // Passa os parametros para a query 
        $qry->bindValue(':nome',     $obj->getNomeFilial());
        $qry->bindValue(':endereco', $obj->getEndereco()); 
        $qry->bindValue(':email',    $obj->getEmail());   
        $qry->execute();
    }

    public function retornar($id)
    {
        $qry = $this->con->query('select * from filial where id_filial='.$id);
        $dado = $qry->fetch(PDO::FETCH_ASSOC);
        $obj = $this->carregarObjeto($dado);
        return $obj;
    }

    public function atualizar($obj) 
    {
        $qry = $this->con->prepare('UPDATE filial SET nome= :nome, endereco= :endereco, email= :email WHERE id_filial =:id');

        $qry->bindValue(':nome',        $obj->getNomeFilial());   
        $qry->bindValue(':endereco',    $obj->getEndereco());
        $qry->bindValue(':email',       $obj->getEmail());
        $qry->bindValue(':id',          $obj->getIdFilial());
        $qry->execute();
    }

    public function deletar($id)
    {
        $qry = $this->con->prepare('DELETE FROM filial WHERE id_filial =:id');
        $qry->bindValue(':id', $id);
        $qry->execute();
    }

    public function buscar($parametro)
    {
        $dados = array();
        $paramNumero = '';
        if (is_numeric($parametro)) {
            $paramNumero = ' id_filial = ' . $parametro . ' OR';
        }
        $paramLike = ' "%' . $parametro . '%" ';

        $qry = $this->con->query('SELECT * from filial WHERE'
                                . $paramNumero 
                                . ' nome like ' . $paramLike 
                                . ' OR email like ' . $paramLike 
                                . ' OR endereco like ' . $paramLike );

        $dados = $qry->fetchall(PDO::FETCH_ASSOC);
        $listaFilials = array();
        foreach($dados as $dado)
        {
            $listaFilials[] = $this->carregarObjeto($dado);
        }
        return $listaFilials;
    }

}



?>