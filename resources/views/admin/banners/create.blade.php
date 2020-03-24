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
                <a href="{{ URL::to('admin/banners') }}">Banners</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ isset($banner) ? 'Editar' : 'Inserir' }} banner</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">Banners</h1>
    <!-- END PAGE TITLE-->
    <a href="{{ URL::to('admin/banners') }}" class="btn btn-md btn-info">Voltar para a lista</a>
    <br /><br />

    <!-- BEGIN FORM-->
    <form action="{{ isset($banner) ? URL::to('admin/banners/'.$banner->id) : URL::to('admin/banners') }}" method="POST" class="form-horizontal form-row-seperated" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @if (isset($banner))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Título</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="title" required="required" value="{{ isset($banner) ? $banner->title : '' }}" />
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Descrição</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="description" rows="5">{{ isset($banner) ? $banner->description : '' }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">URL</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="url" value="{{ isset($banner) ? $banner->url : '' }}" />
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Ordem</label>
                <div class="col-md-9">
                    <select name="order" class="form-control" required="required">
                        @for ($i=1; $i<=100; $i++)
                            <option value="{{ $i }}" {{ isset($banner) && $banner->order == $i ? 'selected="selected"' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Ativo</label>
                <div class="col-md-9">
                    <input type="checkbox" name="active" value="1" {{ isset($banner) && $banner->active ? 'checked="checked"' : '' }}>
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
        @if (isset($banner) && $banner->image_url)
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Imagem atual</label>
                    <div class="col-md-3">
                        <img src="{{ URL::asset($banner->image_url) }}" class="img-responsive">
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
                    <a href="{{ URL::to('admin/banners') }}" class="btn btn-md btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM-->
@endsection
