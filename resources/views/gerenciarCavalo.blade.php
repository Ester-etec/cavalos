@extends('layout')
@section('content')
<section class="container m-5">
  <h1 class="text-center"> Gerenciar dados do Cavalo</h1>
  <div class="container m-5 center">
    <form  method='get' action="{{route('gerenciar-cavalo')}}">
      <div class="row center">
        <div class="col">
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o Nome do Cavalo" aria-label="First name">
        </div>
        <div class="col">
          <button type="submit" class="btn btn-info">Buscar</button>
        </div>
      </div>
    </form>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Raça</th>
        <th scope="col">Idade</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registrosCavalos as $registrosCavalosLoop  )
      <tr>
        <th scope="row">{{$registrosCavalosLoop->id}}</th>
        <td>{{$registrosCavalosLoop->nome}}</td>
        <td>{{$registrosCavalosLoop->raca}}</td>
        <td>{{$registrosCavalosLoop->idade}}</td>
        <td>
          <a href="{{route('mostrar-cavalo',$registrosCavalosLoop->id)}}">
            <button type="button" class="btn btn-primary">X</button>
          </a>
        </td>
        
        <td>
         <form method="POST" action="{{route('apaga-cavalo',$registrosCavalosLoop->id)}}">
            @method('delete')
            @csrf 
            <button type="submit" class="btn btn-danger"> X </button>
        </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</section>


@endsection