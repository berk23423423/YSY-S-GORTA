<?php
require_once __DIR__ . '/includes/header.php';
$branchFile = __DIR__ . '/data/branches.json';
$branches = file_exists($branchFile) ? json_decode(file_get_contents($branchFile), true) : [];
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; text-align: center; }
.page-hero h1 { font-size: clamp(2rem,4vw,3rem); margin-bottom: .7rem; }
.page-hero p { color: rgba(255,255,255,.8); }

.branches-section { padding: 80px 0; background: var(--light); }
.branches-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px,1fr)); gap: 1.8rem; }
.branch-card { background: #fff; border-radius: 18px; padding: 2rem; border: 1.5px solid var(--lgray); transition: all .25s; }
.branch-card:hover { border-color: var(--blue); box-shadow: var(--shadow); transform: translateY(-4px); }
.branch-header { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 1.2rem; border-bottom: 1px solid var(--lgray); }
.branch-icon { width: 50px; height: 50px; background: rgba(20,80,163,.08); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--blue); font-size: 1.3rem; }
.branch-header h3 { font-size: 1.1rem; color: var(--navy); font-family: 'DM Sans',sans-serif; font-weight: 700; }
.branch-info { display: flex; flex-direction: column; gap: .9rem; }
.branch-info-item { display: flex; gap: .8rem; align-items: flex-start; }
.branch-info-item i { color: var(--blue); font-size: .95rem; margin-top: 3px; flex-shrink: 0; width: 16px; }
.branch-info-item span, .branch-info-item a { font-size: .9rem; color: var(--gray); line-height: 1.5; }
.branch-info-item a { color: var(--navy); font-weight: 600; }
.branch-info-item a:hover { color: var(--blue); }
.branch-cta { margin-top: 1.5rem; display: flex; gap: .7rem; flex-wrap: wrap; }
.branch-btn { display: inline-flex; align-items: center; gap: .4rem; padding: .55rem 1.1rem; border-radius: 8px; font-size: .85rem; font-weight: 600; transition: all .2s; }
.branch-btn.primary { background: var(--gradient); color: #fff; }
.branch-btn.secondary { border: 1.5px solid var(--lgray); color: var(--navy); }
.branch-btn:hover { transform: translateY(-1px); }
</style>

<div class="page-hero">
  <h1>Şubelerimiz</h1>
  <p>Size en yakın şubemizi bulun</p>
</div>

<section class="branches-section">
  <div class="container">
    <?php if(empty($branches)): ?>
    <div style="text-align:center;padding:4rem;color:var(--gray);">
      <i class="fas fa-map-marker-alt" style="font-size:3rem;margin-bottom:1rem;display:block;color:var(--lgray)"></i>
      <p>Şube bilgileri yakında eklenecektir.</p>
    </div>
    <?php else: ?>
    <div class="branches-grid">
      <?php foreach($branches as $branch): ?>
      <div class="branch-card reveal">
        <div class="branch-header">
          <div class="branch-icon"><i class="fas fa-map-marker-alt"></i></div>
          <h3><?= htmlspecialchars($branch['name']) ?></h3>
        </div>
        <div class="branch-info">
          <div class="branch-info-item">
            <i class="fas fa-location-dot"></i>
            <span><?= htmlspecialchars($branch['address']) ?></span>
          </div>
          <?php if(!empty($branch['phone'])): ?>
          <div class="branch-info-item">
            <i class="fas fa-phone"></i>
            <a href="tel:<?= preg_replace('/\s+/','',$branch['phone']) ?>"><?= htmlspecialchars($branch['phone']) ?></a>
          </div>
          <?php endif; ?>
          <?php if(!empty($branch['email'])): ?>
          <div class="branch-info-item">
            <i class="fas fa-envelope"></i>
            <a href="mailto:<?= htmlspecialchars($branch['email']) ?>"><?= htmlspecialchars($branch['email']) ?></a>
          </div>
          <?php endif; ?>
          <?php if(!empty($branch['hours'])): ?>
          <div class="branch-info-item">
            <i class="fas fa-clock"></i>
            <span><?= htmlspecialchars($branch['hours']) ?></span>
          </div>
          <?php endif; ?>
        </div>
        <div class="branch-cta">
          <a href="tel:<?= preg_replace('/\s+/','',$branch['phone']??'') ?>" class="branch-btn primary"><i class="fas fa-phone"></i> Ara</a>
          <a href="https://wa.me/<?= preg_replace('/[^0-9]/','',$branch['phone']??'') ?>" target="_blank" class="branch-btn secondary"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          <?php if(!empty($branch['map_url'])): ?>
          <a href="<?= htmlspecialchars($branch['map_url']) ?>" target="_blank" class="branch-btn secondary"><i class="fas fa-map"></i> Harita</a>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
