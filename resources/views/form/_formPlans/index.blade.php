@extends('layouts.merge.dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Criar Novo Plano</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.plans.index') }}">Planos</a></li>
                <li class="breadcrumb-item active">Criar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12 px-2">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Adicionar Novo Plano</h5>

                        <form method="POST" action="{{ route('admin.plans.store') }}">
                            @csrf

                            <div class="row g-3">

                                <div class="col-12">
                                    <select name="insurance_id" class="form-select">
                                        <option value="">Selecionar Seguradora</option>
                                        @foreach($insurances as $insurance)
                                            <option value="{{ $insurance->id }}">{{ $insurance->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Nome do plano" value="{{ old('name') }}">
                                </div>

                                <div class="col-12">
                                    <input type="number" name="price" class="form-control" placeholder="Preço" value="{{ old('price') }}">
                                </div>

                                <div class="col-12">
                                    <input type="text" name="duration" class="form-control" placeholder="Duração (ex: 1 Ano)" value="{{ old('duration') }}">
                                </div>

                                <div class="col-12">
                                    <textarea name="description" class="form-control" placeholder="Descrição do plano">{{ old('description') }}</textarea>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="active" value="1" class="form-check-input" checked>
                                        <label class="form-check-label">Ativo</label>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-save"></i> Cadastrar
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Limpar
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
