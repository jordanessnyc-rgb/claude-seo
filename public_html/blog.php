<?php
$posts_file = __DIR__ . '/data/posts.json';
$posts = file_exists($posts_file) ? json_decode(file_get_contents($posts_file), true) : [];
// Show only published posts, sorted by date descending
$posts = array_filter($posts, fn($p) => !empty($p['published']));
usort($posts, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog | Gas Pro Inspectors</title>
    <meta
      name="description"
      content="Read Gas Pro Inspectors insights on NYC Local Law 152, gas piping inspections, GPS-1 and GPS-2 filings, and compliance planning."
    />
    <link rel="canonical" href="https://gasproinspectors.com/blog.php" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
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
            <li><a href="blog.php" aria-current="page">Blog</a></li>
            <li><a href="index.html#citywatch">CityWatch</a></li>
            <li><a href="index.html#contact">Contact</a></li>
          </ul>
        </nav>

        <a class="header-call" href="tel:+19293051232">(929) 305-1232</a>
      </div>
    </header>

    <main id="main-content">
      <section class="section">
        <div class="container">
          <div class="section-head">
            <p class="eyebrow">Blog</p>
            <h1>Local Law 152 &amp; NYC Compliance Insights</h1>
            <p class="citywatch-intro">
              Practical articles from Gas Pro Inspectors and Environmental Safeguard Solutions LLC to help owners and property managers stay compliant.
            </p>
          </div>

          <div class="blog-grid">
            <?php if (empty($posts)): ?>
              <p>No posts yet. Check back soon!</p>
            <?php else: ?>
              <?php foreach ($posts as $post): ?>
                <article class="blog-card">
                  <p class="blog-meta"><?= htmlspecialchars($post['category'] ?? '') ?></p>
                  <h3><?= htmlspecialchars($post['title']) ?></h3>
                  <p><?= htmlspecialchars($post['summary'] ?? '') ?></p>
                  <a href="blog-post.php?slug=<?= urlencode($post['id']) ?>">Read Full Article</a>
                </article>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
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
