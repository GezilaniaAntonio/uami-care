@extends('layouts.merge.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Criar Utilizador</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('form._formPlans.index')
            </form>
        </div>
    </div>
@endsection
