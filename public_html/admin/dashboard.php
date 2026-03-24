<?php
require_once __DIR__ . '/auth.php';
require_login();

$csrf = generate_csrf();
$posts = load_posts();
$action = $_GET['action'] ?? 'list';
$edit_id = $_GET['id'] ?? '';
$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        $message = 'Invalid form submission. Please try again.';
    } else {
        $post_action = $_POST['post_action'] ?? '';

        if ($post_action === 'save') {
            $id = $_POST['id'] ?? '';
            $title = trim($_POST['title'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $summary = trim($_POST['summary'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $date = $_POST['date'] ?? date('Y-m-d');
            $published = isset($_POST['published']);

            if (empty($title)) {
                $message = 'Title is required.';
            } else {
                $new_post = [
                    'id' => $id ?: slugify($title),
                    'title' => $title,
                    'category' => $category,
                    'summary' => $summary,
                    'content' => $content,
                    'date' => $date,
                    'published' => $published,
                ];

                // Ensure unique ID
                if (empty($id)) {
                    $base_id = $new_post['id'];
                    $counter = 1;
                    while (find_post($posts, $new_post['id'])) {
                        $new_post['id'] = $base_id . '-' . $counter;
                        $counter++;
                    }
                    $posts[] = $new_post;
                    $message = 'Post created.';
                } else {
                    foreach ($posts as &$p) {
                        if ($p['id'] === $id) {
                            $p = $new_post;
                            break;
                        }
                    }
                    unset($p);
                    $message = 'Post updated.';
                }

                save_posts($posts);
                header('Location: dashboard.php?message=' . urlencode($message));
                exit;
            }
        }

        if ($post_action === 'delete') {
            $delete_id = $_POST['delete_id'] ?? '';
            $posts = array_values(array_filter($posts, fn($p) => $p['id'] !== $delete_id));
            save_posts($posts);
            header('Location: dashboard.php?message=' . urlencode('Post deleted.'));
            exit;
        }
    }
}

$message = $message ?: ($_GET['message'] ?? '');
$edit_post = null;
if ($action === 'edit' && $edit_id) {
    $edit_post = find_post($posts, $edit_id);
    if (!$edit_post) {
        $action = 'list';
        $message = 'Post not found.';
    }
}
if ($action === 'new') {
    $edit_post = ['id' => '', 'title' => '', 'category' => '', 'summary' => '', 'content' => '', 'date' => date('Y-m-d'), 'published' => true];
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Blog Admin</title>
  <meta name="robots" content="noindex, nofollow">
  <style>
    * { box-sizing: border-box; }
    body { font-family: "Manrope", system-ui, sans-serif; background: #f1f5f9; margin: 0; color: #0f172a; }
    .topbar { background: #0f172a; color: #fff; padding: .75rem 0; }
    .topbar .inner { max-width: 960px; margin: 0 auto; padding: 0 1rem; display: flex; justify-content: space-between; align-items: center; }
    .topbar a { color: #93c5fd; text-decoration: none; font-size: .85rem; }
    .topbar a:hover { color: #fff; }
    .topbar h1 { font-size: 1rem; margin: 0; }
    .wrap { max-width: 960px; margin: 1.5rem auto; padding: 0 1rem; }
    .msg { background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; padding: .6rem 1rem; border-radius: 8px; margin-bottom: 1rem; font-size: .9rem; }
    .btn { display: inline-flex; align-items: center; padding: .5rem 1rem; border: none; border-radius: 999px; font-weight: 700; font-size: .85rem; cursor: pointer; text-decoration: none; }
    .btn-primary { background: #2563eb; color: #fff; }
    .btn-primary:hover { background: #1d4ed8; }
    .btn-danger { background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; }
    .btn-danger:hover { background: #fecaca; }
    .btn-sm { padding: .3rem .7rem; font-size: .8rem; }
    table { width: 100%; border-collapse: collapse; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 24px rgba(15,23,42,.06); }
    th, td { text-align: left; padding: .7rem .85rem; border-bottom: 1px solid #e2e8f0; font-size: .9rem; }
    th { background: #f8fafc; font-size: .78rem; text-transform: uppercase; letter-spacing: .05em; color: #64748b; }
    .status { display: inline-block; padding: .15rem .5rem; border-radius: 999px; font-size: .75rem; font-weight: 700; }
    .status-pub { background: #dcfce7; color: #166534; }
    .status-draft { background: #fef3c7; color: #92400e; }
    .actions { display: flex; gap: .4rem; }
    /* Form */
    .form-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; box-shadow: 0 8px 24px rgba(15,23,42,.06); }
    .field { margin-bottom: 1rem; }
    .field label { display: block; font-weight: 650; margin-bottom: .3rem; font-size: .9rem; }
    .field input, .field textarea, .field select { width: 100%; padding: .6rem; border: 1px solid #cbd5e1; border-radius: 10px; font: inherit; }
    .field input:focus, .field textarea:focus { outline: 2px solid rgba(37,99,235,.15); border-color: #2563eb; }
    .field textarea { min-height: 300px; font-family: monospace; font-size: .85rem; }
    .checkbox-field { display: flex; align-items: center; gap: .5rem; }
    .checkbox-field input { width: auto; }
    .form-actions { display: flex; gap: .5rem; margin-top: 1rem; }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="inner">
      <h1>Blog Admin</h1>
      <div>
        <a href="/">View Site</a>
        &nbsp;&middot;&nbsp;
        <a href="dashboard.php?action=logout">Logout</a>
      </div>
    </div>
  </div>

  <div class="wrap">
    <?php if ($message): ?>
      <div class="msg"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($action === 'list'): ?>
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
        <h2 style="margin:0;">Posts (<?= count($posts) ?>)</h2>
        <a href="dashboard.php?action=new" class="btn btn-primary">+ New Post</a>
      </div>

      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($posts)): ?>
            <tr><td colspan="5" style="text-align:center;color:#64748b;padding:2rem;">No posts yet. Create your first one!</td></tr>
          <?php else: ?>
            <?php foreach ($posts as $post): ?>
              <tr>
                <td><strong><?= htmlspecialchars($post['title']) ?></strong></td>
                <td><?= htmlspecialchars($post['category'] ?? '') ?></td>
                <td><?= htmlspecialchars($post['date'] ?? '') ?></td>
                <td>
                  <?php if ($post['published'] ?? false): ?>
                    <span class="status status-pub">Published</span>
                  <?php else: ?>
                    <span class="status status-draft">Draft</span>
                  <?php endif; ?>
                </td>
                <td class="actions">
                  <a href="dashboard.php?action=edit&id=<?= urlencode($post['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                  <form method="post" style="margin:0;" onsubmit="return confirm('Delete this post?');">
                    <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
                    <input type="hidden" name="post_action" value="delete">
                    <input type="hidden" name="delete_id" value="<?= htmlspecialchars($post['id']) ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

    <?php elseif ($action === 'new' || $action === 'edit'): ?>
      <h2 style="margin-bottom:1rem;"><?= $action === 'new' ? 'New Post' : 'Edit Post' ?></h2>
      <div class="form-card">
        <form method="post">
          <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
          <input type="hidden" name="post_action" value="save">
          <input type="hidden" name="id" value="<?= htmlspecialchars($edit_post['id']) ?>">

          <div class="field">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($edit_post['title']) ?>" required>
          </div>

          <div class="field">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="<?= htmlspecialchars($edit_post['category']) ?>" placeholder="e.g. Local Law 152, DOB Filing, CityWatch">
          </div>

          <div class="field">
            <label for="summary">Summary (shown on blog listing)</label>
            <input type="text" id="summary" name="summary" value="<?= htmlspecialchars($edit_post['summary']) ?>">
          </div>

          <div class="field">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="<?= htmlspecialchars($edit_post['date']) ?>">
          </div>

          <div class="field">
            <label for="content">Content (HTML)</label>
            <textarea id="content" name="content"><?= htmlspecialchars($edit_post['content']) ?></textarea>
            <p style="font-size:.78rem;color:#64748b;margin-top:.3rem;">Use HTML tags: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;, &lt;a href="..."&gt;</p>
          </div>

          <div class="field checkbox-field">
            <input type="checkbox" id="published" name="published" <?= ($edit_post['published'] ?? false) ? 'checked' : '' ?>>
            <label for="published" style="margin:0;">Published</label>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Post</button>
            <a href="dashboard.php" class="btn" style="background:#f1f5f9;color:#475569;">Cancel</a>
          </div>
        </form>
      </div>

    <?php elseif ($action === 'logout'): ?>
      <?php session_destroy(); header('Location: index.php'); exit; ?>
    <?php endif; ?>
  </div>
</body>
</html>
