<style>
    body{
        background:#eef0f4;
        font-family: "Segoe UI", Arial;
    }

    .page-header{
        padding:30px 0;
    }

    .title-box{
        background:white;
        padding:25px;
        border-radius:12px;
        box-shadow:0 15px 40px rgba(0,0,0,.06);
        border-left:6px solid #0069d9;
    }

    .title-box h1{
        font-size:1.9rem;
        font-weight:700;
        margin-bottom:10px;
    }

    .article-card{
        background:white;
        border-radius:14px;
        box-shadow:0 15px 40px rgba(0,0,0,.06);
        padding:32px;
        margin-bottom:60px;
    }

    .header-image{
        width:100%;
        border-radius:12px;
        margin-bottom:22px;
    }

    .article-body p{
        text-align:justify;
        font-size:1.02rem;
        line-height:1.85;
        color:#1f2937;
    }

    .info-strip{
        background:#f8fafc;
        border-radius:10px;
        padding:12px 16px;
        font-size:.9rem;
        margin-bottom:18px;
        border:1px solid #e5e7eb;
    }

    .info-strip span{
        margin-right:15px;
    }

    .subsection-title{
        font-weight:700;
        margin-top:28px;
        margin-bottom:12px;
    }
</style>

<div class="container">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="title-box">
            <span class="badge <?= $badge_classification[$berita->berita_classification] ?> mb-2"><?= $berita->berita_classification ?></span>

            <h1>
                Peningkatan Kualitas Pelayanan Publik Melalui
                Pemanfaatan Teknologi Informasi
            </h1>

            <div class="text-muted">
                Dipublikasikan <?= date('d-m-Y', strtotime($berita->insert_timestamp)) ?> · Administrator
            </div>
        </div>
    </div>

    <!-- ARTICLE -->
    <div class="article-card">

        <!-- header image inside article -->
        <img src="<?= $path_image.$berita->berita_image ?>"
             alt="Gambar Kegiatan"
             class="header-image">

        <!-- <div class="info-strip">
            <span>📌 Kategori: Informasi Pelayanan</span>
            <span>🕒 Durasi baca: 4 menit</span>
            <span>👁️ 120 kali dibaca</span>
        </div> -->

        <div class="article-body">

            <p>
                <?= $berita->berita_content ?>
            </p>

        </div>

        <hr>

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('News/index') ?>" class="btn btn-outline-secondary btn-sm">← Kembali</a>
            <!-- <a href="#" class="btn btn-outline-primary btn-sm">Berita berikutnya →</a> -->
        </div>

    </div>

</div>