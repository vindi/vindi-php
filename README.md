# vindi-php

[![Última Versão no Packagist][ico-version]][link-packagist]
[![Licença do Software][ico-license]](LICENSE.md)
[![Status de Build][ico-travis]][link-travis]
[![Status de Coverage][ico-scrutinizer]][link-scrutinizer]
[![Nota de Qualidade][ico-code-quality]][link-code-quality]
[![Downloads no Total][ico-downloads]][link-downloads]

Este pacote consiste em um SDK em PHP para a [API de Recorrência](link-introducao-api) da [Vindi](link-vindi).

## Instalação

Via Composer

```bash
composer require vindi/vindi-php
```

## Exemplo de Uso

```php
$customerService = new Vindi\Customer;
$customers = $customerService->all();

foreach($customers as $customer) {
    echo $customer->name . '<br />';
}
```

**Nota:** Para acesso à API, a sua chave de acesso a API deverá ser configurada como uma variável de *environment* do PHP.
Para isso, utilize um pacote como o [phpdotenv](https://github.com/vlucas/phpdotenv) ou carregue através do comando 
`putenv('VINDI_API_KEY=SUA_CHAVE_DA_API');`, que deverá estar posicionado anteriormente à utilização dos comandos do SDK.

## Changelog

Por favor, veja o [CHANGELOG](CHANGELOG.md) para mais informações sobre o que mudou recentemente.

## Testando

``` bash
$ composer test
```

## Contribuindo

Por favor, veja o [CONTRIBUTING](CONTRIBUTING.md) para detalhes.

## Segurança

Se você descobrir qualquer questão relacionada a segurança, por favor, envie um e-mail para contato@vindi.com.br ao invés de utilizar os issues.

## Créditos

- [Vindi][link-author]
- [Todos os Contribuidores][link-contributors]

## Licença

GNU GPLv3. Por favor, veja o [Arquivo de Licença](license.txt) para mais informações.

[ico-version]: https://img.shields.io/packagist/v/vindi/vindi-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/vindi/vindi-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/vindi/vindi-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/vindi/vindi-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/vindi/vindi-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/vindi/vindi-php
[link-travis]: https://travis-ci.org/vindi/vindi-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/vindi/vindi-php/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/vindi/vindi-php
[link-downloads]: https://packagist.org/packages/vindi/vindi-php
[link-author]: https://github.com/vindi
[link-contributors]: ../../contributors

[link-vindi]: https://www.vindi.com.br
[link-introducao-api]: http://atendimento.vindi.com.br/hc/pt-br/articles/203020644-Introdu%C3%A7%C3%A3o-%C3%A0-API-de-Recorr%C3%AAncia