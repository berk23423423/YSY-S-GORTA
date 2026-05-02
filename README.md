# YSY Sigorta – PHP Web Sitesi

## Kurulum

### 1. Dosyaları Sunucuya Yükleyin
Tüm dosyaları web sunucunuzun kök dizinine (örn. `public_html/` veya `www/`) kopyalayın.

### 2. Klasör İzinleri
```bash
chmod 755 uploads/
chmod 755 uploads/blog/
chmod 755 uploads/genel/
chmod 644 data/*.json
```

### 3. Logo Yükleyin
`uploads/genel/` klasörüne `logo.png` dosyanızı koyun **ya da** Admin Panel → Fotoğraflar & Logo bölümünden yükleyin.

---

## Admin Panel Erişimi

URL: `yourdomain.com/admin`

**Varsayılan Şifre:** `password`

> ⚠️ Giriş yaptıktan hemen sonra **Admin Panel → Şifre Değiştir** bölümünden şifrenizi değiştirin!

---

## Admin Panel Özellikleri

| Bölüm | Açıklama |
|-------|----------|
| Dashboard | Genel istatistikler ve hızlı erişim |
| Form Talepleri | Siteden gelen talepleri görüntüle, sil |
| Site Ayarları | Telefon, e-posta, adres, slogan, hero metni |
| Blog Yazıları | Yaz, düzenle, yayınla, sil |
| Şubeler | Şube ekle, düzenle, sil |
| Fotoğraflar & Logo | Logo ve görsel yükleme (PC'den) |
| Şifre Değiştir | Admin şifresini güncelle |

---

## Dosya Yapısı

```
/
├── index.php           ← Ana sayfa
├── kurumsal.php        ← Kurumsal
├── urunlerimiz.php     ← Ürünler
├── subelerimiz.php     ← Şubeler
├── blog.php            ← Blog listesi
├── blog-post.php       ← Blog detay
├── iletisim.php        ← İletişim formu
├── submit_form.php     ← Form işleyici (AJAX)
├── .htaccess
├── includes/
│   ├── header.php      ← Ortak header
│   └── footer.php      ← Ortak footer
├── admin/
│   ├── index.php       ← Giriş sayfası
│   ├── dashboard.php   ← Dashboard
│   ├── forms.php       ← Form yönetimi
│   ├── site-settings.php
│   ├── blog.php
│   ├── branches.php
│   ├── photos.php      ← Görsel yönetimi
│   ├── change-password.php
│   ├── logout.php
│   ├── auth.php        ← Oturum kontrolü
│   ├── layout.php      ← Admin panel header
│   └── layout_end.php  ← Admin panel footer
├── data/
│   ├── config.json     ← Site ayarları + admin şifresi
│   ├── forms.json      ← Gelen form talepleri
│   ├── blog.json       ← Blog yazıları
│   └── branches.json   ← Şube bilgileri
└── uploads/
    ├── genel/          ← Logo ve genel görseller
    └── blog/           ← Blog görselleri
```

---

## Gereksinimler
- PHP 7.4+
- Apache (mod_rewrite aktif) veya Nginx
- Yazma izni: `data/`, `uploads/` klasörlerine
