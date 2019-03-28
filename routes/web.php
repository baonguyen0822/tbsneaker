<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

/* -----------------Route Admin-----------------*/
Route::get('admin/login','AdminController@getLoginAdmin');
Route::post('admin/login','AdminController@postLoginAdmin');
Route::get('admin/logout','AdminController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    Route::group(['prefix'=>'product'], function(){
        //admin/product
        Route::get('list','ProductController@getDanhSach');
        Route::get('add','ProductController@getThemsp');
        Route::post('add','ProductController@postThemsp');
        Route::get('update/{id}','ProductController@getSuasp');
        Route::post('update/{id}','ProductController@postSuasp');
        Route::get('delete/{id}','ProductController@postXoasp');
    });

    //admin/product_size
    Route::group(['prefix'=>'product_size'], function(){
        Route::get('list/{id}','Product_sizeController@getListSize');
        Route::get('add/{id}','Product_sizeController@getAddSize');
        Route::post('add/{id}','Product_sizeController@postAddSize');
        Route::get('update/{id}','Product_sizeController@getUpdateSize');
        Route::post('update/{id}','Product_sizeController@postUpdateSize');
        Route::get('delete/{id}','Product_sizeController@getDeleteSize');
    });

    //admin/product_img
    Route::group(['prefix'=>'product_img'], function(){
        Route::get('list/{id}','Product_imgController@getListImg');
        Route::get('update/{id}','Product_imgController@getUpdateImg');
        Route::post('update/{id}','Product_imgController@postUpdateImg');
        Route::get('delete/{id}','Product_imgController@getDeleteIKmg');
    });

    //addmin/bran_label - thể loại sản phẩm
    Route::group(['prefix'=>'brand_label'], function(){
        Route::get('list','Brand_labelController@getListBrand');
        Route::get('add','Brand_labelController@getAddBrand');
        Route::post('add','Brand_labelController@postAddBrand');
        Route::get('update/{id}','Brand_labelController@getEditBrand');
        Route::post('update/{id}','Brand_labelController@postEditBrand');
        Route::get('delete/{id}','Brand_labelController@getDeleteBrand');
    });
    
    //admin/categoy - thuong hieu sản phẩm
    Route::group(['prefix'=>'category'], function(){
        Route::get('list','CategoryController@getListCate');
        Route::get('add','CategoryController@getAddCate');
        Route::post('add','CategoryController@postAddCate');
        Route::get('update/{id}','CategoryController@getEditCate');
        Route::post('update/{id}','CategoryController@postEditCate');
        Route::get('delete/{id}','CategoryController@getDeleteCate');
    });

    //admin/user - Người dùng
    Route::group(['prefix'=>'user'], function(){
        Route::get('list','UserController@getListUser');
        Route::get('add','UserController@getAddUser');
        Route::post('add','UserController@postAddUser');
        Route::get('update/{id}','UserController@getEditUser');
        Route::post('update/{id}','UserController@postEditUser');
        Route::get('block/{id}','UserController@getBlockUser');
        Route::get('unblock/{id}','UserController@getUnblockUser');
    });
   
    //admin/admin - Quản trị
    Route::group(['prefix'=>'admin'], function(){
        Route::get('list','AdminController@getListAdmin');
        Route::get('add','AdminController@getAddAdmin');
        Route::post('add','AdminController@postAddAdmin');
        Route::get('update/{id}','AdminController@getEditAdmin');
        Route::post('update/{id}','AdminController@postEditAdmin');
        Route::get('block/{id}','AdminController@getBlockAdmin');
        Route::get('unblock/{id}','AdminController@getUnblockAdmin');
    });


    //admin/slide 
    Route::group(['prefix'=>'slide'], function(){
        Route::get('list','SlideController@getListSlide');
        Route::get('update/{id}','SlideController@getEditSlide');
        Route::post('update/{id}','SlideController@postEditSlide');
    });

    //admin/infor - thông tin cửa hàng
    Route::group(['prefix'=>'infor'], function(){
        Route::get('list','InforController@getListInfor');
        Route::get('update/{id}','InforController@getEditInfor');
        Route::post('update/{id}','InforController@postEditInfor');
    });

    //admin/order - thông tin đơn hàng
    Route::group(['prefix'=>'order'], function(){
        Route::get('list/{id}','OderController@getListOrd');
    });

    //admin/transaction - thông tin đơn hàng
    Route::group(['prefix'=>'transaction'], function(){
        Route::get('list','TransactionController@getTransList');
        Route::get('update/{id}','TransactionController@getTransEdit');
        Route::post('update/{id}','TransactionController@postTransEdit');
    });


});


Route::get('index',function(){
    return view('admin.layout.index'); 
});
/*
Route::get('danh-sach-san-pham', function(){
    return view('admin.product.list');
});
*/
/* ----------------Route User----------------- */
Route::get('trangchu','PageController@getTrangchu');
Route::get('sanpham/{id}','PageController@getLoaisp');
Route::get('theloai/{id}','PageController@getBrand');
Route::get('chitietsanpham/{id}','PageController@getChitietsp');

Route::group(['prefix'=>'cart'],function()
{
    Route::get('add/{id}','CartController@getAddCart');
    Route::get('show','CartController@getShowCart');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');
    Route::get('checkout','CartController@getCheckout');
    Route::post('checkout','CartController@postCheckout');
    Route::get('confirm','CartController@getConfirm');
});


Route::get('dangky','PageController@getDangky');
Route::post('dangky','PageController@postDangky');
Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');
Route::get('dangxuat','PageController@getDangxuat');

Route::get('search','PageController@getSearch');
Route::get('tracking','PageController@getTracking');
Route::get('lienhe','PageController@getLienhe');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

