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
            <a href="{{ URL::to('admin/products') }}">Produtos</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>{{ isset($product) ? 'Editar' : 'Inserir' }} produto</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Produtos</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/products') }}" class="btn btn-md btn-info">Voltar para a lista</a>
<br /><br />

<!-- BEGIN FORM-->
<form action="{{ isset($product) ? URL::to('admin/products/'.$product->id) : URL::to('admin/products') }}" method="POST" class="form-horizontal form-row-seperated" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @if (isset($product))
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Categoria</label>
            <div class="col-md-9">
                <select name="id_category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($product) && $product->id_category == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Nome</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" required="required" value="{{ isset($product) ? $product->name : '' }}" />
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Descrição</label>
            <div class="col-md-9">
                <textarea class="form-control" name="description" rows="5">{{ isset($product) ? $product->description : '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Ordem</label>
            <div class="col-md-9">
                <select name="order" class="form-control" required="required">
                    @for ($i=1; $i<=100; $i++)
                        <option value="{{ $i }}" {{ isset($product) && $product->order == $i ? 'selected="selected"' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Preço</label>
            <div class="col-md-9">
                <input type="text" class="form-control money" name="price" value="{{ isset($product) ? $product->price : '' }}" />
            </div>
        </div>
    </div>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3">Em promoção</label>
            <div class="col-md-9">
                <input type="checkbox" name="featured" value="1" {{ isset($product) && $product->featured ? 'checked="checked"' : '' }}>
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
    @if (isset($product) && $product->image)
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Imagem atual</label>
                <div class="col-md-3">
                    <img src="{{ URL::asset($product->image) }}" class="img-responsive">
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
                <a href="{{ URL::to('admin/products') }}" class="btn btn-md btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<!-- END FORM-->
@endsection
