<?php

namespace Ferdirn\Provinces;

use Illuminate\Support\Facades\Facade;

/**
 * ProvincesFacade
 *
 */
class ProvincesFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'provinces'; }

}