# Sistema Eletrônico de Eleição

Aplicação web em **Laravel** para realizar eleições de **diretor e coordenadores** em escolas públicas. O administrador cadastra escolas, eleitores, candidatos e chapas e abre a votação; o eleitor entra com CPF e senha, escolhe uma chapa, confirma e tem o voto registrado.

Projeto de extensão acadêmico, desenvolvido em equipe.

## Funcionalidades

**Eleitor**
- Login com CPF e senha
- Visualização das chapas da eleição aberta na sua escola
- Confirmação do voto antes de registrar
- Voto único: depois de votar, o eleitor não consegue entrar novamente

**Administrador**
- Login com CPF e senha
- CRUD de escolas, eleitores (professor, aluno ou responsável), candidatos e chapas
- Abertura da votação por escola, com data e hora de início (duração de 24 horas)

**Chapas**
Cada chapa é formada por **1 diretor e 2 coordenadores**, e o eleitor vota na chapa inteira (um único voto).

## Tecnologias

- PHP 8.2+ e Laravel 12
- Blade (templates) e Bootstrap 5 (via CDN)
- MySQL ou SQLite (o `.env.example` vem configurado com SQLite)
- PHPUnit (configurado, sem testes escritos ainda)

## Pré-requisitos

- PHP 8.2 ou superior
- Composer
- MySQL, caso não queira usar SQLite

## Instalação

```bash
# 1. Clonar o repositório
git clone https://github.com/matheuzuilian/sistema-eletronico-eleicao.git
cd sistema-eletronico-eleicao

# 2. Instalar as dependências
composer install

# 3. Criar o arquivo de ambiente e gerar a chave
cp .env.example .env
php artisan key:generate
```

### 4. Configurar o banco de dados

**Opção A: SQLite (padrão, sem instalar nada)**

```bash
touch database/database.sqlite
```

**Opção B: MySQL.** Crie o banco e ajuste o `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eleicao
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Criar as tabelas e o administrador inicial e o eleitor

```bash
php artisan migrate --seed
```

O seeder cria um administrador para o primeiro acesso e um eleitor de teste:

--- ADM ---
| Campo | Valor |
|-------|-------|
| CPF   | `00000000000` |
| Senha | `admin123` |

--- Eleitor ---
| Campo | Valor |
|-------|-------|
| CPF   | `11111111111` |
| Senha | `eleitor123` |

> Essas credenciais servem só para desenvolvimento. Troque-as antes de usar o sistema de verdade.

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse `http://127.0.0.1:8000`.

## Como usar

### Primeiro uso (administrador)

1. Na tela de login, clique em **Acessar área do Administrador** e entre com as credenciais acima.
2. Cadastre a **escola** em *Gerenciar Escolas*.
3. Cadastre os **candidatos** (diretor e coordenadores) em *Gerenciar Candidatos*.
4. Monte as **chapas** em *Gerenciar Chapas*.
5. Cadastre os **eleitores** em *Gerenciar Eleitores*. A senha inicial do eleitor é a matrícula ou, se ele não tiver matrícula, o CPF.
6. Clique em **Iniciar Votação**, escolha a escola e defina a data e a hora de início.

### Votação (eleitor)

1. Entre com CPF e senha.
2. Escolha a chapa.
3. Confirme o voto.
4. O sistema registra o voto e exibe a tela de confirmação.

## Estrutura do projeto

```
app/
├── Http/
│   ├── Controllers/    # Administrador, Candidato, Chapa, Eleicao, Eleitor, Escola, Voto
│   └── Middleware/     # AdminAutenticado, EleitorAutenticado
└── Models/             # Pessoa, Administrador, Eleitor, Escola, Eleicao, Candidato, Chapa, Voto
database/
├── migrations/         # Estrutura do banco
└── seeders/            # AdminSeeder (administrador inicial)
resources/views/        # Telas em Blade (login, gerenciamento, votação)
routes/web.php          # Rotas da aplicação
public/images/          # Ícones usados nas telas
```

### Modelo de dados

- **Pessoa**: dados pessoais (nome, e-mail, CPF, data de nascimento), compartilhados por administradores, eleitores e candidatos
- **Escola**: onde a eleição acontece
- **Administrador** e **Eleitor**: papéis de uma Pessoa (o eleitor pertence a uma escola)
- **Eleicao**: votação de uma escola (início, fim e status: `aberta`, `encerrada` ou `aguardando`)
- **Candidato** e **Chapa**: a chapa reúne 1 diretor e 2 coordenadores
- **Voto**: liga o eleitor à chapa escolhida, com um hash único

## Status e próximos passos

- [ ] Geração de relatório de resultados (a tela existe, mas ainda não apura os votos)
- [ ] Criptografar as senhas (hoje ficam salvas e comparadas em texto puro)
- [ ] Encerramento automático da eleição ao fim do período
- [ ] Testes automatizados

## Autores

- Alison Fernandes
- Matheus Gonçalves
- Mateus José
- Gilson Dias
- Osmar Rodrigo
- Daniel Garcia

## Licença

Projeto desenvolvido para fins acadêmicos.
