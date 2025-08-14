# Roadmap: Sistema de Biblioteca Pessoal

## Visão Geral do Projeto
Sistema para gerenciar uma biblioteca pessoal com controle de livros, empréstimos, devoluções e relatórios usando Laravel com Blade e Tailwind CSS.

---

## *Fase 1: Estrutura Base (Semana 1)*

### Setup Inicial
- [ ] Criar novo projeto Laravel
- [ ] Configurar banco de dados MySQL
- [ ] Instalar e configurar Tailwind CSS
- [ ] Configurar Alpine.js (opcional para interações simples)

### Modelos e Migrations
- [ ] *Model/Migration: Book*
  - id, titulo, autor, isbn, editora, ano_publicacao, genero, sinopse, capa (nullable), status, created_at, updated_at
- [ ] *Model/Migration: Person* 
  - id, nome, email, telefone, endereco, created_at, updated_at
- [ ] *Model/Migration: Lend*
  - id, book_id, person_id, data_emprestimo, data_prevista_devolucao, data_devolucao (nullable), status, observacoes

### Relacionamentos nos Models
- [ ] Book hasMany Lend
- [ ] Person hasMany Lend  
- [ ] Lend belongsTo Book e Person

### Seeders Básicos
- [ ] Criar seeder com 20-30 livros de exemplo
- [ ] Criar seeder com 10-15 pessoas

---

## *Fase 2: CRUD de Livros (Semana 2)*

### Controllers e Routes
- [ ] *BookController* com métodos: index, create, store, show, edit, update, destroy
- [ ] *Routes* - resource routes para books

### Views (Blade Templates)
- [ ] *Layout principal* - app.blade.php com Tailwind
- [ ] *books/index.blade.php* - Lista com paginação e busca
- [ ] *books/create.blade.php* - Formulário de cadastro
- [ ] *books/edit.blade.php* - Formulário de edição  
- [ ] *books/show.blade.php* - Detalhes do livro

### Funcionalidades
- [ ] *Listar livros* - Tabela responsiva com paginação
- [ ] *Buscar livros* - Por título, autor ou ISBN
- [ ] *Cadastrar livro* - Formulário com upload de capa
- [ ] *Editar livro* - Formulário de edição
- [ ] *Excluir livro* - Com modal de confirmação
- [ ] *Visualizar detalhes* - Página completa do livro

---

## *Fase 3: CRUD de Pessoas (Semana 3)*

### Controllers e Routes
- [ ] *PersonController* com métodos CRUD completos
- [ ] *Routes* - resource routes para people

### Views (Blade Templates)
- [ ] *people/index.blade.php* - Lista de pessoas
- [ ] *people/create.blade.php* - Formulário de cadastro
- [ ] *people/edit.blade.php* - Formulário de edição
- [ ] *people/show.blade.php* - Perfil da pessoa

### Funcionalidades
- [ ] *Listar pessoas* - Tabela com busca por nome/email
- [ ] *Cadastrar pessoa* - Formulário completo
- [ ] *Editar pessoa* - Atualizar dados
- [ ] *Excluir pessoa* - Com validação (não pode ter empréstimos ativos)

---

## *Fase 4: Sistema de Empréstimos (Semana 4)*

### Controllers e Routes  
- [ ] *LoanController* com métodos específicos
- [ ] Routes para: index, create, store, return (devolução), history

### Views (Blade Templates)
- [ ] *loans/index.blade.php* - Empréstimos ativos
- [ ] *loans/create.blade.php* - Novo empréstimo (com selects)
- [ ] *loans/history.blade.php* - Histórico completo

### Funcionalidades de Empréstimo
- [ ] *Realizar empréstimo* - Selects para livro e pessoa
- [ ] *Listar empréstimos ativos* - Com status e dias restantes
- [ ] *Registrar devolução* - Botão para marcar como devolvido
- [ ] *Listar histórico* - Todos os empréstimos

### Validações e Regras
- [ ] Livro só pode ser emprestado se disponível (status = 'disponivel')
- [ ] Pessoa não pode ter mais de 3 livros emprestados
- [ ] Prazo padrão de 15 dias
- [ ] Atualizar status do livro (disponivel/emprestado)

---

## *Fase 5: Relatórios e Dashboard (Semana 6)*

### Dashboard Principal
- [ ] *Cards com estatísticas* - Total de livros, empréstimos ativos, atrasos
- [ ] *Gráficos simples* - Empréstimos por mês (Chart.js)
- [ ] *Top livros mais emprestados*
- [ ] *Pessoas com mais empréstimos*

### Relatórios
- [ ] *Livros em atraso* - Lista filtrada
- [ ] *Relatório mensal* - Exportar PDF (DomPDF)
- [ ] *Histórico por pessoa* - Todos os empréstimos de uma pessoa
- [ ] *Histórico por livro* - Todas as movimentações

---

## *Checklist de Entrega*

### Funcionalidades Obrigatórias
- [ ] ✅ CRUD completo de Livros
- [ ] ✅ CRUD completo de Pessoas  
- [ ] ✅ Sistema de Empréstimos e Devoluções
- [ ] ✅ Sistema de Reservas
- [ ] ✅ Relatórios básicos
- [ ] ✅ Dashboard com estatísticas

### Tecnologias Utilizadas
- [ ] ✅ Laravel (versão atual)
- [ ] ✅ Blade Templates
- [ ] ✅ Tailwind CSS
- [ ] ✅ MySQL
- [ ] ✅ Relacionamentos Eloquent
- [ ] ✅ Form Requests (validação)
- [ ] ✅ Seeders e Factories