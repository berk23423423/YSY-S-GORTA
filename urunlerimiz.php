<?php
require_once __DIR__ . '/includes/header.php';

// Ürünleri JSON'dan oku
$productFile = __DIR__ . '/data/products.json';
$allRaw = file_exists($productFile) ? json_decode(file_get_contents($productFile), true) : [];

// Sadece aktif ürünleri al, kategoriye göre grupla
$grouped = [];
$catMeta = []; // kategori label + icon bilgisi
foreach ($allRaw as $p) {
    if (!($p['active'] ?? true)) continue;
    $cat = $p['category'];
    $grouped[$cat][] = $p;
    if (!isset($catMeta[$cat])) {
        $catMeta[$cat] = ['label' => $p['cat_label'] ?? $cat, 'icon' => $p['cat_icon'] ?? 'fa-circle'];
    }
}
// Her kategoride sıraya göre sırala
foreach ($grouped as &$g) {
    usort($g, fn($a,$b) => ($a['order']??99) - ($b['order']??99));
}
unset($g);

$firstCat = array_key_first($grouped) ?? 'arac';
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; text-align: center; }
.page-hero h1 { font-size: clamp(2rem,4vw,3rem); margin-bottom: .7rem; }
.page-hero p { color: rgba(255,255,255,.8); }

.products-full { padding: 80px 0; background: var(--light); }
.products-tabs { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 3rem; }
.tab-btn { padding: .65rem 1.4rem; border-radius: 8px; border: 1.5px solid var(--lgray); background: #fff; cursor: pointer; font-size: .9rem; font-weight: 500; font-family: 'DM Sans',sans-serif; color: var(--gray); transition: all .2s; display: flex; align-items: center; gap: .5rem; }
.tab-btn:hover { border-color: var(--blue); color: var(--blue); }
.tab-btn.active { background: var(--gradient); border-color: transparent; color: #fff; box-shadow: 0 4px 14px rgba(20,80,163,.3); }
.tab-panel { display: none; }
.tab-panel.active { display: block; animation: fadeIn .3s ease; }
@keyframes fadeIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.4rem; }
.product-card { background: #fff; border-radius: var(--radius); padding: 2rem; border: 1.5px solid var(--lgray); transition: all .25s; display: flex; flex-direction: column; gap: .9rem; }
.product-card:hover { border-color: var(--blue); box-shadow: 0 8px 24px rgba(20,80,163,.12); transform: translateY(-4px); }
.product-icon { width: 52px; height: 52px; background: rgba(20,80,163,.08); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; color: var(--blue); }
.product-card h4 { font-size: 1rem; color: var(--navy); font-family: 'DM Sans',sans-serif; font-weight: 600; }
.product-card p { font-size: .88rem; color: var(--gray); line-height: 1.7; }
.product-link { display: inline-flex; align-items: center; gap: .4rem; background: var(--gradient); color: #fff; padding: .55rem 1.2rem; border-radius: 8px; font-size: .85rem; font-weight: 600; margin-top: auto; transition: transform .2s; }
.product-link:hover { transform: translateY(-1px); }
.empty-cat { padding: 3rem; text-align: center; color: var(--gray); }
.empty-cat i { font-size: 2.5rem; color: var(--lgray); display: block; margin-bottom: 1rem; }
</style>

<div class="page-hero">
  <h1>Ürünlerimiz</h1>
  <p>Her ihtiyaca uygun sigorta çözümleri</p>
</div>

<section class="products-full">
  <div class="container">

    <?php if (empty($grouped)): ?>
    <div class="empty-cat">
      <i class="fas fa-box-open"></i>
      <p>Henüz ürün eklenmemiş. Yakında eklenecektir.</p>
    </div>
    <?php else: ?>

    <!-- Kategori Sekmeleri -->
    <div class="products-tabs reveal">
      <?php $first = true; foreach ($grouped as $catKey => $items): $meta = $catMeta[$catKey]; ?>
      <button class="tab-btn <?= $first?'active':'' ?>" onclick="switchTab(this,'cat-<?= $catKey ?>')">
        <i class="fas <?= htmlspecialchars($meta['icon']) ?>"></i>
        <?= htmlspecialchars($meta['label']) ?>
      </button>
      <?php $first = false; endforeach; ?>
    </div>

    <!-- Ürün Panelleri -->
    <?php $first = true; foreach ($grouped as $catKey => $items): ?>
    <div class="tab-panel <?= $first?'active':'' ?>" id="cat-<?= $catKey ?>">
      <div class="products-grid">
        <?php foreach ($items as $p): ?>
        <div class="product-card">
          <div class="product-icon"><i class="fas <?= htmlspecialchars($p['icon']) ?>"></i></div>
          <h4><?= htmlspecialchars($p['title']) ?></h4>
          <p><?= htmlspecialchars($p['desc']) ?></p>
          <a href="https://wa.me/<?= $cfg['whatsapp'] ?? '' ?>?text=<?= urlencode('Merhaba, ' . $p['title'] . ' sigortası hakkında bilgi almak ve teklif istemek istiyorum.') ?>" target="_blank" class="product-link">Teklif Al <i class="fab fa-whatsapp"></i></a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php $first = false; endforeach; ?>

    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<script>
function switchTab(btn, tabId) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById(tabId).classList.add('active');
}
</script>
