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
            <span>Categorias</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Categorias</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/categories/create') }}" class="btn btn-md btn-success">Criar nova categoria</a>
<br /><br />
<!-- BEGIN BORDERED TABLE PORTLET-->
    <div class="table-scrollable">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="60%"> Nome </th>
                    <th width="20%"> Produtos </th>
                    <th width="20%"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->count() == 0)
                    <tr>
                        <td colspan="3" align="center">Nenhuma categoria cadastrada</td>
                    </tr>
                @else
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->getProductCount() }}</td>
                            <td>
                                <form action="{{ URL::to("admin/categories/".$category->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir esta categoria?')) return false;">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ URL::to('admin/categories/'.$category->id.'/edit') }}" class="btn btn-sm btn-info">Editar</a>
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