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
                <span>Meios de Entrega</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">Meios de Entrega</h1>
    <!-- END PAGE TITLE-->
    @foreach ($shippings as $shipping)
        <h2>{{ $shipping->name }}</h2>
        <p><small>{{ $shipping->description }}</small></p>
        <div class="row">
            <div class="col-xs-12">
                <label for="inputHabilitado{{ $shipping->id }}">
                    Habilitado
                    <input type="checkbox" class="habilitar" name="habilitado[{{ $shipping->id }}]" data-id="{{ $shipping->id }}" id="inputHabilitado{{ $shipping->id }}" {{ $shipping->enabled ? ' checked="checked"' : '' }}>
                </label>
            </div>
        </div>
        @if ($shipping->name != "Correios")
            <h3>Regiões atendidas - {{ $shipping->name }}</h3>
            <div class="table-responsive">
                <table class="table table-striped table-regioes" width="100%">
                    <thead>
                        <tr>
                            <th>Região</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipping->options as $shippingOption)
                            <tr>
                                <td>{{ $shippingOption->name }}</td>
                                <td>{{ number_format($shippingOption->price, 2, ".", ",") }}</td>
                                <td><button type="button" class="btn btn-sm btn-danger remove-option" data-id="{{ $shippingOption->id }}">Remover</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><input type="text" class="form-control" name="nome_regiao" id="nome_regiao"></td>
                            <td><input type="text" class="form-control money" name="preco_regiao" id="preco_regiao"></td>
                            <td><button type="button" class="btn btn-sm btn-success add-option" data-id="{{ $shipping->id }}">Adicionar</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <hr />
        @endif
    @endforeach

    <script type="text/javascript">
        async function addOptionHandle()
        {
            jQuery(".add-option").click(function(e) {

                let shippingId = $(this).data("id");

                e.preventDefault();
                let name = $("#nome_regiao").val();
                let preco_regiao = $("#preco_regiao").val();
                if (!name) {
                    alert("Preencha o nome da região");
                    $("#nome_regiao").focus();
                    return false;
                }
                if (!preco_regiao) {
                   alert("Preencha o preço para a região");
                   $("#preco_regiao").focus();
                   return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: "{{ URL::to('admin/shippings/options') }}",
                    data: {
                        shippingId: shippingId,
                        name: name,
                        price: preco_regiao
                    },
                    dataType: "json"
                }).done(function(response) {
                    $("#preco_regiao").val("");
                    $("#nome_regiao").val("");
                    $(".table-regioes tbody").append("<tr>"
                        + "<td>" + name + "</td>"
                        + "<td>" + preco_regiao + "</td>"
                        + "<td><button class=\"btn btn-sm btn-danger remove-option\" data-id=\"" + response.id + "\">Remover</button></td>"
                        + "</tr>");
                    removeOptionHandle();
                });
            });
        }
        async function removeOptionHandle()
        {
            jQuery(".remove-option").click(function(e) {
                e.preventDefault();
                if (confirm("Deseja realmente remover esta opção?")) {
                    $(this).closest("tr").hide();
                    let shippingOptionId = $(this).data("id");
                    jQuery.ajax({
                        type: "DELETE",
                        url: "{{ URL::to('admin/shippings/options') }}/" + shippingOptionId,
                        data: {},
                        dataType: "json"
                    });
                }
            });
        }
        async function toggleEnabledHandle()
        {
            jQuery(".habilitar").change(function(e) {
                var enabled = $(this).is(":checked");
                var id = $(this).data("id");
                jQuery.ajax({
                    type: "PUT",
                    url: "{{ URL::to('admin/shippings/options') }}",
                    data: {
                        enabled: enabled,
                        id: id
                    },
                    dataType: "json"
                });
            });
        }
        jQuery(document).ready(function() {
            addOptionHandle();
            removeOptionHandle();
            toggleEnabledHandle();
        });
    </script>

    <!-- END BORDERED TABLE PORTLET-->
@endsection
