<?php
require_once __DIR__ . '/config.php';

session_start();

function is_logged_in(): bool {
    if (empty($_SESSION['logged_in']) || empty($_SESSION['login_time'])) {
        return false;
    }
    if (time() - $_SESSION['login_time'] > SESSION_TIMEOUT) {
        session_destroy();
        return false;
    }
    return true;
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: index.php');
        exit;
    }
}

function check_password(string $password): bool {
    return password_verify($password, ADMIN_PASSWORD_HASH);
}

function generate_csrf(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(string $token): bool {
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function load_posts(): array {
    if (!file_exists(POSTS_FILE)) {
        return [];
    }
    $json = file_get_contents(POSTS_FILE);
    return json_decode($json, true) ?: [];
}

function save_posts(array $posts): bool {
    $dir = dirname(POSTS_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return file_put_contents(POSTS_FILE, json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
}

function find_post(array $posts, string $id): ?array {
    foreach ($posts as $post) {
        if ($post['id'] === $id) {
            return $post;
        }
    }
    return null;
}

function slugify(string $text): string {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', $text);
    return trim($text, '-');
}
