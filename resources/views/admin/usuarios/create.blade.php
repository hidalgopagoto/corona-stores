@extends('layouts/admin/admin')

@section('content')
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ URL::to('admin') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ URL::to('admin/usuarios') }}">Usuários</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>{{ isset($usuario) ? 'Editar' : 'Inserir' }} usuário</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Usuários</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/usuarios') }}" class="btn btn-md btn-info">Voltar para a lista</a>
<br /><br />
<!-- BEGIN FORM-->
<form action="{{ isset($usuario) ? URL::to('admin/usuarios/'.$usuario->id) : URL::to('admin/usuarios') }}" method="POST" class="form-horizontal form-row-seperated">
    {!! csrf_field() !!}
    @if (isset($usuario))
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Nome</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" required="required" value="{{ isset($usuario) ? $usuario->name : '' }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">E-mail</label>
            <div class="col-md-9">
                <input type="email" class="form-control" name="email" required="required" value="{{ isset($usuario) ? $usuario->email : '' }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Senha</label>
            <div class="col-md-9">
                <input type="password" class="form-control" name="password" {{ !isset($usuario) ? 'required="required"' : '' }} />
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-md btn-success">Salvar</button>
                <a href="{{ URL::to('admin/usuarios') }}" class="btn btn-md btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<!-- END FORM-->
@endsection