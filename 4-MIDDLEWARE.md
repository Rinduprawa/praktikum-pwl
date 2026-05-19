## ROUTE WEB.PHP

```
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/register', [AuthController::class, 'register']);
});

AND

Route::get('/books', [BookController::class, 'index'])->middleware('auth', 'role:user');
Route::post('/books', [BookController::class, 'store'])->middleware('auth', 'role:user');
Route::put('/books/{id}', [BookController::class, 'update'])->middleware('auth', 'role:user');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->middleware('auth', 'role:user');
OR
Route::middleware('auth', 'role:user')->prefix('books')->->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'store']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'destroy']);
});
```

## MAKE MIDDLEWARE

```
php artisan make:middleware RoleMiddleware
```

## HANDLE FUNCTION

```
public function handle(Request $request, Closure $next, string $role)
{
    if (!auth()->check() || auth()->user()->role !== $role) {
        abort(403, 'Unauthorized');
    }
    return $next($request);
}
```

## DAFTAR KE BOOTSTRAP

```
->withMiddleware(function (Middleware $middleware) {
    $middleware->redirectGuestsTo('/');
    $middleware->redirectUsersTo('/books');
    $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ]);
})
```
