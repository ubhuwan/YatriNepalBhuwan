<?php


//---------------------------------Starting of frontend------------------------------------
//-------------------------------------------------------------------------------------

Route::get('/', [
    'uses' => 'frontend\indexController@index'
])->name("home");

Route::get('/Travel', function () {
    return view('frontend.layouts.Travel.Travel');
})->name("travel");

Route::get('/Contact', function () {
    return view('frontend.layouts.Contact.Contact');
})->name("contact");

Route::get('/Destination',[
    'uses' => 'frontend\DestinationController@dest'
])->name("dest");

Route::get('/Blog', function () {
    return view('frontend.layouts.Blog.blog');
})->name("blog");


Route::get('/details/{slug}', [
   'uses' => 'frontend\indexController@getDetails'
])->name("details");

Route::get('/search', [
    'uses' => 'frontend\SearchController@getResult',
    'as'   => 'searchItinerary'
]);




//---------------------------------End of frontend------------------------------------
//-------------------------------------------------------------------------------------


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


//----------------------------------frontend admin login------------------------------------------------

Route::get('login', [
    'uses' => 'UserController@getLogin',
    'as'   => 'admin.login.get'
]);

Route::post('login', [
   'uses' => 'UserController@postLogin',
    'as'  => 'admin.login.post'
]);
//------------------------------------end of frontend admin login------------------------------------------


//-------------------------------------------------------------------------------------
//---------------------------------ADMIN MIDDLEWARE------------------------------------
//-------------------------------------------------------------------------------------

