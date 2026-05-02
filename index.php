<?php
require_once __DIR__ . '/includes/header.php';
?>
<style>
/* ===== HERO ===== */
.hero { min-height: calc(100vh - 70px); background: var(--gradient); position: relative; display: flex; align-items: center; overflow: hidden; }
.hero::before { content: ''; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); pointer-events: none; }
.hero-circle { position: absolute; border-radius: 50%; opacity: .08; background: #fff; }
.hero-circle.c1 { width: 500px; height: 500px; top: -100px; right: -100px; }
.hero-circle.c2 { width: 300px; height: 300px; bottom: -50px; left: 10%; animation: float 6s ease-in-out infinite; }
.hero-circle.c3 { width: 150px; height: 150px; top: 30%; right: 20%; animation: float 4s ease-in-out infinite reverse; }
@keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }
.hero-inner { max-width: 1240px; margin: 0 auto; padding: 5rem 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; position: relative; z-index: 1; }
.hero-content { color: #fff; }
.hero-badge { display: inline-flex; align-items: center; gap: .5rem; background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.2); color: var(--accent); padding: .4rem 1rem; border-radius: 50px; font-size: .8rem; font-weight: 600; margin-bottom: 1.5rem; backdrop-filter: blur(10px); }
.hero h1 { font-size: clamp(2.2rem, 4vw, 3.2rem); line-height: 1.15; margin-bottom: 1.2rem; font-weight: 900; }
.hero h1 span { color: var(--accent); }
.hero p { font-size: 1.05rem; line-height: 1.8; color: rgba(255,255,255,.8); margin-bottom: 2rem; max-width: 480px; }
.hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
.btn-primary { background: var(--accent); color: var(--navy); font-weight: 700; padding: .85rem 2rem; border-radius: 10px; font-size: .95rem; transition: transform .2s, box-shadow .2s; box-shadow: 0 4px 16px rgba(232,160,32,.4); display: inline-flex; align-items: center; gap: .5rem; }
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(232,160,32,.5); }
.btn-secondary { background: rgba(255,255,255,.12); border: 1.5px solid rgba(255,255,255,.4); color: #fff; font-weight: 600; padding: .85rem 2rem; border-radius: 10px; font-size: .95rem; backdrop-filter: blur(10px); transition: background .2s; display: inline-flex; align-items: center; gap: .5rem; }
.btn-secondary:hover { background: rgba(255,255,255,.2); }
.hero-stats { display: flex; gap: 2rem; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,.15); flex-wrap: wrap; }
.stat-item { text-align: center; }
.stat-num { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 900; color: var(--accent); }
.stat-label { font-size: .75rem; color: rgba(255,255,255,.65); text-transform: uppercase; letter-spacing: .5px; margin-top: .2rem; }
.hero-card { background: rgba(255,255,255,.1); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,.2); border-radius: 20px; padding: 2rem; color: #fff; }
.hero-card h3 { font-size: 1.1rem; margin-bottom: 1.2rem; color: var(--accent); }
.hero-card-list { display: flex; flex-direction: column; gap: .8rem; }
.hero-card-item { display: flex; align-items: center; gap: 1rem; padding: .85rem 1rem; background: rgba(255,255,255,.08); border-radius: 10px; border: 1px solid rgba(255,255,255,.1); cursor: pointer; transition: background .2s; }
.hero-card-item:hover { background: rgba(255,255,255,.15); }
.hero-card-icon { width: 40px; height: 40px; background: var(--accent); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: var(--navy); flex-shrink: 0; }
.hero-card-item span { font-size: .9rem; font-weight: 500; }
.hero-card-arrow { margin-left: auto; opacity: .5; }

/* BRANDS */
.brands { background: var(--light); padding: 50px 0; }
.brands-label { text-align: center; font-size: .8rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--gray); margin-bottom: 2rem; font-weight: 600; }
.brands-track { display: flex; gap: 3rem; align-items: center; justify-content: center; flex-wrap: wrap; opacity: .55; filter: grayscale(1); }
.brand-item { font-family: 'Playfair Display', serif; font-size: 1.05rem; font-weight: 700; color: var(--navy); padding: .5rem 1rem; border: 1.5px solid var(--lgray); border-radius: 8px; }

