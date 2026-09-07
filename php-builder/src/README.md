# Padrão de Projeto Builder em PHP

Este repositório contém uma implementação prática e modular do padrão de projeto criacional **Builder** (GoF) em PHP 8+, aplicado à construção de objetos complexos de infraestrutura (`Servidor`).

---

## 📌 Sobre o Padrão

O **Builder** tem como objetivo separar a construção de um objeto complexo da sua representação, permitindo que o mesmo processo de construção crie diferentes representações.

### Benefícios no Projeto
* **Fluent Interface**: Encadeamento de métodos (`return $this`) para uma leitura fluida do código.
* **Encapsulamento Forte**: A classe `Servidor` protege suas propriedades com visibilidade `private`.
* **Isolamento de Estado**: O método `reset()` garante que instâncias do Builder não vazem dados entre diferentes criações.
* **Construção Parcial**: Permite instanciar objetos válidos sem a necessidade de passar parâmetros nulos ou padrões poluidos no construtor.

---

## 📁 Estrutura do Projeto

```text
php-builder/
├── src/
│   ├── Servidor.php                 # Entidade (Produto Final)
│   ├── ServidorBuilderInterface.php # Contrato com as assinaturas de construção
│   └── ServidorBuilder.php          # Implementação concreta do Builder
├── index.php                        # Executável do cliente com cenários de teste
└── README.md                        # Documentação do projeto