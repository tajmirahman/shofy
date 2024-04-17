<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminOrderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribeController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'Index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';

//Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

//Admin Logout
Route::get('/admin/forgot-password', [AdminController::class, 'AdminForgotPassword'])->name('admin.forgot.password');

///////////////// Admin MiddleWare //////////////////

Route::middleware(['auth', 'roles:admin'])->group(function () {

    //Admin DashBoard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashBoard'])->name('admin.dashboard');

    //Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    //Admin Password
    Route::get('/admin/password', [AdminController::class, 'AdminPassword'])->name('admin.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    //Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

});

/////////////// Admin All Middleware Route ///////////////

Route::middleware(['auth', 'roles:admin'])->group(function () {

    //Admin Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon', 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');
    });

    //Role & Permission
    Route::controller(RoleController::class)->group(function () {

        //Permission
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Role
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        //Role In Permission
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
        Route::get('/edit/roles/permission/{id}', 'EditRolesPermission')->name('edit.roles.permission');
        Route::post('/update/roles/permission/{id}', 'UpdateRolesPermission')->name('update.roles.permission');

        Route::get('/delete/roles/permission/{id}', 'DeleteRolesPermission')->name('delete.roles.permission');


    });

    //Subscribe Section
    Route::controller(SubscribeController::class)->group(function () {

        Route::get('/all/subscribe', 'AllSubscribe')->name('all.subscribe');
        Route::get('/delete/subscribe/{id}', 'DeleteSubscribe')->name('delete.subscribe');
    });

    //Report Section
    Route::controller(ReportController::class)->group(function () {

        Route::get('/all/report', 'AllReport')->name('all.report');
        Route::post('/search-by-date', 'SearchByDate')->name('search-by-date');
        Route::post('/search-by-month', 'SearchByMonth')->name('search-by-month');
        Route::post('/search-by-year', 'SearchByYear')->name('search-by-year');

        Route::get('/all/user/report', 'UserReport')->name('user.report');
        Route::post('/search-by-user', 'SearchByUser')->name('search-by-user');
    });

    //Site Setting
    Route::controller(SiteSettingController::class)->group(function () {

        Route::get('/all/site/setting', 'AllSiteSetting')->name('all.site.setting');
        Route::get('/add/site/setting', 'AddSiteSetting')->name('add.site.setting');
        Route::post('/store/site/setting', 'StoreSiteSetting')->name('store.site.setting');
        Route::get('/edit/site/setting/{id}', 'EditSiteSetting')->name('edit.site.setting');
        Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');
    });

    //Review Section
    Route::controller(ReviewController::class)->group(function () {

        Route::get('/all/admin/review', 'AllAdminReview')->name('all.admin.review');
        Route::get('/inactive-review/{id}', 'InactiveReview')->name('inactive.review');
        Route::get('/active-review/{id}', 'ActiveReview')->name('active.review');
    });

    //Blog Section
    Route::controller(BlogController::class)->group(function () {

        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/blog/category/{id}', 'EditBlogCategory');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

        //Blog Post
        Route::get('/all/blog/post', 'AllBlogPost')->name('all.blog.post');
        Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');

        //Comment
        Route::get('/all/blog/comment', 'AllBlogComment')->name('all.blog.comment');
        Route::get('/blog-post/reply/{id}', 'BlogPostReply')->name('blog.post.reply');
        Route::post('/blog-comment/reply', 'AdminBlogCommentReply')->name('admin.blog.comment-reply');
    });

    //Order Section
    Route::controller(AdminOrderController::class)->group(function () {

        Route::get('/all/admin/order', 'AllAdminOrder')->name('all.admin.order');
        Route::get('/admin/confirm/order', 'AdminConfirmOrder')->name('admin.confirm.order');
        Route::get('/admin/processing/order', 'AdminProcessingOrder')->name('admin.processing.order');
        Route::get('/admin/deliver/order', 'AdminDeliverOrder')->name('admin.deliver.order');


        Route::get('/admin/order/details/{order_id}', 'AdminOrderDetails');

        Route::get('/admin/order/invoice/{order_id}', 'AdminOrderInvoice');

        Route::get('/confirm/order/{order_id}', 'ConfirmOrder');
        Route::get('/processing/order/{order_id}', 'ProcessingOrder');
        Route::get('/deliver/order/{order_id}', 'DeliverOrder');

        Route::get('/admin/return/order', 'AdminReturnOrder')->name('admin.return.order');
        Route::get('/admin-accept/order/{order_id}', 'AdminAccpetOrder')->name('admin.accept.order');
    });

    //Coupon Section
    Route::controller(CouponController::class)->group(function () {

        Route::get('/all/coupon', 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon', 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon', 'StoreCoupon')->name('store.coupon');
        Route::get('/edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon', 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');
    });

    //Shipping Section
    Route::controller(ShippingController::class)->group(function () {

        //Division
        Route::get('/all/division', 'AllDivision')->name('all.division');
        Route::get('/add/division', 'AddDivision')->name('add.division');
        Route::post('/store/division', 'StoreDivision')->name('store.division');
        Route::get('/edit/division/{id}', 'EditDivision')->name('edit.division');
        Route::post('/update/division', 'UpdateDivision')->name('update.division');
        Route::get('/delete/division/{id}', 'DeleteDivision')->name('delete.division');

        // District 
        Route::get('/all/district', 'AllDistrict')->name('all.district');
        Route::get('/add/district', 'AddDistrict')->name('add.district');
        Route::post('/store/district', 'StoreDistrict')->name('store.district');
        Route::get('/edit/district/{id}', 'EditDistrict')->name('edit.district');
        Route::post('/update/district', 'UpdateDistrict')->name('update.district');
        Route::get('/delete/district/{id}', 'DeleteDistrict')->name('delete.district');

        // state 
        Route::get('/all/state', 'AllState')->name('all.state');
        Route::get('/add/state', 'AddState')->name('add.state');
        Route::post('/store/state', 'StoreState')->name('store.state');
        Route::get('/edit/state/{id}', 'EditState')->name('edit.state');
        Route::post('/update/state', 'UpdateState')->name('update.state');
        Route::get('/delete/state/{id}', 'DeleteState')->name('delete.state');

        Route::get('/district/ajax/{division_id}', 'GetDistrict');
    });

    //Product Section
    Route::controller(ProductController::class)->group(function () {

        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');

        // Muli Image
        Route::post('/store/multiimg', 'StoreMultiImage')->name('store.multiimg');
        Route::post('/update/multiimg', 'UpdateMultiImage')->name('update.multiimg');
        Route::get('/delete/multiimg/{id}', 'DeleteMultiImage')->name('delete.multiimg');

        // Active Or Inactive
        Route::get('/inactive/product/{id}', 'InactiveProduct')->name('inactive.product');
        Route::get('/active/product/{id}', 'ActiveProduct')->name('active.product');

        // Stock
        Route::get('/all/stock', 'AllStock')->name('all.stock');
    });

    //Slider Section
    Route::controller(SliderController::class)->group(function () {

        Route::get('/all/slider', 'AllSlider')->name('all.slider');
        Route::get('/add/slider', 'AddSlider')->name('add.slider');
        Route::post('/store/slider', 'StoreSlider')->name('store.slider');
        Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
        Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
    });

    //Banner Section
    Route::controller(BannerController::class)->group(function () {

        Route::get('/all/banner', 'AllBanner')->name('all.banner');
        Route::get('/add/banner', 'AddBanner')->name('add.banner');
        Route::post('/store/banner', 'StoreBanner')->name('store.banner');
        Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/update/banner', 'UpdateBanner')->name('update.banner');
        Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
    });

    //Category Section
    Route::controller(CategoryController::class)->group(function () {

        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    //SubCategory Section
    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');

        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
    });

    //User & Vendor
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/vendor', 'AllVendor')->name('all.vendor');
        Route::get('/inactive/vendor/{id}', 'InactiveVendor')->name('inactive.vendor');
        Route::get('/active/vendor/{id}', 'ActiveVendor')->name('active.vendor');
        Route::get('/delete/vendor/{id}', 'DeleteVendor')->name('delete.vendor');

        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/user/vendor/{id}', 'InactiveUser')->name('inactive.user');
        Route::get('/active/user/{id}', 'ActiveUser')->name('active.user');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    });
});

