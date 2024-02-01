# API CarManage

## Visão Geral

A API CarManage oferece funcionalidades para gerenciar usuários e carros, permitindo associações entre eles.

## Rotas Disponíveis

### Usuários

#### Listar Todos os Usuários

**Rota:** `GET /api/v1/users`

Retorna uma lista de todos os usuários cadastrados.

#### Detalhes do Usuário

**Rota:** `GET /api/v1/users/{userId}`

Obtém os detalhes de um usuário específico com base no ID fornecido.

#### Criar Novo Usuário

**Rota:** `POST /api/v1/users`

Cria um novo usuário com base nos dados fornecidos no corpo da requisição.

#### Atualizar Usuário

**Rota:** `PUT /api/v1/users/{userId}`

Atualiza as informações de um usuário específico com base no ID fornecido.

#### Excluir Usuário

**Rota:** `DELETE /api/v1/users/{userId}`

Remove um usuário específico com base no ID fornecido.

#### Associar Carro a Usuário

**Rota:** `POST /api/v1/users/associate/cars`

Associa um carro a um usuário específico com base nos dados fornecidos no corpo da requisição.

#### Desassociar Carro de Usuário

**Rota:** `DELETE /api/v1/users/disassociate/cars`

Desassocia um carro de um usuário específico com base nos dados fornecidos no corpo da requisição.

#### Obter Carros de um Usuário

**Rota:** `GET /api/v1/users/{userId}/cars`

Obtém a lista de carros associados a um usuário específico com base no ID fornecido.

### Carros

#### Listar Todos os Carros

**Rota:** `GET /api/v1/cars`

Retorna uma lista de todos os carros cadastrados.

#### Detalhes do Carro

**Rota:** `GET /api/v1/cars/{carId}`

Obtém os detalhes de um carro específico com base no ID fornecido.

#### Criar Novo Carro

**Rota:** `POST /api/v1/cars`

Cria um novo carro com base nos dados fornecidos no corpo da requisição.

#### Atualizar Carro

**Rota:** `PUT /api/v1/cars/{carId}`

Atualiza as informações de um carro específico com base no ID fornecido.

#### Excluir Carro

**Rota:** `DELETE /api/v1/cars/{carId}`

Remove um carro específico com base no ID fornecido.

## Instruções de Instalação

1. Clone o repositório do projeto:

```bash
git clone https://github.com/GCorradoMMS/carmanage
```

2. Instale as dependências do projeto:

```bash
composer install
```

3. Copie o arquivo de ambiente de exemplo e ajuste as configurações:

```bash
cp .env.example .env
```

4. Configure seu banco de dados no arquivo `.env` com as credenciais apropriadas.

5. Crie o banco de dados e execute as migrações:

```bash
php artisan migrate
```

6. Execute os testes para garantir que tudo está configurado corretamente:

```bash
php artisan test
```

7. Inicie o servidor:

```bash
php artisan serve
```
É possível também utilizar o Docker para rodar o projeto com todas as dependências resolvidas utilizando:

```bash
docker compose build
```
e

```bash
docker compose up
```

A API estará disponível em `http://localhost:8000`. Agora você pode usar as rotas documentadas acima para interagir com a API CarManage.