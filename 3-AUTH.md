## ROUTE WEB.PHP

```
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
```

## BOOKS/INDEX

```
<form action="/logout" method="POST" style="display:inline">
    @csrf
    <button type="submit">Logout</button>
</form>
```

## WELCOME BLADE

```
<!DOCTYPE html>
<html >
<head>
    <title>Auth</title>
</head>
<body>

    <h2>Login</h2>

    @if(session('error_login'))
        <p style="color:red">{{ session('error_login') }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <button type="submit">Login</button>
    </form>

    <hr>

    <h2>Register</h2>

    @if(session('success_register'))
        <p style="color:green">{{ session('success_register') }}</p>
    @endif

    <form action="/register" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <button type="submit">Register</button>
    </form>

</body>
</html>
```