//Vendor Login
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

// Register
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');

//////////////// Vendor MiddleWare ////////////////////

Route::middleware(['auth', 'roles:vendor'])->group(function () {

    //Vendor DashBoard
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashBoard'])->name('vendor.dashboard');

    //Vendor Profile
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    //Vendor Password
    Route::get('/vendor/password', [VendorController::class, 'VendorPassword'])->name('vendor.password');

    Route::post('/vendor/password/update', [VendorController::class, 'VendorPasswordUpdate'])->name('vendor.password.update');

    //Vendor Logout
    Route::get('/vendor/logout', [VendorController::class, 'VendorLogout'])->name('vendor.logout');
});

/////////////// Vendor All Middleware Route /////////////////

Route::middleware(['auth', 'roles:vendor'])->group(function () {

    //Product Section
    Route::controller(VendorProductController::class)->group(function () {

        Route::get('/all/vendor/product', 'AllVendorProduct')->name('all.vendor.product');
        Route::get('/add/vendor/product', 'AddVendorProduct')->name('add.vendor.product');
        Route::post('/store/vendor/product', 'StoreVendorProduct')->name('store.vendor.product');
        Route::get('/edit/vendor/product/{id}', 'EditVendorProduct')->name('edit.vendor.product');
        Route::post('/update/vendor/product', 'UpdateVendorProduct')->name('update.vendor.product');
        Route::get('/delete/vendor/product/{id}', 'DeleteVendorProduct')->name('delete.vendor.product');

        // Muli Image
        Route::post('/store/vendor/multiimg', 'StoreVendorMultiImage')->name('store.vendor.multiimg');
        Route::post('/update/vendor/multiimg', 'UpdateVendorMultiImage')->name('update.vendor.multiimg');
        Route::get('/delete/vendor/multiimg/{id}', 'DeleteVendorMultiImage')->name('delete.vendor.multiimg');

        Route::get('/vendor/subcategory/ajax/{category_id}', 'VendorGetSubCategory');

        //////////////// Order /////////////////

        Route::get('/all/vendor/order', 'AllVendorOrder')->name('all.vendor.order');
        Route::get('/vendor/order/details/{id}', 'VendorOrderDetails')->name('vendor.order.details');
    });
});

