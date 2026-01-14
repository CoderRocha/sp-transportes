# 🚚 SP Transportes

> **Sistema de Rastreamento de Fretes**

![SP Transportes](https://img.shields.io/badge/SP%20Transportes-v1.0.0-5BA32C?style=for-the-badge&logo=laravel&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-11.31-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-4.5-FF2D20?style=for-the-badge&logo=filamentphp)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.4-38bdf8?style=for-the-badge&logo=tailwind-css)

## Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Instalação](#instalação)
- [Como Utilizar](#como-utilizar)
- [API Endpoints](#api-endpoints)
- [Estrutura do Projeto](#-estrutura-do-projeto)

## Sobre o Projeto

O **SP Transportes** é um sistema completo de gestão e rastreamento de fretes desenvolvido em Laravel. A aplicação permite gerenciar clientes, criar e acompanhar envios, adicionar etapas de transporte e fornecer rastreamento através de códigos únicos gerados automaticamente.

### Características Principais

- **Gestão de Clientes**: Cadastro e gerenciamento de remetentes e destinatários
- **Rastreamento de Fretes**: Sistema completo com códigos únicos de rastreio
- **Etapas de Transporte**: Acompanhamento detalhado de cada etapa do frete
- **Status em Tempo Real**: Três status principais (Em Trânsito, Saiu para Entrega, Entregue)
- **Painel Administrativo**: Interface completa via Filament para gestão do sistema
- **Rastreamento**: Página para consulta de fretes por código de rastreio
- **Histórico de Cliente**: Visualização de todos os fretes enviados e recebidos por telefone

## Funcionalidades

### Gestão de Clientes

- Cadastro de clientes com nome e telefone
- Validação de telefone único
- Relacionamento com fretes enviados e recebidos

### Gestão de Fretes

- Criação de fretes com origem e destino
- Geração automática de código de rastreio único
- Vinculação de remetente e destinatário
- Status inicial automático: "Em Trânsito"
- Código de rastreio único

### Etapas de Transporte

- Adição de etapas descritivas ao frete
- Atualização automática do status do frete baseado no tipo de etapa
- Validação: não permite adicionar etapas em fretes já entregues
- Tipos de etapa:

  - `EM_TRANSITO`: Mantém ou define status como "Em Trânsito"
  - `SAIU_PARA_ENTREGA`: Atualiza status para "Saiu para Entrega"
  - `ENTREGUE`: Finaliza o frete com status "Entregue"

### Status de Fretes

- **Em Trânsito**: Frete em transporte
- **Saiu para Entrega**: Frete a caminho do destinatário
- **Entregue**: Frete finalizado

### Painel Administrativo

- Interface completa de gestão
- CRUD de Clientes
- CRUD de Fretes
- Gerenciamento de Etapas via Relation Manager
- Visualização detalhada de registros
- Gerenciamento de Usuários

### Consulta por Código de Rastreio

- Consulta de frete por código de rastreio
- Visualização de todas as etapas do frete
- Informações do remetente e destinatário
- Status atual do frete

### Consulta por Telefone do Cliente

- Consulta por número de telefone
- Visualização de todos os fretes enviados
- Visualização de todos os fretes recebidos
- Histórico completo de transportes

## 🛠 Tecnologias Utilizadas

- **[Laravel 11](https://laravel.com/)**
- **[PHP 8.2+](https://www.php.net/)**
- **[Filament 4.5](https://filamentphp.com/)**
- **[Tailwind CSS 3.4](https://tailwindcss.com/)**
- **[MySQL](https://www.mysql.com/)**

## Instalação

Antes de começar, certifique-se de ter instalado:

- **PHP** 8.2+
- **Composer** 2.0+
- **Node.js** 18.0+
- **NPM** 9.0+

Depois de instalar as dependências, siga o passo a passo abaixo:

1. **Clone o repositório**

   ```bash
   git clone https://github.com/coderrocha/sp-transportes.git
   cd sp-transportes
   ```

2. **Instale as dependências (PHP)**

   ```bash
   composer install
   ```

3. **Instale as dependências (JS)**

   ```bash
   npm install
   ```

4. **Configure o ambiente**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure o banco de dados**

   Configure o banco de dados MySQL no arquivo `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sp_transportes
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

   Certifique-se de criar o banco de dados antes de executar as migrações:

   ```sql
   CREATE DATABASE sp_transportes;
   ```

6. **Execute as migrações**

   ```bash
   php artisan migrate
   ```

7. **Crie um usuário administrador**

   Crie o primeiro usuário com o comando:

   ```bash
   php artisan make:filament-user
   ```

8. **Execute o projeto localmente**

   ```bash
   php artisan serve
   ```

9. **Acesse a aplicação**

   - **Página Inicial**: [http://localhost:8000](http://localhost:8000)
   - **Painel Admin**: [http://localhost:8000/admin](http://localhost:8000/admin)

## Como Utilizar

### Painel Administrativo

1. Acesse `/admin` e faça login
2. **Gerenciar Clientes**: Crie, edite e visualize clientes
3. **Gerenciar Fretes**: Crie novos fretes vinculando remetente e destinatário
4. **Adicionar Etapas**: No detalhe do frete, use o Relation Manager para adicionar etapas
5. **Acompanhar Status**: O status é atualizado automaticamente conforme as etapas são adicionadas

### Consulta por Código de Rastreio

1. Acesse a página inicial e insira o código de rastreio
2. Visualize todas as informações do frete e suas etapas

### Histórico de Cliente

1. Acesse a página inicial e insira o número do telefone do cliente
2. Visualize todos os fretes enviados e recebidos pelo cliente

## API Endpoints

### POST `/api/clientes`

Cria um novo cliente.

**Request Body:**
```json
{
  "nome": "João Silva",
  "telefone": "11999999999"
}
```

**Response:**
```json
{
  "id": 1,
  "nome": "João Silva",
  "telefone": "11999999999",
  "created_at": "2026-01-05T23:41:23.000000Z",
  "updated_at": "2026-01-05T23:41:23.000000Z"
}
```

### POST `/api/fretes`

Cria um novo frete com código de rastreio gerado automaticamente.

**Request Body:**
```json
{
  "origem": "São Paulo, SP",
  "destino": "Rio de Janeiro, RJ",
  "remetente_id": 1,
  "destinatario_id": 2
}
```

**Response:**
```json
{
  "id": 1,
  "origem": "São Paulo, SP",
  "destino": "Rio de Janeiro, RJ",
  "codigo_rastreio": "ABCD1234",
  "status": "Em Trânsito",
  "remetente_id": 1,
  "destinatario_id": 2,
  "created_at": "2026-01-05T23:43:05.000000Z",
  "updated_at": "2026-01-05T23:43:05.000000Z"
}
```

### POST `/api/etapas`

Adiciona uma nova etapa ao frete e atualiza o status automaticamente.

**Request Body:**
```json
{
  "frete_id": 1,
  "descricao": "Frete chegou ao centro de distribuição de São Paulo",
  "tipo_etapa": "EM_TRANSITO"
}
```

**Valores válidos para `tipo_etapa`:**
- `EM_TRANSITO`
- `SAIU_PARA_ENTREGA`
- `ENTREGUE`

**Response:**
```json
{
  "id": 1,
  "frete_id": 1,
  "descricao": "Frete chegou ao centro de distribuição de São Paulo",
  "created_at": "2026-01-05T23:45:24.000000Z",
  "updated_at": "2026-01-05T23:45:24.000000Z"
}
```
### Tratamento de Erros

A API retorna erros padronizados para facilitar o tratamento na requisição. Todos os erros incluem uma mensagem no corpo da resposta.

#### Erro 422 - Validação de Dados

Retornado quando os dados enviados não atendem às regras de validação. A resposta inclui detalhes sobre quais campos falharam.

**POST `/api/clientes`:**
- `nome`: obrigatório, string, máximo 255 caracteres
- `telefone`: obrigatório, apenas números, único no sistema

**POST `/api/fretes`:**
- `origem`: obrigatório, string, máximo 255 caracteres
- `destino`: obrigatório, string, máximo 255 caracteres
- `remetente_id`: obrigatório, deve existir na tabela `clientes`
- `destinatario_id`: obrigatório, deve existir na tabela `clientes`

**POST `/api/etapas`:**
- `frete_id`: obrigatório, deve existir na tabela `fretes`
- `descricao`: obrigatório, string, máximo 255 caracteres
- `tipo_etapa`: obrigatório, deve ser um dos valores: `EM_TRANSITO`, `SAIU_PARA_ENTREGA`, `ENTREGUE`

#### Erro 400 - Regra de Negócio

Retornado quando a requisição é válida, mas viola alguma regra de negócio do sistema.

**POST `/api/etapas`:**
- Não é possível adicionar etapas em um frete que já foi entregue.

**Exemplo de resposta de erro:**

```json
{
  "message": "Não é possível adicionar etapas em um frete que já foi entregue."
}
```

Em caso de erro, verifique o conteúdo da resposta para identificar o problema e ajustar sua requisição conforme necessário.

## 📁 Estrutura do Projeto

```
sp-transportes/
├── app/
│   ├── Enums/
│   │   └── FreteStatus.php          # Enum status de frete
│   ├── Filament/
│   │   └── Resources/               # Recursos do painel Filament
│   │       ├── Clientes/
│   │       ├── Fretes/
│   │       └── Users/
│   ├── Http/
│   │   ├── Controllers/             # Controllers
│   │   │   ├── ClienteController.php
│   │   │   ├── FreteController.php
│   │   │   ├── EtapaController.php
│   │   │   ├── HomeController.php
│   │   │   ├── RastreamentoController.php
│   │   │   └── HistoricoController.php
│   │   └── Requests/                # Form Requests (validação)
│   │       ├── StoreClienteRequest.php
│   │       ├── StoreFreteRequest.php
│   │       └── StoreEtapaRequest.php
│   ├── Models/                      # Modelos
│   │   ├── Cliente.php
│   │   ├── Frete.php
│   │   ├── Etapa.php
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── Helpers.php                  # Funções auxiliares
├── database/
│   ├── migrations/                  # Migrations do banco de dados
│   │   ├── 2026_01_05_234123_create_clientes_table.php
│   │   ├── 2026_01_05_234305_create_fretes_table.php
│   │   └── 2026_01_05_234524_create_etapas_table.php
│   ├── seeders/
│   └── DatabaseSeeder.php           # Seeder do banco de dados
├── resources/
│   ├── views/                       # Views Blade
│   │   ├── home.blade.php
│   │   ├── frete/
│   │   │   ├── rastreamento.blade.php
│   │   │   └── historico.blade.php
│   │   └── components/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                      # Rotas web
│   └── api.php                      # Rotas API
├── public/                          # Arquivos public
├── config/                          # Arquivos de configuração
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
└── README.md
```

## Autor

**Guilherme Rocha (CoderRocha)**

- GitHub: [CoderRocha](https://github.com/coderrocha)
- LinkedIn: [Guilherme Rocha](https://www.linkedin.com/in/guilherme-rocha-da-silva)

---