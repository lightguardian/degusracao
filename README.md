# DegusRação

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-F05340?logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?logo=tailwindcss&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-003B57?logo=sqlite&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?logo=docker&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green)


> Site de avaliações de comidas para pets. Qualquer tipo de comida ou petisco. O tutor registra o que o seu pet achou da comida e esta avaliação fica visível para outros tutores.

Projeto da disciplina Desenvolvimento de Aplicações Backend com Framework (UTFPR).

## Motivação

Ter um leque de opções de fato catalogadas e testadas para alimentação de pets.

## Objetivos

Tornar a escolha de comidas e petiscos para pets mais concisa. Permitindo basear as escolhas de alimentação com base na raça e avaliação que outras pessoas fizeram.

## Funcionalidades planejadas

- Cadastro, login e logout do tutor (usuário).
- Cadastro dos pets, com foto opcional (para implementar o módulo de arquivo da disciplina).
- CRUD e filtros: comidas, avaliações, pets.
- Dashboard com comidas melhor avaliadas.
- Docker, tanto por praticidade para rodar o ambiente em minha máquina, quanto para testes em outras máquinas e requisito da disciplina;
- CI/CG;
- Não pensado por enquanto integração com sistema de e-mails;

## Documentação

- [Especificação](docs/specification.md): glossário ubíquo, requisitos priorizados (MoSCoW) e cenários Given/When/Then.
- [Modelo do banco de dados](docs/database.dbml): código DBML do diagrama, para abrir no [dbdiagram.io](https://dbdiagram.io).
- [Casos de uso](docs/use-cases): código PlantUML dos casos de uso principais.
- [Wireframes](docs/wireframes): telas do protótipo no Figma.

## Diagrama do banco de dados

> Database gerado a partir de [dbdiagram.io](https://dbdiagram.io) com arquivo [/docs/database.dbml](/docs/database.dbml).

![Diagrama do banco de dados](docs/dbdiagram.svg)

## Casos de uso

> O código dos diagramas está em [docs/use-cases](docs/use-cases/).

![UC01 Cadastrar comida avaliada](docs/use-cases/imgs/uc01-cadastrar-comida-avaliada.svg)

![UC02 Avaliar comida existente](docs/use-cases/imgs/uc02-avaliar-comida-existente.svg)

![UC03 Consultar avaliações](docs/use-cases/imgs/uc03-consultar-avaliacoes.svg)

## Wireframes

> Wireframes com Figma

![Início](docs/wireframes/01-inicio.png)

![Comidas](docs/wireframes/02-comidas.png)

![Meus pets](docs/wireframes/03-meus-pets.png)

![Cadastrar comida](docs/wireframes/04-cadastrar-comida.png)

![Página da comida](docs/wireframes/05-pagina-da-comida.png)