# 🎮 Logic Gate

Este projeto é uma aplicação web para simulação de portas lógicas e desafios de lógica digital. O objetivo é permitir que o usuário entenda o comportamento de circuitos como AND, OR, NOT, NAND, NOR e XOR em uma interface simples e interativa.

## ✅ O que o sistema oferece

- Simulação de portas lógicas básicas.
- Navegação entre páginas de login, cadastro, projeto, ranking e administração.
- Estrutura organizada em PHP com roteamento e views separadas.
- Possibilidade de servir o projeto localmente com Docker.

## 🧰 Requisitos da máquina

Antes de rodar o projeto, certifique-se de ter instalado:

- Git
- Docker Desktop (ou Docker Engine + Docker Compose)
- Editor de código, como VS Code
- Navegador (Chrome, Edge, Firefox)

## ▶️ Como rodar na sua máquina

### 1) Clone o projeto

Abra o terminal e execute:

```bash
git clone https://github.com/mercuriohg/logic-gate.git
cd logic-gate
```

Se o projeto já estiver em sua máquina, basta entrar na pasta:

```bash
cd /caminho/para/logic-gate
```

### 2) Inicie o ambiente com Docker

Na raiz do projeto, execute:

```bash
docker compose up --build
```

Esse comando irá criar o container PHP/Apache e expor a aplicação na porta 8080.

### 3) Acesse no navegador

Depois que o container subir corretamente, abra no navegador:

```text
http://localhost:8080
```

A página inicial da aplicação será carregada pelo roteamento principal.

## 🧭 Rotas do sistema

O projeto usa roteamento dentro da pasta `src/public/index.php`. As principais rotas são:

- `/` → página inicial
- `/login` → tela de login
- `/cadastro` → tela de cadastro
- `/projeto` → página do projeto / simulação
- `/ranking` → ranking de usuários
- `/admin` → painel administrativo

Exemplo:

```text
http://localhost:8080/login
```

## 📁 Estrutura principal

```text
logic-gate/
├── src/
│   ├── api/
│   ├── config/
│   ├── controllers/
│   ├── model/
│   ├── public/
│   └── views/
├── database/
├── docker/
├── docker-compose.yml
├── Dockerfile
├── README.md
└── LICENSE
```

## 🛠️ Se quiser parar ou reiniciar

Para encerrar os containers:

```bash
docker compose down
```

Para subir novamente:

```bash
docker compose up
```

## ⚠️ Observações importantes

- O projeto foi configurado para rodar via Docker em PHP + Apache.
- A porta 8080 é a usada pelo sistema no host.
- Se a porta 8080 estiver ocupada, ajuste o arquivo `docker-compose.yml`.
- O arquivo `database/init.sql` indica a estrutura do banco MySQL esperada para o sistema.
- Caso o banco não esteja configurado ainda, a aplicação pode exigir ajustes adicionais na conexão de dados.

## 🚀 Dica para desenvolvimento local

Durante o desenvolvimento, é recomendado abrir a pasta do projeto no VS Code e rodar os comandos no terminal integrado, deixando o container ativo enquanto você trabalha nas páginas e funcionalidades.

## Funcionalidades esperadas

- Simulação de portas AND e OR.
- Simulação de porta NOT.
- Implementação de portas compostas como NAND, NOR e XOR.
- Testes simples de combinações de entrada.
- Fluxo de login, cadastro e ranking.
