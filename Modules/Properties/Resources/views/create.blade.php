@extends('admin.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Cadastrar Novo Imóvel</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="">Imóveis</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Cadastrar Imóvel</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('properties::filter')

        <div class="dash_content_app_box">

            <div class="nav">
                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#structure" class="nav_tabs_item_link">Estrutura</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#images" class="nav_tabs_item_link">Imagens</a>
                    </li>
                </ul>

                {{ Form::open(array_merge(['route' => 'properties.store'], ['class' => 'app_form', 'enctype' => 'multipart/form-data'])) }}

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_gc">
                                <span class="legend">Finalidade:</span>
                                <label class="label">
                                    <input type="checkbox" value="1" name="sale"><span>Venda</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox" value="1" name="rent"><span>Locação</span>
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Tipo:</span>
                                    {{ Form::select('type', $propertyTypes, null, array_merge(['class' => 'select2'],['required'])) }}
                                </label>

                                <label class="label">
                                    <span class="legend">Proprietário:</span>
                                        {{ Form::select('locator_id', $customers, null, ['class' => 'select2', 'required']) }}
                                </label>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Precificação e Valores</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('sale_price', 'Valor de Venda', array_merge(['class' => 'legend'])) }}
                                            {{ Form::tel('sale_price', null, array_merge(['class' => 'mask-money'], ['placeholder' => 'R$ 0,00'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('rent_price', 'Valor de Locação', array_merge(['class' => 'legend'])) }}
                                            {{ Form::tel('rent_price', null, array_merge(['class' => 'mask-money'], ['placeholder' => 'R$ 0,00'])) }}
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('iptu', 'IPTU', array_merge(['class' => 'legend'])) }}
                                            {{ Form::tel('iptu', null, array_merge(['class' => 'mask-money'], ['placeholder' => 'R$ 0,00'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('condominium', 'Condomínio', array_merge(['class' => 'legend'])) }}
                                            {{ Form::tel('condominium', null, array_merge(['class' => 'mask-money'], ['placeholder' => 'R$ 0,00'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Características</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <label class="label">
                                        {{ Form::label('description', 'Descrição do Imóvel', array_merge(['class' => 'legend'])) }}
                                        {{ Form::textarea('description', null, ['class' => 'mce']) }}
                                    </label>

                                    <div class="label_g4">
                                        <label class="label">
                                            {{ Form::label('bedrooms', 'Dormitórios', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('bedrooms', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('suites', 'Suítes', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('suites', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('bathrooms', 'Banheiros', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('bathrooms', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('rooms', 'Salas', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('rooms', null) }}
                                        </label>
                                    </div>

                                    <div class="label_g4">
                                        <label class="label">
                                            {{ Form::label('garage', 'Garagens', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('garage', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('garage_covered', 'Garagens cobertas', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('garage_covered', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('area_total', 'Área total', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('area_total', null) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('area_util', 'Área útil', array_merge(['class' => 'legend'])) }}
                                            {{ Form::number('area_util', null) }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>


                                <div class="app_collapse_content d-none">
                                    @include('address::address')
                                </div>
                            </div>
                        </div>

                        <div id="structure" class="d-none">
                            <h3 class="mb-2">Estrutura</h3>
                            <div class="label_g5">
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="air_conditioning"><span>Ar Condicionado</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="bar"><span>Bar</span>

                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="library"><span>Biblioteca</span>
                                        
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="barbecue_grill"><span>Churrasqueira</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="american_kitchen"><span>Cozinha Americana</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="fitted_kitchen"><span>Cozinha Planejada</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="pantry"><span>Despensa</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="edicule"><span>Edícula</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="office"><span>Escritório</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="bathtub"><span>Banheira</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="fireplace"><span>Lareira</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="lavatory"><span>Lavabo</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="furnished"><span>Mobiliado</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="pool"><span>Piscina</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="steam_room"><span>Sauna</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" value="1" name="view_of_the_sea"><span>Vista para o Mar</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="images" class="d-none">
                            <label class="label">
                                <span class="legend">Imagens</span>
                                <input type="file" name="files[]" accept="image/jpeg, image/jpg, image/png" multiple>
                            </label>

                            <div class="content_image"></div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Imóvel</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection()

@section('js')
    <script>
        $(function () {
            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div class="property_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });
        });
    </script>
@endsection()