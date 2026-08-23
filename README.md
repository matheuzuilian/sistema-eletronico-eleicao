# Sistema de Votação

## Descrição

O Sistema de Votação é uma aplicação web desenvolvida em Laravel para gerenciar o processo de eleição de diretores e coordenadores. O sistema permite o cadastro de candidatos, realização da votação pelos usuários e visualização de relatórios, oferecendo uma interface simples e intuitiva.

## Tecnologias Utilizadas

- PHP
- Laravel
- Bootstrap 5
- HTML5
- CSS3
- MySQL

## Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/matheuzuilian/sistema-eletronico-eleicao.git
```

### 2. Acesse a pasta do projeto

```bash
cd sistema-eletronico-eleicao
```

### 3. Instale as dependências

```bash
composer install
```

### 4. Configure o arquivo `.env`

Copie o arquivo de exemplo:

```bash
cp .env.example .env
```

Configure as informações do banco de dados no arquivo `.env`.

### 5. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 6. Execute as migrações

```bash
php artisan migrate
```

### 7. Inicie o servidor

```bash
php artisan serve
```

O sistema estará disponível em:

```
http://127.0.0.1:8000
```

## Como usar
## Eleitor
1. Acesse a tela de login.
2. Entre no sistema.
3. Escolha um candidato para Diretor.
4. Confirme o voto.
5. Escolha um candidato para Coordenador.
6. Confirme o voto.
7. Visualize a confirmação do voto registrado.

## Administrador
1.Acesse a tela de login
2. Selecionar a opção desejada

## Estrutura do Projeto

- `app/` → Controllers, Models e regras de negócio.
- `resources/views/` → Telas da aplicação (Blade).
- `routes/web.php` → Rotas da aplicação.
- `public/` → Arquivos públicos, como imagens e CSS.

## Autores

- Alison Fernandes
- Matheus Gonçalves
- Mateus José
- Gilson Dias
- Osmar Rodrigo
- Daniel Garcia

## Licença

Este projeto foi desenvolvido para fins acadêmicos.
