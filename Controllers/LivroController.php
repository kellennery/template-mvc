<?php
class LivroController extends Controller{

    public function index(){
        $this->carregarEstrutura('LivroView');
    }

    public function listarTodos()
    {

    }

    public function incluir()
    {

    }

    public function alterar()
    {

    }

    public function visualizar()
    {

    }

    public function excluir()
    {

    }

    public function pesquisar()
    {

    }

    public function listarLivros()
    {

        $daoLivro = new LivroDAO();
        $dados = $daoLivro->listar();

        $dadosArray = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);
        $dadosJson = json_encode($dadosArray);
        print_r($dadosJson); 
    }

}





?>