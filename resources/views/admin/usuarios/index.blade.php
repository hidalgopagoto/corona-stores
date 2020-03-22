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
            <span>Usuários</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Usuários</h1>
<!-- END PAGE TITLE-->
<a href="{{ URL::to('admin/usuarios/create') }}" class="btn btn-md btn-success">Criar novo usuário</a>
<br /><br />
<!-- BEGIN BORDERED TABLE PORTLET-->
    <div class="table-scrollable">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="40%"> Nome </th>
                    <th width="40%"> E-mail </th>
                    <th width="20%"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @if (count($usuarios) == 0)
                    <tr>
                        <td colspan="3" align="center">Nenhum usuário cadastrado</td>
                    </tr>
                @else
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <form action="{{ URL::to("admin/usuarios/".$usuario->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir este usuário?')) return false;">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ URL::to('admin/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-sm btn-info">Editar</a>
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