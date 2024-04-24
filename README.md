# Laravel + AlpineJS + Bootstrap

Este projeto integra recursos modernos para facilitar o cadastro e a atualização de dados por meio de modais utilizando Bootstrap para o design responsivo. As requisições Ajax são implementadas com Alpine.js e Laravel, proporcionando uma experiência fluida ao usuário sem a necessidade de recarregar a página. Explore a praticidade dos modais para operações de cadastro e atualização, aproveitando a elegância do Bootstrap, a agilidade do Alpine.js e a robustez do Laravel. Ideal para projetos que buscam interatividade eficiente e design intuitivo.

## Tecnologias Utilizadas

-   Laravel: Framework PHP poderoso e elegante.
-   Bootstrap: Biblioteca de design e estilos para criar interfaces web responsivas.
-   Alpine.js: Framework JavaScript minimalista para desenvolver componentes interativos do lado do cliente.
-   Ajax: Utilizado para comunicação assíncrona entre o frontend (Alpine.js) e o backend (Laravel).

## Como Executar o Projeto Localmente

Pré-requisitos:

-   PHP instalado
-   Composer instalado
-   Node.js e NPM instalados

## Instalação

Clone o repositório, usando:

```bash
git clone https://github.com/MarcelSecco1/AlpineJS-Laravel.git
cd AlpineJS-Laravel
```

Instale o composer e o node no projeto:

```bash
composer install
npm install
```

Inicie seus containers:

```bash
 docker compose up -d
```

Por fim copia o .env.example para o .env e gere a key do Laravel:

```bash
 copy .env.example .env
 docker compose exec app php artisan key:generate
```

Rode as migrations:

```bash
 docker compose exec app php artisan migrate
```

Execute o script dev:
```bash
 npm run dev
```

Seu projeto estará disponível na em [http://localhost:8989](http://localhost:8989)