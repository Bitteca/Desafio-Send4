@extends('layouts.app')
@section('conteudo')
    <div class="col-sm-9">
    	<div class="container px-4 mt-4">
    	    <div class="row">
    	        <div class="col">
                   <h4 class="mt-4">Nova Mensagem</h4>
                   <div class="row mb-3 d-flex align-items-center">
                       <div class="col-sm-9">
                        <form action="/api/mensagens" method="POST">
                            <div class="form-group">
                                <label>Contato da Mensagem:</label>
                                </br>
                                <select class="form-control mb-3" id="contatos" name="contato"></select>
                                <textarea name="mensagem" cols="30" rows="3" class="form-control"></textarea>
                                <input type="submit" class="mt-2 btn btn-success float-right" value="Salvar">
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
        function carregaContatos(){
            $.getJSON('/api/contatos', function(data){
                for (let i = 0; i < data.length; i++) {
                    let opcao = '<option value ="'+ data[i].id +'">' + data[i].nome + ' ' +  data[i].sobrenome + '</option>';
                    $('#contatos').append(opcao);

                }
            });
        }
        $(function() {
            carregaContatos();
        })

    </script>
@endsection
