@extends('layouts.app')

@section('conteudo')
        <div class="col-sm-9">
	    	<div class="container px-4 mt-4">
	    	    <div class="row">
	    		    <div class="col">
                        <h4 class="">Mensagens de (Contato)</h4>
                        <div class="row mb-3 d-flex align-items-center" id="lista"></div>
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
            $.getJSON('/api/mensagens', function(data){
                for (let i = 0; i < data.length; i++) {
                    let tabela = '<div class="col-sm-9"> <p>' + data[i].descricao + '</p> </div>'
                        + '<div class="col-sm-3 mt-3 d-flex justify-content-between">'
                            + '<i class="fas fa-trash-alt fa-lg text-danger"></i>'
                            + '<i class="fas fa-edit fa-lg text-info"></i>'
                        + '</div>';
                        $('#lista').append(tabela);
                }
            });
        }
        $(function() {
            carregaContatos();
        })

    </script>
@endsection
