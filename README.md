# **Trainee 2021.2 Grupo 3 - AdoraLer Livraria**

## Integrantes:

#### Desenvolvedores:

* [Pessoa 1](#);
* [Pessoa 2](#);
* [Pessoa 3](#);
* [Pessoa 4](#);

#### Scrum Master:

* [Isadora Gonçalves Ferreira](https://github.com/isa56/).

## Descrição do Projeto:

* Site E-Commerce de treinamento e capacitação dos Trainees da CodeJR, na gestão 2021.2;
* Possuirá Front-End em HTML, CSS, Bootstrap e Back-End em PHP (puro) no padrão MVC, com Banco de Dados MySQL;
* Não possuirá todas as funcionalidades de um E-Commerce;

## Git:

### Instalação e Primeira configuração

Pra instalar, basta acessar a página de [downloads](https://git-scm.com/downloads) e seguir as instruções\
Pra se conectar, utilize os seguinte comandos: <sub>(Substitua o nome e o e-mail para o seu)<sub/>
```
git config --global user.name "nomeDeUsuario"
```
```
git config --global user.email email@codejr.com.br
```

### Começar um projeto

Abra uma pasta, clique com o botão direito e selecione "Git Bash Here" para abrir o terminal do git\
Clone o repositório
```
git clone https://github.com/isa56/traineeCode-AdoraLer
```
Entre na pasta criada pelo comando clone
```
cd traineeCode-AdoraLer
```
Crie sua branch usando como o padrão o nome da funcionalidade que você vai desenvolver
```
git checkout -b contato_frontend
```
Após criada a branch você será redirecionado automaticamente a ela, já podendo começar o desenvolvimento\


### Rotina

Adicionar uma alteração específica
```
git add nomeDoArquivo
```
Adicionar todas as alterações
```
git add .
```
Conferir em qual branch está e quais alterações foram adicionadas
```
git status
```
Dê um commit com uma mensagem especificando as alterações realizadas
```
git commit -m "mensagem"
```
Envie o commit feito para sua branch
```
git push origin nomeDaBranch
```

### Quando terminar a funcionalidade - *com autorização do SCRUM Master*

Volte para a main
```
git checkout main
```
Atualize a main
```
git pull
```
Volte pra sua branch
```
git checkout nomeDaBranch
```
Mescle a main com a sua branch <sub>(estando dentro da sua branch)<sub/>
```
git merge main
```
Confirme o merge <sub>(quando solicitado pelo Scrum Master)<sub/>
```
git push origin nomeDaBranch
```
Espere a confirmação do seu Scrum Master\
Volte para a main
```
git checkout main
```
Mescle a main com as alterações enviadas para sua branch <sub>(quando solicitado pelo Scrum Master)<sub/> 
```
git merge nomeDaBranch
```
Confirme o merge <sub>(quando solicitado pelo Scrum Master)<sub/>
```
git push origin main
```
