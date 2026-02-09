<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Insurance;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $response['plans'] = Plan::with('insurance')->orderByDesc('id')->get();
        return view('admin.plan.list.index', $response);
    }

    public function create()
    {
        $response['insurances'] = Insurance::orderByDesc('id')->get();
        return view('admin.plan.create.index', $response);
    }

    public function store(Request $request,Plan $plan)
    {
        $request->validate([
            'insurance_id' => 'required|exists:insurances,id',
            'name'         => 'required|string',
            'price'        => 'required|integer',
            'description'  => 'nullable|string',
            'duration'     => 'required|string',
            'active'       => 'nullable|boolean',
        ]);

        $data = $request->only(['insurance_id', 'name', 'price', 'description', 'duration']);
        $data['active'] = $request->has('active') ? 1 : 0;

        $plan = Plan::create($data);


            return redirect()->route('admin.plans.index')->with('success', 'Plano criado com sucesso!');



    }

    public function show(Plan $plan)

    {   $plan->load('insurance');
         return view('admin.plan.detail.index', compact('plan'));
    }

    public function edit(Plan $plan)
    {
        $response['plan'] = $plan;
        $response['insurances'] = Insurance::orderByDesc('id')->get();
        return view('admin.plan.edit.index', $response);
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'insurance_id' => 'required|exists:insurances,id',
            'name'         => 'required|string|',
            'price'        => 'required|integer',
            'description'  => 'nullable|string',
            'duration'     => 'required|string|',
            'active'       => 'nullable|boolean',
        ]);

        $data = $request->only(['insurance_id', 'name', 'price', 'description', 'duration']);
        $data['active'] = $request->has('active') ? 1 : 0;

        $plan->update($data);

        return redirect()->route('admin.plans.index')->with('success', 'Plano atualizado com sucesso!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back()->with('success', 'Plano deletado com sucesso!');
    }
}
