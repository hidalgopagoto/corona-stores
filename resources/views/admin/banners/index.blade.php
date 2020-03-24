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
                <span>Banners</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">Banners</h1>
    <!-- END PAGE TITLE-->
    <a href="{{ URL::to('admin/banners/create') }}" class="btn btn-md btn-success">Criar novo banner</a>
    <br /><br />
    <!-- BEGIN BORDERED TABLE PORTLET-->
    <div class="table-scrollable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th width="30%">  </th>
                <th width="40%"> Título </th>
                <th width="30%"> Ações </th>
            </tr>
            </thead>
            <tbody>
            @if ($banners->count() == 0)
                <tr>
                    <td colspan="3" align="center">Nenhum banner cadastrado</td>
                </tr>
            @else
                @foreach ($banners as $banner)
                    <tr class="{{ $banner->active ? '' : 'alert-danger' }}">
                        <td>
                            <div class="col-xs-12">
                                @if ($banner->image_url)
                                    <img src="{{ URL::asset($banner->image_url) }}" class="img-responsive">
                                @endif
                            </div>
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td>
                            <form action="{{ URL::to("admin/banners/".$banner->id) }}" method="POST" onsubmit="if (!confirm('Deseja realmente excluir este banner?')) return false;">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ URL::to('admin/banners/'.$banner->id.'/edit') }}" class="btn btn-sm btn-info">Editar</a>
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
