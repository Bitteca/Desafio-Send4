@extends('layouts.app')

@section('conteudo')
        <div class="col-sm-9">
	    	<div class="container px-4 mt-4">
	    	    <div class="row">
	    		    <div class="col">
                    <h4 class="">Mensagens de {{$contato}}</h4>
                    <table class="table table-hover" id="listaMensagens">
                        <input type="hidden" value="{{$id}}">
                            <thead>
                                <tr>
                                    <th>Mensagem</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    <a href="/mensagens/create/{{$id}}" class="btn btn-success float-right">Nova Mensagem</a>
	    		    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript" charset="utf-8">

        function montaLinha(m){
            let id = m.id;
            let linha = '<tr id="'+m.id+'">' +
                "<td>"+ m.descricao + "</td>" +
                "<td class='float-right'>"+
                    '<a class="btn text-warning fa-input" href="/mensagens/edit"><i class="fas fa-edit"></i></a>' +
                    '<button class="btn text-danger fa-input" onclick="remover(' + m.id + ')"><i class="fas fa-trash-alt"></i></button>' +
                "</td>" +
                "</tr>";
            return linha;
        }

        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/mensagens/" + id,
                context: this,
                success: function() {
                    linha = $('#' + id);
                    e = linha.filter(function(i, elemento){
                        return elemento.cells[0].textContent == id;
                    });
                    console.log(e);
                    linha.remove();
                },
                error: function(erro) {
                    console.log(erro);
                }
            });
        }

        function carregaMensagens(){
            let mensagens = @json($mensagens);
            for (let i = 0; i < mensagens.length; i++) {
                let linha = montaLinha(mensagens[i]);
                $('#listaMensagens>tbody').append(linha);
            }
        }
        $(function() {
            carregaMensagens();
        })

    </script>
@endsection
