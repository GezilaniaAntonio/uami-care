@extends('layouts.merge.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Criar Utilizador</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('form._formUsers.index')
            </form>
        </div>
    </div>
@endsection
