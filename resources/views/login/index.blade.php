<x-layout title="Clientes">
    <section class=" text-center text-lg-start">
        <style>
            .rounded-t-5 {
                border-top-left-radius: 0.5rem;
                border-top-right-radius: 0.5rem;
            }

            @media (min-width: 992px) {
                .rounded-tr-lg-0 {
                    border-top-right-radius: 0;
                }

                .rounded-bl-lg-5 {
                    border-bottom-left-radius: 0.5rem;
                }
            }
            .custom-button {
                background-color: #DA5C5C;
                border-color: #DA5C5C;
                font-weight: bold;
            }
            .custom-button:hover {
                background-color: #DA5C5C;
                border-color: #DA5C5C;
                color: #000000;
        </style>
        <div class="card mb-3 mt-4">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <img src="https://i.ibb.co/pW12VjX/buffet2.jpg" alt="Trendy Pants and Shoes"
                         class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                </div>
                <div class="col-lg-8">
                    <div class="card-body py-5 px-md-5">

                        <form method="post">
                            @csrf

                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email", name="email", id="email", class="form-control" placeholder="Insira seu e-mail">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password", name="password", id="password", class="form-control" placeholder="Insira sua senha">
                            </div>

                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31">Se lembrar</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <a href="{{ route('users.create') }}">Esqueceu a senha?</a>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-3 custom-button">Entrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
