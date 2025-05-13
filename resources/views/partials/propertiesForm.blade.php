<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.properties.update' : 'admin.properties.store', $property) }}"
      method="post">
    @csrf
    @method($property->exists ? 'PUT' : 'POST')

    <div class="row">
        @include('components.input', ['class' => 'col', 'name' => 'title', 'label' => 'Titre', 'value' => $property->title])
        <div class="col row">
            @include('components.input', ['class' => 'col', 'name' => 'surface', 'label' => 'Surface', 'value' => $property->surface])
            @include('components.input', ['class' => 'col', 'name' => 'price', 'label' => 'Prix', 'value' => $property->price])
        </div>
    </div>
    @include('components.input', ['type' => 'textarea', 'name' => 'description', 'label' => 'Description', 'value' => $property->description])
    <div class="row">
        @include('components.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pièces', 'value' => $property->rooms])
        @include('components.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'value' => $property->bedrooms])
        @include('components.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Étages', 'value' => $property->floor])
    </div>

    <div class="row">
        @include('components.input', ['class' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address])
        @include('components.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city])
        @include('components.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code Postal', 'value' => $property->postal_code])
    </div>

    @include('components.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->option()->pluck('id'), 'multiple' => true, 'options' => $options])
    @include('components.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])

    <button class="btn btn-primary">{{ $property->exists ? 'Modifier' : 'Créer' }}</button>
</form>
