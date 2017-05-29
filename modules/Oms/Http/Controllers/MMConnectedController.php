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

class MMConnectedController extends OmsController {

    private $session;

    public function __construct(Request $request) {
        $this->session = $request->session()->all();
        if (!session()->has('userID')) {
            $this->middleware('authOms', ['except' => 'getLogout']);
        }
    }
    
    public static function getMMBrand($string='') {
        $defaultConfig = \Config::get('global');
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = [
            "sortby" => "brand",
            "order" => "asc",
            "limit" => $string['limit'],
            "q" => $string['q'],
            "page" => $string['page'],
        ];

        try {
            $MM->post('master/brands', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }

    
    public static function getMMCategory($string='') {
        $defaultConfig = \Config::get('global');
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = [
            "sortby" => "category",
            "order" => "asc",
            "limit" => "2000",
        ];

        try {
            $MM->post('master/categories', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();
        
        
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);

        } else {
            return json_encode($response);
        }
    }

    public static function getMMAttributes($categoryID='') {
        $defaultConfig = \Config::get('global');
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = [
            "category_id" => $categoryID
        ];

        try {
            $MM->post('master/attributes', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();
        dd($response);
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);

        } else {
            return json_encode($response);
        }
    }
    
    public static function getMMColor($string='') {
        $defaultConfig = \Config::get('global');        
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = [
            "sortby" => "color",
            "order" => "asc",
            "limit" => "100",
            "page" => "1",
        ];

        try {
            $MM->post('master/colors', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);

        } else {
            return json_encode([]);
        }
    }
    
    
    public function deleteMMProduct($param = '') {
        $defaultConfig = \Config::get('global');        
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = $param;

        try {
            $MM->post('product/delete', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);

        } else {
            return json_encode($response);
        }
    }
    
    public function createProductMM($productArray) {
        $productParam = [
            "category_id" => $productArray['categoryMappingID'],
            "product_name" => $productArray['productName'],
            "brand_id" => $productArray['brandMappingID'],
            "color_id" => $productArray['colorMappingID'],
            "description" => $productArray['productFullDescription'],
            "highlights" => json_decode($productArray['hightlights']),
            "youtube_url" => $productArray['youtubeUrl'],
            "handling_fee" => $productArray['handlingFee'],
            "insurance_option" => $productArray['insurance'],
            "jabodetabek_only" => $productArray['jabodetabekOnly'],
            "weight" => $productArray['weightProductOutdoor'],
            "dimension" => $productArray['dimensionProductOutdoor'],
            "package_weight" => $productArray['weightPackage'],
            "package_dimension" => $productArray['dimension'],
            "limit_qty_on_cart" => $productArray['limitQty'],
            "attributes" => json_decode($productArray['attributes']),
            "images" => json_decode($productArray['images']),
            "variants" => [
                [
                    "seller_sku" => $productArray['sku'],
                    "upc" => "",
                    "normal_price" => $productArray['price'],
                    "selling_price" => $productArray['price'],
                    "promo_price" => $productArray['promoPrice'],
                    "promo_start" => $productArray['startDate'],
                    "promo_end" => $productArray['endDate'],
                    "stock_available" => $productArray['stockAvailable'],
                    "stock_minimum" => $productArray['stockMinimum'],
                    "options" => [],
                ]
            ],
        ];

        $result = $this->insertMMProduct($productParam);
        
        return $result;
    }
    
    public function updateProductMM($productArray) {
        $productParam = [
            "product_sku" => $productArray['product_sku'],
            "product_name" => $productArray['productName'],
            "brand_id" => $productArray['brandMappingID'],
            "color_id" => $productArray['colorMappingID'],
            "description" => $productArray['productFullDescription'],
            "highlights" => json_decode($productArray['hightlights']),
            "youtube_url" => $productArray['youtubeUrl'],
            "handling_fee" => $productArray['handlingFee'],
            "insurance_option" => $productArray['insurance'],
            "jabodetabek_only" => $productArray['jabodetabekOnly'],
            "weight" => $productArray['weightProductOutdoor'],
            "dimension" => $productArray['dimensionProductOutdoor'],
            "package_weight" => $productArray['weightPackage'],
            "package_dimension" => $productArray['dimension'],
            "limit_qty_on_cart" => $productArray['limitQty'],
            "attributes" => json_decode($productArray['attributes']),
            "images" => json_decode($productArray['images']),
            "variants" => [
                [
                    "variant_sku" => $productArray['variant_sku'],
                    "upc" => "",
                    "normal_price" => $productArray['price'],
                    "selling_price" => $productArray['price'],
                    "promo_price" => $productArray['promoPrice'],
                    "promo_start" => $productArray['startDate'],
                    "promo_end" => $productArray['endDate'],
                    "stock_available" => $productArray['stockAvailable'],
                    "stock_minimum" => $productArray['stockMinimum'],
                    "options" => [],
                ]
            ],
        ];

        $result = $this->updateMMProduct($productParam);
        
        return $result;
    }
    
    public function insertMMProduct($productParam=[]) {
        $defaultConfig = \Config::get('global');        
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = $productParam;

        try {
            $MM->post('product/create', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();        
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }
    
    public function updateMMProduct($productParam=[]) {
        $defaultConfig = \Config::get('global');        
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = $productParam;

        try {
            $MM->post('product/update', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();        
 
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }
    
  
    public function getOrderListMM($orderParameter) {
        $defaultConfig = \Config::get('global');
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = $orderParameter;

        try {
            $MM->post('order/list', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();        

        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }
    
    public function updateMMInvoiceStatus($statusParam=[]) {
        $defaultConfig = \Config::get('global');
        $MM = new Mataharimall($defaultConfig['mataharimall_key'], 'sandbox');
        $parameter = [
            [
                "so_store_number" => $statusParam['soStoreNumber'],
                "status" => $statusParam['status'],
                "reason" => $statusParam['cancelReason'],
                "shipping_provider" => $statusParam['deliveryProvider'],
                "tracking_number" => $statusParam['trackingNumber'],
                "otherreason" => $statusParam['otherReason'],
            ]
        ];

        try {
            $MM->post('order/update', $parameter);
        } catch (Mataharimall\MMException $e) {
            echo 'ERROR :' . $e->getMessage();
        }

        $response = $MM->getResponseBody();        
 
        if ($MM->getResponseCode() == 200 && !empty($response)) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }
    
}
