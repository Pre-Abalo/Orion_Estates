<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPropertiesFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('admin.pages.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25),
            'page' => $request->input('page'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'title' => fake()->sentence(3),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->numberBetween(100000, 1000000),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'surface' => fake()->numberBetween(20, 300),
            'rooms' => fake()->numberBetween(2, 10),
            'bedrooms' => fake()->numberBetween(1, 5),
            'floor' => fake()->numberBetween(0, 15),
            'postal_code' => fake()->postcode(),
        ]);
        return view('admin.pages.properties.create', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPropertiesFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->option()->sync($request->validated('options'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                if ($key >= 3) break; // Maximum 3 images

                $path = $image->store('property_images', 'public');
                $property->images()->create(['image_path' => $path]);
            }
        }

        return to_route('admin.properties.index')->with('success', 'Property created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View
    {
        return view('admin.pages.properties.edit', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPropertiesFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->option()->sync($request->validated('options'));
        return to_route('admin.properties.index')->with('success', 'Property modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.properties.index')->with('success', 'Property dropped successfully');
    }
}
