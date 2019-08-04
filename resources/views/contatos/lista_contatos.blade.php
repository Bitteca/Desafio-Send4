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

        function montaLinha(c){
            let linha = "<tr>" +
                "<td>"+ c.id + "</td>" +
                "<td>" + c.nome + ' ' + c.sobrenome + "</td>" +
                "<td>"+ c.email + "</td>" +
                "<td>" + c.telefone + "</td>" +
                "<td>"+
                    '<button class="btn text-primary fa-input" onclick="criar(' + c + ')"><i class="fas fa-envelope-open-text"></i></button>' +
                    '<button class="btn text-success fa-input" onclick="editar(' + c.id + ')"><i class="fas fa-edit"></i></button>' +
                    '<button class="btn text-danger fa-input" onclick="remover(' + c.id + ')"><i class="fas fa-trash-alt"></i></button>' +
                "</td>" +
                "</tr>";
            return linha;
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
