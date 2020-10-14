# Changelog

All notable changes will be documented in this file.

## 1.2.2 - 14/10/2020
- Add export batches endpoint
- Add usages by period endpoint
- Add product items by subscription endpoint

## 1.2.1 - 10/05/2019
- Add the required parameter for partial refund

## 1.2.0 - 28/05/2018
- Add new endpoints to keep up with Vindi API.
- Notification
- Bill->charge
- Bill->invoice
- Charge->fraudReview
- Customer->unarchive($id)
- Subscription->renew($id)

## 1.1.0 - 04/05/2018
- Option to pass VINDI_API_URI as an argument on instance son of Resource.
- Option to pass VINDI_API_KEY as an argument on instance son of Resource.

## 1.0.11 - 14/03/2018
- VINDI_API_URI environment variable support.
- Add invoice retry endpoint.

## 1.0.10 - 30/08/2016
- Add issues, messages and import_batches endpoints.

## 1.0.9 - 19/08/2016
- Add method verify in PaymentProfiles.

## 1.0.8 - 04/02/2016
- Add params to Delete method.

## 1.0.7 - 29/01/2016
- Fix Content-Type and User-Agent headers.

## 1.0.6 - 29/11/2015
- Add method getLastResponse in Resource to access informations about last response.

## 1.0.5 - 21/10/2015
- Add a method to get request body in RequestException.
- Fix throw RateLimitException based on HTTP status code 429.

## 1.0.4 - 08/10/2015
- Add CA Bundle.

## 1.0.3 - 02/10/2015
- Change x-www-form-urlencoded to json.

## 1.0.2 - 05/08/2015
- Improved code style and type-hinting.

## 1.0.1 - 04/08/2015
- Add webhooks support.

## 1.0.0 - 04/08/2015
- Initial version.
