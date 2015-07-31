# vindi-php

[![Última Versão no Packagist][ico-version]][link-packagist]
[![Licença do Software][ico-license]](LICENSE.md)
[![Status de Build][ico-travis]][link-travis]
[![Status de Coverage][ico-scrutinizer]][link-scrutinizer]
[![Nota de Qualidade][ico-code-quality]][link-code-quality]
[![Downloads no Total][ico-downloads]][link-downloads]

**Nota: Esta é uma versão em desenvolvimento ativo, não devendo ser utilizada em produção.**

@todo description

## Instalação

Via Composer

``` bash
$ composer require vindi/vindi-php
```

## Uso

``` php
$customerService = new Vindi\Customer;
$customers = $customerService->all();

foreach($customers as $customer) {
    echo $customer->name . '<br />';
}
```

## Changelog

Por favor, veja o [CHANGELOG](CHANGELOG.md) para mais informações sobre o que mudou recentemente.

## Testando

``` bash
$ composer test
```

## Contribuindo

Por favor, veja o [CONTRIBUTING](CONTRIBUTING.md) para detalhes.

## Security

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
