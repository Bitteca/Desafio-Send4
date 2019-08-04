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
                                <label>Mensagem para {{$contato}}:</label>
                                <input name="contato_id" type="hidden" value="{{$contato_id}}">
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

    </script>
@endsection
