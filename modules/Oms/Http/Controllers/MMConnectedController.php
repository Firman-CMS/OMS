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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
        $parameter = [
            'sortby' => 'brand',
            'order' => 'asc',
            'limit' => '15000'
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
        $parameter = [
            "category_id" => $categoryID
        ];

        try {
            $MM->post('master/attributes', $parameter);
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
    
    public static function getMMColor($string='') {
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
        $parameter = [
            'sortby' => 'color',
            'order' => 'asc',
            'limit' => '100'
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
        $MM = new Mataharimall('430cbaad0c7c3653bd7a1da0c6258261', 'sandbox');
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
