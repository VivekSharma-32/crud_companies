<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'postal_code' => 'required|string|max:20',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'tax_identification_number' => 'required|string|unique:companies|max:255',
        ]);

        return Company::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Company::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'postal_code' => 'required|string|max:20',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'tax_identification_number' => 'required|string|max:255|unique:companies,tax_identification_number,' . $company->id,
        ]);

        $company->update($request->all());

        return $company;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(['message' => 'Company deleted successfully']);
    }
}
