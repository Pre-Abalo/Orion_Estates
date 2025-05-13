<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%$title%");
        }
        if ($city = $request->validated('city')) {
            $query = $query->where('city', 'like', "%$city%");
        }

        return view('pages.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property): View | RedirectResponse
    {
        $expectedSlug = $property->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('properties.show', [
                'property' => $property,
                'slug' => $expectedSlug
            ]);
        }
        return \view('pages.show', [
            'property' => $property
        ]);
    }
}
