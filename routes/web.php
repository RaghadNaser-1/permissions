<?php
use Illuminate\Support\Facades\App; // Import the App facade



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\PermissionGroupController;


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


// Route to handle the logout action
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// Route to show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route to handle login form submission
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');



// Define named route for the dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Other protected routes can be added here...
    // User Management Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Role Management Routes
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Permission Management Routes
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

// UserGroup routes
Route::get('/user_groups', [UserGroupController::class, 'index'])->name('user_groups.index');
Route::get('/user_groups/create', [UserGroupController::class, 'create'])->name('user_groups.create');
Route::post('/user_groups', [UserGroupController::class, 'store'])->name('user_groups.store');
Route::get('/user_groups/{user_group}', [UserGroupController::class, 'show'])->name('user_groups.show');
Route::get('/user_groups/{user_group}/edit', [UserGroupController::class, 'edit'])->name('user_groups.edit');
Route::put('/user_groups/{user_group}', [UserGroupController::class, 'update'])->name('user_groups.update');
Route::delete('/user_groups/{user_group}', [UserGroupController::class, 'destroy'])->name('user_groups.destroy');

// Route::post('/user_groups/{userGroup}/add_user', [UserGroupController::class, 'addUser'])->name('user_groups.add_user');

Route::get('/users/search', [UserController::class, 'search'])->name('users.search');

Route::get('/user_groups/{groupId}/add_user', [UserGroupController::class, 'addUserForm'])->name('user_groups.add_user_form');
Route::post('/user_groups/{groupId}/add_user', [UserGroupController::class, 'addUser'])->name('user_groups.add_user');
Route::get('/user_groups/{groupId}/remove_user/{userId}', [UserGroupController::class, 'removeUser'])->name('user_groups.remove_user');


Route::resource('permission_groups', PermissionGroupController::class);

Route::get('/permission_groups/{group}/add_permissions', [PermissionGroupController::class, 'addPermissions'])
    ->name('permission_groups.add_permissions');

Route::post('/permission_groups/{group}/store_permissions', [PermissionGroupController::class, 'storePermissions'])
        ->name('permission_groups.store_permissions');

Route::delete('/permission_groups/{group}/remove_permission/{permission}', [PermissionGroupController::class, 'removePermission'])
        ->name('permission_groups.remove_permission');

});


// Route to show the sign-up form
Route::get('/signup', [SignUpController::class, 'showSignUpForm'])->name('signup');

// Route to handle form submission for user registration
Route::post('/signup', [SignUpController::class, 'processSignUp'])->name('processSignUp');


// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/home', function () {
//     return view('home');
// });


// Route for the dashboard (assuming you already have a HomeController)
Route::get('/', [DashboardController::class, 'home'])->name('home');

// Route::get('/lang/{locale}', function ($locale) {
//     App::setLocale($locale);
//     return redirect()->back();
// });

// Route::get('/lang/{locale}', function ($locale) {

//     App::setLocale($locale);
//     return redirect()->back();
// })->name('switch.language');

Route::middleware('locale')->group(function () {
    // Your routes that need language switching
    Route::get('/lang/{locale}', function ($locale) {

        App::setLocale($locale);
        return redirect()->back();
    })->name('switch.language');
});
