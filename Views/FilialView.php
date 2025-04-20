<script src="<?php echo BASE_URL; ?>/assets/js/filial.js"></script>

	<!-- Mensagem de Sucesso -->
    <div class="box-body" id="alerta" style="display:none;" >
      <div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        Operação realizada com sucesso.
      </div>
    </div>
	
	<!-- Mensagem de Atenção -->
	<div class="box-body" id="alertaW" style="display:none;" >
      <div class="alert alert-warning alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Atenção!</h4>
        Preencha todos os campos.
      </div>
    </div>


    <section id="tituloFilial" class="content-titulo">
        <h2 class="titulo-cadastro">
            <img src= "<?php echo BASE_URL; ?>/assets/img/icone-filial.png" alt="Ícone" class="icone-titulo" />
             Cadastro de Filial
        </h2>
    </section>

    <section id="filial" class="content">
		<div class="row">
			<div class="col-xs-12">
                <!-- BOX PARA LOCALIZAR EDITORA -->
                <div class="box" id="boxLocalizar">
                    <!-- /buscar cabeçalho do box -->
                    <div class="box-header">
                        <div class="box-tools">
                            <div class="input-group input-group-sm col-md-3">
                                <input type="text" name="txtpesquisa" id= "txtpesquisa" class="form-control pull-right" placeholder="Busca">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default" onclick="Pesquisar()"><i class="fa fa-search"></i></button>
                                </div>
                            </div>				
                        </div>	
                    </div>
                    <!-- /adicionar rodapé do box -->
                    <div class="box-footer clearfix" >
                        <button type="button" id="adicionar" class="btn bg-purple" onclick="Adicionar()">Adicionar Filial</button>
                    </div>
                </div>
                <!-------------FIM BOX------------>

                <!-- FORMULÁRIO PARA CADASTRO DA FILIAL DA EDITORA -->
                <div class="box box-primary" id="boxCadastro" style="display: none;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nova Filial</h3>
                    </div>

                    <form id="formCadastroFilial" method="post">
                        <input type="hidden" id="acao" name="acao" value="" />
                        <input type="hidden" id="idRegistro" name="idRegistro" value="" />

                        <div class="box-body box-cadastro" id="formulario">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" id="salvar" onclick="Salvar()" >Salvar</button>
                            <button type="button" class="btn btn-warning" id="cancelar" onclick="Cancelar()">Cancelar</button>
                        </div>

                    </form>

                </div>
                <!----------FIM CADASTRO DE EDITORA-------->

                <!-- LISTAGEM DE EDITORAS PARA CADASTRO DE EDITORA -->
                <div id="dados-filial" data-filial='<?php echo $dados; ?>'></div>
            
                <div class="box">   
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOME EDITORA</th>
                                    <th>ENDEREÇO</th>
                                    <th>E-MAIL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>	
                            <tbody id="linhas">
                                <!-- espaço reservado para preenchimento da tabela com os registros -->
                            </tbody>			
                        </table>  
                    </div>
                </div>		  
                <!--------------FIM DA LISTAGEM DE EDITORAS---------->

			</div>
		</div>
    </section>





