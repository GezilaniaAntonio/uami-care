<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{



    public function index()
    {
        $insurances = Insurance::orderByDesc('id')->get();
        return view('admin.insurance.list.index', compact('insurances'));
    }


    public function create()
    {
        return view('admin.insurance.create.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'email' => 'nullable|string',
            'phone'       => 'required|string',
            'address'     => 'required|string',
            'active'      => 'required|boolean',
        ]);

        Insurance::create($request->only('name', 'email', 'phone', 'address', 'active'));

        return redirect()->route('admin.insurance.index')
                         ->with('success', 'Seguradora criada com sucesso!');
    }


    public function show(Insurance $insurance)
    {
        return view('admin.insurance.detail.index', compact('insurance'));
    }


    public function edit(Insurance $insurance)
    {
        return view('admin.insurance.edit.index', compact('insurance'));
    }

    public function update(Request $request, Insurance $insurance)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email' => 'nullable|string',
            'phone'       => 'required|string',
            'address'     => 'required|string',
            'active'      => 'required|boolean',
        ]);

        $insurance->update($request->only('name', 'email', 'phone', 'address', 'active'));

        return redirect()->route('admin.insurance.index')
                         ->with('success', 'Seguradora atualizada com sucesso!');
    }


    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        return redirect()->route('admin.insurance.index')
                         ->with('success', 'Insurance deleted successfully!');
    }
}
