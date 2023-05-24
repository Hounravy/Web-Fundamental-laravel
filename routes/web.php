<?php
use App\Http\Controllers\main_pageController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\tagController;
use App\Http\Controllers\postController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });
//Login




Route::get('/home',[main_pageController::class, 'home']);
Route::get('/categories',[main_pageController::class, 'categories']);
Route::get('/food',[main_pageController::class, 'food']);
Route::get('/order',[main_pageController::class, 'order']);
Route::get('/categ_food',[main_pageController::class, 'categ_food']);





// system-test Route

// Route::get('/blog', function () {
//     return view('system-test.index');
// });  

// article
Route::get('/article/{id}',[postController::class, 'article'])->name('system-test.article'); 
//route category
Route::post('/authenticate', [loginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/login', [loginController::class, 'login'])->name('system-test.login');

Route::get('/', [homeController::class, 'index'])->name('system-test.index');
Route::prefix('admin')->name('system-test.')->middleware('auth')->group(function () {

   
   
    Route::get('/category',[categoryController::class, 'category'])->name('category.index');
    Route::get('/category/create',[categoryController::class, 'create'])->name('category.add_update');
    Route::post('/category/store',[categoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}',[categoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}',[categoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}',[categoryController::class, 'destroy'])->name('category.destroy');
    
    Route::get('/post',[postController::class, 'post'])->name('post.index');
    Route::get('/post/create',[postController::class, 'create'])->name('post.add_update');
    Route::get('/post/{id}',[postController::class, 'edit'])->name('post.edit'); 
    Route::post('/post/store',[postController::class, 'store'])->name('post.store');
    Route::put('/post/{id}',[postController::class, 'update'])->name('post.update');
    
    
    
    Route::get('/tag',[tagController::class, 'tag'])->name('tag.index');
    Route::get('/tag/create',[tagController::class, 'create'])->name('tag.add_update');
    Route::post('/tag/store',[tagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{id}',[tagController::class, 'edit'])->name('tag.edit');
    Route::put('/tag/{id}',[tagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}',[tagController::class, 'destroy'])->name('tag.destroy');
    
    
});
