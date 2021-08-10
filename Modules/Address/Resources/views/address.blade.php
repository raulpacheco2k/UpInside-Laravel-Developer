<div class="label_g2">
    <label class="label">
        {{ Form::label('zipcode', 'CEP', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[zipcode]', null, array_merge(['class' => 'mask-zipcode zip_code_search'], ['placeholder' => 'CEP'])) }}
    </label>

    <label class="label">
        {{ Form::label('state', 'Estado', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[state]', null, array_merge(['class' => 'state'], ['placeholder' => 'Estado'])) }}
    </label>
</div>

<div class="label_g2">
    <label class="label">
        {{ Form::label('city', 'Cidade', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[city]', null, array_merge(['class' => 'city'], ['placeholder' => 'Cidade'])) }}
    </label>

    <label class="label">
        {{ Form::label('neighborhood', 'Bairro', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[neighborhood]', null, array_merge(['class' => 'neighborhood'], ['placeholder' => 'Bairro'])) }}
    </label>
</div>

<div class="label_g2">
    <label class="label">
        {{ Form::label('street', 'Rua', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[street]', null, array_merge(['class' => 'street'], ['placeholder' => 'Rua'])) }}
    </label>

    <label class="label">
        {{ Form::label('number', 'Número', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[number]', null, array_merge(['class' => 'number'], ['placeholder' => 'Número'])) }}
    </label>
</div>

<div class="label_g1">
    <label class="label">
        {{ Form::label('complement', 'Complemento', array_merge(['class' => 'legend'])) }}
        {{ Form::text('address[complement]', null, array_merge(['class' => 'complement'], ['placeholder' => 'Complemento'])) }}
    </label>
</div>
