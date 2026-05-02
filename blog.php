<?php
require_once __DIR__ . '/includes/header.php';
$blogFile = __DIR__ . '/data/blog.json';
$posts = file_exists($blogFile) ? json_decode(file_get_contents($blogFile), true) : [];
$posts = array_filter($posts, fn($p) => $p['published'] ?? true);
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; text-align: center; }
.page-hero h1 { font-size: clamp(2rem,4vw,3rem); margin-bottom: .7rem; }
.page-hero p { color: rgba(255,255,255,.8); }

.blog-section { padding: 80px 0; background: var(--light); }
.blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px,1fr)); gap: 2rem; }
.blog-card { background: #fff; border-radius: 18px; overflow: hidden; border: 1.5px solid var(--lgray); transition: all .25s; }
.blog-card:hover { border-color: var(--blue); box-shadow: var(--shadow); transform: translateY(-4px); }
.blog-thumb { width: 100%; height: 200px; object-fit: cover; background: var(--light); display: flex; align-items: center; justify-content: center; color: var(--lgray); font-size: 3rem; }
.blog-thumb img { width: 100%; height: 100%; object-fit: cover; }
.blog-body { padding: 1.5rem; }
.blog-cat { display: inline-block; background: rgba(20,80,163,.1); color: var(--blue); font-size: .72rem; font-weight: 700; padding: .25rem .75rem; border-radius: 50px; letter-spacing: .5px; text-transform: uppercase; margin-bottom: .8rem; }
.blog-body h3 { font-size: 1.05rem; color: var(--navy); margin-bottom: .6rem; line-height: 1.4; }
.blog-body p { font-size: .87rem; color: var(--gray); line-height: 1.7; margin-bottom: 1rem; }
.blog-meta { display: flex; justify-content: space-between; align-items: center; font-size: .8rem; color: var(--gray); }
.blog-read { color: var(--blue); font-weight: 600; font-size: .85rem; display: flex; align-items: center; gap: .3rem; }

.empty-state { text-align: center; padding: 4rem; color: var(--gray); }
.empty-state i { font-size: 3rem; color: var(--lgray); margin-bottom: 1rem; display: block; }
</style>

<div class="page-hero">
  <h1>Blog</h1>
  <p>Sigorta hakkında güncel bilgiler ve rehberler</p>
</div>

<section class="blog-section">
  <div class="container">
    <?php if(empty($posts)): ?>
    <div class="empty-state">
      <i class="fas fa-newspaper"></i>
      <p>Henüz blog yazısı bulunmamaktadır. Yakında eklenecektir.</p>
    </div>
    <?php else: ?>
    <div class="blog-grid">
      <?php foreach($posts as $post): ?>
      <article class="blog-card reveal">
        <div class="blog-thumb">
          <?php if(!empty($post['image']) && file_exists(__DIR__.'/'.$post['image'])): ?>
          <img src="/<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>">
          <?php else: ?>
          <i class="fas fa-newspaper" style="color:var(--lgray)"></i>
          <?php endif; ?>
        </div>
        <div class="blog-body">
          <span class="blog-cat"><?= htmlspecialchars($post['category'] ?? 'Genel') ?></span>
          <h3><?= htmlspecialchars($post['title']) ?></h3>
          <p><?= htmlspecialchars($post['excerpt'] ?? '') ?></p>
          <div class="blog-meta">
            <span><i class="far fa-calendar"></i> <?= htmlspecialchars($post['date'] ?? '') ?></span>
            <a href="/blog-post.php?id=<?= $post['id'] ?>" class="blog-read">Devamını Oku <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
