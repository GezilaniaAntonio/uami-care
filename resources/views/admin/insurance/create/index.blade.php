@extends('layouts.merge.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Criar Utilizador</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.insurance.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('form._formInsurances.index')
            </form>
        </div>
    </div>
@endsection
