<?php
require_once __DIR__ . '/includes/header.php';

// Ürünleri JSON'dan oku
$pFile = __DIR__ . '/data/products.json';
$pRaw = file_exists($pFile) ? json_decode(file_get_contents($pFile), true) : [];
$pGrouped = []; $pCatMeta = [];
foreach ($pRaw as $p) {
    if (!($p['active'] ?? true)) continue;
    $pGrouped[$p['category']][] = $p;
    if (!isset($pCatMeta[$p['category']])) {
        $pCatMeta[$p['category']] = ['label' => $p['cat_label'] ?? $p['category'], 'icon' => $p['cat_icon'] ?? 'fa-circle'];
    }
}
foreach ($pGrouped as &$g) usort($g, fn($a,$b) => ($a['order']??99) - ($b['order']??99));

$selectedType = $_GET['type'] ?? '';
?>
<style>
.page-hero { background: var(--gradient); padding: 4rem 0 3rem; color: #fff; text-align: center; }
.page-hero h1 { font-size: clamp(2rem,4vw,3rem); margin-bottom: .7rem; }
.page-hero p { color: rgba(255,255,255,.8); font-size: 1rem; }

.contact-section { padding: 80px 0; background: var(--light); }
.contact-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 4rem; align-items: start; }

.form-box { background: #fff; border-radius: 20px; padding: 2.5rem; box-shadow: var(--shadow); border: 1.5px solid var(--lgray); }
.form-box h3 { font-size: 1.3rem; margin-bottom: 1.5rem; color: var(--navy); }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.form-group { display: flex; flex-direction: column; gap: .5rem; }
.form-group.full { grid-column: 1 / -1; }
.form-group label { font-size: .82rem; font-weight: 600; color: var(--navy); }
.form-group input, .form-group select, .form-group textarea { padding: .75rem 1rem; border: 1.5px solid var(--lgray); border-radius: 10px; font-family: 'DM Sans', sans-serif; font-size: .9rem; transition: border-color .2s; outline: none; color: var(--navy); }
.form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--blue); }
.form-group textarea { resize: vertical; min-height: 120px; }
.btn-submit { width: 100%; margin-top: 1rem; padding: 1rem; background: var(--gradient); color: #fff; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: transform .2s; display: flex; align-items: center; justify-content: center; gap: .5rem; }
.btn-submit:hover { transform: translateY(-2px); }
.success-msg { display: none; margin-top: 1rem; padding: 1rem; background: #ecfdf5; border: 1px solid #6ee7b7; border-radius: 10px; color: #065f46; font-weight: 600; text-align: center; }

.info-cards { display: flex; flex-direction: column; gap: 1.2rem; }
.info-card { background: #fff; border-radius: 16px; padding: 1.5rem; border: 1.5px solid var(--lgray); display: flex; gap: 1rem; align-items: flex-start; box-shadow: 0 2px 12px rgba(11,31,58,.06); transition: border-color .2s, box-shadow .2s; }
.info-card:hover { border-color: var(--blue); box-shadow: var(--shadow); }
.info-icon { width: 48px; height: 48px; background: rgba(20,80,163,.08); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--blue); font-size: 1.2rem; flex-shrink: 0; }
.info-card h4 { font-size: .85rem; color: var(--gray); font-family: 'DM Sans',sans-serif; font-weight: 500; margin-bottom: .3rem; }
.info-card a, .info-card p { font-size: .95rem; color: var(--navy); font-weight: 600; display: block; }
.info-card a:hover { color: var(--blue); }

.map-section { padding: 0 0 80px; background: var(--light); }
.map-box { max-width: 1240px; margin: 0 auto; padding: 0 2rem; }
.map-box iframe { width: 100%; height: 380px; border: none; border-radius: 20px; box-shadow: var(--shadow); }

@media(max-width:900px) {
  .contact-grid { grid-template-columns: 1fr; }
  .form-grid { grid-template-columns: 1fr; }
}
</style>

<div class="page-hero">
  <h1>İletişim</h1>
  <p>Sorularınız için bize ulaşın, en kısa sürede dönüş yapalım.</p>
</div>

<section class="contact-section" id="form">
  <div class="container">
    <div class="contact-grid">
      <div class="form-box reveal">
        <h3><i class="fas fa-paper-plane" style="color:var(--blue)"></i> Teklif & İletişim Formu</h3>
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
                <option <?= ($item['title'] === $selectedType) ? 'selected' : '' ?>><?= htmlspecialchars($item['title']) ?></option>
                <?php endforeach; ?>
              </optgroup>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group full"><label>Mesajınız</label><textarea id="f-message" placeholder="Mesajınızı buraya yazınız..."></textarea></div>
        </div>
        <button type="button" class="btn-submit" id="submitBtn" onclick="submitForm()">
          <i class="fas fa-paper-plane"></i> Gönder
        </button>
        <div class="success-msg" id="successMsg"><i class="fas fa-check-circle"></i> &nbsp;Mesajınız alındı! En kısa sürede dönüş yapacağız.</div>
      </div>

      <div class="info-cards reveal">
        <div class="info-card">
          <div class="info-icon"><i class="fas fa-phone"></i></div>
          <div>
            <h4>Telefon</h4>
            <a href="tel:<?= preg_replace('/\s+/','',$cfg['phone1']??'') ?>"><?= htmlspecialchars($cfg['phone1']??'') ?></a>
            <a href="tel:<?= preg_replace('/\s+/','',$cfg['phone2']??'') ?>" style="margin-top:.2rem;font-weight:400;color:var(--gray)"><?= htmlspecialchars($cfg['phone2']??'') ?></a>
          </div>
        </div>
        <div class="info-card">
          <div class="info-icon"><i class="fab fa-whatsapp"></i></div>
          <div>
            <h4>WhatsApp</h4>
            <a href="https://wa.me/<?= $cfg['whatsapp']??'' ?>" target="_blank">WhatsApp ile Yaz</a>
          </div>
        </div>
        <div class="info-card">
          <div class="info-icon"><i class="fas fa-envelope"></i></div>
          <div>
            <h4>E-Posta</h4>
            <a href="mailto:<?= htmlspecialchars($cfg['email']??'') ?>"><?= htmlspecialchars($cfg['email']??'') ?></a>
          </div>
        </div>
        <div class="info-card">
          <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div>
            <h4>Adres</h4>
            <p><?= htmlspecialchars($cfg['address']??'') ?></p>
          </div>
        </div>
        <div class="info-card">
          <div class="info-icon"><i class="fab fa-instagram"></i></div>
          <div>
            <h4>Instagram</h4>
            <a href="<?= htmlspecialchars($cfg['instagram']??'#') ?>" target="_blank">@ysy.sigorta</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="map-section">
  <div class="map-box">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060.2935!2d32.8127!3d39.9052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU0JzE4LjciTiAzMsKwNDgnNDUuNyJF!5e0!3m2!1str!2str!4v1600000000000" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<script>
async function submitForm() {
  const name = document.getElementById('f-name').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  if (!name || !phone) { alert('Lütfen ad soyad ve telefon alanlarını doldurunuz.'); return; }
  const btn = document.getElementById('submitBtn');
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Gönderiliyor...';
  btn.disabled = true;
  const fd = new FormData();
  fd.append('name', name);
  fd.append('phone', phone);
  fd.append('email', document.getElementById('f-email').value.trim());
  fd.append('type', document.getElementById('f-type').value);
  fd.append('message', document.getElementById('f-message').value.trim());
  fd.append('source', 'İletişim Sayfası');
  try {
    const res = await fetch('/submit_form.php', { method:'POST', body: fd });
    const data = await res.json();
    if(data.success) {
      document.getElementById('successMsg').style.display = 'block';
      ['f-name','f-phone','f-email','f-type','f-message'].forEach(id => { const el=document.getElementById(id); if(el) el.value=''; });
      setTimeout(() => document.getElementById('successMsg').style.display='none', 5000);
    } else { alert(data.message); }
  } catch(e) { alert('Bağlantı hatası.'); }
  btn.innerHTML = '<i class="fas fa-paper-plane"></i> Gönder';
  btn.disabled = false;
}
</script>
