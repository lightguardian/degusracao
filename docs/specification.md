# DegusRação: especificação

## Glossário ubíquo

| Termo na tela | Termo no código | Definição |
|---|---|---|
| Tutor | `User` | Usuário cadastrado que possui pets e avalia comidas. |
| Pet | `Pet` | Animal de um tutor. |
| Espécie | `Species` | Espécie do animal: cão, gato, pássaro etc. |
| Raça | `Breed` | Raça do animal, por exemplo: pastor alemão, siamês, beija-flor. |
| Peso | `weight_kg` | Peso do pet em quilogramas (kg). |
| Altura | `height_cm` | Altura do pet em centímetros. |
| Castrado | `neutered` | Indica se o pet é castrado. |
| Foto | `photo_path` | Imagem de um pet ou de uma comida. |
| Comida | `Food` | Produto que um pet come. Tem nome, marca, tipo e foto. É cadastrada por um tutor. |
| Marca | `brand` | Fabricante da comida. Opcional, porque alimentação natural (uma fruta, por exemplo) não tem marca. |
| Tipo de comida | `FoodType` | Categoria da comida: ração, petisco, molho ou outros. |
| Avaliação | `Review` | O que um pet achou de uma comida. |
| Estrelas | `stars` | Nota de 1 a 5 que mede a aceitação da comida pelo pet. |
| Preço pago | `price` | Quanto o tutor pagou pela comida. Opcional. |
| Observação | `note` | Texto livre do tutor dentro da avaliação. Opcional. |
| Média | `average` | Média das estrelas de todas as avaliações de uma comida. |
| Comentário | `Comment` | Texto de outro tutor sobre uma comida. |

### Tipos de comida

| Valor no código | Texto na tela |
|---|---|
| `dry_food` | Ração seca |
| `wet_food` | Ração úmida |
| `treat` | Petisco |
| `biscuit` | Biscoito |
| `bone` | Osso |
| `sauce` | Molho |
| `natural_food` | Alimentação natural |
| `supplement` | Suplemento |
| `hay` | Feno |
| `seeds` | Sementes |
| `other` | Outro |

### Escala de estrelas

| Estrelas | Significado |
|---|---|
| 1 | Não quis comer. |
| 2 | Comeu e não gostou. |
| 3 | Come um pouco. |
| 4 | Comeu bastante. |
| 5 | Come e pede por mais. |

## Requisitos (MoSCoW)

