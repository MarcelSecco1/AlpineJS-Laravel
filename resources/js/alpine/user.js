import { user } from './state.js';
export default () => ({
    //variaveis globais
    user: user,
    errors: [],
    success: '',
    processando: false,
    modal: {},

    //evento de abrir o modal
    openmodal(event) {
        // verifica se o objeto tem propriedades (se tem algum usuario)
        if (Object.keys(event.detail).length) {
            //define o usuario se foi passado
            this.user = event.detail;
        } else {
            //define o usuario padrao
            this.user = user;
        }
        this.modal = new bootstrap.Modal('#myModal');
        this.modal.show();
    },

    //envia os dados pro back-end UserController.php
    async enviar() {
        this.processando = true;
        //padrao do laravel csrf token
        const token = document.querySelector('#__token').getAttribute('content');

        let endpoint = '/users'
        let method = 'POST';
        if (this.user.id) {
            endpoint = '/users/update/' + this.user.id;
            method = 'PUT';
        }

        //espera o retorno do back-end
        const response = await fetch(endpoint, {
            //passa o metodo post
            method,
            //define o token e o tipo de conteudo
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
            },
            //converte o objeto em json
            body: JSON.stringify(this.user)
        });

        //espera o retorno do back-end em json
        const data = await response.json();

        //verifica se o retorno foi ok 200 e exibe uma msg de sucesso
        if (response.ok) {
            this.processando = false;
            this.success = data.success;
            //limpa a msg de sucesso depois de 5 segundos
            return setTimeout(() => {
                this.success = '';
                this.modal.hide();
            }, 3000);
        }

        //exibe os erros se existirem
        this.errors = data.errors;
        this.processando = false;

        //limpa os erros depois de 5 segundos
        setTimeout(() => {
            this.errors = [];
        }, 5000);
    }
});