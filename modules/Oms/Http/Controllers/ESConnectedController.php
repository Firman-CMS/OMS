<?php

namespace Modules\Oms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Oms\Models\Cms_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Crypt,
    Mail;
use Modules\Oms\Http\Controllers\Mataharimall as Mataharimall;

class ESConnectedController extends OmsController {

    private $session;

    public function __construct(Request $request) {
        $this->session = $request->session()->all();

        if (!session()->has('userID')) {
            $this->middleware('authOms', ['except' => 'getLogout']);
        }
    }

    /* List */
    public function listColorES($page = '') {
        $session = $this->session;
        $colorArray = '';
        $webPage = isset($page) ? $page : 0;

        $colorArray = $this->getESColor(20, $webPage);
        return view('oms::listcolorES', compact('session', 'colorArray'));
    }

    public function listColorESModals(Request $request) {
        $session = $this->session;
        $colorArray = '';
        $limit = isset($request->limit) ? $request->limit : 1000; 
        $webPage = isset($request->page) ? $request->page : 0;
        $colorArray = $this->getESColor($limit, $webPage);

        return $colorArray;
    }
    
    public function listCategoryES($page = '') {
        $session = $this->session;
        $categoryArray = '';
        $webPage = isset($page) ? $page : 0;
        $categoryArray = $this->getESCategory(20, $webPage);

        return view('oms::listcategory', compact('session', 'categoryArray'));
    }

    public function listBrandES($page = '') {
        $session = $this->session;
        $brandArray = '';
        $webPage = isset($page) ? $page : 0;
        $brandArray = $this->getESBrand(20, $webPage);

        return view('oms::listbrandES', compact('session', 'brandArray'));
    }
    
    public function listBrandESModals(Request $request) {
        $session = $this->session;
        $brandArray = '';
        $webPage = isset($page) ? $page : 0;
        $limit = isset($request->limit) ? $request->limit : 1000;
        $brandArray = $this->getESBrand($limit, $webPage);

        return $brandArray;
    }
    
    /* List */
    
    /* API */
    public function getESProduct($limit = '', $page = '', $sku = '', $productName = '', $productID = '') {
        if ($limit === "") {
            $limit = 10;
        }
        $param = 'limit=' . $limit;

        if ($page === "") {
            $page = 0;
        }
        $param .= '&page=' . $page;

        if ($sku !== "") {
            $param .= '&searching=' . $sku;
        }

        if ($productName !== "") {
            $param .= '&product_name=' . $productName;
        }

        if ($productID !== "") {
            $param .= '&product_id=' . $productID;
        }

        $defaultConfig = \Config::get('global');
        $apiConfig = $defaultConfig['service_url']['host'];

        $service_url = $apiConfig.'product?' . $param;
        // var_dump($service_url);die;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $service_url);
        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Accept: application/json'
        //   ));
        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        // curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // $curl_response = curl_exec($curl);
        // $response = json_decode($curl_response);
        // curl_close($curl);

        // return json_encode($response);
    }
    
