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
            <span>Produtos</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Produtos</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/products/create') }}" class="btn btn-md btn-success">Criar novo produto</a>
<br /><br />
<!-- BEGIN BORDERED TABLE PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">Buscar produtos</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form action="{{ URL::to('admin/products') }}" method="GET">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="{{ isset($params["id"]) ? $params["id"] : "" }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="category" class="form-control">
                                <option value=""></option>
                                @foreach (App\Category::orderBy("order")->get() as $category)
                                    <option value="{{ $category->id }}" {{ isset($params["category"]) && $params["category"] == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" value="{{ isset($params["name"]) ? $params["name"] : "" }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-sm btn-info">Buscar</button>
                        <a href="{{ URL::to("admin/products") }}" class="btn btn-sm btn-warning">Limpar filtros</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-scrollable">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="30%"> Categoria </th>
                    <th width="40%"> Nome </th>
                    <th width="30%"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @if ($products->count() == 0)
                    <tr>
                        <td colspan="3" align="center">Nenhum produto cadastrado</td>
                    </tr>
                @else
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <form action="{{ URL::to("admin/products/".$product->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir este produto?')) return false;">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ URL::to('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-info">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
<!-- END BORDERED TABLE PORTLET-->
@endsection