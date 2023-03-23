<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;



Route::get('/', [ProductController::class, 'index'])->name('home');
// Route Wildcard Constraints
Route::get('products/{product:slug}', [ProductController::class, 'show']);

Route::post('products/{product:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/cart', [CartController::class, "store"]);
Route::get("/carts", [CartController::class, "index"])->name('cart.index');
Route::get('/carts/edit', [CartController::class, "edit"]);
Route::put('/carts/update', [CartController::class, "update"]);
Route::delete('/carts/destroy', [CartController::class, "destroy"]);
Route::get('/carts/Buy', [CartController::class, "Buy"]);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::resource('categories', CategoryController::class);

Route::get('categories/{category:name}', function (Category $category) {
    // {{ dd($category->Products); }}
    return view('products.index', [
       'products' => $category->Products,
       'categories' => Category::all(),
       'currentCategory' => $category,
   ]);
})->name('category');


Route::get('author/{author:username}', function (User $author) {
    return view('products.index', [
        'products' => $author->Products,
//            ->load(['category', 'author'])
    ]);
});


Route::get('admin/products/create', [ProductController::class, 'create'])->middleware('permissions');

Route::post('admin/products', [ProductController::class, 'store'])->middleware('permissions');

Route::get('/ping', function () {
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us12',
    ]);

   $response = $mailchimp->ping->get();


   dd($response);
});

Route::post('newsletter', function () {

    request()->validate(['email' => 'required|email']);

    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us12',
    ]);


    // dd($mailchimp->lists->getAllLists());

    try {
        $response = $mailchimp->lists->addListMember('a0afd04ae4', [
            'email_address' => request('email'),
            'status' => 'subscribed',
        ]);
    } catch (Exception $exception) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.',
        ]);
    }

    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});
