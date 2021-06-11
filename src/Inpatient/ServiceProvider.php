<?php


namespace GupoMedical\Inpatient;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['inpatient'] = function ($app) {
            return new Client($app);
        };
    }
}