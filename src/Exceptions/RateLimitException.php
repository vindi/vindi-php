<?php namespace Vindi\Exceptions;

use Exception;

/**
 * Class RateLimitException
 *
 * @package Vindi\Exceptions
 */
class RateLimitException extends Exception
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $reset;

    /**
     * @var int
     */
    protected $remaining;

    /**
     * @var int
     */
    protected $retryAfter;

    /**
     * RateLimitException constructor.
     *
     * @param mixed $response API response.
     */
    public function __construct($response)
    {
        $this->limit = $this->getHeaderValue($response, 'Rate-Limit-Limit');
        $this->reset = $this->getHeaderValue($response, 'Rate-Limit-Reset');
        $this->remaining = $this->getHeaderValue($response, 'Rate-Limit-Remaining');
        $this->retryAfter = $this->getHeaderValue($response, 'Retry-After');

        $this->message = "O limite de {$this->limit} requisições por minuto para a API foi atingido.";
    }

    /**
     * Get first array value from specified header as integer.
     *
     * @param mixed  $response API response.
     * @param string $name     Header name.
     *
     * @return int
     */
    private function getHeaderValue($response, $name)
    {
        $header = $response->getHeader($name);

        if (! $header || ! count($header)) {
            return 0;
        }

        return (int) array_shift($header);
    }

    /**
     * Maximum request number per minute.
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Timestamp until there are new remaining requests.
     *
     * @return int
     */
    public function getReset()
    {
        return $this->reset;
    }

    /**
     * Remaining requests.
     *
     * @return int
     */
    public function getRemaining()
    {
        return $this->remaining;
    }

    /**
     * When it's possible to make the next request.
     *
     * @return int
     */
    public function getRetryAfter()
    {
        return $this->retryAfter;
    }
}
