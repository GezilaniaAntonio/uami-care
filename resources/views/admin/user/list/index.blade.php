@extends('layouts.merge.dashboard')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Lista de Utilizadores</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Utilizadores</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Hoje</a></li>
                                        <li><a class="dropdown-item" href="#">Este Mês</a></li>
                                        <li><a class="dropdown-item" href="#">Este Ano</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">

                                    <!-- BOTÃO ADICIONAR NOVO UTILIZADOR -->
                                    <div class="d-flex justify-content-end mb-4 me-5 mt-3">
                                        <a href="{{ route('admin.users.create') }}"
                                            class="btn btn-success btn-sm bg-success">
                                            <i class="bi bi-person-plus"></i> Novo
                                        </a>
                                    </div>


                                    <h5 class="card-title">Utilizadores do Sistema</h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Função</th>
                                                <th scope="col">Operações</th>
                                                <th scope="col">Acções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="#">#{{ $item->id }}</a>
                                                    </th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <a href="#" class="text-primary">
                                                            {{ $item->email }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $item->role ?? 'Administrador' }}</td>
                                                    <td>
                                                        <span class="badge bg-success">Aprovado</span>
                                                    </td>

                                                    <td>
                                                        <!-- Ícones de Ação -->
                                                        <a href="{{ route('admin.users.edit', $item->id) }}"
                                                            class="btn btn-sm btn-warning" title="Editar">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>

                                                        <a href="{{ route('admin.users.show', $item->id) }}"
                                                            class="btn btn-sm btn-info" title="Detalhes">
                                                            <i class="bi bi-eye"></i>
                                                        </a>

                                                        <form action="{{ route('admin.users.destroy', $item->id) }}"
                                                            method="POST" style="display:inline-block;"
                                                            onsubmit="return confirm('Tem certeza que deseja excluir este utilizador?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Eliminar">
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
                        <!-- End Recent Sales -->

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
