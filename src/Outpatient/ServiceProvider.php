<?php


namespace GupoMedical\Outpatient;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['outpatient'] = function ($app) {
            return new Client($app);
        };
    }
}