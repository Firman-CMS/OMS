<?php

//Public Routes
Route::group(['middleware' => ['web'], 'prefix' => 'oms', 'namespace' => 'Modules\Oms\Http\Controllers'], function() {
    Route::get('/', ['as' => 'login.oms.form', 'uses' => 'OmsController@index']);
    Route::post('/loginsubmit', ['as' => 'login.oms.submit', 'uses' => 'OmsController@loginsubmit']);
    Route::get('/signout', ['as' => 'login.oms.signout', 'uses' => 'OmsController@signout']);            
    Route::get('/refresh/captcha', ['as' => 'login.oms.refreshCaptcha', 'uses' => 'OmsController@refreshCaptcha']);
});

//Admin Routes
Route::group(['middleware' => ['web','authOms'], 'prefix' => 'oms', 'namespace' => 'Modules\Oms\Http\Controllers'], function()
{
    
    /* dashboard*/
    Route::get('/dashboard', ['as' => 'oms.dashboard', 'uses' => 'DashboardController@dashboard']);
    Route::get('/userpage', ['as' => 'oms.userOMS', 'uses' => 'DashboardController@userPage']);
    
    
    /* product */
    Route::get('/product', ['as' => 'oms.product', 'uses' => 'DashboardController@product']);
    Route::get('/editproductMP/{ID?}', ['as' => 'oms.editProductMP', 'uses' => 'DashboardController@editproductMP']);
    Route::post('/saveproduct', ['as' => 'oms.saveproduct', 'uses' => 'DashboardController@saveProduct']);
    Route::post('/deleteproduct', ['as' => 'oms.deleteProduct', 'uses' => 'DashboardController@deleteProduct']);
            
    /* product ES */
    Route::get('/productES/{page?}', ['as' => 'oms.productES', 'uses' => 'ESConnectedController@productES']);
    Route::post('/searchProductES', ['as' => 'oms.searchProductES', 'uses' => 'ESConnectedController@searchProductES']);
    Route::get('/editproductES/{ID?}', ['as' => 'oms.editProductES', 'uses' => 'ESConnectedController@editProductES']);
    
    /* brand ES */
    Route::get('/brandES/{page?}', ['as' => 'oms.brandES', 'uses' => 'ESConnectedController@brandES']);
    Route::post('/searchbrandES', ['as' => 'oms.searchBrandES', 'uses' => 'ESConnectedController@searchBrandES']);
    Route::get('/editbrandES/{ID?}', ['as' => 'oms.editBrandES', 'uses' => 'ESConnectedController@editBrandES']);
    Route::post('/savebrandES/{ID?}', ['as' => 'oms.saveBrand', 'uses' => 'ESConnectedController@saveBrandES']);
    
    /* color ES */
    Route::get('/colorES/{page?}', ['as' => 'oms.colorES', 'uses' => 'ESConnectedController@colorES']);
    Route::post('/searchcolorES', ['as' => 'oms.searchColorES', 'uses' => 'ESConnectedController@searchColorES']);
    Route::get('/editcolorES/{ID?}', ['as' => 'oms.editColorES', 'uses' => 'ESConnectedController@editColorES']);
    Route::post('/savecolorES/{ID?}', ['as' => 'oms.saveColor', 'uses' => 'ESConnectedController@saveColorES']);
    
    /* category ES */
    Route::get('/categoryES/{page?}', ['as' => 'oms.categoryES', 'uses' => 'ESConnectedController@categoryES']);
    Route::post('/searchcategoryES', ['as' => 'oms.searchCategoryES', 'uses' => 'ESConnectedController@searchCategoryES']);
    Route::get('/editcategoryES/{ID?}', ['as' => 'oms.editCategoryES', 'uses' => 'ESConnectedController@editCategoryES']);
    Route::post('/savecategoryES/{ID?}', ['as' => 'oms.saveCategory', 'uses' => 'ESConnectedController@saveCategoryES']);
    
    /* brand MP */
    Route::get('/brandMP/{page?}', ['as' => 'oms.brandMP', 'uses' => 'DashboardController@brandMP']);
    Route::get('/colorMP/{page?}', ['as' => 'oms.colorMP', 'uses' => 'DashboardController@colorMP']);
    Route::get('/categoryMP/{page?}', ['as' => 'oms.categoryMP', 'uses' => 'DashboardController@categoryMP']);
    Route::post('/searchbrandMP', ['as' => 'oms.searchBrandMP', 'uses' => 'DashboardController@searchBrandMP']);
    Route::get('/editbrandMP/{ID?}', ['as' => 'oms.editBrandMP', 'uses' => 'DashboardController@editBrandMP']);
    Route::get('/editcolorMP/{ID?}', ['as' => 'oms.editColorMP', 'uses' => 'DashboardController@editColorMP']);
    Route::get('/editcategoryMP/{ID?}', ['as' => 'oms.editCategoryMP', 'uses' => 'DashboardController@editCategoryMP']);
    
    /* Config */
    Route::get('/configuration', ['as' => 'oms.configuration', 'uses' => 'DashboardController@configuration']);
    Route::get('/changepassword', ['as' => 'oms.changepassword', 'uses' => 'DashboardController@changePassword']);
    Route::post('/saveomspassword', ['as' => 'oms.savepassword', 'uses' => 'DashboardController@savePassword']);
    Route::get('/category', ['as' => 'oms.category', 'uses' => 'DashboardController@category']);
    
    /* user */
    Route::get('/edituser/{ID?}', ['as' => 'oms.editUser', 'uses' => 'DashboardController@editUser']);
    Route::post('/saveuser', ['as' => 'oms.saveUser', 'uses' => 'DashboardController@saveUser']);
            
    Route::post('/deleteitem', ['as' => 'oms.deleteitem', 'uses' => 'DashboardController@deleteItem']);
    Route::post('/deactiveitem', ['as' => 'oms.deactiveitem', 'uses' => 'DashboardController@deactiveItem']);
    Route::post('/deletesoftitem', ['as' => 'oms.deletesoftitem', 'uses' => 'DashboardController@deleteSoftItem']);
    
    /* privilege */
    Route::get('/privilege', ['as' => 'oms.privilege', 'uses' => 'DashboardController@privilege']);
    Route::get('/editprivilege/{ID?}', ['as' => 'oms.editprivilege', 'uses' => 'DashboardController@editprivilege']);
    Route::post('/saveprivilege', ['as' => 'oms.savePrivilege', 'uses' => 'DashboardController@savePrivilege']);
    
    /* role */
    Route::get('/role', ['as' => 'oms.role', 'uses' => 'DashboardController@role']);
    Route::get('/editrole/{ID?}', ['as' => 'oms.editrole', 'uses' => 'DashboardController@editRole']);
    Route::post('/saverole', ['as' => 'oms.saveRole', 'uses' => 'DashboardController@saveRole']);
    Route::get('/deleterole/{id}', ['as' => 'oms.deleterole', 'uses' => 'DashboardController@deleteRole']);
    
    /* API MM */
    Route::get('/getMMBrand/{string?}', ['as' => 'oms.getMMBrand', 'uses' => 'MMConnectedController@getMMBrand']);
    Route::get('/getMMCategory/{string?}', ['as' => 'oms.getMMCategory', 'uses' => 'MMConnectedController@getMMCategory']);
    Route::get('/getMMColor/{string?}', ['as' => 'oms.getMMColor', 'uses' => 'MMConnectedController@getMMColor']);
    Route::get('/getMMAttributes/{categoryID?}', ['as' => 'oms.getMMAttributes', 'uses' => 'MMConnectedController@getMMAttributes']);
    Route::get('/getMMOrder/{orderID?}', ['as' => 'oms.getMMOrder', 'uses' => 'MMConnectedController@getMMOrder']);
    
    /* API ES */    
    Route::get('/getESProduct/{limit?}/{page?}/{sku?}/{productName?}', ['as' => 'oms.getESProduct', 'uses' => 'ESConnectedController@getEsProduct']);
    Route::get('/getESBrand/{limit?}/{page?}/{brandName?}', ['as' => 'oms.getESBrand', 'uses' => 'ESConnectedController@getEsBrand']);
    Route::get('/getESColor/{limit?}/{page?}/{colorName?}', ['as' => 'oms.getESColor', 'uses' => 'ESConnectedController@getEsColor']);
    
    /* List ES */
    Route::get('/listColorES/{page?}', ['as' => 'oms.listcolorES', 'uses' => 'ESConnectedController@listColorES']);
    Route::get('/listBrandES/{page?}', ['as' => 'oms.listbrandES', 'uses' => 'ESConnectedController@listBrandES']);
    Route::get('/listCategoryES/{page?}', ['as' => 'oms.listcategoryES', 'uses' => 'ESConnectedController@listCategoryES']);
    
    /* ES Modals */
//    Route::get('/getESProduct/{limit?}/{page?}/{sku?}/{productName?}', ['as' => 'oms.getESProductList', 'uses' => 'ESConnectedController@getEsProduct']);
    Route::post('/getAllESBrandModals', ['as' => 'oms.getAllESBrandModals', 'uses' => 'ESConnectedController@listBrandESModals']);
    Route::post('/getAllESColorModals', ['as' => 'oms.getAllESColorModals', 'uses' => 'ESConnectedController@listColorESModals']);
    
    /* List */
    Route::get('/listColor/{marketplace?}', ['as' => 'oms.listcolor', 'uses' => 'DashboardController@listColor']);
    Route::get('/listBrand/{marketplace?}', ['as' => 'oms.listbrand', 'uses' => 'DashboardController@listBrand']);
    Route::get('/listCategory/{marketplace?}', ['as' => 'oms.listcategory', 'uses' => 'DashboardController@listCategory']);
    
    /* MP modals */
    Route::post('/getAllMPColorModals', ['as' => 'oms.getAllMPColorModals', 'uses' => 'DashboardController@listColorMPModals']);
    Route::post('/getAllMPBrandModals', ['as' => 'oms.getAllMPBrandModals', 'uses' => 'DashboardController@listBrandMPModals']);
    Route::post('/getAllMPCategoryModals', ['as' => 'oms.getAllMPCategoryModals', 'uses' => 'DashboardController@listCategoryMPModals']);
    Route::get('/listAttributes/{categoryID?}/{marketplace?}/{attributes?}', ['as' => 'oms.listattributes', 'uses' => 'DashboardController@listAttributes']);
    
    Route::post('/getMapping/{marketplace?}', ['as' => 'oms.getMapping', 'uses' => 'DashboardController@getMapping']);
    
    /* Order */
    Route::get('/orderlist/{orderlistID?}', ['as' => 'oms.orderList', 'uses' => 'DashboardController@orderList']);
    Route::post('/getorderlist', ['as' => 'oms.getOrderList', 'uses' => 'DashboardController@getOrderList']);
    Route::get('/editorderlist/{marketPlace?}/{SO?}', ['as' => 'oms.editOrderList', 'uses' => 'DashboardController@editOrderList']);
    
    /* Invoice */
    Route::post('/updatestatus', ['as' => 'oms.updatestatus', 'uses' => 'DashboardController@updateStatus']);
});