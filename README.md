![alt text align:center](https://www.vindi.com.br/image/vindi-logo-transparente.png "Vindi")

# Vindi - SDK PHP

[![Última Versão no Packagist][ico-version]][link-packagist]
[![Licença do Software][ico-license]](license.txt)
[![Status de Build][ico-travis]][link-travis]
[![Status de Coverage][ico-scrutinizer]][link-scrutinizer]
[![Nota de Qualidade][ico-code-quality]][link-code-quality]
[![Downloads no Total][ico-downloads]][link-downloads]

## Descrição
Este pacote consiste em um SDK em PHP para a [API de Recorrência][link-introducao-api] da [Vindi][link-vindi].

# Requisitos
- PHP >=5.5.19
- Certificado Digital.
- Conta ativa na [Vindi](https://www.vindi.com.br "Vindi").

# Instalação

Via Composer

```bash
composer require vindi/vindi-php
```

### Teste

``` bash
composer test
```

### Exemplo

```php
require __DIR__.'/vendor/autoload.php';

// Coloca a chave da Vindi (VINDI_API_KEY) no environment do PHP.
putenv('VINDI_API_KEY=SUA_CHAVE_DA_API');

// Instancia o serviço de Customers (Clientes)
$customerService = new Vindi\Customer;

// Cria um novo cliente:
$customer = $customerService->create([
    'name'  => 'Teste da Silva',
    'email' => 'contato@vindi.com.br',
]);

echo "Novo cliente criado com o id '{$customer->id}'.<br />";

// Busca todos os clientes, ordenando pelo campo 'created_at' descendente.
$customers = $customerService->all([
    'sort_by'    => 'created_at',
    'sort_order' => 'desc'
]);

// Para cada cliente da array de clientes
foreach ($customers as $customer) {
    $customerService->update($customer->id, [
        'notes' => 'Este cliente foi atualizado pelo SDK PHP.',
    ]);

    echo "O cliente '{$customer->name}' foi atualizado!<br />";
}
```

Para mais detalhes sobre quais serviços existem, quais campos enviar e demais informações,
[verifique nossa página interativa de uso da API][link-swagger].

**Response:**
Caso precise de mais detalhes sobre a resposta de cada request, utilize o método `getLastResponse`. Se nenhum request foi efetuado anteriormente este método retornará `NULL`.

```php
// Retorna os dados da última resposta recebida dos servidores da Vindi
$lastResponse = $customerService->getLastResponse();

// Retorna o HTTP Status Code
$lastResponse->getStatusCode();
// Retorna o todos os headers
$lastResponse->getHeaders();
// Retorna um único header
$lastResponse->getHeader('Header-Name');
```

### Webhooks

Este pacote torna possível a interpretação dos [webhooks enviados pela Vindi][link-webhooks].
Para tal, disponibilize uma URL/rota que será acessível pela web e nela utilize a classe `Vindi\WebhookHandler`
para a interpretação dos eventos:

```php
require __DIR__.'/vendor/autoload.php';

// Instancia o objeto que irá lidar com os Webhooks.
$webhookHandler = new Vindi\WebhookHandler();

// Pega o evento interpretado pelo objeto.
$event = $webhookHandler->handle();

// Decide a ação com base no evento
switch ($event->type) {
    case 'subscription_canceled':
        // Lidar com o evento de Assinatura cancelada.
        break;
    case 'subscription_created':
        // Lidar com o evento de Assinatura efetuada
        break;
    case 'charge_rejected':
        // Lidar com o evento de Cobrança rejeitada
        break;
    case 'bill_created':
        // Lidar com o evento de Fatura emitida
        break;
    case 'bill_paid':
        // Lidar com o evento de Fatura paga
        break;
    case 'period_created':
        // Lidar com o evento de Período criado
        break;
    case 'test':
        // Lidar com o evento de Teste da URL
        break;
    default:
        // Lidar com falhas e eventos novos ou desconhecidos
        break;
}
```

## Dúvidas
Caso necessite de informações sobre a plataforma ou API por favor siga através do canal [Atendimento Vindi](http://atendimento.vindi.com.br/hc/pt-br)[Atendimento Vindi](http://atendimento.vindi.com.br/hc/pt-br)

## Contribuindo
Por favor, leia o arquivo [CONTRIBUTING.md](CONTRIBUTING.md).
Caso tenha alguma sugestão ou bug para reportar por favor nos comunique através das [issues](./issues).

## Segurança
Se você descobrir qualquer questão relacionada a segurança, por favor,
envie um e-mail para contato@vindi.com.br ao invés de utilizar os issues.

## Changelog
Todas as informações sobre cada release pode ser  [CHANGELOG.md](CHANGELOG.md).

## Créditos
- [Vindi][link-author]
- [Todos os Contribuidores][link-contributors]

## Licença
GNU GPLv3. Por favor, veja o [Arquivo de Licença](license.txt) para mais informações.

[ico-version]: https://img.shields.io/packagist/v/vindi/vindi-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-GPLv3-brightgreen.svg?style=flat-square
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
[link-webhooks]: http://atendimento.vindi.com.br/hc/pt-br/articles/203305800-Webhooks
[link-swagger]: http://vindi.github.io/api-docs/dist/
