<div x-data="{
    user: {
        name: 'Marcel Secco',
        email: 'teste@gmail.com',
        password: '123456'
    },

    openmodal() {
        const modal = new bootstrap.Modal('#myModal');
        modal.show();
    },


    errors: [],
    async enviar() {

        const token = document.querySelector('#__token').getAttribute('content');
        const response = await fetch('/users', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(this.user)
        });

        console.log(response)
        const data = await response.json();

        this.errors = data.errors;
    }
}" @modal-user.window="openmodal">
    <div class="modal fade" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulário - Cadastro de usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- chama funcao enviar --}}
                <form x-on:submit.prevent="enviar">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                                placeholder="Ex. Marcel Secco" x-model="user.name">
                            <template x-if="errors.name">
                                <span class="text-danger" x-text="errors.name[0]"></span>
                            </template>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="email"
                                placeholder="email@email.com" x-model="user.email">
                            <template x-if="errors.email">
                                <span class="text-danger" x-text="errors.email[0]"></span>
                            </template>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Senha:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="password"
                                x-model="user.password">
                            <template x-if="errors.password">
                                <span class="text-danger" x-text="errors.password[0]"></span>
                            </template>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