/* HOW IT WORKS */
.how { background: #fff; }
.steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; }
.step-card { text-align: center; padding: 2.5rem 1.5rem; border-radius: var(--radius); border: 1.5px solid var(--lgray); position: relative; transition: border-color .3s, box-shadow .3s, transform .3s; overflow: hidden; }
.step-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gradient); transform: scaleX(0); transform-origin: left; transition: transform .3s; }
.step-card:hover { border-color: transparent; box-shadow: var(--shadow); transform: translateY(-4px); }
.step-card:hover::before { transform: scaleX(1); }
.step-num { width: 56px; height: 56px; background: var(--gradient); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; margin: 0 auto 1.2rem; }
.step-card h4 { font-size: 1rem; color: var(--navy); margin-bottom: .5rem; }
.step-card p { font-size: .88rem; color: var(--gray); line-height: 1.6; }

/* PRODUCTS */
.products { background: var(--light); }
.products-tabs { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 2.5rem; }
.tab-btn { padding: .6rem 1.2rem; border-radius: 8px; border: 1.5px solid var(--lgray); background: #fff; cursor: pointer; font-size: .88rem; font-weight: 500; font-family: 'DM Sans', sans-serif; color: var(--gray); transition: all .2s; display: flex; align-items: center; gap: .5rem; }
.tab-btn:hover { border-color: var(--blue); color: var(--blue); }
.tab-btn.active { background: var(--gradient); border-color: transparent; color: #fff; box-shadow: 0 4px 14px rgba(20,80,163,.3); }
.tab-panel { display: none; }
.tab-panel.active { display: block; animation: fadeIn .3s ease; }
@keyframes fadeIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1.2rem; }
.product-card { background: #fff; border-radius: var(--radius); padding: 1.8rem; border: 1.5px solid var(--lgray); transition: all .25s; cursor: pointer; display: flex; flex-direction: column; gap: .8rem; }
.product-card:hover { border-color: var(--blue); box-shadow: 0 8px 24px rgba(20,80,163,.12); transform: translateY(-3px); }
.product-icon { width: 48px; height: 48px; background: rgba(20,80,163,.08); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; color: var(--blue); }
.product-card h4 { font-size: .95rem; color: var(--navy); font-family: 'DM Sans', sans-serif; font-weight: 600; }
.product-card p { font-size: .82rem; color: var(--gray); line-height: 1.6; }
.product-link { font-size: .82rem; color: var(--blue); font-weight: 600; display: flex; align-items: center; gap: .3rem; margin-top: auto; }

/* WHY */
.why { background: #fff; }
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; }
.why-main-card { background: var(--gradient); border-radius: 20px; padding: 2.5rem; color: #fff; position: relative; overflow: hidden; }
.why-main-card::after { content: ''; position: absolute; right: -30px; top: -30px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255,255,255,.08); }
.why-main-card h3 { font-size: 1.5rem; margin-bottom: 1rem; position: relative; }
.why-main-card p { font-size: .9rem; color: rgba(255,255,255,.8); line-height: 1.7; position: relative; }
.why-features { display: flex; flex-direction: column; gap: 1.4rem; }
.why-item { display: flex; gap: 1.2rem; padding: 1.2rem 1.5rem; border-radius: 12px; border: 1.5px solid var(--lgray); transition: all .25s; }
.why-item:hover { border-color: var(--blue); box-shadow: 0 4px 16px rgba(20,80,163,.08); }
.why-item-icon { width: 46px; height: 46px; background: rgba(20,80,163,.08); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: var(--blue); flex-shrink: 0; }
.why-item h4 { font-size: .95rem; color: var(--navy); margin-bottom: .3rem; font-family: 'DM Sans', sans-serif; font-weight: 600; }
.why-item p { font-size: .85rem; color: var(--gray); line-height: 1.6; }

/* TEKLIF FORM */
.teklif { background: var(--light); }
.teklif-inner { display: grid; grid-template-columns: 1fr 1.2fr; gap: 4rem; align-items: start; }
.teklif-info h2 { font-size: clamp(1.8rem, 3vw, 2.3rem); margin-bottom: 1rem; }
.teklif-info p { color: var(--gray); line-height: 1.8; font-size: .95rem; margin-bottom: 2rem; }
.contact-items { display: flex; flex-direction: column; gap: 1rem; }
.contact-item { display: flex; gap: 1rem; align-items: center; padding: 1rem 1.2rem; background: #fff; border-radius: 12px; border: 1.5px solid var(--lgray); }
.contact-item-icon { width: 42px; height: 42px; background: rgba(20,80,163,.08); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--blue); font-size: 1rem; flex-shrink: 0; }
.contact-item h5 { font-size: .8rem; color: var(--gray); font-family: 'DM Sans',sans-serif; margin-bottom: .15rem; }
.contact-item a, .contact-item p { font-size: .92rem; color: var(--navy); font-weight: 600; }
.form-box { background: #fff; border-radius: 20px; padding: 2.5rem; box-shadow: var(--shadow); border: 1.5px solid var(--lgray); }
.form-box h3 { font-size: 1.3rem; margin-bottom: 1.5rem; color: var(--navy); }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.form-group { display: flex; flex-direction: column; gap: .5rem; }
.form-group.full { grid-column: 1 / -1; }
.form-group label { font-size: .82rem; font-weight: 600; color: var(--navy); }
.form-group input, .form-group select, .form-group textarea { padding: .75rem 1rem; border: 1.5px solid var(--lgray); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: .9rem; transition: border-color .2s; outline: none; color: var(--navy); }
.form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--blue); }
.form-group textarea { resize: vertical; min-height: 100px; }
.btn-submit { width: 100%; margin-top: 1rem; padding: 1rem; background: var(--gradient); color: #fff; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: transform .2s, box-shadow .2s; display: flex; align-items: center; justify-content: center; gap: .5rem; }
.btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(20,80,163,.35); }
.success-msg { display: none; margin-top: 1rem; padding: 1rem; background: #ecfdf5; border: 1px solid #6ee7b7; border-radius: 10px; color: #065f46; font-weight: 600; text-align: center; }

/* FAQ */
.faq { background: #fff; }
.faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.faq-item { border: 1.5px solid var(--lgray); border-radius: var(--radius); overflow: hidden; transition: border-color .2s; }
.faq-item.open { border-color: var(--blue); }
.faq-q { display: flex; justify-content: space-between; align-items: center; padding: 1.2rem 1.5rem; cursor: pointer; gap: 1rem; }
.faq-q h4 { font-size: .95rem; color: var(--navy); font-family: 'DM Sans', sans-serif; font-weight: 600; }
.faq-q i { color: var(--blue); transition: transform .3s; flex-shrink: 0; }
.faq-item.open .faq-q i { transform: rotate(180deg); }
.faq-a { display: none; padding: 0 1.5rem 1.2rem; font-size: .88rem; color: var(--gray); line-height: 1.7; }
.faq-item.open .faq-a { display: block; animation: fadeIn .3s ease; }

@media(max-width:900px) {
  .hero-inner { grid-template-columns: 1fr; }
  .hero-card-wrap { display: none; }
  .why-grid { grid-template-columns: 1fr; gap: 2rem; }
  .teklif-inner { grid-template-columns: 1fr; }
  .faq-grid { grid-template-columns: 1fr; }
}
</style>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-circle c1"></div>
  <div class="hero-circle c2"></div>
  <div class="hero-circle c3"></div>
  <div class="hero-inner">
    <div class="hero-content reveal">
      <div class="hero-badge"><i class="fas fa-certificate"></i> Lisanslı Sigorta Aracılık Hizmetleri</div>
      <h1><?= $cfg['hero_title'] ?? 'Sizi ve Değerlerinizi <span>Güvence Altına</span> Alıyoruz' ?></h1>
      <p><?= htmlspecialchars($cfg['hero_desc'] ?? '') ?></p>
      <div class="hero-btns">
        <a href="#teklif" class="btn-primary"><i class="fas fa-file-alt"></i> Hemen Teklif Al</a>
        <a href="/urunlerimiz.php" class="btn-secondary"><i class="fas fa-th-large"></i> Ürünlerimiz</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><div class="stat-num"><?= htmlspecialchars($cfg['stat1_num']??'5000+') ?></div><div class="stat-label"><?= htmlspecialchars($cfg['stat1_label']??'Mutlu Müşteri') ?></div></div>
        <div class="stat-item"><div class="stat-num"><?= htmlspecialchars($cfg['stat2_num']??'10') ?></div><div class="stat-label"><?= htmlspecialchars($cfg['stat2_label']??'Yıllık Deneyim') ?></div></div>
        <div class="stat-item"><div class="stat-num"><?= htmlspecialchars($cfg['stat3_num']??'50+') ?></div><div class="stat-label"><?= htmlspecialchars($cfg['stat3_label']??'Sigorta Ürünü') ?></div></div>
        <div class="stat-item"><div class="stat-num">7/24</div><div class="stat-label">Destek</div></div>
      </div>
    </div>
    <div class="hero-card-wrap reveal">
      <div class="hero-card">
        <h3><i class="fas fa-star" style="color:var(--accent)"></i> &nbsp;Popüler Sigorta Türleri</h3>
        <div class="hero-card-list">
          <?php
          $heroItems = [
            ['fa-car','Araç Sigortaları'],
            ['fa-heartbeat','Sağlık Sigortaları'],
            ['fa-home','Konut Sigortaları'],
            ['fa-heart','Hayat & Emeklilik'],
            ['fa-building','Diğer Sigortalar'],
          ];
          foreach($heroItems as $item): ?>
          <a href="https://wa.me/<?= $cfg['whatsapp']??'' ?>?text=<?= urlencode('Merhaba, ' . $item[1] . ' hakkında bilgi almak ve teklif istemek istiyorum.') ?>" target="_blank" class="hero-card-item">
            <div class="hero-card-icon"><i class="fas <?= $item[0] ?>"></i></div>
            <span><?= $item[1] ?></span>
            <i class="fas fa-chevron-right hero-card-arrow"></i>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BRANDS -->
<div class="brands">
  <div class="container">
    <p class="brands-label">Çalıştığımız Sigorta Şirketlerinden Bazıları</p>
    <div class="brands-track">
      <?php foreach(['Anadolu Sigorta','Türkiye Sigorta','Ray Sigorta','Sompo','Türk Nippon','Corpus'] as $b): ?>
      <div class="brand-item"><?= $b ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- HOW IT WORKS -->
<section class="how" id="nasil">
  <div class="container">
    <div class="section-header center reveal">
      <span class="section-tag">Nasıl Çalışır?</span>
      <h2 class="section-title">4 Kolay Adımda Sigorta</h2>
      <p class="section-sub">Sigorta sürecinizi mümkün olduğunca basit ve hızlı hale getiriyoruz.</p>
    </div>
    <div class="steps-grid reveal">
      <?php
      $steps = [
        ['İhtiyacınızı Belirleyin','Sigorta türleri arasından ihtiyacınıza en uygun ürünü seçin.'],
        ['Bize Ulaşın','Telefon, WhatsApp veya form aracılığıyla hemen iletişime geçin.'],
        ['Teklifinizi Alın','Size özel hazırladığımız avantajlı teklifi değerlendirin.'],
        ['Poliçenizi Tamamlayın','Kolayca poliçenizi oluşturun ve güvence altına alın.'],
      ];
      foreach($steps as $i => $s): ?>
      <div class="step-card">
        <div class="step-num"><?= $i+1 ?></div>
        <h4><?= $s[0] ?></h4>
        <p><?= $s[1] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PRODUCTS -->
<section class="products" id="urunler">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-tag">Ürünlerimiz</span>
      <h2 class="section-title">Kapsamlı Sigorta Çözümleri</h2>
      <p class="section-sub">Her ihtiyaca uygun sigorta ürünleriyle sizi ve değerlerinizi koruyoruz.</p>
    </div>
    <?php
    // JSON'dan ürünleri oku
    $pFile   = __DIR__ . '/data/products.json';
    $pRaw    = file_exists($pFile) ? json_decode(file_get_contents($pFile), true) : [];
    $pGrouped = []; $pCatMeta = [];
    foreach ($pRaw as $p) {
        if (!($p['active'] ?? true)) continue;
        $pGrouped[$p['category']][] = $p;
        if (!isset($pCatMeta[$p['category']])) {
            $pCatMeta[$p['category']] = ['label'=>$p['cat_label']??$p['category'],'icon'=>$p['cat_icon']??'fa-circle'];
        }
    }
    foreach ($pGrouped as &$g) usort($g, fn($a,$b)=>($a['order']??99)-($b['order']??99));
    unset($g);
    $pFirst = true;
    ?>
    <div class="products-tabs reveal">
      <?php foreach ($pGrouped as $catKey => $items): $meta = $pCatMeta[$catKey]; ?>
      <button class="tab-btn <?= $pFirst?'active':'' ?>" onclick="switchTab(this,'idx-<?= $catKey ?>')">
        <i class="fas <?= htmlspecialchars($meta['icon']) ?>"></i> <?= htmlspecialchars($meta['label']) ?>
      </button>
      <?php $pFirst=false; endforeach; ?>
    </div>
    <?php $pFirst=true; foreach ($pGrouped as $catKey => $items): ?>
    <div class="tab-panel <?= $pFirst?'active':'' ?>" id="idx-<?= $catKey ?>">
      <div class="products-grid">
        <?php foreach($items as $p): ?>
        <div class="product-card" onclick="selectTypeAndScroll('<?= htmlspecialchars($p['title'], ENT_QUOTES) ?>')">
          <div class="product-icon"><i class="fas <?= htmlspecialchars($p['icon']) ?>"></i></div>
          <h4><?= htmlspecialchars($p['title']) ?></h4>
          <p><?= htmlspecialchars($p['desc']) ?></p>
          <div class="product-link">Teklif Al <i class="fas fa-arrow-right"></i></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php $pFirst=false; endforeach; ?>
  </div>
</section>

<!-- WHY US -->
<section class="why" id="neden">
  <div class="container">
    <div class="why-grid">
      <div class="why-visual reveal">
        <div class="why-main-card">
          <h3>Neden YSY Sigorta?</h3>
          <p>10 yıllık deneyimimiz ve 20'den fazla sigorta şirketiyle iş birliğimiz sayesinde size en uygun ve avantajlı sigorta teklifini sunuyoruz.</p>
        </div>
      </div>
      <div class="why-features reveal">
        <?php
        $whyItems = [
          ['fa-balance-scale','Tarafsız Karşılaştırma','20+ sigorta şirketini karşılaştırarak size en avantajlı teklifi buluyoruz.'],
          ['fa-headset','7/24 Destek','Hasar anında ve poliçe süresince yanınızdayız.'],
          ['fa-file-shield','Uzman Ekip','Sertifikalı sigorta uzmanlarımız tüm sorularınızı yanıtlar.'],
          ['fa-bolt','Hızlı İşlem','Dakikalar içinde teklif alın, poliçenizi anında oluşturun.'],
        ];
        foreach($whyItems as $w): ?>
        <div class="why-item">
          <div class="why-item-icon"><i class="fas <?= $w[0] ?>"></i></div>
          <div>
            <h4><?= $w[1] ?></h4>
            <p><?= $w[2] ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- TEKLİF FORM -->
<section class="teklif" id="teklif">
  <div class="container">
    <div class="teklif-inner">
      <div class="reveal">
        <span class="section-tag">Teklif Al</span>
        <h2 class="section-title">Hemen Teklif İste</h2>
        <p>Formu doldurun, en kısa sürede uzman ekibimiz sizi arasın ve size özel teklifi hazırlasın.</p>
        <div class="contact-items">
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
            <div><h5>Telefon</h5><a href="tel:<?= preg_replace('/\s+/','',$cfg['phone1']??'') ?>"><?= htmlspecialchars($cfg['phone1']??'') ?></a></div>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fab fa-whatsapp"></i></div>
            <div><h5>WhatsApp</h5><a href="https://wa.me/<?= $cfg['whatsapp']??'' ?>" target="_blank">WhatsApp ile Yaz</a></div>
          </div>
          <div class="contact-item">
            <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
            <div><h5>E-Posta</h5><a href="mailto:<?= htmlspecialchars($cfg['email']??'') ?>"><?= htmlspecialchars($cfg['email']??'') ?></a></div>
          </div>
        </div>
      </div>
      <div class="form-box reveal">
        <h3><i class="fas fa-file-alt" style="color:var(--blue)"></i> Teklif Talebi</h3>
        <form id="teklifForm">
          <div class="form-grid">
            <div class="form-group"><label>Ad Soyad *</label><input type="text" id="f-name" placeholder="Adınız Soyadınız" required></div>
            <div class="form-group"><label>Telefon *</label><input type="tel" id="f-phone" placeholder="0___ ___ __ __" required></div>
            <div class="form-group"><label>E-Posta</label><input type="email" id="f-email" placeholder="ornek@mail.com"></div>
            <div class="form-group">
              <label>Sigorta Türü</label>
              <select id="f-type">
                <option value="">Seçiniz...</option>
                <?php foreach ($pGrouped as $catKey => $items): ?>
                <optgroup label="<?= htmlspecialchars($pCatMeta[$catKey]['label']) ?>">
                  <?php foreach ($items as $item): ?>
                  <option><?= htmlspecialchars($item['title']) ?></option>
                  <?php endforeach; ?>
                </optgroup>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group full"><label>Mesajınız</label><textarea id="f-message" placeholder="Sigorta ihtiyacınız hakkında kısa bilgi verebilir misiniz?"></textarea></div>
          </div>
          <button type="button" class="btn-submit" id="submitBtn" onclick="submitForm()">
            <i class="fas fa-paper-plane"></i> Teklif Talep Et
          </button>
          <div class="success-msg" id="successMsg"><i class="fas fa-check-circle"></i> &nbsp;Talebiniz alındı! En kısa sürede sizi arayacağız.</div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
  <div class="container">
    <div class="section-header center reveal">
      <span class="section-tag">S.S.S.</span>
      <h2 class="section-title">Sıkça Sorulan Sorular</h2>
      <p class="section-sub">Sigorta hakkında merak ettiğiniz her şeyi yanıtlıyoruz.</p>
    </div>
    <div class="faq-grid reveal">
      <?php
      $faqs = [
        ['Sigorta yaptırmak için neler gerekli?','Sigorta türüne göre değişmekle birlikte genellikle kimlik belgesi, araç ruhsatı veya tapu gibi belgeler yeterlidir. Detaylar için bizi arayın.'],
        ['Kasko ile trafik sigortası arasındaki fark nedir?','Trafik sigortası zorunludur ve 3. şahıslara verilen zararları karşılar. Kasko ise aracınızı her türlü riske karşı korur.'],
        ['Online teklif alabilir miyim?','Evet! Sitemizden teklif talebinde bulunabilir ya da doğrudan WhatsApp veya telefonla bize ulaşabilirsiniz.'],
        ['Hasar durumunda ne yapmalıyım?','Hasar anında bizi arayın. 7/24 destek ekibimiz size rehberlik edecektir.'],
        ['Sigorta primlerini nasıl öderim?','Kredi kartı, banka transferi veya nakit ödeme seçeneklerimiz mevcuttur. Taksit imkânlarımız da bulunmaktadır.'],
        ['Birden fazla şirketten teklif alabilir miyim?','Evet, 20\'den fazla sigorta şirketiyle çalışıyoruz ve size en avantajlı seçeneği sunuyoruz.'],
      ];
      foreach($faqs as $f): ?>
      <div class="faq-item">
        <div class="faq-q" onclick="toggleFaq(this)">
          <h4><?= $f[0] ?></h4>
          <i class="fas fa-chevron-down"></i>
        </div>
        <div class="faq-a"><?= $f[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<script>
function selectTypeAndScroll(type) {
  const select = document.getElementById('f-type');
  if (select) {
    select.value = type;
  }
  document.getElementById('teklif').scrollIntoView({ behavior: 'smooth' });
}
function switchTab(btn, tabId) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById(tabId).classList.add('active');
}
function toggleFaq(el) {
  const item = el.closest('.faq-item');
  document.querySelectorAll('.faq-item').forEach(i => { if(i!==item) i.classList.remove('open'); });
  item.classList.toggle('open');
}
async function submitForm() {
  const name = document.getElementById('f-name').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  if (!name || !phone) { alert('Lütfen ad soyad ve telefon alanlarını doldurunuz.'); return; }
  const btn = document.getElementById('submitBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Gönderiliyor...';
  btn.disabled = true;
  const formData = new FormData();
  formData.append('name', name);
  formData.append('phone', phone);
  formData.append('email', document.getElementById('f-email').value.trim());
  formData.append('type', document.getElementById('f-type').value);
  formData.append('message', document.getElementById('f-message').value.trim());
  formData.append('source', 'Ana Sayfa');
  try {
    const res = await fetch('/submit_form.php', { method:'POST', body: formData });
    const data = await res.json();
    if(data.success) {
      document.getElementById('successMsg').style.display = 'block';
      ['f-name','f-phone','f-email','f-type','f-message'].forEach(id => { const el=document.getElementById(id); if(el) el.value=''; });
      setTimeout(() => { document.getElementById('successMsg').style.display='none'; }, 5000);
    } else {
      alert(data.message || 'Bir hata oluştu.');
    }
  } catch(e) { alert('Bağlantı hatası. Lütfen tekrar deneyin.'); }
  btn.innerHTML = '<i class="fas fa-paper-plane"></i> Teklif Talep Et';
  btn.disabled = false;
}
</script>
