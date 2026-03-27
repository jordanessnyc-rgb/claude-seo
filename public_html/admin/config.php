<?php
// Blog CMS Configuration
// Change password: run php -r "echo password_hash('YOUR_NEW_PASSWORD', PASSWORD_BCRYPT);"
// Then replace the hash below.

define('ADMIN_PASSWORD_HASH', '$2y$12$of/e3P6rd8qkTodIX5q9HulcT9aEelww8yAS4xdUdC3J/mLsHgWVW');
define('SITE_NAME', 'Gas Pro Inspectors');
define('SITE_URL', 'https://gasproinspectors.com');
define('POSTS_FILE', __DIR__ . '/../data/posts.json');
define('SESSION_TIMEOUT', 3600); // 1 hour
