Sistema de Etiquetas - Documentação

Visão Geral
Este projeto é um sistema para geração e gerenciamento de etiquetas de entrega, desenvolvido em Laravel com arquitetura DDD (Domain-Driven Design).

Pré-requisitos
- PHP 8.1+
- Composer 2.0+
- MySQL 5.7+ ou MariaDB 10.3+
- Node.js 14+ (para assets)
- Git (para controle de versão)

Instalação
1. Clonar o repositório:
git clone https://github.com/seu-usuario/sistema-etiquetas.git
cd sistema-etiquetas

2. Instalar dependências PHP:
composer install

3. Criar arquivo de ambiente:
cp .env.example .env

4. Configurar o banco de dados (editar .env):
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

5. Gerar chave da aplicação:
php artisan key:generate

6. Executar migrações:
php artisan migrate --seed

7. Instalar dependências frontend (opcional):
npm install
npm run dev

Estrutura do Projeto (DDD)
app/
└── Domain/
    ├── Vendedores/
    ├── Transportadoras/
    ├── Pedidos/
    └── Etiquetas/

Executando o Projeto
1. Iniciar servidor:
php artisan serve

2. Acessar:
http://localhost:8000

3. API Endpoints:
- Consulte a coleção Postman fornecida

Testes
php artisan test

Principais Rotas API
GET    /api/vendedores               Listar vendedores
POST   /api/vendedores               Criar vendedor
GET    /api/vendedores/{id}          Obter vendedor
PUT    /api/vendedores/{id}          Atualizar vendedor
DELETE /api/vendedores/{id}          Remover vendedor
GET    /api/transportadoras          Listar transportadoras
POST   /api/transportadoras          Criar transportadora
GET    /api/etiquetas                Listar etiquetas
POST   /api/etiquetas                Criar etiqueta

Dependências Principais
- Laravel 10
- PHPUnit
- Guzzle

Contribuição
1. Fork do projeto
2. Crie uma branch para sua feature
3. Commit suas mudanças
4. Push para a branch
5. Abra um Pull Request

Licença
MIT - veja LICENSE

Contato
Desenvolvedor - [Walder Silva] - walderalexandre@gmail.com
Repositório: https://github.com/walderalexandre/etiquetas-entrega-app