    public function getESBrand($limit = '', $page = '', $brandName = '') {
        if ($limit === "") {
            $limit = 10;
        }
        
        $param = 'limit=' . $limit;

        if ($page === "") {
            $page = 0;
        }
        $param .= '&page=' . $page;

        if ($brandName !== "") {
            $param .= '&brand=' . $brandName;
        }

        $defaultConfig = \Config::get('global');
        $apiConfig = $defaultConfig['service_url']['host'];

        $service_url = $apiConfig.'product/brand?' . $param;
        
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);
    }
    
    public function getESCategory($limit = '', $page = '', $categoryName = '') {
        if ($limit === "") {
            $limit = 10;
        }
        $param = 'limit=' . $limit;

        if ($page === "") {
            $page = 0;
        }
        $param = 'page=' . $page;

        if ($categoryName !== "") {
            $param .= '&category=' . $categoryName;
        }


        $service_url = 'http://dem.es.id/apiv1/product/category?' . $param;

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);
    }
    
    public function getESColor($limit = '', $page = '', $colorName = '') {
        if ($limit === "") {
            $limit = 10;
        }
        $param = 'limit=' . $limit;

        if ($page === "") {
            $page = 0;
        }
        $param = 'page=' . $page;

        if ($colorName !== "") {
            $param .= '&color=' . $colorName;
        }


        $service_url = 'http://dem.es.id/apiv1/product/color?' . $param;

        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "es:escom"); //Your credentials goes here
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        curl_close($curl);

        return json_encode($response);
    }
    /* API */
    
    /* Product */
    
    /* Product */
    public function searchProductES(Request $request) {
        $session = $this->session;
        $search = $request->searchParam;

        $productArray = $this->getESProduct(10, 0, $search, '');
        return view('oms::productES', compact('session', 'productArray'));
    }

    public function productES($page = '') {
        $session = $this->session;
        $webPage = isset($page) ? $page : 0;
        $productArray = $this->getESProduct(20, $webPage);

        return view('oms::productES', compact('session', 'productArray'));
    }

    public function editProductES($productID = '') {
        $session = $this->session;
        $productArrays = $this->getESProduct(1, 0, '', '', $productID);

        $product = json_decode($productArrays);
        $productResults = $product->results;
        $productArray = $productResults[0];
        $productArray->category = '1';

        $marketPlaceArray = Cms_model::getAllMarketPlace();

        return view('oms::editproductES', compact('session', 'productArray', 'marketPlaceArray'));
    }
    /* product */
    
    /* brand ES */
    public function brandES($page = '') {
        $session = $this->session;
        $webPage = isset($page) ? $page : 0;
        $brandArray = $this->getESBrand(20, $webPage);

        return view('oms::brandES', compact('session', 'brandArray'));
    }

    public function editBrandES($brand = '') {
        $session = $this->session;
        $brandArray = $this->getESBrand(1, 0, $brand);
        $marketPlaceArray = Cms_model::getAllMarketPlace();
        $brands = json_decode($brandArray);
        $brandResults = $brands->results[0];
        $brandArray = Cms_model::getAllBrandMapping('', $brandResults);

        return view('oms::editbrandES', compact('session', 'brandArray', 'marketPlaceArray', 'brandResults'));
    }

    public function saveBrandES(Request $request) {
        $session = $request->session()->all();
        $brandMappingID = $request->brandMappingID;
        $brandES = $request->brand;
        $marketPlace = $request->marketPlace;
        $brandMarketplaceID = $request->brandMarketplaceID;
        $brandMarketplace = $request->brandMarketplace;

        $brandParam = [
            'brandMappingID' => $brandMappingID,
            'brandES' => $brandES,
            'brandMarketplaceID' => $brandMarketplaceID,
            'brandMarketplace' => $brandMarketplace,
            'marketPlace' => $marketPlace,
        ];

        $totalItemInDB = Cms_model::getAllBrandMapping('', $brandES, '', $marketPlace, true);

        if ($totalItemInDB > 0) {
            Cms_model::updatebrandMapping($brandParam);
        } else {
            Cms_model::insertbrandMapping($brandParam);
        }

        return \Redirect::to(route('oms.brandMP'));
    }
    
    public function searchBrandES(Request $request) {
        $session = $this->session;
        $search = $request->searchParam;

        $brandArray = $this->getESBrand(1, 0, $search);

        return view('oms::listbrandES', compact('session', 'brandArray'));
    }
    /* brand ES */
    
    /* color ES */
    public function colorES($page = '') {
        $session = $this->session;
        $webPage = isset($page) ? $page : 0;
        $colorArray = $this->getESColor(20, $webPage);

        return view('oms::colorES', compact('session', 'colorArray'));
    }

    public function editColorES($color = '') {
        $session = $this->session;
        $colorArrays = $this->getESColor(1, 0, $color);
        $marketPlaceArray = Cms_model::getAllMarketPlace();
        $colors = json_decode($colorArrays);
        $colorResults = $colors->results[0];
        $colorArray = Cms_model::getAllColorMapping('', $colorResults);

        return view('oms::editcolorES', compact('session', 'colorArray', 'marketPlaceArray', 'colorResults'));
    }

    public function saveColorES(Request $request) {
        $session = $request->session()->all();
        $colorMappingID = $request->colorMappingID;
        $colorES = $request->color;
        $marketPlace = $request->marketPlace;
        $colorMarketplaceID = $request->colorMarketplaceID;
        $colorMarketplace = $request->colorMarketplace;

        $colorParam = [
            'colorMappingID' => $colorMappingID,
            'colorES' => $colorES,
            'colorMarketplaceID' => $colorMarketplaceID,
            'colorMarketplace' => $colorMarketplace,
            'marketPlace' => $marketPlace,
        ];


        $totalItemInDB = Cms_model::getAllColorMapping('', $colorES, '', $marketPlace, true);

        if ($totalItemInDB > 0) {
            Cms_model::updateColorMapping($colorParam);
        } else {
            Cms_model::insertColorMapping($colorParam);
        }

        return \Redirect::to(route('oms.colorMP'));
    }

    public function searchColorES(Request $request) {
        $session = $this->session;
        $search = $request->searchParam;

        $colorArray = $this->getESColor(1, 0, $search);

        return view('oms::listcolorES', compact('session', 'colorArray'));
    }
    /* color ES */
    
    /* category ES */
    public function categoryES($page = ''){
        $session = $this->session;
        $webPage = isset($page) ? $page : 0;
        $categoryArray = $this->getESCategory(20, $webPage);

        dd($categoryArray);
        
        return view('oms::colorES', compact('session', 'colorArray'));
    }
    
    public function editCategoryES($category = '') {
        
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

        $totalItemInDB = Cms_model::getAllCategoryMapping('', $categoryES, '', $marketPlace, true);

        if ($totalItemInDB > 0) {
            Cms_model::updatecategoryMapping($categoryParam);
        } else {
            Cms_model::insertcategoryMapping($categoryParam);
        }


        return \Redirect::to(route('oms.categoryMP'));
    }
    
    public function searchCategoryES(Request $request) {
        
    }
    /* category ES */
     
}