Route::group(['prefix' => 'admin',
            'middleware' => 'auth'], function() {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('backend.dashboard');

    Route::get('user', function () {
        return view('backend.user');
    })->name('backend.user');

    Route::get('icon', function () {
        return view('backend.icon');
    })->name('backend.icon');

    Route::get('notification', function () {
        return view('backend.notification');
    })->name('backend.notification');

//----------------------------------pages route---------------------------------------
    Route::get('pages', [
        'uses' => 'PageController@getPage',
        'as' => 'backend.pages'
    ]);

    Route::get('pages/create', [
        'uses' => 'PageController@getCreatePage',
        'as' => 'backend.pages.get.create'
    ]);

    Route::post('pages', [
        'uses' => 'PageController@postPage',
        'as' => 'backend.pages.post.create'
    ]);

    Route::get('pages/edit/{page_id}', [
        'uses' => 'PageController@getUpdate',
        'as' => 'backend.pages.get.update'
    ]);

    Route::post('pages/update', [
        'uses' => 'PageController@postUpdate',
        'as' => 'backend.pages.post.update'
    ]);

    Route::get('pages/delete/{page_id}', [
        'uses' => 'PageController@getDelete',
        'as' => 'backend.pages.delete'
    ]);

    Route::get('pages/single/{page_slug}', [
        'uses' => 'PageController@getSinglePage',
        'as' => 'backend.pages.single.page'
    ]);

    Route::get('page/trash/{page_id}', [
        'uses' => 'PageController@getTrash',
        'as'  => 'backend.pages.trash'
    ]);

    Route::get('pages/trash', [
        'uses' => 'PageController@DeleteForever',
        'as'   => 'backend.pages.delete.page'
    ]);

    Route::get('pages/restore/{page_id}', [
        'uses' => 'PageController@Restore',
        'as'   => 'backend.pages.restore'
    ]);

//----------------------end of pages route---------------------------------------

//-----------------------category route---------------------------

    Route::get('category', [
        'uses' => 'CategoriesController@getCategory',
        'as' => 'backend.category'
    ]);

    Route::post('category/create', [
        'uses' => 'CategoriesController@postCategory',
        'as' => 'backend.category.create'
    ]);

    Route::get('category/edit/{category_id}', [
        'uses' => 'CategoriesController@getUpdate',
        'as' => 'backend.category.get.update'
    ]);

    Route::post('category/update', [
        'uses' => 'CategoriesController@postUpdate',
        'as' => 'backend.category.post.update'
    ]);

    Route::get('category/delete/{category_id}', [
        'uses' => 'CategoriesController@getDelete',
        'as' => 'backend.category.delete'
    ]);

    Route::get('category/single/{category_slug}', [
        'uses' => 'CategoriesController@getSingleCategory',
        'as' => 'backend.category.single.category'
    ]);

    Route::get('category/trash/{category_id}', [
        'uses' => 'CategoriesController@getTrash',
        'as'  => 'backend.category.trash'
    ]);

    Route::get('category/trash', [
        'uses' => 'CategoriesController@DeleteForever',
        'as'   => 'backend.category.delete.page'
    ]);

    Route::get('category/restore/{category_id}', [
        'uses' => 'CategoriesController@Restore',
        'as'   => 'backend.category.restore'
    ]);

//-------------------------end of category route---------------------------------

//--------------------------banner route----------------------------------
    Route::get('banner', [
        'uses' => 'BannerController@getBanner',
        'as' => 'backend.banner'
    ]);

    Route::get('banner/create', [
        'uses' => 'BannerController@getCreateBanner',
        'as' => 'backend.banner.get.create'
    ]);

    Route::post('banner/create', [
        'uses' => 'BannerController@postCreateBanner',
        'as' => 'backend.banner.post.create'
    ]);

    Route::get('banner/edit/{banner_id}', [
        'uses' => 'BannerController@getUpdate',
        'as' => 'backend.banner.get.update'
    ]);

    Route::post('banner/update', [
        'uses' => 'BannerController@postUpdate',
        'as' => 'backend.banner.post.update'
    ]);

    Route::get('banner/delete/{banner_id}', [
        'uses' => 'BannerController@getDelete',
        'as' => 'backend.banner.delete'
    ]);

    Route::get('banner/single/{banner_slug}', [
        'uses' => 'BannerController@getSingleBanner',
        'as' => 'backend.banner.single.banner'
    ]);

    Route::get('banner/trash/{banner_id}', [
        'uses' => 'BannerController@getTrash',
        'as'  => 'backend.banner.trash'
    ]);

    Route::get('banner/trash', [
        'uses' => 'BannerController@DeleteForever',
        'as'   => 'backend.banner.delete.page'
    ]);

    Route::get('banner/restore/{banner_id}', [
        'uses' => 'BannerController@Restore',
        'as'   => 'backend.banner.restore'
    ]);

    Route::get('banner/{filename}', [
        'uses' => 'BannerController@getImage',
        'as'   => 'backend.banner.image'
    ]);

//----------------------end of banner route---------------------


//---------------------------country route------------------------

    Route::get('country', [
        'uses' => 'CountriesController@getCountry',
        'as' => 'backend.country'
    ]);

    Route::get('country/create', [
        'uses' => 'CountriesController@getCreateCountry',
        'as' => 'backend.country.get.create'
    ]);

    Route::post('country/create', [
        'uses' => 'CountriesController@postCreateCountry',
        'as' => 'backend.country.post.create'
    ]);

    Route::get('country/edit/{country_id}', [
        'uses' => 'CountriesController@getUpdate',
        'as' => 'backend.country.get.update'
    ]);

    Route::post('country/update', [
        'uses' => 'CountriesController@postUpdate',
        'as' => 'backend.country.post.update'
    ]);

    Route::get('country/delete/{country_id}', [
        'uses' => 'CountriesController@getDelete',
        'as' => 'backend.country.delete'
    ]);

    Route::get('country/trash/{country_id}', [
        'uses' => 'CountriesController@getTrash',
        'as'  => 'backend.country.trash'
    ]);

    Route::get('country/trash', [
        'uses' => 'CountriesController@DeleteForever',
        'as'   => 'backend.country.delete.page'
    ]);

    Route::get('country/restore/{country_id}', [
        'uses' => 'CountriesController@Restore',
        'as'   => 'backend.country.restore'
    ]);

    Route::get('country/{filename}', [
       'uses' => 'CountriesController@getImage',
        'as'  => 'backend.country.image'
    ]);


//--------------------------end of country route----------------------------

//-----------------------Destination route---------------------------

    Route::get('destination', [
        'uses' => 'DestinationsController@getDestination',
        'as' => 'backend.destination'
    ]);

    Route::get('destination/create', [
        'uses' => 'DestinationsController@getCreateDestination',
        'as' => 'backend.destination.get.create'
    ]);

    Route::post('destination/create', [
        'uses' => 'DestinationsController@postCreateDestination',
        'as' => 'backend.destination.post.create'
    ]);

    Route::get('destination/edit/{destination_id}', [
        'uses' => 'DestinationsController@getUpdate',
        'as' => 'backend.destination.get.update'
    ]);

    Route::post('destination/update', [
        'uses' => 'DestinationsController@postUpdate',
        'as' => 'backend.destination.post.update'
    ]);

    Route::get('destination/delete/{destination_id}', [
        'uses' => 'DestinationsController@getDelete',
        'as' => 'backend.destination.delete'
    ]);

    Route::get('destination/single/{category_slug}', [
        'uses' => 'DestinationsController@getSingleDestination',
        'as' => 'backend.destination.single.destination'
    ]);

    Route::get('destination/trash/{destination_id}', [
        'uses' => 'DestinationsController@getTrash',
        'as'  => 'backend.destination.trash'
    ]);

    Route::get('destination/trash', [
        'uses' => 'DestinationsController@DeleteForever',
        'as'   => 'backend.destination.delete.page'
    ]);

    Route::get('destination/restore/{destination_id}', [
        'uses' => 'DestinationsController@Restore',
        'as'   => 'backend.destination.restore'
    ]);

    Route::get('destination/{filename}', [
        'uses' => 'DestinationsController@getImage',
        'as'   => 'backend.destination.image'
    ]);

//-------------------------end of destination route---------------------------------

//-----------------------Region route---------------------------

    Route::get('region', [
        'uses' => 'RegionsController@getRegion',
        'as' => 'backend.region'
    ]);

    Route::get('region/create', [
        'uses' => 'RegionsController@getCreateRegion',
        'as' => 'backend.region.get.create'
    ]);

    Route::post('region/create', [
        'uses' => 'RegionsController@postCreateRegion',
        'as' => 'backend.region.post.create'
    ]);

    Route::get('region/edit/{region_slug}', [
        'uses' => 'RegionsController@getUpdate',
        'as' => 'backend.region.get.update'
    ]);

    Route::post('region/update', [
        'uses' => 'RegionsController@postUpdate',
        'as' => 'backend.region.post.update'
    ]);

    Route::get('region/delete/{region_id}', [
        'uses' => 'RegionsController@getDelete',
        'as' => 'backend.region.delete'
    ]);

    Route::get('region/trash/{region_id}', [
       'uses' => 'RegionsController@getTrash',
        'as'  => 'backend.region.trash'
    ]);

    Route::get('region/trash', [
        'uses' => 'RegionsController@DeleteForever',
        'as'   => 'backend.region.delete.page'
    ]);

    Route::get('region/restore/{region_id}', [
        'uses' => 'RegionsController@Restore',
        'as'   => 'backend.region.restore'
    ]);


//-------------------------end of region route---------------------------------

//-----------------------Activity route---------------------------

    Route::get('activity', [
        'uses' => 'ActivitiesController@getActivity',
        'as' => 'backend.activity'
    ]);

    Route::get('activity/create', [
        'uses' => 'ActivitiesController@getCreateActivity',
        'as' => 'backend.activity.get.create'
    ]);

    Route::post('activity/create', [
        'uses' => 'ActivitiesController@postCreateActivity',
        'as' => 'backend.activity.post.create'
    ]);

    Route::get('activity/edit/{activity_id}', [
        'uses' => 'ActivitiesController@getUpdate',
        'as' => 'backend.activity.get.update'
    ]);

    Route::post('activity/update', [
        'uses' => 'ActivitiesController@postUpdate',
        'as' => 'backend.activity.post.update'
    ]);

    Route::get('activity/delete/{activity_id}', [
        'uses' => 'ActivitiesController@getDelete',
        'as' => 'backend.activity.delete'
    ]);

    Route::get('activity/trash/{activity_id}', [
        'uses' => 'ActivitiesController@getTrash',
        'as'  => 'backend.activity.trash'
    ]);

    Route::get('activity/trash', [
        'uses' => 'ActivitiesController@DeleteForever',
        'as'   => 'backend.activity.delete.page'
    ]);

    Route::get('activity/restore/{activity_id}', [
        'uses' => 'ActivitiesController@Restore',
        'as'   => 'backend.activity.restore'
    ]);

//-------------------------end of activity route---------------------------------

//-------------------------Itinerary route---------------------------------------
    Route::get('itinerary', [
        'uses' => 'ItinerariesController@getItinerary',
        'as' => 'backend.itinerary'
    ]);

    Route::get('itinerary/create', [
        'uses' => 'ItinerariesController@getCreateItinerary',
        'as' => 'backend.itinerary.get.create'
    ]);

    Route::post('itinerary/create', [
        'uses' => 'ItinerariesController@postCreateItinerary',
        'as' => 'backend.itinerary.post.create'
    ]);

    Route::get('itinerary/edit/{itinerary_id}', [
        'uses' => 'ItinerariesController@getUpdate',
        'as' => 'backend.itinerary.get.update'
    ]);

    Route::post('itinerary/update', [
        'uses' => 'ItinerariesController@postUpdate',
        'as' => 'backend.itinerary.post.update'
    ]);

    Route::get('itinerary/delete/{itinerary_id}', [
        'uses' => 'ItinerariesController@getDelete',
        'as' => 'backend.itinerary.delete'
    ]);

    Route::get('itinerary/single/{itinerary_slug}', [
        'uses' => 'ItinerariesController@getSingleItinerary',
        'as' => 'backend.itinerary.single.itinerary'
    ]);

    Route::get('itinerary/trash/{itinerary_id}', [
        'uses' => 'ItinerariesController@getTrash',
        'as'  => 'backend.itinerary.trash'
    ]);

    Route::get('itinerary/trash', [
        'uses' => 'ItinerariesController@DeleteForever',
        'as'   => 'backend.itinerary.delete.page'
    ]);

    Route::get('itinerary/restore/{itinerary_id}', [
        'uses' => 'ItinerariesController@Restore',
        'as'   => 'backend.itinerary.restore'
    ]);

    Route::get('itinerary/{filename}', [
        'uses' => 'ItinerariesController@getImage',
        'as'   => 'backend.itinerary.image'
    ]);

    Route::get('itinerary/{mapname}', [
        'uses' => 'ItinerariesController@getRouteMap',
        'as'   => 'backend.itinerary.routemap'
    ]);

//-------------------------end of itinerary route--------------------------------

//-----------------------Review route---------------------------

    Route::get('review', [
        'uses' => 'ReviewsController@getReview',
        'as' => 'backend.review'
    ]);

    Route::get('review/create', [
        'uses' => 'ReviewsController@getCreateReview',
        'as' => 'backend.review.get.create'
    ]);

    Route::post('review/create', [
        'uses' => 'ReviewsController@postCreateReview',
        'as' => 'backend.review.post.create'
    ]);

    Route::get('review/edit/{review_id}', [
        'uses' => 'ReviewsController@getUpdate',
        'as' => 'backend.review.get.update'
    ]);

    Route::post('review/update', [
        'uses' => 'ReviewsController@postUpdate',
        'as' => 'backend.review.post.update'
    ]);

    Route::get('review/delete/{review_id}', [
        'uses' => 'ReviewsController@getDelete',
        'as' => 'backend.review.delete'
    ]);

    Route::get('review/single/{category_slug}', [
        'uses' => 'ReviewsController@getSingleReview',
        'as' => 'backend.review.single.review'
    ]);

    Route::get('review/trash/{review_id}', [
        'uses' => 'ReviewsController@getTrash',
        'as'  => 'backend.review.trash'
    ]);

    Route::get('review/trash', [
        'uses' => 'ReviewsController@DeleteForever',
        'as'   => 'backend.review.delete.page'
    ]);

    Route::get('review/restore/{review_id}', [
        'uses' => 'ReviewsController@Restore',
        'as'   => 'backend.review.restore'
    ]);

    Route::get('review/{filename}', [
        'uses' => 'ReviewsController@getImage',
        'as'   => 'backend.review.image'
    ]);

//-------------------------end of review route---------------------------------

//-----------------------Customize route---------------------------

    Route::get('customize', [
        'uses' => 'CustomizesController@getCustomize',
        'as' => 'backend.customize'
    ]);

    Route::get('customize/create', [
        'uses' => 'CustomizesController@getCreateCustomize',
        'as' => 'backend.customize.get.create'
    ]);

    Route::post('customize/create', [
        'uses' => 'CustomizesController@postCreateCustomize',
        'as' => 'backend.customize.post.create'
    ]);

    Route::get('customize/edit/{customize_id}', [
        'uses' => 'CustomizesController@getUpdate',
        'as' => 'backend.customize.get.update'
    ]);

    Route::post('customize/update', [
        'uses' => 'CustomizesController@postUpdate',
        'as' => 'backend.customize.post.update'
    ]);

    Route::get('customize/delete/{customize_id}', [
        'uses' => 'CustomizesController@getDelete',
        'as' => 'backend.customize.delete'
    ]);

    Route::get('customize/single/{category_slug}', [
        'uses' => 'CustomizesController@getSingleCustomize',
        'as' => 'backend.customize.single.customize'
    ]);

    Route::get('customize/trash/{customize_id}', [
        'uses' => 'CustomizesController@getTrash',
        'as'  => 'backend.customize.trash'
    ]);

    Route::get('customize/trash', [
        'uses' => 'CustomizesController@DeleteForever',
        'as'   => 'backend.customize.delete.page'
    ]);

    Route::get('customize/restore/{customize_id}', [
        'uses' => 'CustomizesController@Restore',
        'as'   => 'backend.customize.restore'
    ]);

    Route::get('customize/{filename}', [
        'uses' => 'CustomizesController@getImage',
        'as'   => 'backend.customize.image'
    ]);

//-------------------------end of customize route---------------------------------

    Route::get('logout', [
        'uses' => 'UserController@getLogout',
        'as'   => 'admin.logout'
    ]);

});

//---------------------------------END OF ADMIN MIDDLEWARE------------------------------------
//--------------------------------------------------------------------------------------------


