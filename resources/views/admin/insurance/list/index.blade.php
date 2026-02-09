@extends('layouts.merge.dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lista de Seguradoras</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Seguradoras</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">

                    <!-- Botão adicionar nova seguradora -->
                    <div class="d-flex justify-content-end mb-4 me-5 mt-3">
                        <a href="{{ route('admin.insurance.create') }}" class="btn btn-success btn-sm bg-success">
                            <i class="bi bi-plus"></i> Novo
                        </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Seguradoras Cadastradas</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($insurances as $insurance)
                                <tr>
                                    <th scope="row">{{ $insurance->id }}</th>
                                    <td>{{ $insurance->name }}</td>
                                    <td>{{ $insurance->email ?? '-' }}</td>
                                    <td>{{ $insurance->phone ?? '-' }}</td>
                                    <td>{{ $insurance->address ?? '-' }}</td>
                                    <td>
                                        @if($insurance->active)
                                            <span class="badge bg-success">Ativo</span>
                                        @else
                                            <span class="badge bg-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Botões de ação -->
                                        <a href="{{ route('admin.insurance.edit', $insurance->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="{{ route('admin.insurance.show', $insurance->id) }}" class="btn btn-sm btn-info" title="Detalhes">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <form action="{{ route('admin.insurance.destroy', $insurance->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir esta seguradora?');">
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
