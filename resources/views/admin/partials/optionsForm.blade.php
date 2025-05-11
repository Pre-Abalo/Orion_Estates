<form class="vstack gap-2" action="{{ route($option->exists ? 'admin.options.update' : 'admin.options.store', $option) }}"
      method="post">
    @csrf
    @method($option->exists ? 'PUT' : 'POST')

    @include('components.input', ['class' => 'col', 'name' => 'name', 'label' => 'Nom de l\'option', 'value' => $option->name])

    <button class="btn btn-primary">{{ $option->exists ? 'Modifier' : 'Créer' }}</button>
</form>
