<?php

namespace Modules\Oms\Models;

use DB;
use Session;
use Route;

class Cms_model {

    public static function getLogin($email, $password) {

        $login = DB::table('oms_login AS l')
                ->leftJoin('oms_privilege AS k','k.privilege_code','=','l.category_code','k.privilege_name')
                ->where('l.email', '=', $email)
                ->where('l.password', '=', $password)
                ->where('l.isdelete', '=', 0)
                ->where('l.active', '=', 1)
                ->get();

        return $login;
    }

    public static function getAllUserLogin($userID = '', $isdelete= '', $count = false) {

        $sql = DB::table('oms_login')                
                ->select('user_id','name','email','password','active','createdon',
                        'address','note','hp','phone','birthday','category_code' );
                
        if ($userID !== "") {
            $sql->where('user_id', '=', $userID);
        }
        
        if ($isdelete !== "") {
            $sql->where('isdelete', '=', $isdelete);
        }
        
        if(!$count) {
            return $sql->get();
        }else{
            return $sql->count();
        }
        
    }
    
    public static function getAllPrivilege($privilegeID = '', $privilegeCode = '') {

        $sql = DB::table('oms_privilege')                
                ->select('privilege_id','privilege_name','privilege_code');
                
        if ($privilegeID !== "") {
            $sql->where('privilege_id', '=', $privilegeID);
        }
        
        if($privilegeCode !== ''){
            $sql->where('privilege_code', '=', $privilegeCode);
        }
        
        return $sql->get();
        
    }
    
    public static function getAllRole($id = '') {

        $sql = DB::table('oms_role')                
                ->select('id','name', 'description');
                
        if ($id !== "") {
            return $sql->where('id', '=', $id)->first();
        }
        
        return $sql->get();
        
    }
    
    public static function getAllPermission() {
        $permissions = [];
        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();

            if (array_key_exists('controller', $action) && $action['namespace'] === "Modules\Oms\Http\Controllers")
            {
                $actionSplit = explode("@", $action['controller']);
                $controller = str_replace("{$action['namespace']}\\", '', $actionSplit[0]);
                $permissions[] = [
                    'namespace' => $action['namespace'],
                    'controller' => $controller,
                    'method' => $actionSplit[1],
                    'value' => $action['controller']
                ];
            }
        }
        
