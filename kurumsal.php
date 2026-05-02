<?php
require_once __DIR__ . '/includes/header.php';
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; text-align: center; }
.page-hero h1 { font-size: clamp(2rem,4vw,3rem); margin-bottom: .7rem; }
.page-hero p { color: rgba(255,255,255,.8); }

.about-section { padding: 80px 0; }
.about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; }
.about-img-box { position: relative; }
.about-main-card { background: var(--gradient); border-radius: 20px; padding: 3rem 2.5rem; color: #fff; }
.about-main-card h3 { font-size: 1.8rem; margin-bottom: 1rem; }
.about-main-card p { color: rgba(255,255,255,.85); line-height: 1.8; }
.about-float { position: absolute; background: #fff; border-radius: 14px; padding: 1rem 1.3rem; box-shadow: var(--shadow); display: flex; align-items: center; gap: .7rem; font-size: .85rem; font-weight: 600; color: var(--navy); }
.about-float i { color: var(--blue); font-size: 1.2rem; }
.about-float.f1 { top: -15px; right: -15px; }
.about-float.f2 { bottom: -15px; left: -15px; }
.about-content h2 { font-size: clamp(1.8rem,3vw,2.3rem); margin-bottom: 1rem; color: var(--navy); }
.about-content p { color: var(--gray); line-height: 1.9; margin-bottom: 1.2rem; font-size: .97rem; }

.values-section { background: var(--light); padding: 80px 0; }
.values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px,1fr)); gap: 1.5rem; }
.value-card { background: #fff; border-radius: var(--radius); padding: 2rem; border: 1.5px solid var(--lgray); transition: all .25s; }
.value-card:hover { border-color: var(--blue); box-shadow: var(--shadow); transform: translateY(-4px); }
.value-icon { width: 56px; height: 56px; background: rgba(20,80,163,.08); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: var(--blue); margin-bottom: 1rem; }
.value-card h4 { font-size: 1rem; color: var(--navy); margin-bottom: .5rem; }
.value-card p { font-size: .87rem; color: var(--gray); line-height: 1.7; }

.stats-section { background: var(--gradient); padding: 60px 0; }
.stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 2rem; text-align: center; }
.stats-grid .stat-num { font-family: 'Playfair Display',serif; font-size: 2.5rem; font-weight: 900; color: var(--accent); }
.stats-grid .stat-label { color: rgba(255,255,255,.75); font-size: .85rem; margin-top: .3rem; text-transform: uppercase; letter-spacing: .5px; }

@media(max-width:900px) {
  .about-grid { grid-template-columns: 1fr; }
  .about-float { display: none; }
  .stats-grid { grid-template-columns: repeat(2,1fr); }
}
</style>

<div class="page-hero">
  <h1>Kurumsal</h1>
  <p>YSY Sigorta hakkında her şey</p>
</div>

<section class="about-section">
  <div class="container">
    <div class="about-grid">
      <div class="about-img-box reveal">
        <div class="about-main-card">
          <h3>YSY Sigorta</h3>
          <p>Müşterilerimize en kapsamlı ve güvenilir sigorta çözümlerini sunmak amacıyla kurulmuş, lisanslı bir sigorta aracılık şirketiyiz.</p>
        </div>
        <div class="about-float f1"><i class="fas fa-award"></i> Lisanslı & Yetkili</div>
        <div class="about-float f2"><i class="fas fa-shield-halved"></i> Güvenilir Hizmet</div>
      </div>
      <div class="about-content reveal">
        <span class="section-tag">Hakkımızda</span>
        <h2>Güvenilir Sigorta Ortağınız</h2>
        <p>YSY Sigorta olarak, 15 yılı aşkın sektör deneyimimizle müşterilerimize en uygun sigorta çözümlerini sunuyoruz. 20'den fazla sigorta şirketiyle kurduğumuz güçlü iş birlikleri sayesinde, her bütçeye ve ihtiyaca uygun teklifler hazırlıyoruz.</p>
        <p>Uzman ekibimiz, kasko ve trafik sigortasından sağlık ve konut sigortasına kadar pek çok alanda size rehberlik eder. Poliçe süresince yanınızda olmayı ve hasar anında hızlı çözüm üretmeyi temel ilkemiz olarak benimsiyoruz.</p>
        <p>Müşteri memnuniyetini her şeyin önünde tutarak, şeffaf ve dürüst bir hizmet anlayışıyla çalışıyoruz.</p>
      </div>
    </div>
  </div>
</section>

<section class="stats-section">
  <div class="container">
    <div class="stats-grid reveal">
      <div><div class="stat-num"><?= htmlspecialchars($cfg['stat1_num']??'5000+') ?></div><div class="stat-label"><?= htmlspecialchars($cfg['stat1_label']??'Mutlu Müşteri') ?></div></div>
      <div><div class="stat-num"><?= htmlspecialchars($cfg['stat2_num']??'15+') ?></div><div class="stat-label"><?= htmlspecialchars($cfg['stat2_label']??'Yıllık Deneyim') ?></div></div>
      <div><div class="stat-num">20+</div><div class="stat-label">Sigorta Şirketi</div></div>
      <div><div class="stat-num">7/24</div><div class="stat-label">Destek</div></div>
    </div>
  </div>
</section>

<section class="values-section">
  <div class="container">
    <div class="section-header center reveal">
      <span class="section-tag">Değerlerimiz</span>
      <h2 class="section-title">İlke ve Değerlerimiz</h2>
      <p class="section-sub">Her adımımızda bu değerleri rehber ediniriz.</p>
    </div>
    <div class="values-grid reveal">
      <?php
      $values = [
        ['fa-handshake','Güven','Müşterilerimizle uzun soluklu güven ilişkileri kurarız.'],
        ['fa-lightbulb','Uzmanlık','Alanında uzman ekibimizle doğru kararlar almanıza yardımcı oluruz.'],
        ['fa-heart','Müşteri Odaklılık','Her kararımızda müşteri memnuniyetini ön planda tutarız.'],
        ['fa-shield-halved','Şeffaflık','Tüm işlemlerimizde tam şeffaflıkla hareket ederiz.'],
        ['fa-bolt','Hız','Teklif ve poliçe süreçlerini en hızlı şekilde tamamlarız.'],
        ['fa-globe','Geniş Ağ','20+ sigorta şirketiyle geniş portföy sunma kapasitemiz var.'],
      ];
      foreach($values as $v): ?>
      <div class="value-card">
        <div class="value-icon"><i class="fas <?= $v[0] ?>"></i></div>
        <h4><?= $v[1] ?></h4>
        <p><?= $v[2] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
