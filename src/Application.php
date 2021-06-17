<?php


namespace GupoMedical;


use Overtrue\Http\Support\Collection;
use Pimple\Container;

/**
 * Class Application
 * @package GupoMedical
 *
 * @property \GupoMedical\Inpatient\Client $inpatient
 * @property \GupoMedical\Outpatient\Client $outpatient
 */
class Application extends Container
{
    protected $providers = [
        Inpatient\ServiceProvider::class,
        Outpatient\ServiceProvider::class
    ];

    public function __construct(array $config = [], array $values = [])
    {
        parent::__construct($values);
        $this['config'] = function () use ($config) {
            return new Collection($config);
        };
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this[$name];
    }
}