        return $permissions;
    }
    
    public static function getAllSelectedPermission($role_id) {
        return DB::table('oms_role_permission')
                ->select('oms_role_permission.permission')
                ->where('oms_role_permission.role_id', $role_id)->get();
    }
    
    public static function getAllSelectedRole($user_id) {
        return DB::table('oms_role_user')
                ->select('oms_role_user.role_id')
                ->join('oms_login', 'oms_login.user_id', '=', 'oms_role_user.user_id')
                ->where('oms_role_user.user_id', $user_id)->get();
    }
    
    public static function updatePermissions($id, array $data) {
        DB::table('oms_role_permission')->where('role_id', $id)->delete();
        
        foreach($data as $val) {
            DB::insert('insert into oms_role_permission (role_id, permission) values (?, ?)', 
                    [
                        $id,                         
                        $val
                    ]);
        }
        
        return true;
    }
    
    public static function updateUserRole($id, array $data) {
        DB::table('oms_role_user')->where('user_id', $id)->delete();
        
        foreach($data as $val) {
            DB::insert('insert into oms_role_user(user_id, role_id) values (?, ?)', 
                    [
                        $id,                         
                        $val
                    ]);
        }
        
        return true;
    }
    
    public static function insertRole($data = array()) {
        DB::insert('insert into oms_role (name, description) values (?, ?)', 
                    [
                        $data['name'],                        
                        $data['description'],
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updateRole($data = array()) {
        DB::table('oms_role')->where('id', '=', $data['id'])->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]); 
        
        return true;
    }
    
    public static function deleteRole($id) {
        DB::table('oms_role')->where('id', '=', $id)->delete(); 
        DB::table('oms_role_permission')->where('role_id', '=', $id)->delete(); 
        
        return true;
    }
    
    public static function insertPrivilege($privilegeArray = array()) {

        DB::insert('insert into oms_privilege (privilege_name, privilege_code) values (?, ?)', 
                    [
                        $privilegeArray['privilegeName'],
                        $privilegeArray['privilegeCode'],                         
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updatePrivilege($privilegeArray = array()) {

        DB::table('oms_privilege')->where('privilege_id', '=', $privilegeArray['privilegeID'])
                          ->update(['privilege_name' => $privilegeArray['privilegeName'],
                    'privilege_code' => $privilegeArray['privilegeCode'],
                              ]); 
        return true;
    }
    
    public static function updateUser($memberArray = array()) {

        DB::table('oms_login')->where('user_id', '=', $memberArray['userID'])
                          ->update(['name' => $memberArray['name'],
                    'address' => $memberArray['address'],
                    'hp' => $memberArray['hp'],
                    'phone' => $memberArray['phone'],
                    'category_code' => $memberArray['privilege'],
                    'birthday' => $memberArray['birthdate'],                    
                    'note' => $memberArray['note'],
                              ]); 
        return true;
    }
    
    public static function insertUser($memberArray = array()) {
    
        DB::insert('insert into oms_login (name, address, phone, hp, email, password, category_code ,isdelete, note, active,createdon, birthday) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                    [
                        $memberArray['name'], 
                        $memberArray['address'],
                        $memberArray['phone'],
                        $memberArray['hp'],
                        $memberArray['email'],
                        $memberArray['password'],
                        $memberArray['privilege'],
                        '0',
                        $memberArray['note'],
                        '1',
                        'now()',
                        $memberArray['birthdate'],
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function getAllMarketPlace($marketPlaceID = '') {

        $sql = DB::table('oms_marketplace AS M');
                
        if($marketPlaceID !== ''){
            $sql->where('M.marketplace_id', '=', $marketPlaceID);
        }

        return $sql->get();
    }
    
    public static function getAllColorMapping($colorMappingID = '', $colorES = '', $colorMP ='', $marketplaceID = '', $total = false) {

        $sql = DB::table('oms_color_mapping AS OCM')
        ->leftJoin('oms_marketplace AS OMP','OMP.marketplace_id','=', 'OCM.marketplace_id')
        ->select('OCM.*','OMP.marketplace_name');
        
        if($colorMappingID !== ''){
            $sql->where('OCM.color_mapping_id', '=', $colorMappingID);
        }

        if($colorES !== ''){
            $sql->where('OCM.color_es', '=', $colorES);
        }
        
        if($colorMP !== ''){
            $sql->where('OCM.color_marketplace_id', '=', $colorMP);
        }
        
        if($marketplaceID !== ''){
            $sql->where('OCM.marketplace_id', '=', $marketplaceID);
        }
        
        
        if($total){
            return $sql->count();
        }else{
            return $sql->get();
        }
        
    }
    
    
    public static function updateColorMapping($colorParam){
        $colorMappingID = isset($colorParam['colorMappingID'])? $colorParam['colorMappingID'] : '';
        $colorES = isset($colorParam['colorES']) ? $colorParam['colorES'] : '';
        $colorMarketplaceID = isset($colorParam['colorMarketplaceID'])? $colorParam['colorMarketplaceID'] : '';
        $colorMarketplace = isset($colorParam['colorMarketplace'])? $colorParam['colorMarketplace'] : '';
        $marketPlace = isset($colorParam['marketPlace'])? $colorParam['marketPlace'] : '';
        
        DB::table('oms_color_mapping')->where('color_mapping_id', '=', $colorMappingID)
                          ->update(['color_es' => $colorES,
                                'color_marketplace_id' => $colorMarketplaceID,
                                'color_marketplace_desc' => $colorMarketplace,
                                'marketplace_id' => $marketPlace,
                              ]); 
        return true;
    }
    
    public static function insertColorMapping($colorParam){
        $colorES = isset($colorParam['colorES']) ? $colorParam['colorES'] : '';
        $colorMarketplaceID = isset($colorParam['colorMarketplaceID'])? $colorParam['colorMarketplaceID'] : '';
        $colorMarketplace = isset($colorParam['colorMarketplace'])? $colorParam['colorMarketplace'] : '';
        $marketPlace = isset($colorParam['marketPlace'])? $colorParam['marketPlace'] : '';
        
        
        DB::insert('insert into oms_color_mapping (color_es, color_marketplace_id, color_marketplace_desc, marketplace_id)'
                . ' values (?, ?, ?, ?)', 
                    [
                        $colorES, 
                        $colorMarketplaceID,
                        $colorMarketplace,
                        $marketPlace,                        
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function getAllBrandMapping($brandMappingID = '', $brandES = '', $brandMP ='', $marketplaceID = '', $total = false) {

        $sql = DB::table('oms_brand_mapping AS OBM')
        ->leftJoin('oms_marketplace AS OMP','OMP.marketplace_id','=', 'OBM.marketplace_id')
        ->select('OBM.*','OMP.marketplace_name');
        
        if($brandMappingID !== ''){
            $sql->where('OBM.brand_mapping_id', '=', $brandMappingID);
        }

        if($brandES !== ''){
            $sql->where('OBM.brand_es', '=', $brandES);
        }
        
        if($brandMP !== ''){
            $sql->where('OBM.brand_marketplace_id', '=', $brandMP);
        }
        
        if($marketplaceID !== ''){
            $sql->where('OBM.marketplace_id', '=', $marketplaceID);
        }
        
        
        if($total){
            return $sql->count();
        }else{
            return $sql->get();
        }
        
    }
    
    public static function updateBrandMapping($brandParam){
        $brandMappingID = isset($brandParam['brandMappingID'])? $brandParam['brandMappingID'] : '';
        $brandES = isset($brandParam['brandES']) ? $brandParam['brandES'] : '';
        $brandMarketplaceID = isset($brandParam['brandMarketplaceID'])? $brandParam['brandMarketplaceID'] : '';
        $brandMarketplace = isset($brandParam['brandMarketplace'])? $brandParam['brandMarketplace'] : '';
        $marketPlace = isset($brandParam['marketPlace'])? $brandParam['marketPlace'] : '';
        
        DB::table('oms_brand_mapping')->where('brand_mapping_id', '=', $brandMappingID)
                          ->update(['brand_es' => $brandES,
                                'brand_marketplace_id' => $brandMarketplaceID,
                                'brand_marketplace_desc' => $brandMarketplace,
                                'marketplace_id' => $marketPlace,
                              ]); 
        return true;
    }
    
    public static function insertBrandMapping($brandParam){
        $brandES = isset($brandParam['brandES']) ? $brandParam['brandES'] : '';
        $brandMarketplaceID = isset($brandParam['brandMarketplaceID'])? $brandParam['brandMarketplaceID'] : '';
        $brandMarketplace = isset($brandParam['brandMarketplace'])? $brandParam['brandMarketplace'] : '';
        $marketPlace = isset($brandParam['marketPlace'])? $brandParam['marketPlace'] : '';
        
        
        DB::insert('insert into oms_brand_mapping (brand_es, brand_marketplace_id, brand_marketplace_desc, marketplace_id)'
                . ' values (?, ?, ?, ?)', 
                    [
                        $brandES, 
                        $brandMarketplaceID,
                        $brandMarketplace,
                        $marketPlace,                        
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function getAllCategoryMapping($categoryMappingID = '', $categoryES = '', $categoryMP ='', $marketplaceID = '', $total = false) {

        $sql = DB::table('oms_category_mapping AS OCM')
        ->leftJoin('oms_marketplace AS OMP','OMP.marketplace_id','=', 'OCM.marketplace_id')
        ->select('OCM.*','OMP.marketplace_name');
        
        if($categoryMappingID !== ''){
            $sql->where('OCM.category_mapping_id', '=', $categoryMappingID);
        }

        if($categoryES !== ''){
            $sql->where('OCM.category_es', '=', $categoryES);
        }
        
        if($categoryMP !== ''){
            $sql->where('OCM.category_marketplace_id', '=', $categoryMP);
        }
        
        if($marketplaceID !== ''){
            $sql->where('OCM.marketplace_id', '=', $marketplaceID);
        }
        
        
        if($total){
            return $sql->count();
        }else{
            return $sql->get();
        }
        
    }
    
    public static function updateCategoryMapping($categoryParam){
        $categoryMappingID = isset($categoryParam['categoryMappingID'])? $categoryParam['categoryMappingID'] : '';
        $categoryES = isset($categoryParam['categoryES']) ? $categoryParam['categoryES'] : '';
        $categoryMarketplaceID = isset($categoryParam['categoryMarketplaceID'])? $categoryParam['categoryMarketplaceID'] : '';
        $categoryMarketplace = isset($categoryParam['categoryMarketplace'])? $categoryParam['categoryMarketplace'] : '';
        $marketPlace = isset($categoryParam['marketPlace'])? $categoryParam['marketPlace'] : '';
        
        DB::table('oms_category_mapping')->where('category_mapping_id', '=', $categoryMappingID)
                          ->update(['category_es' => $categoryES,
                                'category_marketplace_id' => $categoryMarketplaceID,
                                'category_marketplace_desc' => $categoryMarketplace,
                                'marketplace_id' => $marketPlace,
                              ]); 
        return true;
    }
    
    public static function insertCategoryMapping($categoryParam){
        $categoryES = isset($categoryParam['categoryES']) ? $categoryParam['categoryES'] : '';
        $categoryMarketplaceID = isset($categoryParam['categoryMarketplaceID'])? $categoryParam['categoryMarketplaceID'] : '';
        $categoryMarketplace = isset($categoryParam['categoryMarketplace'])? $categoryParam['categoryMarketplace'] : '';
        $marketPlace = isset($categoryParam['marketPlace'])? $categoryParam['marketPlace'] : '';
        
        
        DB::insert('insert into oms_category_mapping (category_es, category_marketplace_id, category_marketplace_desc, marketplace_id)'
                . ' values (?, ?, ?, ?)', 
                    [
                        $categoryES, 
                        $categoryMarketplaceID,
                        $categoryMarketplace,
                        $marketPlace,                        
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function insertProduct($productArray = array()) {
                
        $sql = 'insert into oms_product ('
                . 'productES_id, '
                . 'sku, '
                . 'product_name, '
                . 'brand_id, '
                . 'category_id, '
                . 'color_id, '
                . 'price, '
                . 'weight_package, '
                . 'weight_product, '
                . 'product_hightlight, '
                . 'product_full_description, '
                . 'images, '
                . 'product_attributes, '
                . 'dimension_package, '
                . 'dimension_product, '
                . 'youtube_url, '
                . 'handling_fee, '
                . 'insurance, '
                . 'jabodetabek_only, '
                . 'limit_qty, '
                . 'marketplace_id, '
                . 'promo_price, '
                . 'start_date, '
                . 'stock_available, '
                . 'stock_minimum, '
                . 'end_date, '
                . 'createdon, '
                . 'product_marketplace_id, '
                . 'product_marketplace_variant_id, '
                . 'createdby) '
                . 'values (?, ?, ?, ?, ? , ?, ?, ?, ?, ? , ?, ?, ?, ?, ? , ?, ?, ?, ?, ? , ?, ?, ?, ?, ? , ?, now(), ?, ?, ?)';
                
        $sqlValue = [
            $productArray['productESID'],
            $productArray['sku'],
            $productArray['productName'],
            $productArray['brandID'],
            $productArray['categoryID'],
            $productArray['colorID'],
            $productArray['price'],
            $productArray['weightPackage'],
            $productArray['weightProductOutdoor'],
            $productArray['hightlights'],
            $productArray['productFullDescription'],
            $productArray['images'],
            $productArray['attributes'],
            $productArray['dimension'],
            $productArray['dimensionProductOutdoor'],
            $productArray['youtubeUrl'],
            $productArray['handlingFee'],
            $productArray['insurance'],
            $productArray['jabodetabekOnly'],
            $productArray['limitQty'],
            $productArray['marketPlace'],
            $productArray['promoPrice'],
            $productArray['startDate'],
            $productArray['stockAvailable'],
            $productArray['stockMinimum'],
            $productArray['endDate'],
            $productArray['productMarketPlaceID'],
            $productArray['productMarketPlaceVariantID'],
            $productArray['createdby']
        ];
        DB::insert($sql ,$sqlValue);
        
        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updateProduct($productArray = array()) {
        $sqlValue = [
            'sku' => $productArray['sku'],
            'product_name' => $productArray['productName'],
            'brand_id' => $productArray['brandID'],
            'category_id' => $productArray['categoryID'],
            'color_id' => $productArray['colorID'],
            'price' => $productArray['price'],
            'weight_package' => $productArray['weightPackage'],
            'weight_product' => $productArray['weightProductOutdoor'],
            'product_hightlight' => $productArray['hightlights'],
            'product_full_description' => $productArray['productFullDescription'],
            'images' => $productArray['images'],
            'product_attributes' => $productArray['attributes'],
            'dimension_package' => $productArray['dimension'],
            'dimension_product' => $productArray['dimensionProductOutdoor'],
            'youtube_url' => $productArray['youtubeUrl'],
            'handling_fee' => $productArray['handlingFee'],
            'insurance' => $productArray['insurance'],
            'jabodetabek_only' => $productArray['jabodetabekOnly'],
            'limit_qty' => $productArray['limitQty'],
            'promo_price' => $productArray['promoPrice'],
            'start_date' => $productArray['startDate'],
            'stock_available' => $productArray['stockAvailable'],
            'stock_minimum' => $productArray['stockMinimum'],
            'end_date' => $productArray['endDate'],            
        ];
        DB::table('oms_product')->where('productES_id', '=', $productArray['productESID'])
                            ->where('marketplace_id', '=', $productArray['marketPlace'])
                          ->update($sqlValue); 
        return true;
    }
    
    public static function getAllProduct($productID = '', $productESID = '' , $marketPlaceID = '', $total = false) {
        $sql = DB::table('oms_product AS OP')
        ->leftJoin('oms_login AS OL','OP.createdby','=', 'OL.user_id')
        ->leftJoin('oms_marketplace AS OMP','OMP.marketplace_id','=', 'OP.marketplace_id')
        ->leftJoin('oms_brand_mapping AS OBM','OBM.brand_mapping_id','=', 'OP.brand_id')
        ->leftJoin('oms_color_mapping AS OCM','OCM.color_mapping_id','=', 'OP.color_id')
        ->leftJoin('oms_category_mapping AS OCA','OCA.category_mapping_id','=', 'OP.category_id')        
        ->select('OP.*','OL.name','OMP.marketplace_name','OBM.brand_marketplace_id','OBM.brand_marketplace_desc',
                'OCM.color_marketplace_id','OCM.color_marketplace_desc','OCA.category_marketplace_id','OCA.category_marketplace_desc');
        
        if($productID !== ''){
            $sql->where('OP.product_id', '=', $productID);
        }

        if($productESID !== ''){
            $sql->where('OP.productES_id', '=', $productESID);
        }
        
        if($marketPlaceID !== ''){
            $sql->where('OP.marketplace_id', '=', $marketPlaceID);
        }
        
        if($total){
            return $sql->count();
        }else{
            return $sql->get();
        }
    }
    
    public static function deleteProduct($ID) {        
        DB::table('oms_product')->where('product_id', '=', $ID)->delete();
        return true;
    }
    
    public static function getAllInvoiceStatus($invoiceID = '', $invoiceNo = '', $marketPaceID = '' , $total = false) {

        $sql = DB::table('oms_invoice_status AS IS')
                ->select('IS.*');        

        if($invoiceID !== ''){
            $sql->where('IS.invoice_id', '=', $invoiceID);
        }
        
        if($invoiceNo !== ''){
            $sql->where('IS.invoice_number', '=', $invoiceNo);
        }
        
        if($marketPaceID !== ''){
            $sql->where('IS.marketplace_id', '=', $marketPaceID);
        }
        
        if($total){
            return $sql->count();
        }else{
            return $sql->get();
        }
    }
    
    public static function insertInvoiceStatus($statusArray = array()) {
                
        $sql = 'insert into oms_invoice_status ('
                . 'marketplace_id, '
                . 'delivery_provider, '
                . 'tracking_number, '
                . 'cancel_reason, '
                . 'invoice_number, '
                . 'status) '
                . 'values (?, ?, ?, ?, ? , ?)';
                
        $sqlValue = [
            $statusArray['marketPlaceID'],
            $statusArray['deliveryProvider'],
            $statusArray['trackingNumber'],
            $statusArray['cancelReason'],
            $statusArray['soStoreNumber'],
            $statusArray['status'],
            
        ];
        
        DB::insert($sql ,$sqlValue);
        
        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updateInvoiceStatus($statusArray = array()) {
        $sqlValue = [
            'delivery_provider' => $statusArray['deliveryProvider'],
            'tracking_number' => $statusArray['trackingNumber'],
            'cancel_reason' => $statusArray['cancelReason'],
            'status' => $statusArray['status'],                       
        ];
        DB::table('oms_invoice_status')->where('invoice_number', '=', $statusArray['soStoreNumber'])
                            ->where('marketplace_id', '=', $statusArray['marketPlaceID'])
                          ->update($sqlValue); 
        return true;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public static function getAllConfig($configID = '', $configName = '') {

        $config = DB::table('configuration');
        
        if ($configID !== "") {
            $config->where('configurationID', '=', $configID);
        }

        if ($configName !== "") {
            $config->where('field', '=', $configName);
        }
        
        return $config->get();
    }

    public static function updateConfiguration($configID = '', $value='') {

        DB::table('configuration')->where('configurationID', '=', $configID)->update(['value' => $value]); 
        return true;
    }
    
    public static function updatePassword($passwordArray = []) {
        DB::table('oms_login')->where('user_id', '=', $passwordArray['userID'])->update(['password' => $passwordArray['password']]); 
        return true;
    }
    
    public static function updatePasswordMerchant($passwordArray = []) {

        DB::table('vendor')->where('vendor_id', '=', $passwordArray['userID'])->update(['password' => $passwordArray['password']]); 
        return true;
    }
    
    public static function updatePasswordMember($passwordArray = []) {

        DB::table('users')->where('id', '=', $passwordArray['userID'])->update(['password' => $passwordArray['password']]); 
        return true;
    }
    public static function getAllCategory($categoryID = '', $active = '') {

        $category = DB::table('product_type');
        
        if ($categoryID !== "") {
            $category->where('product_type_id', '=', $categoryID);
        }

        if ($active !== "") {
            $category->where('active', '=', $active);
        }
        
        return $category->get();
    }
    
    public static function insertCategory($categoryArray = array()) {

        DB::insert('insert into product_type (description, active) values (?, ?)', 
                    [$categoryArray['description'], 
                    '1']);

        return true;
    }
    
    public static function updateCategory($categoryArray = array()) {

        DB::table('product_type')->where('product_type_id', '=', $categoryArray['productTypeID'])->update(['description' => $categoryArray['description']]); 
        return true;
    }
    
    public static function insertSubCategory($categoryArray = array()) {

        DB::insert('insert into product_sub_type (name, active, product_type_id) values (?, ?, ?)', 
                    [
                        $categoryArray['description'], 
                        '1',
                        $categoryArray['productCategoryID']    
                    ]);
        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updateSubCategory($categoryArray = array()) {

        DB::table('product_sub_type')->where('product_sub_type_id', '=', $categoryArray['productSubCategoryID'])
                ->update(['name' => $categoryArray['description'],
                    'product_type_id' => $categoryArray['productCategoryID']]); 
        return true;
    }
    
    public static function insertSubCategoryDetail($categoryArray = array()) {

        DB::insert('insert into product_sub_type_detail (name, active, product_sub_type_id) values (?, ?, ?)', 
                    [
                        $categoryArray['description'], 
                        '1',
                        $categoryArray['productSubType']
                        ]);
        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }
    
    public static function updateSubCategoryDetail($categoryArray = array()) {

        DB::table('product_sub_type_detail')
                ->where('product_sub_type_detail_id', '=', $categoryArray['productSubDetailCategoryID'])
                ->update(['name' => $categoryArray['description'],'product_sub_type_id' => $categoryArray['productSubType']]); 
        return true;
    }
    
    public static function getAllCommision ($commisionID = '',$productType = '', $vendorTypeID='', $commisionType = '') {

        $commision = DB::table('commision AS C')
                ->leftJoin('vendor_type AS VP','C.vendor_type_id','=', 'VP.vendor_type_id')
                ->leftJoin('product_type AS PT','PT.product_type_id','=', 'C.product_type_id')
                ->leftJoin('commision_type AS CT','CT.commision_type_id','=','C.commision_type_id')
                ->select('C.*','VP.vendor_type_description as desc','PT.description AS product_type_desc','CT.description as commision_type_desc');
                
        if ($commisionID !== "") {
            $commision->where('C.commision_id', '=', $commisionID);
        }
        
        if ($productType !== "") {
            $commision->where('C.product_type_id', '=', $productType);
        }
        
        if ($vendorTypeID !== "") {
            $commision->where('C.vendor_type_id', '=', $vendorTypeID);
        }

        if ($commisionType !== "") {
            $commision->where('C.commision_type_id', '=', $commisionType);
        }
        return $commision->get();
    }
    
    public static function getAllCommisionType() {
        $commision = DB::table('commision_type')->select('commision_type_id','description');
       
        return $commision->get();
    }
    
    public static function getAllVendorType ($vendorTypeID = '') {

        $sql = DB::table('vendor_type as VP')                
                ->select('VP.vendor_type_id','VP.vendor_type_description as desc');
                
        if ($vendorTypeID !== "") {
            $sql->where('VP.vendor_type_id', '=', $vendorTypeID);
        }

        return $sql->get();
    }
    
    public static function deactiveItem($ID,$primaryKey,$table,$value) {

        DB::table($table)->where($primaryKey, '=', $ID)->update(['active' => $value]); 
        return true;
    }
    
    public static function deleteItem($ID,$primaryKey,$table) {
        
        DB::table($table)->where($primaryKey, '=', $ID)->delete();
        return true;
    }
    
    public static function deleteSoftItem($ID,$primaryKey,$table,$value) {
        
        DB::table($table)->where($primaryKey, '=', $ID)->update(['isdelete' => $value]); 
        return true;
    }
        
    public static function updateCommision($commisionArray = array()) {

        DB::table('commision')->where('commision_id', '=', $commisionArray['commisionID'])
                ->update(['start_price' => $commisionArray['startPrice'],
                    'end_price' => $commisionArray['endPrice'],
                    'percentage' => $commisionArray['percentage'],
                    'vendor_type_id' => $commisionArray['vendorTypeID'],
                    'product_type_id' => $commisionArray['productTypeID'],
                    'commision_type_id' => $commisionArray['commisionTypeID']]); 
        return true;
    }
    
    public static function insertCommision($commisionArray = array()) {

        DB::insert('insert into commision (start_price, end_price, percentage, vendor_type_id, product_type_id, commision_type_id) values (?, ?, ?, ?, ?, ?)', 
                    [$commisionArray['startPrice'], 
                    $commisionArray['endPrice'],
                    $commisionArray['percentage'], 
                    $commisionArray['vendorTypeID'], 
                    $commisionArray['productTypeID'],
                    $commisionArray['commisionTypeID']]
                );

        return true;
    }
    
    public static function getAllPaymentType ($paymentTypeID = '') {

        $sql = DB::table('payment_type as PT')                
                ->select('PT.payment_type_id','PT.description as desc', 'PT.active');
                
        if ($paymentTypeID !== "") {
            $sql->where('PT.payment_type_id', '=', $paymentTypeID);
        }

        return $sql->get();
    }
    
    public static function insertPayment($paymentArray = array()) {

        DB::insert('insert into payment_type (description, active) values (?, ?)', 
                    [$paymentArray['description'], 
                    '1']);

        return true;
    }
    
    public static function updatePayment($paymentArray = array()) {

        DB::table('payment_type')->where('payment_type_id', '=', $paymentArray['paymentTypeID'])->update(['description' => $paymentArray['description']]); 
        return true;
    }
    
    public static function getAllLogin($userID = '', $isdelete= '', $category = '') {

        $sql = DB::table('login AS L')                
                ->leftJoin('kategori AS K','K.code','=','L.kategori_code')
                ->select('user_id','name','hp','telepon','email','password','kategori_code','photo','active','birthday','address', 'status', 'gender', 'photo', 'sallary', 'region', 'createdon','K.description as kategori_description','note');
                
                
        if ($userID !== "") {
            $sql->where('user_id', '=', $userID);
        }
        
        if ($isdelete !== "") {
            $sql->where('isdelete', '=', $isdelete);
        }
        
        if ($category !== "") {
            $sql->where('kategori_code', '=', $category);
        }
        
        return $sql->get();
    }
    
    public static function insertOfficeMember($memberArray = array()) {

        DB::insert('insert into login (name, address, hp, telepon, email, password, kategori_code, birthday, status, region, sallary,gender, photo, createdon,isdelete,note) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), 0, ?)', 
                    [
                        $memberArray['name'], 
                        $memberArray['address'],
                        $memberArray['hp'],
                        $memberArray['telepon'],
                        $memberArray['email'],
                        $memberArray['password'],
                        $memberArray['privilege'],
                        $memberArray['birthdate'],
                        $memberArray['status'],
                        $memberArray['region'],
                        $memberArray['sallary'],
                        $memberArray['gender'],
                        $memberArray['photo'],
                        $memberArray['note'],
                    ]);

        return true;
    }
    
    
    
    
    
    
    
    public static function getAllLoginMerchant($vendorID = '', $isdelete= '' , $count = false) {

        $sql = DB::table('vendor')                
                ->select('vendor_id','name','address','password','email','active','created_at','phone','contact_person','note','photo');
                
        if ($vendorID !== "") {
            $sql->where('vendor_id', '=', $vendorID);
        }
        
        if ($isdelete !== "") {
            $sql->where('isdelete', '=', $isdelete);
        }
        
        $sql->orderBy('name', 'asc');
        
        if(!$count) {
            return $sql->get();
        }else{
            return $sql->count();
        }
    }
    
    public static function insertMemberMerchant($memberArray = array()) {

        DB::insert('insert into vendor (name, address, phone, email, password, created_at ,isdelete, contact_person, note, photo) values (?, ?, ?, ?, ?, ?,  0, ?, ?, ?)', 
                    [
                        $memberArray['name'], 
                        $memberArray['address'],
                        $memberArray['phone'],
                        $memberArray['email'],
                        $memberArray['password'],
                        $memberArray['joinDate'],
                        $memberArray['contactPerson'],                        
                        $memberArray['note'],
                        $memberArray['photo'],
                    ]);

        $lastId = DB::getPdo()->lastInsertId();
        return $lastId;
    }

    public static function getMerchantBranch($vendorID = '', $isDelete = ''){
        $sql = DB::table('vendor_branch')                
                ->select('vendor_branch_id','description','address', 'phone');
                
        if ($vendorID !== "") {
            $sql->where('vendor_id', '=', $vendorID);
        }
        
        if ($isDelete !== "") {
            $sql->where('isdelete', '=', $isDelete);
        }
        
        return $sql->get();        
    }
    
    public static function insertMerchantBranch($branchArray = array()) {
        
        $sql = 'insert into vendor_branch (vendor_id, description, address, isdelete, phone) '
                . 'values (?, ?, ?, 0, ?)';
        
        $sqlValue = [
            $branchArray['vendorID'],
            $branchArray['description'],
            $branchArray['address'],
            $branchArray['phone'],    
        ];
        DB::insert($sql ,$sqlValue);
        return true;
    }
    
    public static function updateMemberMerchant($memberArray = array()) {

        DB::table('vendor')->where('vendor_id', '=', $memberArray['vendorID'])
                          ->update(['name' => $memberArray['name'],
                            'address' => $memberArray['address'],
                            'phone' => $memberArray['phone'],
                            'contact_person' => $memberArray['contactPerson'],
                            'photo' => $memberArray['photo'],
                            'note' => $memberArray['note'],
                              ]); 
        return true;
    }
    
    
    public static function getRandomProduct($exceptproductID = '', $limit = '') {

        $sql = DB::table('product AS P')
                ->leftJoin('product_type AS PT','PT.product_type_id','=', 'P.product_type_id')
                ->leftJoin('login AS L','L.user_id','=', 'P.salesby')
                ->leftJoin('login AS L2','L2.user_id','=', 'P.createdby')
                ->leftJoin('product_sub_type AS PST','PST.product_sub_type_id','=','P.product_sub_type_id')
                ->leftJoin('product_sub_type_detail AS PSTD','PSTD.product_sub_type_detail_id','=','P.product_sub_type_detail_id')
                ->select('P.*','PT.description AS productTypeDesc', 'PSTD.name AS productSubTypeDetailName', 'PST.name as productSubTypeName' , 'L.name AS salesName', 'L2.name AS createdby')
                ->inRandomOrder();
        
        if ($exceptproductID !== "") {
            $sql->where('P.product_id', '<>', $exceptproductID);
        }
        
        $sql->where('P.isdelete', '=', 0)
            ->where('P.active','=',1);
       
        $sql->where('P.startdate', '<=', date("Y-m-d"));
        $sql->where('P.enddate', '>=', date("Y-m-d"));
            
        if ($limit !== "") {
            $sql->take($limit);
        }
        
        
        
            return $sql->get();
        
    }
    
    
    
    public static function getAllProductSubType($productSubTypeID = '', $active = '', $productTypeID ='') {

        $sql = DB::table('product_sub_type AS PS')                
                ->select('PS.product_sub_type_id', 'PS.product_type_id', 'PS.name', 'PS.active', 'PS.url', 'PS.order_index');
                
        if ($productSubTypeID !== "") {
            $sql->where('PS.product_sub_type_id', '=', $productSubTypeID);
        }
        
        if ($productTypeID !== "") {
            $sql->where('PS.product_type_id', '=', $productTypeID);
        }
        
        if ($active !== "") {
            $sql->where('PS.active', '=', $active);
        }

        return $sql->get();
    }
    
    public static function getAllProductSubTypeDetail($productSubTypeDetailID = '', $active = '', $productSubTypeID ='') {

        $sql = DB::table('product_sub_type_detail AS PSD')                
                ->select('PSD.product_sub_type_detail_id', 'PSD.product_sub_type_id', 'PSD.name', 'PSD.active', 'PSD.url', 'PSD.order_index');
                
        if ($productSubTypeDetailID !== "") {
            $sql->where('PSD.product_sub_type_detail_id', '=', $productSubTypeDetailID);
        }
        
        if ($productSubTypeID !== "") {
            $sql->where('PSD.product_sub_type_id', '=', $productSubTypeID);
        }
        
        if ($active !== "") {
            $sql->where('PSD.active', '=', $active);
        }

        return $sql->get();
    }
    
    public static function getAllPhotoProduct($productID = '') {

        $sql = DB::table('photo AS P')
                ->where('P.product_id', '=', $productID)
                ->select('P.name','P.product_id as product_ID', 'P.photo_id as photo_ID');        

        return $sql->get();
    }
    
    public static function savePhotoProduct($imageArray = array()) {

        DB::insert('insert into photo (product_id, name) values (?, ?)', 
                    [
                        $imageArray['productID'], 
                        $imageArray['imageName'],
                    ]);

        return true;
    }
    
    public static function getAllProductLine($productID = '', $isdelete = '') {

        $sql = DB::table('product_line AS PL')
                ->leftJoin('vendor_branch AS VB','VB.vendor_branch_id','=','PL.branch' )
                ->where('PL.product_id', '=', $productID)
                ->where('PL.isdelete', '=', $isdelete)
                ->select('PL.product_line_id','PL.name', 'PL.description', 'PL.qty', 'PL.price','PL.promo_price', 'PL.weight', 'PL.active', 'PL.promo_price','VB.description as branch');        

        return $sql->get();
    }
    
    public static function getAllProductLineByID($productLineID = '') {

        $sql = DB::table('product_line AS PL')
                ->where('PL.product_line_id', '=', $productLineID)
                ->select('PL.product_line_id','PL.name', 'PL.description', 'PL.qty', 'PL.price','PL.promo_price', 'PL.weight', 'PL.active', 'PL.promo_price','PL.branch','PL.max_buying');        

        return $sql->get();
    }
    
    public static function saveProductLine($productLineArray = array()) {

        DB::insert('insert into product_line (product_id, name, description, qty, price, promo_price, weight, branch, active, isdelete, max_buying) values (?, ?, ?, ?, ?, ?, ?, ?, 1, 0,?)', 
                    [
                        $productLineArray['productID'], 
                        $productLineArray['name'],
                        $productLineArray['description'],
                        $productLineArray['qty'],
                        $productLineArray['price'],
                        $productLineArray['promoPrice'],
                        $productLineArray['weight'],
                        $productLineArray['branch'],
                        $productLineArray['maxBuying'],
                    ]);

        return true;
    }
    
    public static function updateProductLine($productLineArray = array()) {

        $sqlValue = [
            'name' => $productLineArray['name'],
            'description' => $productLineArray['description'],
            'qty' => $productLineArray['qty'],
            'price' => $productLineArray['price'],
            'promo_price' => $productLineArray['promoPrice'],
            'weight' => $productLineArray['weight'],
            'branch' => $productLineArray['branch'],
            'max_buying' => $productLineArray['maxBuying'],
        ];
        DB::table('product_line')->where('product_line_id', '=', $productLineArray['productLineID'])
                          ->update($sqlValue); 
        
        return true;
    }
    
    public static function getAllInvoice($invoiceID = '', $status= '', $count = false, $startdate = '', $enddate = '') {
        
        
        
        $sql = DB::table('invoice AS I')
                ->leftJoin('users AS U','U.id','=','I.user_id')
                ->leftJoin('payment_type AS PT','PT.payment_type_id','=','I.payment_type_id')
                ->leftJoin('invoice_status AS IS','IS.invoice_status_id','=','I.status')
                ->select('I.*','U.name','PT.description AS pament_type','IS.description as statusInvoice');        

        if($invoiceID !== ""){
            $sql->where('I.invoice_id', '=', $invoiceID);
        }
        
        if($status !== ""){
            $sql->where('I.status', '=', $status);
        }
        
        if($startdate !== "" && $enddate !== ""){
            $startDateYMD = isset($startdate)?substr($startdate,6,4).'-'.substr($startdate,3,2).'-'.substr($startdate,0,2):"";
            $endDateYMD = isset($enddate)?substr($enddate,6,4).'-'.substr($enddate,3,2).'-'.substr($enddate,0,2):"";
        
            $sql->where('I.created_date', '>=', $startDateYMD);
            $sql->where('I.created_date', '<=', $endDateYMD);
        }
        
        if(!$count){
            return $sql->get();
        }else{
            return $sql->count();
        }
    }
    
    public static function getAllConfirmation($invoiceID = '') {

        $sql = DB::table('confirm_payment AS CP')
                ->leftJoin('bank_account AS BC','BC.bank_account_id','=','CP.admin_bank')
                ->where('invoice_id','=',$invoiceID)
                ->select('CP.*','BC.bank_name','BC.bank_number');

        return $sql->get();
    }
    
    
    
    public static function getAllInvoiceLine($invoiceLineID = '', $invoiceID= '') {

        $sql = DB::table('invoice_line AS IL')
                ->leftJoin('product AS P','P.product_id','=','IL.product_id')
                ->join('product_line AS PL','IL.product_line_id','=','PL.product_line_id')
                ->leftJoin('product_type AS PT','P.product_type_id','=','PT.product_type_id')
                ->select('IL.*','P.product_name','PL.name AS product_line_name', 'PT.delivery');        

        if($invoiceLineID !== ""){
            $sql->where('IL.invoice_line_id', '=', $invoiceLineID);
        }
        
        if($invoiceID !== ""){
            $sql->where('IL.invoice_id', '=', $invoiceID);
        }
        
        return $sql->get();
        
    }
    
    public static function getAllProductHistory($productID= '') {

        $sql = DB::table('invoice_line AS IL')
                ->leftJoin('product AS P','P.product_id','=','IL.product_id')
                ->join('product_line AS PL','IL.product_line_id','=','PL.product_line_id')
                ->join('invoice AS I','I.invoice_id','=','IL.invoice_id')
                ->select('IL.*','P.product_name','PL.name AS product_line_name', 'I.invoice_number', 'I.invoice_id');        

        if($productID !== ""){
            $sql->where('IL.product_id', '=', $productID);
        }
        
        return $sql->get();
        
    }
    
    public static function getAllBankAccount($bankAccountID = '', $active = '') {

        $sql = DB::table('bank_account AS B')
                ->leftJoin('payment_type AS PT','PT.payment_type_id','=','B.payment_method_id')
                ->select ('B.*','PT.description');
        
        if ($bankAccountID !== "") {
            $sql->where('bank_account_id', '=', $bankAccountID);
        }

        if ($active !== "") {
            $sql->where('active', '=', $active);
        }
        
        return $sql->get();
    }
    
    public static function insertBank($bankArray = array()) {

        DB::insert('insert into bank_account (bank_name, bank_number, payment_method_id, account_name, active) values (?, ?, ?, ?, 1)', 
                    [
                        $bankArray['bankName'], 
                        $bankArray['bankNumber'],
                        $bankArray['paymentType'],
                        $bankArray['accountName'],
                    ]);

        return true;
    }
    
    public static function updateBank($bankArray = array()) {
        $sqlValue = [
            'bank_name' => $bankArray['bankName'],
            'bank_number' => $bankArray['bankNumber'],
            'account_name' => $bankArray['accountName'],
            'payment_method_id' => $bankArray['paymentType'],
            
        ];
        DB::table('bank_account')->where('bank_account_id', '=', $bankArray['bankAccountID'])
                          ->update($sqlValue); 
        return true;
    }
    
    public static function updateInvoice($invoiceID = '', $value= '', $resi = '') {
        
        $updateValue = [
            'status' => $value
        ];
        if($resi !== ""){
            $updateValue['no_resi'] = $resi;
        }
        DB::table('invoice')->where('invoice_id', '=', $invoiceID)->update($updateValue); 
        return true;
    }
    
    public static function cancelInvoice($invoiceID = '', $value= '') {
        DB::beginTransaction();
        try{
            $productLineArray = [];
            
            $sql = DB::table('invoice_line AS IL')
                ->leftJoin('product AS P','P.product_id','=','IL.product_id')
                ->join('product_line AS PL','IL.product_line_id','=','PL.product_line_id')
                ->leftJoin('product_type AS PT','P.product_type_id','=','PT.product_type_id')    
                ->select('IL.*','P.product_name','PL.name AS product_line_name', 'PT.delivery', 'PL.product_line_id', 'PL.qty as qty_stock');        

        
                if($invoiceID !== ""){
                    $sql->where('IL.invoice_id', '=', $invoiceID);
                }
        
            $productLineArray = $sql->get();    
                
           
            if(count($productLineArray) > 0){
                foreach($productLineArray as $productLineArrayDetail) {
                    $lastQtyItem = (int) $productLineArrayDetail->qty_stock + (int) $productLineArrayDetail->qty;
                    $productLineID = $productLineArrayDetail->product_line_id;
                    $updateValue = [
                        'qty' => $lastQtyItem
                    ];
                    $update = DB::table('product_line')->where('product_line_id', '=', $productLineID)->update($updateValue);
                }
            }

            $updateValue = [
                'status' => $value
            ];
            DB::table('invoice')->where('invoice_id', '=', $invoiceID)->update($updateValue); 
            DB::commit();
            return true;
            
        } catch (Exception $ex) {
            DB::rollBack();
        }
        
    }
    
    public static function getAllSlider($sliderID = '') {

        $sql = DB::table('slide AS S')                
                ->select('S.title','S.description','S.images','S.url', 'S.active', 'S.slideID');
                
                
        if ($sliderID !== "") {
            $sql->where('slideID', '=', $sliderID);
        }        
                
        return $sql->get();
    }
    
    public static function insertSlider($sliderArray = []){
        DB::insert('insert into slide (slideID, title, images, url, active) values (?, ?, ?, ?, 1)', 
                    [
                        $sliderArray['slideID'], 
                        $sliderArray['title'],
                        $sliderArray['images'],
                        $sliderArray['url'],
                    ]);

        return true; 
    }
    
    public static function updateSlider($sliderArray = []) {
        
        $updateValue = [
            'title' => $sliderArray['title'],
            'images' => $sliderArray['images'],
            'url' => $sliderArray['url'],
        ];

        DB::table('slide')->where('slideID', '=', $sliderArray['slideID'])->update($updateValue); 
        return true;
    }
    
    public static function getAllInvoiceCommision($invoiceID = ''){
        $sql = DB::table('invoice_line AS IL')         
                ->leftJoin('product AS P','P.product_id','=','IL.product_id')
                ->leftJoin('commision AS C', function($join)
                         {
                             $join->on('C.commision_type_id', '=', 'P.commision_type_id');
                             $join->on('P.product_type_id', '=', 'C.product_type_id');
                             $join->on('IL.grand_total','>=','C.start_price');
                             $join->on('IL.grand_total','<=','C.end_price');
                         })
                ->where('IL.invoice_id','=',$invoiceID)         
                ->select('IL.grand_total','C.percentage')         
            ;
                         
        return $sql->get();                 
    }
    
    public static function getAllCommisionHistory($commisionArray = []){
        $status = isset($commisionArray['status'])?$commisionArray['status']:"";
        $vendorID = isset($commisionArray['vendorID'])?$commisionArray['vendorID']:"";
        $startDate = isset($commisionArray['startdate'])?substr($commisionArray['startdate'],6,4).'-'.substr($commisionArray['startdate'],3,2).'-'.substr($commisionArray['startdate'],0,2):"";
        $endDate = isset($commisionArray['enddate'])?substr($commisionArray['enddate'],6,4).'-'.substr($commisionArray['enddate'],3,2).'-'.substr($commisionArray['enddate'],0,2):"";
        
        $sql = DB::table('commision_payment AS CP')         
                ->leftJoin('invoice AS I','I.invoice_id','=','CP.invoice_id')
                ->leftJoin('vendor AS V','V.vendor_id','=','CP.vendor_id')
                ->select('CP.*','V.name','I.invoice_number');
        
        if($status !== ""){
            $sql->where('CP.status','=',$status);
        }
                
        if($vendorID !== ""){
            $sql->where('CP.vendor_id','=',$vendorID);
        }
        
        if($startDate !== "" && $endDate !== ""){
            $sql->where('CP.created_on','>=',$startDate);
            $sql->where('CP.created_on','<=',$endDate);
        }
        
        return $sql->get();                 
    }
    
    public static function saveInvoiceCommision($commisionArray = array()) {

        DB::insert('insert into commision_payment (status, invoice_id, vendor_id, total, created_on) values (1, ?, ?, ?, now())', 
                    [
                        $commisionArray['invoiceID'], 
                        $commisionArray['vendorID'],
                        $commisionArray['totalCommision'],
                    ]);

        return true;
    }
    
    public static function checkInvoiceCommision($commisionArray = array()) {

        $total = DB::table('commision_payment AS CP')     
                ->where('CP.invoice_id','=',$commisionArray['invoiceID'])         
                ->count();

        return $total;
    }
    
    public static function payCommision($ID,$primaryKey,$table,$value) {

        DB::table($table)->where($primaryKey, '=', $ID)->update(['status' => $value,'paid_on'=>date('y-m-d')]); 
        return true;
    }
    
    public static function getAllCoupon($couponParam = array()) {
        $couponID = isset($couponParam['couponID'])?$couponParam['couponID']:"";
        $vendorID = isset($couponParam['vendorID'])?$couponParam['vendorID']:"";
        $status = isset($couponParam['status'])?$couponParam['status']:"";
        $startdate = isset($couponParam['startdate'])?substr($couponParam['startdate'],6,4).'-'.substr($couponParam['startdate'],3,2).'-'.substr($couponParam['startdate'],0,2):"";
        $enddate = isset($couponParam['enddate'])?substr($couponParam['enddate'],6,4).'-'.substr($couponParam['enddate'],3,2).'-'.substr($couponParam['enddate'],0,2):"";
        
        $sql = DB::table('coupon AS C')  
                ->leftJoin('invoice AS I','I.invoice_id','=','C.invoice_id')
                ->leftJoin('product_line AS PL','PL.product_line_id','=','C.product_line_id')
                ->leftJoin('vendor_branch AS VB','VB.vendor_branch_id','=','PL.branch')
                ->select('C.*','I.invoice_number','PL.name','VB.description');
                
        if ($couponID !== "") {
            $sql->where('coupon_id', '=', $couponID);
        }
        
        if ($status !== "") {
            $sql->where('used', '=', $status);
        }
        
        if($status == '1'){
            $sql->where('used_at', '>=', $startdate);
            $sql->where('used_at', '<=', $enddate);
        }
        
            return $sql->get();
    }
    
    public static function changeCouponStatus($ID,$primaryKey,$table,$value) {

        DB::table($table)->where($primaryKey, '=', $ID)->update(['used' => $value,'used_at'=>date('y-m-d')]); 
        return true;
    }
    
    public static function hasPermission($permission)
    {
        return in_array($permission, Session::get('permissions'));
    }
}
