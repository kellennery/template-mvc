<?php
require_once 'Conexao.php';

class LivroDAO{
    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    private function carregarObjeto($item)
    {
        $obj = new LivroModel();
        $obj->setIdLivro($item['id_livro']);
        $obj->setIsbn($item['isbn']);
        $obj->setTitulo($item['titulo']);
        $obj->setAnoPublicacao($item['ano_publicacao']);
        return $obj;
    }

    public function listar()
    {
        $dados = array();
        $qry = $this->con->query('select * from livro');
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
        
          
    }

    public function retornar($id)
    {
        $qry = $this->con->query('select * from livro where id_livro='.$id);
        $dado = $qry->fetch(PDO::FETCH_ASSOC);
        $obj = $this->carregarObjeto($dado);
        return $obj;
    }

    public function atualizar($obj) 
    {
   
    }

    public function deletar($id)
    {
      
    }

    public function buscar($parametro)
    {
     
    }


}



?>