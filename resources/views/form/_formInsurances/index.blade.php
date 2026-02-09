<section class="section">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12 px-2"> <!-- largura mais compacta -->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Adicionar Nova Seguradora</h5>

                    <form method="POST" action="{{ route('admin.insurance.store') }}">
                        @csrf

                        <div class="row g-3"> <!-- grid para espaçamento -->
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" placeholder="Nome da Seguradora" required>
                            </div>

                            <div class="col-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                            </div>

                            <div class="col-12">
                                <input type="text" name="phone" class="form-control" placeholder="Telefone">
                            </div>

                            <div class="col-12">
                                <input type="text" name="address" class="form-control" placeholder="Endereço">
                            </div>

                            <div class="col-12">
                                <select name="active" class="form-select">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
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
