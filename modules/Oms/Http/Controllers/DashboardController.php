<?php

namespace Modules\Oms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Oms\Models\Cms_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Crypt,Mail;
use Modules\Oms\Http\Controllers\Mataharimall as Mataharimall;
use Modules\Oms\Http\Controllers\MMConnectedController;
use Modules\Oms\Http\Controllers\ESConnectedController;
use Validator as Validate;

class DashboardController extends OmsController {

    private $session;

    public function __construct(Request $request) {
        $this->session = $request->session()->all();

        if (!session()->has('userID')) {
            $this->middleware('authOms', ['except' => 'getLogout']);
        }
    }

    public function dashboard() {
        $session = $this->session;

        $totalUser = Cms_model::getAllUserLogin('', 0, true);

        return view('oms::dashboard', compact('session', 'totalUser'));
    }

    public function userPage() {
        $session = $this->session;

        $allUser = Cms_model::getAllUserLogin('', 0, false);

        return view('oms::userpage', compact('session', 'allUser'));
    }
    
    public function changePassword($userID = '', $type = '') {
        $session = $this->session;
        return view('oms::changepassword', compact('session', 'userID', 'type'));
    }
    
    public function editUser($userID = '') {
        if (true === false) {
            return response('Unauthorized.', 401);
        }
        
        $session = $this->session;
        $loginArray = array();
        $userArray = array();
        $selected = [];
        $roles = Cms_model::getAllRole();

        if ($userID !== "") {
            $loginArray = Cms_model::getAllUserLogin($userID);
            $userArray = $loginArray[0];
            
            $selectedRole = Cms_model::getAllSelectedRole($userID);
            
            foreach($selectedRole as $k => $v) {
                $selected[] = $v->role_id;
            }
        }
   
        $allPrivilege = Cms_model::getAllPrivilege();
        
        return view('oms::edituser', compact('session', 'userArray','allPrivilege', 'roles', 'selected'));
    }
    
    public function savePrivilege(Request $request) {
        $session = $request->session()->all();
        $privilegeID = $request->privilegeID;
        $privilegeCode = $request->privilegeCode;
        $privilegeName = $request->privilegeName;
        if($privilegeID === ''){
            
            $allPrivilege = Cms_model::getAllPrivilege('', $privilegeCode);
        
            if(count($allPrivilege)>0){
                return \Redirect::to(\URL::previous())->with('message', 'Privilege Code Already in database');
            }
        
        $privilegeArray = [
            'privilegeCode' => $privilegeCode,
            'privilegeName' => $privilegeName,
        ];
        
            Cms_model::insertPrivilege($privilegeArray);
            return \Redirect::to(route('oms.privilege'));
        }else{
            $privilegeArray = [
                'privilegeID' => $privilegeID,
                'privilegeName' => $privilegeName,
            ];
            
            Cms_model::updatePrivilege($privilegeArray);
            return \Redirect::to(route('oms.privilege'));
        }
    }
    
    public function privilege() {
        $session = $this->session;

        $allPrivilege = Cms_model::getAllPrivilege();

        return view('oms::privilege', compact('session', 'allPrivilege'));
    }
    
    public function editPrivilege($privilegeID = '') {
        $session = $this->session;
        $privilegeArray = array();
        $privilege = array();

        if ($privilegeID !== "") {
            $privilegeArray = Cms_model::getAllPrivilege($privilegeID);
            $privilege = $privilegeArray[0];
        }
   
        return view('oms::editprivilege', compact('session', 'privilege'));
    }
    
