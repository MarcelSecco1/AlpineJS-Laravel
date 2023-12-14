{{-- chama o objeto user dentro de app.js --}}
<div x-data="_user" @modal-user.window="openmodal">
    {{--  modal --}}
    <div class="modal fade" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        x-text="user.id ? 'Formulário - Edição de usuário' : 'Formulário - Cadastro de usuário'"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- mostra o loading --}}
                <template x-if="processando">
                    <div style="width: 100px; heigth: 100px;" class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="40"
                                cy="65">
                                <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate>
                            </circle>
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="100"
                                cy="65">
                                <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate>
                            </circle>
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="160"
                                cy="65">
                                <animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate>
                            </circle>
                        </svg>
                    </div>
                </template>
                {{-- msg de sucesso --}}
                <template x-if="success">
                    <span class="alert alert-success text-center mt-2" x-text="success"></span>
                </template>
                {{-- chama funcao enviar --}}
                <form x-on:submit.prevent="enviar">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                                placeholder="Ex. Marcel Secco" x-model="user.name">
                            {{-- define a mensagem de erro --}}
                            <template x-if="errors.name">
                                <span class="text-danger" x-text="errors.name[0]"></span>
                            </template>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="email"
                                placeholder="email@email.com" x-model="user.email">
                            {{-- define a mensagem de erro --}}
                            <template x-if="errors.email">
                                <span class="text-danger" x-text="errors.email[0]"></span>
                            </template>
                        </div>
                        <template x-if="!user.id">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Senha:</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="password"
                                    x-model="user.password">
                                {{-- define a mensagem de erro --}}
                                <template x-if="errors.password">
                                    <span class="text-danger" x-text="errors.password[0]"></span>
                                </template>
                            </div>
                        </template>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        {{-- o texto ou vai ser atualizar ou criar --}}
                        <button type="submit" class="btn btn-primary"
                            x-text="user.id ? 'Atualizar' : 'Criar'"></button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
