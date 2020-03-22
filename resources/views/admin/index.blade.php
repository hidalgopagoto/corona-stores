@extends('layouts/admin/admin')

@section('content')
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ URL::to('admin') }}">Home</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">Área administrativa - DMA Cursos Online</h1>
    <!-- END PAGE TITLE-->
    <br /><br />
    @if (session('status'))
        <p class="alert alert-success">{{ session('status') }}</p>
    @endif
    @if (session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
@endsection