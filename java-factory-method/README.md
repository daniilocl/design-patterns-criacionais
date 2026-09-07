# Factory Method em Java

Este exemplo usa o padrao criacional **Factory Method** para enviar
notificacoes. O programa pode enviar por e-mail ou por SMS sem que a regra
geral de envio precise criar diretamente `EmailNotificacao` ou
`SmsNotificacao`.

## Ideia em uma frase

Uma classe base define **quando e como usar** um objeto; suas subclasses
definem **qual objeto criar**.

No exemplo, `ServicoNotificacao` sabe que precisa criar uma `Notificacao` e
enviar a mensagem. `ServicoEmail` e `ServicoSms` escolhem, respectivamente,
`EmailNotificacao` e `SmsNotificacao`.

## Estrutura

```text
src/
├── Notificacao.java          # Produto: contrato comum
├── EmailNotificacao.java     # Produto concreto
├── SmsNotificacao.java       # Produto concreto
├── ServicoNotificacao.java   # Creator e Factory Method
├── ServicoEmail.java         # Creator concreto
├── ServicoSms.java           # Creator concreto
└── Main.java                 # Cliente e demonstracao
```

## Fluxo do Factory Method

```text
Main
 └── ServicoNotificacao.notificar(...)
       ├── criarNotificacao()       <- Factory Method
       │     ├── ServicoEmail -> new EmailNotificacao()
       │     └── ServicoSms   -> new SmsNotificacao()
       └── notificacao.enviar(...)
```

## Como executar

Na raiz do repositorio:

```bash
cd java-factory-method/src
javac *.java
java Main
```

Saida esperada:

```text
E-mail enviado para danilo@exemplo.com: Seu cadastro foi realizado com sucesso.
SMS enviado para +55 11 99999-9999: Seu codigo de confirmacao e 123456.
```

## O que observar ao estudar

1. `Notificacao` e uma interface: ela representa a ideia geral de notificar.
2. `EmailNotificacao` e `SmsNotificacao` implementam essa ideia de maneiras diferentes.
3. `ServicoNotificacao` tem o metodo abstrato `criarNotificacao()`.
4. Cada subclasse sobrescreve esse metodo e retorna o produto adequado.
5. `notificar()` usa somente o tipo `Notificacao`; por isso nao muda quando um
   novo canal e adicionado.

Para acrescentar WhatsApp, por exemplo, crie `WhatsAppNotificacao` e
`ServicoWhatsApp`. Nao e necessario alterar `ServicoNotificacao`.

## Comparacao rapida com Builder

O Builder do projeto monta **um mesmo objeto complexo** passo a passo, com
diversas configuracoes de servidor. O Factory Method escolhe **qual produto
concreto** sera criado por uma familia de classes. Aqui, cada servico escolhe
um canal de notificacao.
