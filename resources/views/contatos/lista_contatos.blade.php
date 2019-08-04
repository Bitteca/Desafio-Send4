@extends('layouts.app')

@section('conteudo')
        <div class="col-sm-9">
	    	<div class="container px-4 mt-4">
	    	    <div class="row">
	    		    <div class="col">
                        <h4 class="">Lista de Contatos</h4>
                        <table class="table table-hover" id="listaContatos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <button class="btn btn-success float-right" role="button" onClick="novoContato()">Novo Contato</button>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="dlgContatos">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="formContatos">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Contato</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label>Nome:</label>
                                <input name="nome" id="nome" type="text" class="form-control">

                                <label>Sobrenome:</label>
                                <input name="sobrenome" id="sobrenome" type="text" class="form-control">

                                <label>Email:</label>
                                <input name="email" id="email" type="email" class="form-control">

                                <label>Telefone</label>
                                <input type="tel" id="telefone" name="telefone" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function novoContato(){
            $('#id').val('');
            $('#nome').val('');
            $('#sobrenome').val('');
            $('#email').val('');
            $('#telefone').val('');
            $('#dlgContatos').modal('show');
        }

        function montaLinha(c){
            let linha = "<tr>" +
                "<td>"+ c.id + "</td>" +
                "<td>" + c.nome + ' ' + c.sobrenome + "</td>" +
                "<td>"+ c.email + "</td>" +
                "<td>" + c.telefone + "</td>" +
                "<td>"+
                    '<a href="/mensagens/create/' + c.id + '" class="btn text-success fa-input"><i class="fas fa-plus"></i></a>' +
                    '<a href="/contatos/'+ c.id + '/mensagens" class="btn text-primary fa-input"><i class="fas fa-envelope-open-text"></i></a>' +
                    '<button class="btn text-warning fa-input" onclick="editar(' + c.id + ')"><i class="fas fa-edit"></i></button>' +
                    '<button class="btn text-danger fa-input" onclick="remover(' + c.id + ')"><i class="fas fa-trash-alt"></i></button>' +
                "</td>" +
                "</tr>";
            return linha;
        }

        function criarContato(){
            contato = {
                nome: $('#nome').val(),
                sobrenome: $('#sobrenome').val(),
                email: $('#email').val(),
                telefone: $('#telefone').val()
            };
            $.post("/api/contatos", contato, function(data){
                cont = JSON.parse(data);
                linha = montaLinha(cont);
                $('#listaContatos>tbody').append(linha);

            });
        }

        $('#formContatos').submit(function(event){
            event.preventDefault();
            if ($('#id').val() !='') {
                salvarContato();
            }else{
                criarContato();
            }
            $('#dlgContatos').modal('hide');
        })

        function salvarContato(){
            contato = {
                id: $('#id').val(),
                nome: $('#nome').val(),
                sobrenome: $('#sobrenome').val(),
                email: $('#email').val(),
                telefone: $('#telefone').val()
            };
            $.ajax({
                type: "PATCH",
                url: "/api/contatos/" + contato.id,
                context: this,
                success: function() {

                },
                error: function(erro) {
                    console.log(contato);
                    console.log(erro);
                }
            });
        }

        function editar(id){
            $.getJSON('/api/contatos/'+ id, function(contato){
                $('#id').val(contato.id);
                $('#nome').val(contato.nome);
                $('#sobrenome').val(contato.sobrenome);
                $('#email').val(contato.email);
                $('#telefone').val(contato.telefone);
                $('#dlgContatos').modal('show');
            });
        }

        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/contatos/" + id,
                context: this,
                success: function() {
                    linha = $('#listaContatos>tbody>tr');
                    e = linha.filter(function(i, elemento){
                        return elemento.cells[0].textContent == id;
                    });
                    if(e){
                        e.remove();
                    }
                },
                error: function(erro) {
                    console.log(erro);
                }
            });
        }

        function carregaContatos(){
            $.getJSON('/api/contatos', function(contato){
                for (let i = 0; i < contato.length; i++) {
                    linha= montaLinha(contato[i]);
                    $('#listaContatos>tbody').append(linha);
                }
            });
        }
        $(function() {
            carregaContatos();
        })

    </script>
@endsection
