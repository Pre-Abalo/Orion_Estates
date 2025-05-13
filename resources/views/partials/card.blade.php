<div class="card h-100">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">
            <a href="{{ route('properties.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
                {{ $property->title }}
            </a>
        </h5>
        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="mt-auto">
            <div class="text-primary fw-bold" style="font-size: 1.4rem;">
                {{ number_format($property->price, thousands_separator: ' ') }} €
            </div>
        </div>
    </div>
</div>
