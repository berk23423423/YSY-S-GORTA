<?php
require_once __DIR__ . '/includes/header.php';
$blogFile = __DIR__ . '/data/blog.json';
$posts = file_exists($blogFile) ? json_decode(file_get_contents($blogFile), true) : [];
$id = (int)($_GET['id'] ?? 0);
$post = null;
foreach($posts as $p) {
    if($p['id'] == $id && ($p['published'] ?? true)) { $post = $p; break; }
}
if(!$post) { header('Location: /blog.php'); exit; }
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; }
.page-hero .breadcrumb { font-size: .85rem; color: rgba(255,255,255,.7); margin-bottom: 1rem; }
.page-hero .breadcrumb a { color: rgba(255,255,255,.7); }
.page-hero .breadcrumb a:hover { color: var(--accent); }
.page-hero h1 { font-size: clamp(1.8rem,3.5vw,2.5rem); margin-bottom: .7rem; max-width: 800px; }
.page-hero .post-meta { display: flex; gap: 1.5rem; color: rgba(255,255,255,.7); font-size: .85rem; flex-wrap: wrap; }
.post-section { padding: 60px 0; background: #fff; }
.post-container { max-width: 800px; margin: 0 auto; padding: 0 2rem; }
.post-thumb { width: 100%; border-radius: 16px; margin-bottom: 2rem; max-height: 420px; object-fit: cover; }
.post-content { font-size: 1.02rem; line-height: 1.9; color: var(--navy); }
.post-content p { margin-bottom: 1.2rem; }
.post-content h2 { font-size: 1.5rem; margin: 2rem 0 .8rem; }
.back-link { display: inline-flex; align-items: center; gap: .5rem; color: var(--blue); font-weight: 600; margin-bottom: 2rem; }
.back-link:hover { text-decoration: underline; }
</style>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="/index.php">Ana Sayfa</a> / <a href="/blog.php">Blog</a> / <?= htmlspecialchars($post['category'] ?? '') ?>
    </div>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <div class="post-meta">
      <span><i class="far fa-calendar"></i> <?= htmlspecialchars($post['date'] ?? '') ?></span>
      <span><i class="fas fa-tag"></i> <?= htmlspecialchars($post['category'] ?? '') ?></span>
    </div>
  </div>
</div>

<section class="post-section">
  <div class="post-container">
    <a href="/blog.php" class="back-link"><i class="fas fa-arrow-left"></i> Blog'a Dön</a>
    <?php if(!empty($post['image']) && file_exists(__DIR__.'/'.$post['image'])): ?>
    <img src="/<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="post-thumb">
    <?php endif; ?>
    <div class="post-content">
      <?= nl2br(htmlspecialchars($post['content'] ?? '')) ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
