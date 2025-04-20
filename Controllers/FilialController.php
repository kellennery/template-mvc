<?php
class FilialController extends Controller{

    public function index(){
        // $this->carregarEstrutura('FilialView');
        $this->listarTodos();
    }

    public function listarTodos()
    {
        $daoFilial = new FilialDAO();
        $dados = $daoFilial->listar();

        $dadosArray = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);
        $dadosJson = json_encode($dadosArray);

        $this->carregarEstrutura('FilialView', $dadosJson);        

    }

    public function visualizar(){
        $id = $_POST['id'];
        $daoFilial = new FilialDAO();
        $dado = $daoFilial->retornar($id);
        $dadoArray = $dado->toArray();
        $dadoJson = json_encode($dadoArray);
        echo $dadoJson; 
    }

    public function alterar(){
        $id = $_POST['id'];
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $obj = new FilialModel();
        $obj->setIdFilial($id);
        $obj->setNomeFilial($nome);
        $obj->setEndereco($endereco);
        $obj->setEmail($email);

        $daoFilial = new FilialDAO();
        $daoFilial->atualizar($obj);

    }
    
    public function excluir(){
        $id = $_POST['id'];
        $daoFilial = new FilialDAO();
        $daoFilial->deletar($id);
    }
    
    public function incluir()
    {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $objFilial = new FilialModel();
        $objFilial->setNomeFilial($nome);
        $objFilial->setEndereco($endereco);
        $objFilial->setEmail($email);

        $daoFilial = new FilialDAO();
        $daoFilial->inserir($objFilial);
    }

    public function pesquisar()
    {
        $filtro = $_POST['pesquisa'];

        $daoFilial = new FilialDAO();
        $dados = $daoFilial->buscar($filtro);

        $dadosArray = array_map(function($obj) {
            return $obj->toArray();
        }, $dados);

        $dadosJson = json_encode($dadosArray);
        echo $dadosJson;
    }

}





?>