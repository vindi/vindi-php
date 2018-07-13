# Contribuindo para o Vindi-PHP

:clap::grin: Antes de mais nada, muito obrigado por sua contribuição  :thumbsup:

Este projeto e todos os participantes estão sob o regimento do [**Código de Conduta Vindi**](CODE_OF_CONDUCT.md). Ao participar, espera-se que você mantenha este código.

[**Contribuições**](https://github.com/vindi/vindi-php/projects) são **muito bem vindas** e serão totalmente [**creditadas**](https://github.com/vindi/vindi-php/graphs/contributors).

Nós valorizamos muito as [**contribuições por Pull Requests (PR)**](https://github.com/vindi/vindi-php/pulls) em [GitHub](https://github.com/vindi/vindi-php), mas também adoramos [**sugestões de novas features**](https://github.com/vindi/vindi-php/issues/new/choose). Por isso, fique à vontade para [**reportar um bug :rotating_light:**](https://github.com/vindi/vindi-php/issues/new/choose) e também para [**parabenizar :tada: o projeto vindi-php!**](https://github.com/vindi/vindi-php/issues/new/choose)


## Requisitos de um bom Pull Request (PR) para vindi-php

- **Branches separadas** - Recomendamos que o PR não seja a partir da sua branch `master`.

- **Um PR por feature** - Se você deseja ajudar em mais de uma feature, envie múltiplos PRs :grin:.

- **Clareza** - Além de uma boa descrição sobre a motivação e a solução proposta é possível incluir imagens ou animações que demonstrem quaisquer modificações visuais na interface. 

Exemplo de **Motivação** com uma **Solução Proposta**:
> Motivação

> Fazer com que o os dados sejam inseridos por outro método além das variáveis de ambiente.

> Solução proposta

> Ajustar como os objetos são instanciados para receber API_KEY e API_URL como argumentos no método construtor.

- **Foco** - Um PR deve possuir um único objetivo bem definido. Evite mais de um viés (bug-fix, feature, refactoring) no mesmo PR.

- **Formatação de código** - Não reformate código que não foi modificado. A reformatação de código deve ser feita exclusiva e obrigatoriamente nos trechos de código que foram afetados pelo contexto da sua alteração.
Obs.: Gostamos muito do [PSR-1](https://www.php-fig.org/psr/psr-1/) e [PSR-2](https://www.php-fig.org/psr/psr-2/) :smile:

- **Fragmentação** - Quando um PR for parte de uma tarefa e não entregar valor de forma isolada, será necessário explicitar na motivação quais são os objetivos da tarefa, e na solução proposta, os objetivos que foram concluídos no PR em questão e os que serão concluídos em PRs futuros.

#### Se você nunca criou um Pull Request (PR) na vida, seja bem vindo :tada: :smile: [Aqui está um ótimo tutorial](https://egghead.io/series/how-to-contribute-to-an-open-source-project-on-github) de como enviar um.

1. Faça um [fork](http://help.github.com/fork-a-repo/) do projeto, clone seu repositório (fork):

   ```bash
   # Clone repositório (fork) na pasta corrente
   git clone https://github.com/<seu-username>/vindi-php
   # Navegue ate a pasta recém clonada
   cd vindi-php
   ```

2. Crie uma branch nova a partir da `master` que vai conter o "tipo/tópico" como nome da branch
- tipos: feature e fix

   ```bash
   git checkout -b feature/cria_metodo_pagamento
   ```

3. Faça um push da sua branch para seu repositório (fork) 

   ```bash
   git push -u origin feature/cria_metodo_pagamento
   ```

4. [Abra um Pull Request](https://help.github.com/articles/using-pull-requests/) com uma motivação e solução proposta bem claras.

## Rodando os Testes

``` bash
composer test
```

## Verificando o estilo do código

``` bash
composer code-style
```

## Revisão da Comunidade

A revisão deve verificar se o PR atende aos requisitos abaixo, na ordem que são apresentados, e a decisão final ficaria com a 
equipe Vindi quanto à prioridade:

#### Correto

- O código realmente faz o que o autor está propondo?
- O tratamento de erros está adequado?

#### Seguro

- As modificações introduzem vulnerabilidades de segurança?
- Dados sensíveis estão sendo tratados da maneira correta?

#### Legível

- O código está legível?
- Métodos, classes e variáveis foram nomeadas apropriadamente?
- Os padrões definidos pelo projeto ou pela equipe estão sendo respeitados?

##
**Feliz desenvolvimento!**