    public function saveRole(Request $request) {
        $validator = Validate::make($request->all(), [
            'name' => 'required',
            'permissions' => 'required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        if($request->id === ''){
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            
            $insertId = Cms_model::insertRole($data);
            Cms_model::updatePermissions($insertId, explode(',', $request->permissions));
        }else{
            $data = [
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
            ];
            
            Cms_model::updateRole($data);
            Cms_model::updatePermissions($request->id, explode(',', $request->permissions));
        }
        
        return \Redirect::to(route('oms.role'));
    }
    
    public function role() {
        $session = $this->session;

        $allRole = Cms_model::getAllRole();
        
        
        return view('oms::role', compact('session', 'allRole'));
    }
    
    public function editRole($id = '') {
        $session = $this->session;
        $data = [];
        $selected = [];
        $permissions = Cms_model::getAllPermission();
        
        if ($id !== "") {
            $data = Cms_model::getAllRole($id);
            $selectedPermission = Cms_model::getAllSelectedPermission($id);
            
            foreach($selectedPermission as $k => $v) {
                $selected[] = $v->permission;
            }
        }
        
        return view('oms::editrole', compact('session', 'data', 'permissions', 'selected'));
    }
    
    public function deleteRole($id) {
        Cms_model::deleteRole($id);
   
        return \Redirect::to(route('oms.role'));
    }
    
    public function saveUser(Request $request) {
        $session = $request->session()->all();
        $email = $request->email;
        $password = $request->password;
        $confirmPassword = $request->confirmPassword;
        $userID = $request->userID;
        $privilege = $request->privilege;
        $newPrivilege = $request->newPrivilege;
        $name = $request->name;
        $phone = $request->phone;
        $hp = $request->hp;
        $address = $request->address;
        $birthdate = $request->birthdate;
        $note = $request->note;
        $roles = $request->roles;
        
        if($newPrivilege !== ""){
            $privilege = $newPrivilege;
        }
        
        if($userID === ''){
        if ($password !== $confirmPassword) {
            return \Redirect::to(\URL::previous())->with('message', 'Password is not same');
        } elseif (strlen($password) < 5) {
            return \Redirect::to(\URL::previous())->with('message', 'minimal 5 character for Password');
        }

        $webConfig = \Config::get('global');
        $pengacak = $webConfig['hashLogin'];

        $enkrip_pass = md5($pengacak . md5($password) . $pengacak);

        $userArray = [
            'email' => $email,
            'password' => $enkrip_pass,
            'userID' => $userID,
            'privilege' => $privilege,
            'name' => $name,
            'phone' => $phone,
            'hp' => $hp,
            'address' => $address,
            'birthdate' => substr($birthdate,6,4).'-'.substr($birthdate,3,2).'-'.substr($birthdate,0,2),
            'note' => $note
        ];

            $insertId = Cms_model::insertUser($userArray);
            Cms_model::updateUserRole($insertId, $roles);
            
            return \Redirect::to(route('oms.userOMS'));
        }else{
            $userArray = [
                'userID' => $userID,
                'privilege' => $privilege,
                'name' => $name,
                'phone' => $phone,
                'hp' => $hp,
                'address' => $address,
                'birthdate' => substr($birthdate,6,4).'-'.substr($birthdate,3,2).'-'.substr($birthdate,0,2),
                'note' => $note
            ];
            Cms_model::updateUser($userArray);
            Cms_model::updateUserRole($userID, $roles);
            
            return \Redirect::to(route('oms.userOMS'));
        }
    }
    
    public function savePassword(Request $request) {
        $session = $request->session()->all();
        $password = $request->password;
        $confirmPassword = $request->confirmPassword;
        $userID = $request->userID;

        if ($password !== $confirmPassword) {
            return \Redirect::to(\URL::previous())->with('message', 'Password tidak sama');
        } elseif (strlen($password) < 6) {
            return \Redirect::to(\URL::previous())->with('message', 'Password minimal 6 karakter');
        }

        $webConfig = \Config::get('global');
        $pengacak = $webConfig['hashLogin'];

        $enkrip_pass = md5($pengacak . md5($password) . $pengacak);

        $passwordArray = [
            'userID' => $userID,
            'password' => $enkrip_pass,
        ];

        Cms_model::updatePassword($passwordArray);

        return \Redirect::to(\URL::previous())->with('message', 'Success Mengubah password');
    }
    
    public function product() {
        $session = $this->session;
        $memberMerchant = array();
        $productType = array();
        $productArray = Cms_model::getAllProduct();
        
        return view('oms::product', compact('session','productArray'));
    }
    
    public function editProductMP($productID = '') {
        $session = $this->session;
        $productArray =[];
        $productArrays = Cms_model::getAllProduct($productID);
        $marketPlaceArray = Cms_model::getAllMarketPlace();
        if(count($productArrays)>0){
            $productArray = $productArrays[0];
        }
         
        return view('oms::editproductMP', compact('session', 'productArray','marketPlaceArray'));
    }
    
    public function saveCategoryES(Request $request) {
        $session = $request->session()->all();
        $categoryMappingID = $request->categoryMappingID;
        $categoryES = $request->category;
        $marketPlace = $request->marketPlace;
        $categoryMarketplaceID = $request->categoryMarketplaceID;
        $categoryMarketplace = $request->categoryMarketplace;

        $categoryParam = [
            'categoryMappingID' => $categoryMappingID,
            'categoryES' => $categoryES,
            'categoryMarketplaceID' => $categoryMarketplaceID,
            'categoryMarketplace' => $categoryMarketplace,
            'marketPlace' => $marketPlace,
        ];
        
        $totalItemInDB = Cms_model::getAllCategoryMapping('',$categoryES,'',$marketPlace,true);

        if($totalItemInDB > 0){
            Cms_model::updatecategoryMapping($categoryParam);
        }else{
            Cms_model::insertcategoryMapping($categoryParam);
        }
        

        return \Redirect::to(route('oms.categoryMP'));
    }
    
    public function getESBrand($limit ='',$page ='',$brandName = '') {
        if($limit === ""){
            $limit = 10;            
        }
        $param = 'limit='.$limit;
        
        if($page === ""){
            $page = 0;            
        }
        $param = 'page='.$page;
        
        if($brandName !== ""){
            $param .= '&brand='.$brandName;
        }
        
        
        $service_url = 'http://dem.es.id/apiv1/product/brand?'.$param;

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,'');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);
    }
    
    public function getESColor($limit ='',$page ='',$colorName = '') {
        if($limit === ""){
            $limit = 10;            
        }
        $param = 'limit='.$limit;
        
        if($page === ""){
            $page = 0;            
        }
        $param = 'page='.$page;
        
        if($colorName !== ""){
            $param .= '&color='.$colorName;
        }
        
        
        $service_url = 'http://dem.es.id/apiv1/product/color?'.$param;

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS,'');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);
    }
    
    public function brandMP($page = '') {
        $session = $this->session;
        $brandArray = [];
        $brandArray = Cms_model::getAllBrandMapping();        
                
        return view('oms::brandMP', compact('session','brandArray'));
    }
    
    public function colorMP($page = '') {
        $session = $this->session;
        $colorArray = [];
        $colorArray = Cms_model::getAllColorMapping();        
        return view('oms::colorMP', compact('session','colorArray'));
    }
    
    public function categoryMP($page = '') {
        $session = $this->session;
        $categoryArray = [];
        $categoryArray = Cms_model::getAllCategoryMapping();        
                
        return view('oms::categoryMP', compact('session','categoryArray'));
    }

    public function storeMP($page = '') {
        $session = $this->session;
        $storeArray = [];
        $storeArray = Cms_model::getAllStoreMapping();        
        
        // print_r($storeArray); die;        
        return view('oms::storeMP', compact('session','storeArray'));
    }
    
    public function editBrandMP($brand = '') {
        $session = $this->session;
        $brandResults = '';
        $brandArray = [];
        if($brand !==""){
            $brandArray = Cms_model::getAllBrandMapping($brand);
        }
        
        $marketPlaceArray = Cms_model::getAllMarketPlace();

        return view('oms::editbrandES', compact('session','brandArray','marketPlaceArray'));
    }
    
    public function editColorMP($color = '') {
        $session = $this->session;
        $colorResults = '';
        $colorArray = [];
        $marketPlaceArray = [];
        
        if($color !== ""){
            $colorArray = Cms_model::getAllColorMapping($color);
        }
        $marketPlaceArray = Cms_model::getAllMarketPlace();
        return view('oms::editcolorES', compact('session','colorArray','marketPlaceArray'));
    }
    
    public function editCategoryMP($category = '') {
        $session = $this->session;
        $categoryResults = '';
        $categoryArray = [];
        if($category !== ""){
            $categoryArray = Cms_model::getAllCategoryMapping($category);
        }        
        $marketPlaceArray = Cms_model::getAllMarketPlace();

        return view('oms::editcategoryES', compact('session','categoryArray','marketPlaceArray'));
    }
    
    public function listColor($marketPlace = ''){
        $session = $this->session;
        $colorArray = '';
        
        if($marketPlace == 1 || $marketPlace == ''){
            $colorArray = MMConnectedController::getMMColor();
        }
        
        return view('oms::listcolor', compact('session','colorArray'));
    }
    
    public function listColorMPModals(Request $request){
        $session = $this->session;
        $colorArray = '';
        $marketPlace = $request->marketPlace;
        
        if($marketPlace == 1 || $marketPlace == ''){
            $colorArray = MMConnectedController::getMMColor();
        }
        
        return $colorArray;
    }
    
    public function listCategory($marketPlace = ''){
        $session = $this->session;
        $categoryArray = [];
        
        if($marketPlace == 1 || $marketPlace == ''){
            $categoryArray = MMConnectedController::getMMCategory();
        }
        return view('oms::listcategory', compact('session','categoryArray'));
    }
    
    public function listCategoryMPModals(Request $request){
        $session = $this->session;
        $categoryArray = [];
        $marketPlace = $request->marketPlace;
        if($marketPlace == 1 || $marketPlace == ''){
            $categoryArray = MMConnectedController::getMMCategory();
        }
        return $categoryArray;
    }
    
    public function listAttributes($categoryID = '', $marketPlace = '', $attributesValue = ''){
        $session = $this->session;
        $attributes = '';
        
        if($marketPlace == 1 || $marketPlace == ''){
            $attributes = MMConnectedController::getMMAttributes($categoryID);
        }
        
        if(count($attributes!=="")){
            $attributesDecode = json_decode($attributes);
            $attributesArray = $attributesDecode->results;
        }
        
        
        return view('oms::listattributes', compact('session','attributesArray', 'attributesValue'));
    }
    
    public function listBrand($marketPlace = ''){
        $session = $this->session;
        $brandArray = '';
        
        if($marketPlace == 1 || $marketPlace == ''){
            $brandArray = MMConnectedController::getMMBrand();
        }
        return view('oms::listbrand', compact('session','brandArray'));
    }
    
    
    public function listBrandMPModals(Request $request){
        $session = $this->session;
        $brandArray = '';
        
        $marketPlace = $request->brandMarketplace;
        
        $param = [
            'limit' => isset($request->limit)?$request->limit:'',
            'q' => isset($request->q)?$request->q:'',
            'page' => isset($request->page)?$request->page:'',
        ];
        
        if($marketPlace == 1 || $marketPlace == ''){
            $brandArray = MMConnectedController::getMMBrand($param);
        }
        return $brandArray;
    }
    
    
    public function getMapping(Request $request){
        $marketplaceID = $request->marketplaceID;
        $categoryID = $request->categoryID;
        $brandID = $request->brandID;
        $colorID = $request->colorID;
        
        $colorResult = Cms_model::getAllColorMapping('',$colorID,'',$marketplaceID,false);
        $brandResult = Cms_model::getAllBrandMapping('',$brandID,'',$marketplaceID,false);
        $categoryResult = Cms_model::getAllCategoryMapping('',$categoryID,'',$marketplaceID,false);
     
        $result = [
            'colorResult' => $colorResult,
            'brandResult' => $brandResult,
            'categoryResult' => $categoryResult,
        ];
        return $result;
    }
    
    public function saveProduct(Request $request) {
        print_r($request);die;
        $session = $this->session;
        
        $productID = $request->productID;
        $productESID = $request->productESID;
        $sku = trim($request->sku);
        $productName = $request->productName;        
        $brandID = $request->brandID;
        $categoryID = $request->categoryID;
        $colorID = $request->colorID;
        $colorMappingID = $request->colorMappingID;
        $brandMappingID = $request->brandMappingID;
        $categoryMappingID = $request->categoryMappingID;
        $price = $request->price;
        $weightPackage = $request->weightPackage;
        $weightProductIndoor = (int) trim(str_replace('kg','',$request->weightProductIndoor));
        $weightProductOutdoor = (int) trim(str_replace('kg','',$request->weightProductOutdoor));
        $marketPlace = $request->marketPlace;
        $hightlight1 = $request->hightlight1;
        $hightlight2 = $request->hightlight2;
        $hightlight3 = $request->hightlight3;
        $hightlight4 = $request->hightlight4;
        
        $hightlights = [
            [
                "sequence" => "1",
                "description" => $hightlight1
            ],
            [
                "sequence" => "2",
                "description" => $hightlight2
            ],
            [
                "sequence" => "3",
                "description" => $hightlight3
            ],
            [
                "sequence" => "4",
                "description" => $hightlight4
            ],
        ];
        
        
        $productFullDescription = $request->productFullDescription;
        $images = $request->imagesUrl;
        $attributes = $request->attributesValue;
        $dimension = $request->dimension;
        $dimensionProductIndoor = str_replace('.00','',$request->dimensionProductIndoor);
        $dimensionProductOutdoor = str_replace('.00','',$request->dimensionProductOutdoor);
        $youtubeUrl = $request->youtubeUrl;
        $handlingFee = $request->handlingFee;
        $insurance = $request->insurance;
        $jabodetabekOnly = $request->jabodetabekOnly;
        $limit = (int) $request->limit;
        $promoPrice = isset($request->promoPrice) ? $request->promoPrice : '';
        $startDate = isset($request->startDate) ? $request->startDate : '';
        $endDate = isset($request->endDate) ? $request->endDate : '';
        $stockMinimum = isset($request->stockMinimum) ? $request->stockMinimum : '';
        $stockAvailable = isset($request->stockAvailable) ? $request->stockAvailable : '';
        $skuMP = isset($request->skuMP) ? $request->skuMP : '';
        $skuVariantMP = isset($request->skuVariantMP) ? $request->skuVariantMP : '';
        
        $productArray = [
            'productID' => (string)$productID,
            'productESID' => (string)$productESID,
            'sku' => (string)$sku,
            'productName' => (string)$productName,        
            'brandID' => (string)$brandID,
            'categoryID' => (string)$categoryID,
            'colorID' => (string)$colorID,
            'colorMappingID' => (string)$colorMappingID,
            'brandMappingID' => (string)$brandMappingID,
            'categoryMappingID' => (string)$categoryMappingID,
            'price' => (string)$price,
            'weightPackage' => (string)$weightPackage,
            'weightProductIndoor' => (string)$weightProductIndoor,
            'weightProductOutdoor' => (string)$weightProductOutdoor,
            'marketPlace' => (string)$marketPlace,
            'hightlights' => json_encode($hightlights),       
            'productFullDescription' => (string)$productFullDescription,
            'images' => $images,
            'attributes' => $attributes,
            'dimension' => (string) trim($dimension),
            'dimensionProductIndoor' => (string)$dimensionProductIndoor,
            'dimensionProductOutdoor' => (string)$dimensionProductOutdoor,
            'youtubeUrl' => (string)$youtubeUrl,
            'handlingFee' => (string)$handlingFee,
            'insurance' => (string)$insurance,
            'jabodetabekOnly' => (string)$jabodetabekOnly,
            'limitQty' => (string) $limit,
            'promoPrice' => (string) $promoPrice,
            'startDate' => (string) $startDate,
            'endDate' => (string) $endDate,
            'stockAvailable' => (string) $stockAvailable,
            'stockMinimum' => (string) $stockMinimum,
            'createdby' => (string) $session['userID'],
            'product_sku' => $skuMP,
            'variant_sku' => $skuVariantMP,
            
        ];

        $getProduct = Cms_model::getAllProduct('',$productArray['productESID'],$productArray['marketPlace'],true);

        if ($getProduct > 0) {
            if($marketPlace == '1'){
                $pushMM = MMConnectedController::updateProductMM($productArray);
                // $pushMM = new MMConnectedController;
                // $pushMM->updateProductMM($productArray);

                $pushStatus = json_decode($pushMM);

                if(isset($pushStatus->errorMessage) && $pushStatus->errorMessage !== ''){
                    return \Redirect::to(\URL::previous())->with('message', $pushStatus->errorMessage);
                }else{
                    $productMarketPlaceID = $pushStatus->results->product_sku;
                    $productMarketPlaceVariantID = $pushStatus->results->product_variants[0]->variant_sku;
                    $productArray['productMarketPlaceID'] = $productMarketPlaceID;
                    $productArray['productMarketPlaceVariantID'] = $productMarketPlaceVariantID;
                }
            }
            
            $productID = Cms_model::updateProduct($productArray);  
            $message = "Product ". $productArray['productName'] . " have been updated";
        } else {
            if($marketPlace == '1'){
                // $pushMM = MMConnectedController::createProductMM($productArray);
                $pushMM = new MMConnectedController;
                $pushMM = $pushMM->createProductMM($productArray);
                $pushStatus = json_decode($pushMM);

                if(isset($pushStatus->errorMessage) && $pushStatus->errorMessage !== ''){
                    return \Redirect::to(\URL::previous())->with('message', $pushStatus->errorMessage);
                }else{
                    $productMarketPlaceID = $pushStatus->results->product_sku;
                    $productMarketPlaceVariantID = $pushStatus->results->product_variants[0]->variant_sku;
                    $productArray['productMarketPlaceID'] = $productMarketPlaceID;
                    $productArray['productMarketPlaceVariantID'] = $productMarketPlaceVariantID;
                }
            }
            $productID = Cms_model::insertProduct($productArray);
            $message = "Product ". $productArray['productName'] . " have been added";
        }
        
        return \Redirect::to(route('oms.product'))->with('message', $message);
    }
    
    public function deleteproduct(Request $request){
        $session = $this->session;
        $productParam = json_decode($request->productParam);
        $action = $request->action;

        $productMappingID = $productParam->productMappingID;
        $productMappingVariantID = $productParam->productMappingVariantID;
        $marketplaceID = $productParam->marketplaceID;
        $productID = $productParam->productID;
        
        if($action == "delete" ){
        
            if($productParam->productID == "1"){
                $param = [
                    [
                        "product_sku" =>  $productMappingID,
                        "variant_sku" => [$productMappingVariantID]
                    ]
                ];
                
                MMConnectedController::deleteMMProduct($param);
            }
            
            Cms_model::deleteProduct($productID);
            
            return "success";
        }
        
        return "error";
    }
    
    public function orderList(){
        $session = $this->session; 
        $marketPlaceArray = Cms_model::getAllMarketPlace();
        
        return view('oms::orderList', compact('session','marketPlaceArray'));
    }
    
    public function getOrderList(Request $request){
        $session = $this->session;

        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $marketPlace = $request->marketPlace;

        $orderArray = [];
        
        if($marketPlace == '1'){
            $parameter = [
                "start_date" => $startDate,
                "end_date" => $endDate,
                "page" => "1",
                "limit" => "1000",
                "sortby" => "id",
                "order" => "desc",
                "status" => "all",
                "deliveryslipstatus" => "all",
                "q" => ""
            ];
            // print_r($parameter);die;
            $orderArray = MMCgetOrderListMM($parameter);
        }
        return $orderArray;
    }
    
    public function editOrderList($marketPlace, $SODetail){
        $session = $this->session;

        return view('oms::listorder', compact('session','SODetail','marketPlace'));
    }
    
    public function updateStatus(Request $request){
            $soStoreNumber = $request->soStoreNumber;
            $status = $request->updateStatus;
            $cancelReason = $request->cancelReason;
            $deliveryProvider = $request->deliveryProvider;
            $trackingNumber = $request->trackingNumber;
            $marketPlace = $request->marketPlace;
            $otherReason = $request->otherReason;
            
            
            $total = Cms_model::getAllInvoiceStatus('',$soStoreNumber,$marketPlace,true);
            
            $invoiceParam = [
                'soStoreNumber' => $soStoreNumber,
                'status' => $status,
                'cancelReason' => $cancelReason,
                'deliveryProvider' => $deliveryProvider,
                'trackingNumber' => $trackingNumber,
                'marketPlaceID' => $marketPlace,
                'otherReason' => $otherReason,
            ];
            
            if($marketPlace == '1'){
                $resultUpdateMP = MMConnectedController::updateMMInvoiceStatus($invoiceParam);
            }
            
            $statusUpdateMP = json_decode($resultUpdateMP);

            if(count($statusUpdateMP->results)>0 && $statusUpdateMP->results[0]->status === "NOK"){
                return json_encode($statusUpdateMP->results[0]);
            }

            if($total>0){
                $result = Cms_model::updateInvoiceStatus($invoiceParam);                
            }else{
                $result = Cms_model::insertInvoiceStatus($invoiceParam);
            }
           
            return 'success';
    }
    
}
