<?php

namespace Modules\Oms\Providers;

use Modules\Oms\Models\Cms_model;
use Modules\Oms\Policies\CmsPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class OmsAuthServiceProvider extends ServiceProvider
{
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Cms_model::class => CmsPolicy::class,
    ];
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    }

}