///////////////// User MiddleWare //////////////////

Route::middleware(['auth', 'verified'])->group(function () {

    //User DashBoard
    Route::get('/dashboard', [UserController::class, 'UserDashBoard'])->name('user.dashboard');

    //User Profile
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    //User Password
    Route::get('/user/password', [UserController::class, 'UserPassword'])->name('user.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    //User Logout
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
});

/// User Middle Ware Route ////////////////////

Route::middleware(['auth', 'roles:user'])->group(function () {

    // Wishlist All Route 
    Route::controller(WishListController::class)->group(function () {

        Route::get('/wishlist', 'AllWishlist')->name('wishlist');
        Route::get('/get-wishlist-product', 'GetWishlistProduct');
        Route::get('/wishlist-remove/{id}', 'WishlistRemove');
    });

    //Checkout All Route 
    Route::controller(CheckOutController::class)->group(function () {

        Route::get('/district-get/ajax/{division_id}', 'GetCheckDistrict');
        Route::get('/state-get/ajax/{district_id}', 'StateGetAjax');

        Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');
    });

    // Stripe Order user model
    Route::controller(StripeController::class)->group(function () {

        Route::post('/stripe/order', 'StripeOrder')->name('stripe.order');
        Route::post('/cash/order', 'CashOrder')->name('cash.order');
    });

    // User Order
    Route::controller(UserController::class)->group(function () {

        Route::get('/user/order', 'UserOrder')->name('user.order');
        Route::get('/user/user-details/{order_id}', 'UserOrderDetails');
        Route::get('/user/order_invoice/{order_id}', 'UserInvoice');

        Route::post('/return/order/{order_id}', 'ReturnOrder')->name('return.order');
        Route::get('/user-return/order', 'UserReturnOrder')->name('user.return.order');

        Route::get('/user-track/order', 'UserTrackOrder')->name('user.track.order');
        Route::post('/order-tracking', 'OrderTracking')->name('order.tracking');
    });
});

// end group User middleware

// Checkout Page Route 
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

/// Add to Wishlist 
Route::post('/add-to-wishlist/{product_id}', [WishListController::class, 'AddToWishList']);

//Product Details
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::get('/total-product', [IndexController::class, 'TotalDetails'])->name('total-product');


//Category
Route::get('/all/category/product', [IndexController::class, 'AllCategoryFront'])->name('all.category.front');

Route::get('/category-wise/all/product/{id}', [IndexController::class, 'CateWiseProduct'])->name('catwise.product');

//SubCategory
Route::get('/subcategory-wise/all/product/{id}', [IndexController::class, 'SubCateWiseProduct'])->name('subcatwise.product');

//Add to cart store data For Product Details Page 
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);

// Get Data from mini Cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

Route::controller(CartController::class)->group(function () {

    Route::get('/mycart', 'MyCart')->name('mycart');
    Route::get('/get-cart-product', 'GetCartProduct');
    Route::get('/cart-remove/{rowId}', 'CartRemove');

    Route::get('/cart-decrement/{rowId}', 'CartDecrement');
    Route::get('/cart-increment/{rowId}', 'CartIncrement');
});

/// Frontend Coupon Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Product View Modal With Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

/// Add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);


// Blog Section
Route::get('/total/blog/post', [IndexController::class, 'TotalBlogPost'])->name('total.blog-post');
Route::get('/blog-details/{id}/{slug}', [IndexController::class, 'BlogDetails']);

//Comment
Route::post('/store-comment', [IndexController::class, 'StoreComment'])->name('store.comment');

//Review
Route::post('/store-review', [IndexController::class, 'StoreReview'])->name('store.review');

//Contact
Route::get('/contact', [IndexController::class, 'Contact'])->name('contact');
Route::post('/store-contact', [IndexController::class, 'StoreContact'])->name('store.contact.message');

//Contact
Route::post('/subscribe', [IndexController::class, 'Subscribe'])->name('subscribe');

// Login With Google 
Route::get('authorized/google', [IndexController::class, 'redirectToGoogle']);

Route::get('authorized/google/callback', [IndexController::class, 'handleGoogleCallback']);



