<?php

namespace Modules\Oms\Policies;

use Modules\Oms\Models\Cms_model;
use Illuminate\Auth\Access\HandlesAuthorization;

class CmsPolicy
{
    use HandlesAuthorization;
    
    public function write_brand()
    {
        return Cms_model::hasPermission('brand-write');
    }
    
    public function read_brand()
    {
        return Cms_model::hasPermission('brand-read');
    }
    
    public function delete_brand()
    {
        return Cms_model::hasPermission('brand-delete');
    }
    
    public function write_color()
    {
        return Cms_model::hasPermission('color-write');
    }
    
    public function read_color()
    {
        return Cms_model::hasPermission('color-read');
    }
    
    public function delete_color()
    {
        return Cms_model::hasPermission('color-delete');
    }
    
    public function write_category()
    {
        return Cms_model::hasPermission('category-write');
    }
    
    public function read_category()
    {
        return Cms_model::hasPermission('category-read');
    }
    
    public function delete_category()
    {
        return Cms_model::hasPermission('category-delete');
    }
    
    public function write_product()
    {
        return Cms_model::hasPermission('product-write');
    }
    
    public function read_product()
    {
        return Cms_model::hasPermission('product-read');
    }
    
    public function delete_product()
    {
        return Cms_model::hasPermission('product-delete');
    }
    
    public function read_order()
    {
        return Cms_model::hasPermission('order-read');
    }
    
    public function read_role()
    {
        return Cms_model::hasPermission('role-read');
    }
    
    public function write_role()
    {
        return Cms_model::hasPermission('role-write');
    }
    
    public function delete_role()
    {
        return Cms_model::hasPermission('role-delete');
    }
    
    public function read_user()
    {
        return Cms_model::hasPermission('user-read');
    }
    
    public function write_user()
    {
        return Cms_model::hasPermission('user-write');
    }
    
    public function delete_user()
    {
        return Cms_model::hasPermission('delete-user');
    }
}
