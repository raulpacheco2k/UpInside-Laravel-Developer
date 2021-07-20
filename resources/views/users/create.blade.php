@extends('admin.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Novo Cliente</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Novo Cliente</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="nav">
                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#complementary" class="nav_tabs_item_link">Dados Complementares</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#realties" class="nav_tabs_item_link">Imóveis</a>
                    </li>
                </ul>

                <form class="app_form" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_gc">
                                <span class="legend">Perfil:</span>
                                <label class="label">
                                    {{ Form::checkbox('lessor', true) }}
                                    <span>Locatário</span>
                                </label>

                                <label class="label">
                                    {{ Form::checkbox('lessee', true) }}
                                    <span>Locador</span>
                                </label>
                            </div>

                            <label class="label">
                                {{ Form::label('name', 'Nome', array_merge(['class' => 'legend'])) }}
                                {{ Form::text('name', null, array_merge(['class' => 'form-control'], ['placeholder' => 'Nome Completo', 'required'])) }}
                                <x-validate-field field="name"/>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    {{ Form::label('gender', 'Género', array_merge(['class' => 'legend'])) }}
                                    {{ Form::select('gender', \App\Models\Gender::toArray(), null, array_merge(['class' => 'select2'],['required'])) }}
                                </label>

                                <label class="label">
                                    {{ Form::label('document', 'CPF', array_merge(['class' => 'legend'])) }}
                                    {{ Form::tel('document', null, array_merge(['class' => 'mask-doc'], ['placeholder' => 'CPF', 'required'])) }}
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    {{ Form::label('document_secondary', 'RG', array_merge(['class' => 'legend'])) }}
                                    {{ Form::number('document_secondary', null, array_merge(['class' => 'form-control'], ['placeholder' => 'RG'])) }}
                                </label>

                                <label class="label">
                                    {{ Form::label('document_secondary_complement', 'Órgão Expedidor', array_merge(['class' => 'legend'])) }}
                                    {{ Form::text('document_secondary_complement', null, array_merge(['class' => 'form-control'], ['placeholder' => 'Expedição'])) }}
                                </label>
                            </div>

                            <div class="label_g2">
                                <label class="label">
                                    {{ Form::label('date_of_birth', 'Data de Nascimento', array_merge(['class' => 'legend'])) }}
                                    {{ Form::date('date_of_birth', now(), array_merge(['placeholder' => 'Data de Nascimento'])) }}
                                </label>

                                <label class="label">
                                    {{ Form::label('place_of_birth', 'Naturalidade', array_merge(['class' => 'legend'])) }}
                                    {{ Form::text('place_of_birth', null, array_merge(['placeholder' => 'Cidade de Nascimento'])) }}
                                </label>
                            </div>



                            <div class="label_g2">
                                <label class="label">
                                    {{ Form::label('civil_status', 'Estado civil', array_merge(['class' => 'legend'])) }}
                                    {{ Form::select('civil_status', \App\Models\MaritalStatus::toArray(), null, array_merge(['class' => 'select2'], ['required'])) }}
                                </label>

                                <label class="label">
                                    {{ Form::label('cover', 'Foto', array_merge(['class' => 'legend'])) }}
                                    {{ Form::file('cover') }}
                                </label>
                            </div>

                            <div id="spouse" class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Cônjuge</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none content_spouse">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('type_of_communion', 'Tipo de Comunhão', array_merge(['class' => 'legend'])) }}
                                            {{ Form::select('type_of_communion', \App\Models\MarriagePropertyRegimes::toArray(), null, array_merge(['class' => 'select2'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('spouse_document', 'CPF do Cônjuge', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('spouse_document', null, array_merge(['class' => 'mask-doc'], ['placeholder' => 'CPF do Cônjuge'])) }}
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('spouse_occupation', 'Profissão', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('spouse_occupation', null, array_merge(['placeholder' => 'Profissão do cônjuge'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('spouse_income', 'Renda', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('spouse_income', null, array_merge(['class' => 'mask-money'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="income" class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Renda</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('occupation', 'Profissão', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('occupation', null, array_merge(['placeholder' => 'Profissão do Cliente'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('income', 'Renda', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('income', null, array_merge(['class' => 'mask-money'], ['placeholder' => 'Profissão do Cliente'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('zipcode', 'CEP', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('zipcode', null, array_merge(['class' => 'mask-zipcode zip_code_search'], ['placeholder' => 'CEP'])) }}
                                        </label>

                                            <label class="label">
                                                {{ Form::label('state', 'Estado', array_merge(['class' => 'legend'])) }}
                                                {{ Form::text('state', null, array_merge(['class' => 'state'], ['placeholder' => 'Estado'])) }}
                                            </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('city', 'Cidade', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('city', null, array_merge(['class' => 'city'], ['placeholder' => 'Cidade'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('neighborhood', 'Bairro', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('neighborhood', null, array_merge(['class' => 'neighborhood'], ['placeholder' => 'Bairro'])) }}
                                        </label>
                                    </div>

                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('street', 'Rua', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('street', null, array_merge(['class' => 'street'], ['placeholder' => 'Rua'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('number', 'Número', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('number', null, array_merge(['class' => 'number'], ['placeholder' => 'Número'])) }}
                                        </label>
                                    </div>

                                    <div class="label_g1">
                                        <label class="label">
                                            {{ Form::label('complement', 'Complemento', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('complement', null, array_merge(['class' => 'complement'], ['placeholder' => 'Complemento'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Contato</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('telephone', 'Telefone', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('telephone', null, array_merge(['class' => 'mask-phone'], ['placeholder' => 'Número do telefone com DDD'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('cell', 'Celular', array_merge(['class' => 'legend'])) }}
                                            {{ Form::text('cell', null, array_merge(['class' => 'mask-phone'], ['placeholder' => 'Número do celular com DDD'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="complementary" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            {{ Form::label('email', 'E-mail', array_merge(['class' => 'legend'])) }}
                                            {{ Form::email('email', null, array_merge(['placeholder' => 'example@email.com.br'])) }}
                                        </label>

                                        <label class="label">
                                            {{ Form::label('password', 'Senha', array_merge(['class' => 'legend'])) }}
                                            {{ Form::password('password', array_merge(['placeholder' => 'Senha segura'])) }}
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Empresa</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">

                                    <div class="companies_list">
                                        <div class="no-content mb-2">Não foram encontrados registros!</div>

                                        <!--
                                        <div class="companies_list_item mb-2">
                                            <p><b>Razão Social:</b> UpInside Treinamentos LTDA</p>
                                            <p><b>Nome Fantasia:</b> UpInside Treinamentos</p>
                                            <p><b>CNPJ:</b> 12.3456.789/0001-12 - <b>Inscrição Estadual:</b>1231423421</p>
                                            <p><b>Endereço:</b> Rodovia Dr. Antônio Luiz de Moura Gonzaga, 3339 Bloco A Sala
                                                208</p>
                                            <p><b>CEP:</b> 88048-301 <b>Bairro:</b> Campeche <b>Cidade/Estado:</b>
                                                Florianópolis/SC</p>
                                        </div>
                                        -->
                                    </div>

                                    <p class="text-right">
                                        <a href="javascript:void(0)" class="btn btn-green btn-disabled icon-building-o">Cadastrar
                                            Nova Empresa</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="realties" class="d-none">
                            <div class="app_collapse">
                                <div class="app_collapse_header collapse">
                                    <h3>Locador</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="realty_list">
                                            <div class="realty_list_item mb-1">
                                                <div class="realty_list_item_actions_stats">
                                                    <img src="" alt="">
                                                    <ul>
                                                        <li>Venda: R$ 450.000,00</li>
                                                        <li>Aluguel: R$ 2.000,00</li>
                                                    </ul>
                                                </div>

                                                <div class="realty_list_item_content">
                                                    <h4>Casa Residencial - Campeche</h4>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-location"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span class="realty_list_item_description_title">Bairro:</span>
                                                            <span class="realty_list_item_description_content">Campeche</span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-util-area"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span class="realty_list_item_description_title">Área Útil:</span>
                                                            <span class="realty_list_item_description_content">150m&sup2;</span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-bed"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span class="realty_list_item_description_title">Domitórios:</span>
                                                            <span class="realty_list_item_description_content">4 Quartos<br><span>Sendo 2 suítes</span></span>
                                                        </div>
                                                    </div>

                                                    <div class="realty_list_item_card">
                                                        <div class="realty_list_item_card_image">
                                                            <span class="icon-realty-garage"></span>
                                                        </div>
                                                        <div class="realty_list_item_card_content">
                                                            <span class="realty_list_item_description_title">Garagem:</span>
                                                            <span class="realty_list_item_description_content">4 Vagas<br><span>Sendo 2 cobertas</span></span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="realty_list_item_actions">
                                                    <ul>
                                                        <li class="icon-eye">1234 Visualizações</li>
                                                    </ul>
                                                    <div>
                                                        <a href="" class="btn btn-blue icon-eye">Visualizar Imóvel</a>
                                                        <a href="" class="btn btn-green icon-pencil-square-o">Editar
                                                            Imóvel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="no-content">Não foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse mt-3">
                                <div class="app_collapse_header collapse">
                                    <h3>Locatário</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div id="realties">
                                        <div class="no-content">Não foram encontrados registros!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        let civilStatus = $('select[name=civil_status]'),
            spouse = $('div[id=spouse]'),
            income = $('div[id=income]');

        spouse.hide();

        civilStatus.on('change', function (){
            if (civilStatus.val() === '1') {
                spouse.show();
            } else {
                $('#spouse').hide()
            }
        })
    </script>
@endsection