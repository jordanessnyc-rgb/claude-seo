<?php
require_once __DIR__ . '/auth.php';

if (is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if (check_password($password)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Admin | <?= SITE_NAME ?></title>
  <meta name="robots" content="noindex, nofollow">
  <style>
    * { box-sizing: border-box; }
    body { font-family: "Manrope", system-ui, sans-serif; background: #f1f5f9; margin: 0; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
    .login-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; width: 100%; max-width: 380px; box-shadow: 0 8px 24px rgba(15,23,42,.06); }
    h1 { font-size: 1.3rem; margin: 0 0 1.2rem; color: #0f172a; }
    label { display: block; font-weight: 650; margin-bottom: .3rem; font-size: .9rem; }
    input[type="password"] { width: 100%; padding: .7rem; border: 1px solid #cbd5e1; border-radius: 10px; font: inherit; margin-bottom: 1rem; }
    input:focus { outline: 2px solid rgba(37,99,235,.15); border-color: #2563eb; }
    button { width: 100%; padding: .75rem; background: #2563eb; color: #fff; border: none; border-radius: 999px; font-weight: 700; font-size: .95rem; cursor: pointer; }
    button:hover { background: #1d4ed8; }
    .error { color: #b91c1c; font-size: .85rem; margin-bottom: .75rem; }
    .back { display: block; text-align: center; margin-top: 1rem; font-size: .85rem; color: #64748b; text-decoration: none; }
    .back:hover { color: #2563eb; }
  </style>
</head>
<body>
  <div class="login-box">
    <h1>Blog Admin</h1>
    <?php if ($error): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required autofocus>
      <button type="submit">Log In</button>
    </form>
    <a class="back" href="/">Back to site</a>
  </div>
</body>
</html>
