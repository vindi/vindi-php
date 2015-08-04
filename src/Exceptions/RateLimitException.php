<?php namespace Vindi\Exceptions;

use Exception;

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
        $this->limit = (int) (count($response->getHeader('Rate-Limit-Limit')) ? $response->getHeader('Rate-Limit-Limit')[0] : 0);
        $this->reset = (int) (count($response->getHeader('Rate-Limit-Reset')) ? $response->getHeader('Rate-Limit-Reset')[0] : 0);
        $this->remaining = (int) (count($response->getHeader('Rate-Limit-Remaining')) ? $response->getHeader('Rate-Limit-Remaining')[0] : 0);
        $this->retryAfter = (int) (count($response->getHeader('Retry-After')) ? $response->getHeader('Retry-After')[0] : 0);

        $this->message = "O limite de {$this->limit} requisições por minuto para a API foi atingido.";
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