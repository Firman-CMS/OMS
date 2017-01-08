<?php

namespace Modules\Oms\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CmsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
