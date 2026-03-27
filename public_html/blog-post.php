<?php
$posts_file = __DIR__ . '/data/posts.json';
$posts = file_exists($posts_file) ? json_decode(file_get_contents($posts_file), true) : [];

$slug = $_GET['slug'] ?? '';
$post = null;
foreach ($posts as $p) {
    if ($p['id'] === $slug && !empty($p['published'])) {
        $post = $p;
        break;
    }
}

if (!$post) {
    http_response_code(404);
    echo '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Not Found</title></head><body><h1>404 - Post Not Found</h1><p><a href="blog.php">Back to blog</a></p></body></html>';
    exit;
}

$title = htmlspecialchars($post['title']);
$category = htmlspecialchars($post['category'] ?? '');
$summary = htmlspecialchars($post['summary'] ?? '');
$date = htmlspecialchars($post['date'] ?? '');
$content = $post['content'] ?? '';
$url = 'https://gasproinspectors.com/blog-post.php?slug=' . urlencode($post['id']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> | Gas Pro Inspectors</title>
    <meta name="description" content="<?= $summary ?>" />
    <link rel="canonical" href="<?= htmlspecialchars($url) ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />

    <!-- Schema: Article (auto-generated) -->
    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $post['title'],
        'description' => $post['summary'] ?? '',
        'url' => $url,
        'datePublished' => $post['date'] ?? '',
        'dateModified' => $post['date'] ?? '',
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Gas Pro Inspectors',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://gasproinspectors.com/assets/logo.png',
            ],
        ],
        'mainEntityOfPage' => $url,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
    </script>

    <style>
      .article-wrap { max-width: 860px; }
      .article-wrap h2 { font-size: 1.25rem; margin-top: 1.1rem; margin-bottom: 0.4rem; }
      .article-wrap p { margin: 0.65rem 0; color: #1f2937; }
      .article-wrap ul { margin: 0.35rem 0 0.9rem 1.2rem; }
      .article-wrap li { margin-bottom: 0.45rem; }
      .post-date { font-size: .82rem; color: #64748b; margin-bottom: .5rem; }
    </style>
  </head>
  <body>
    <a class="skip-link" href="#main-content">Skip to main content</a>

    <header class="site-header" id="top">
      <div class="container nav-wrap">
        <a class="brand" href="index.html#top" aria-label="Gas Pro Inspectors Home">
          <img
            class="brand-logo"
            src="assets/logo.png"
            alt="Gas Pro Inspectors logo"
            width="260"
            height="88"
          />
        </a>

        <button
          class="menu-toggle"
          type="button"
          aria-expanded="false"
          aria-controls="primary-nav"
          aria-label="Toggle navigation menu"
        >
          <span></span>
          <span></span>
          <span></span>
        </button>

        <nav id="primary-nav" class="site-nav" aria-label="Primary navigation">
          <ul>
            <li><a href="index.html#home">Home</a></li>
            <li><a href="index.html#about">About Us</a></li>
            <li><a href="index.html#law-152">Local Law 152</a></li>
            <li><a href="index.html#services">Services</a></li>
            <li><a href="index.html#ess">ESS</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="index.html#citywatch">CityWatch</a></li>
            <li><a href="index.html#contact">Contact</a></li>
          </ul>
        </nav>

        <a class="header-call" href="tel:+19293051232">(929) 305-1232</a>
      </div>
    </header>

    <main id="main-content">
      <section class="section">
        <div class="container article-wrap">
          <p class="eyebrow"><?= $category ?></p>
          <h1><?= $title ?></h1>
          <?php if ($date): ?>
            <p class="post-date">Published: <?= date('F j, Y', strtotime($post['date'])) ?></p>
          <?php endif; ?>
          <p class="citywatch-intro"><?= $summary ?></p>

          <?= $content ?>

          <p style="margin-top:2rem;">
            <a class="btn btn-primary" href="index.html#contact">Schedule Your Local Law 152 Inspection</a>
          </p>
          <p style="margin-top:1rem;">
            <a href="blog.php">&larr; Back to all posts</a>
          </p>
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="container footer-wrap">
        <p class="footer-brand">
          <img
            class="footer-logo"
            src="assets/logo.png"
            alt="Gas Pro Inspectors logo"
            width="182"
            height="62"
          />
          &copy; <?= date('Y') ?> Gas Pro Inspectors. Subsidiary of
          Environmental Safeguard Solutions LLC.
        </p>
        <a href="tel:+19293051232">(929) 305-1232</a>
      </div>
    </footer>

    <script src="script.js" defer></script>
  </body>
</html>
