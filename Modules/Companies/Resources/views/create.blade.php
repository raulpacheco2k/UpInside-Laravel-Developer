@extends('admin.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user-plus">Nova Empresa</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('customer.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('company.index') }}">Empresas</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('company.create') }}" class="text-orange">Nova empresa</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                @if(isset($company))
                    {{ Form::model($company, array_merge(['route' => ['company.update', $company->id], 'class' => 'app_form'])) }}
                    @method('PATCH')
                @else
                    <form class="app_form" action="{{ route('company.store') }}" method="post">
                        @endif
                        @csrf

                        <label class="label">
                            <span class="legend">Responsável Legal</span>
                            {{ Form::select('customer_id', $customers, null, array_merge(['class' => 'select2'],['required'])) }}

                            <p style="margin-top: 4px;">
                                <a href="{{ route('customer.create') }}" class="text-orange icon-link"
                                   style="font-size: .8em;" target="_blank">Acessar
                                    Cadastro</a>
                            </p>
                        </label>

                        <label class="label">
                            {{ Form::label('corporate_name', 'Razão Social', array_merge(['class' => 'legend'])) }}
                            {{ Form::text('corporate_name', null, array_merge(['placeholder' => 'Razão Social', 'required'])) }}
                            <x-validate-field field="corporate_name"/>
                        </label>

                        <label class="label">
                            {{ Form::label('fantasy_name', 'Nome Fantasia', array_merge(['class' => 'legend'])) }}
                            {{ Form::text('fantasy_name', null, array_merge(['placeholder' => 'Nome Fantasia', 'required'])) }}
                            <x-validate-field field="fantasy_name"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                {{ Form::label('document_cnpj', 'CNPJ', array_merge(['class' => 'legend'])) }}
                                {{ Form::tel('document_cnpj', null, array_merge(['class' => 'mask-cnpj'], ['placeholder' => 'CNPJ', 'required'])) }}
                                <x-validate-field field="document_cnpj"/>
                            </label>

                            <label class="label">
                                {{ Form::label('state_registration', 'Inscrição Estadual', array_merge(['class' => 'legend'])) }}
                                {{ Form::text('state_registration', null, array_merge(['placeholder' => 'Inscrição Estadual', 'required'])) }}
                                <x-validate-field field="state_registration"/>
                            </label>
                        </div>

                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Endereço</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">
                                @include('address::address')
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-large btn-green icon-check-square-o" type="submit">Criar Usuário
                            </button>
                        </div>
                    {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection