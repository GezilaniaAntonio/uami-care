@extends('layouts.merge.dashboard')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Lista de Planos</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Planos</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <!-- BOTÃO ADICIONAR NOVO PLANO -->
                            <div class="d-flex justify-content-end mb-4 me-5 mt-3">
                                <a href="{{ route('admin.plans.create') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-plus"></i> Novo
                                </a>
                            </div>

                            <h5 class="card-title">Planos do Sistema</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Seguradora</th>
                                        <th>Nome</th>
                                        <th>Preço</th>
                                        <th>Duração</th>
                                        <th>Descrição</th>
                                        <th>Estado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <th scope="row">#{{ $plan->id }}</th>
                                            <td>{{ $plan->insurance->name ?? 'Sem seguradora' }}</td>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>{{ $plan->duration }}</td>
                                            <td>{{ Str::limit($plan->description, 50) }}</td>
                                            <td>
                                                <span class="badge {{ $plan->active ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $plan->active ? 'Ativo' : 'Inativo' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.plans.edit', $plan->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>


                                                <a href="{{ route('admin.plans.show', $plan->id) }}"
                                                    class="btn btn-sm btn-info" title="Detalhes">
                                                    <i class="bi bi-eye"></i>
                                                </a>

                                                <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST"
                                                    style="display:inline-block;"
                                                    onsubmit="return confirm('Tem certeza que deseja excluir este plano?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
