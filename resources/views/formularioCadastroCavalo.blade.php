@extends('layout')
@section('content')

<section class="container mt-5">
<form class="row g-3" method="Post" action="{{route('envia-banco-cavalo')}}">
@csrf
<div class="col-md-12">
    <label for="inputNome" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Trovão">
    @error('nome')
    <div class="text-sm-start text-light">*Preencher o campo Nome.</div>
    @enderror  
</div>

  <div class="col-md-12">
    <label for="inputRaca" class="form-label">Raça:</label>
    <input type="raca" class="form-control" id="inputRaca" name="raca" placeholder="Frísio">
    @error('raca')
    <div class="text-sm-start text-light">*Preencher o campo Raça.</div>
    @enderror   
</div>

  <div class="col-3">
    <label for="inputIdade" class="form-label">Idade:</label>
    <input type="idade" class="form-control" id="inputIdade" name="idade" placeholder="5">
    @error('idade')
    <div class="text-sm-start text-light">*Preencher o campo Idade.</div>
    @enderror   
</div>
  

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
<section>
@endsection