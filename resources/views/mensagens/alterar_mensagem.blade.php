@extends('layouts.app')
@section('conteudo')
    <div class="col-sm-9">
    	<div class="container px-4 mt-4">
    	    <div class="row">
    	        <div class="col">
                   <h4 class="mt-4">Alterar Mensagem</h4>
                   <div class="row mb-3 d-flex align-items-center">
                       <div class="col-sm-9">
                            <input type="hidden" id="id">
                           <textarea id="mensagem" cols="30" rows="3" class="form-control" ></textarea>
                           <input type="submit" class="mt-2 btn btn-success float-right" value="Salvar">
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

        function preencheCampos(){
            $.getJSON('/api/mensagens/'+ id + '/edit', function(mensagem){
                $('#id').val(mensagem.id);
                $('#mensagem').val(mensagem.descricao);
            });
        }

        $(function() {
            preencheCampos();
        })

    </script>


@endsection

