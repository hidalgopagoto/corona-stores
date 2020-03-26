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
                <span>Configurações</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">Configurações</h1>
    <!-- END PAGE TITLE-->
    <form action="{{ URL::to('admin/settings') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="table-scrollable">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="30%"> Configuração </th>
                    <th width="70%"> Valor </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        <td>{{ $setting->description }}</td>
                        <td><textarea class="form-control" name="settings[{{ $setting->id }}]" rows="3">{{ $setting->value }}</textarea></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Atualizar configurações</button>
        </div>
    </form>
    <!-- END BORDERED TABLE PORTLET-->
@endsection
