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
            <a href="{{ URL::to('admin/categories') }}">Categorias</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>{{ isset($category) ? 'Editar' : 'Inserir' }} categoria</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Categorias</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/categories') }}" class="btn btn-md btn-info">Voltar para a lista</a>
<br /><br />
<!-- BEGIN FORM-->
<form action="{{ isset($category) ? URL::to('admin/categories/'.$category->id) : URL::to('admin/categories') }}" method="POST" class="form-horizontal form-row-seperated" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @if (isset($category))
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Nome</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" required="required" value="{{ isset($category) ? $category->name : '' }}" />
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Ordem</label>
            <div class="col-md-9">
                <select name="order" class="form-control" required="required">
                    @for ($i=1; $i<=100; $i++)
                        <option value="{{ $i }}" {{ isset($category) && $category->order == $i ? 'selected="selected"' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Imagem</label>
            <div class="col-md-9">
                <input type="file" name="image">
            </div>
        </div>
    </div>
    @if (isset($category) && $category->image)
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Imagem atual</label>
                <div class="col-md-3">
                    <img src="{{ URL::asset($category->image) }}?v={{ date('YmdHis') }}" class="img-responsive">
                    <div class="">
                        <label for="inputRemoveImage">
                            <input id="inputRemoveImage" type="checkbox" name="remove_image" value="1">
                            Excluir foto
                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-md btn-success">Salvar</button>
                <a href="{{ URL::to('admin/categories') }}" class="btn btn-md btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<!-- END FORM-->
@endsection