**M** (Must): essencial. **S** (Should): importante. **C** (Could): desejável, se houver tempo. **W** (Won't): fora desta entrega.

| ID | Requisito | Prioridade |
|---|---|---|
| R01 | Cadastrar tutor com nome, e-mail único e senha, sem verificação de e-mail. | M |
| R02 | Entrar e sair com e-mail e senha. | M |
| R03 | Cadastrar, listar, editar e excluir os próprios pets, com foto opcional. | M |
| R04 | Listar comidas em tabela, com filtro por nome e tipo, ordenação por nome ou mais recente e média de estrelas. | M |
| R05 | Cadastrar uma comida já avaliada por um ou mais pets do tutor. | M |
| R06 | Avaliar uma comida existente com um ou mais pets do tutor. | M |
| R07 | Exibir a página da comida com a avaliação de cada pet. | M |
| R08 | Filtrar as avaliações por espécie, raça, faixa de peso e castração. | M |
| R09 | Editar e excluir as próprias avaliações. | M |
| R10 | Exibir enums e textos em português. | M |
| R11 | Menu responsivo, que vira menu sanduíche lateral em telas pequenas. | M |
| R12 | Tutor padrão e pets de exemplo criados por seeder. | M |
| R13 | Rodar o projeto com Docker em poucos comandos. | M |
| R14 | Testes unitários, de feature e de browser. | M |
| R15 | Integração contínua no GitHub Actions. | M |
| R23 | Dashboard com fotos dos pets e comidas melhor avaliados | S |
| R16 | Comentar nas comidas de outros tutores. | C |
| R17 | Deploy automático a cada push. | C |
| R22 | Telas de cadastro, edição e exclusão de espécies e raças. | C |
| R18 | Verificação de e-mail e recuperação de senha. | W |
| R19 | Moderação ou bloqueio de comida repetida. | W |
| R20 | Preço médio por comida. | W |
| R21 | Armazenamento externo de arquivos (S3, MinIO, Swift). | W |

### Requisitos não funcionais

| ID | Requisito | Prioridade |
|---|---|---|
| N01 | Banco de dados SQLite. | M |
| N02 | Senhas guardadas com hash. | M |
| N03 | Fotos aceitas só em jpg, jpeg, png ou webp, com tamanho máximo, salvas no disco local. | M |
| N04 | Só o tutor dono altera ou exclui seus pets e avaliações. | M |
| N05 | Componentes Blade reutilizáveis de tabela, filtro e menu. | M |
| N06 | Interface com Tailwind. | M |

### Requisitos de arquitetura

| ID | Requisito | Prioridade |
|---|---|---|
| A01 | Laravel em MVC: rotas em `routes/web.php`, controllers, models Eloquent e views Blade. | M |
| A02 | Cadastro, login e logout feitos à mão com o guard de sessão do Laravel, sem starter kit. | M |
| A03 | Rotas internas protegidas pelo middleware `auth`. | M |
| A04 | Validação em Form Requests, fora dos controllers. | M |
| A05 | Autorização com Policies de pet, comida e avaliação. | M |
| A06 | Banco criado só por migrations, com relacionamentos Eloquent; `reviews` é a pivô entre `pets` e `foods`. | M |
| A07 | Tipo de comida como enum do PHP, com cast no model `Food`. | M |
| A08 | Textos e mensagens de validação em `lang/pt_BR`, com o pacote `lucascudo/laravel-pt-BR-localization`. | M |
| A09 | Dados iniciais por seeders e dados de teste por factories. | M |

## Cenários (Given/When/Then)

### Acesso

**C01. Visitante sem login**
- Dado que não estou logado
- Quando tento abrir a tabela de comidas
- Então sou levado para a tela de login

**C02. Cadastro de tutor**
- Dado que estou na tela de cadastro
- Quando informo nome, e-mail e senha válidos
- Então minha conta é criada e já entro no sistema

**C03. E-mail repetido**
- Dado que já existe um tutor com o e-mail ana@email.com
- Quando alguém tenta se cadastrar com ana@email.com
- Então o cadastro é recusado com erro no campo e-mail

**C04. Login válido**
- Dado que tenho uma conta
- Quando informo meu e-mail e minha senha
- Então entro no sistema e vejo o dashboard

**C05. Login inválido**
- Dado que estou na tela de login
- Quando informo um e-mail ou uma senha errados
- Então volto para o login com a mensagem "E-mail ou senha inválidos." sem indicar qual campo está errado

### Pets

**C06. Cadastrar pet sem foto**
- Dado que estou logado
- Quando cadastro um pet com nome, espécie, peso, altura e castração, sem foto
- Então o pet aparece na tabela dos meus pets com a imagem padrão

**C07. Cadastrar pet com foto**
- Dado que estou cadastrando um pet
- Quando envio uma foto em jpg, png ou webp
- Então a foto aparece na tabela dos meus pets

**C08. Foto inválida**
- Dado que estou cadastrando um pet
- Quando envio um arquivo que não é jpg, jpeg, png ou webp
- Então o cadastro é recusado com erro no campo foto

**C09. Raça de outra espécie**
- Dado que escolhi a espécie gato
- Quando escolho a raça lulu da Pomerânia
- Então o cadastro é recusado com erro no campo raça

**C10. Pet sem raça**
- Dado que estou cadastrando um pet
- Quando deixo a raça vazia
- Então o pet é salvo e aparece como "sem raça definida (SRD)"

**C11. Pet de outro tutor**
- Dado que o pet Floco pertence a outro tutor
- Quando tento editar ou excluir o Floco
- Então o acesso é negado ou o pet se quer é mostrado

**C12. Excluir pet com avaliações**
- Dado que meu pet avaliou duas comidas
- Quando excluo meu pet
- Então as duas avaliações dele também são excluídas

### Comidas

**C13. Cadastrar comida já avaliada**
- Dado que tenho os pets Paçoca e Floco
- Quando cadastro a Ração X com 4 estrelas, preço, observação e marco os dois pets
- Então a Ração X é criada com duas avaliações de 4 estrelas, uma de cada pet

**C14. Comida sem pet marcado**
- Dado que estou cadastrando uma comida
- Quando não marco nenhum pet
- Então o cadastro é recusado com o aviso de marcar pelo menos um pet

**C15. Tutor sem pets**
- Dado que não tenho nenhum pet
- Quando abro o cadastro de comida
- Então sou levado para o cadastro de pet

**C16. Média de estrelas**
- Dado que a Ração X tem avaliações de 5 e 3 estrelas
- Quando abro a tabela de comidas
- Então vejo a Ração X com média 4

**C17. Filtrar comidas**
- Dado que existem rações e petiscos cadastrados
- Quando filtro pelo tipo petisco
- Então só os petiscos aparecem na tabela

**C18. Editar comida de outro tutor**
- Dado que a Ração X foi cadastrada por outro tutor
- Quando tento editar a Ração X
- Então o acesso é negado

**C19. Excluir comida avaliada por outro tutor**
- Dado que cadastrei a Ração X e um pet de outro tutor a avaliou
- Quando tento excluir a Ração X
- Então a exclusão é recusada

**C20. Excluir comida só com minhas avaliações**
- Dado que cadastrei a Ração X e só meus pets a avaliaram
- Quando excluo a Ração X
- Então a comida e as avaliações dela são excluídas

### Avaliações

**C21. Avaliar comida existente**
- Dado que a Ração X existe e o Paçoca ainda não a avaliou
- Quando avalio a Ração X com o Paçoca e 5 estrelas
- Então a avaliação aparece na página da Ração X

**C22. Pet que já avaliou**
- Dado que o Paçoca já avaliou a Ração X
- Quando abro a avaliação da Ração X
- Então o Paçoca não aparece na lista de pets para marcar

**C23. Estrelas fora da escala**
- Dado que estou avaliando uma comida
- Quando envio 0 ou 6 estrelas
- Então a avaliação é recusada com erro no campo estrelas

**C24. Filtrar avaliações por espécie**
- Dado que a Ração X tem avaliações de gatos e de cachorros
- Quando filtro pela espécie gato
- Então só as avaliações de gatos aparecem

**C25. Filtrar avaliações por peso e castração**
- Dado que a Ração X tem avaliações de pets com pesos diferentes, castrados e não castrados
- Quando filtro por castrados entre 2 e 5 kg
- Então só as avaliações de pets castrados nessa faixa de peso aparecem

**C26. Editar avaliação de outro tutor**
- Dado que a avaliação do Floco pertence a outro tutor
- Quando tento editar ou excluir essa avaliação
- Então o acesso é negado

### Textos na tela

**C27. Enum (map, de-para) em português**
- Dado que o pet Rex tem a espécie `dog`
- Quando abro a tabela dos meus pets
- Então a espécie do Rex aparece como "Cachorro"
