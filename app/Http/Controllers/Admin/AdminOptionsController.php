<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminOptionsFormRequest;
use App\Http\Requests\Admin\AdminPropertiesFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.pages.options.index', [
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        return view('admin.pages.options.create', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminOptionsFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.options.index')->with('success', 'Option created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option): View
    {
        return view('admin.pages.options.edit', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminOptionsFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.options.index')->with('success', 'Option modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.options.index')->with('success', 'Option dropped successfully');
    }
}
