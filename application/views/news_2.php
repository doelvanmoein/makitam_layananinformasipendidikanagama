<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .news-thumb {
        height: 180px;
        object-fit: cover;
    }
    .badge-category {
        position: absolute;
        top: 10px;
        left: 10px;
    }
</style>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Berita</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Berita
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <!-- <h3 class="mb-4">Berita & Informasi</h3> -->

    <?php if ($unggulan): ?>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="<?= $path_image.$unggulan->berita_image ?>"
                        class="img-fluid h-100"
                        style="object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <span class="badge badge-danger mb-2">Berita Unggulan</span>
                        <h4><?= $unggulan->berita_title ?></h4>
                        <p class="text-muted small">
                            <?= date('d M Y', strtotime($unggulan->insert_timestamp)) ?>
                        </p>
                        <p>
                            <?= character_limiter($unggulan->berita_summary, 150) ?>
                        </p>
                        <a href="<?= site_url('news/detail/'.$unggulan->berita_id) ?>"
                        class="btn btn-primary btn-sm">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($berita as $row): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 position-relative">

                <span class="badge <?= $badge_classification[$row->berita_classification] ?> badge-category">
                    <?= $row->berita_classification ?>
                </span>

                <img src="<?= $path_image.$row->berita_image ?>"
                     class="card-img-top news-thumb">

                <div class="card-body">
                    <h6 class="card-title">
                        <?= $row->berita_title ?>
                    </h6>

                    <p class="text-muted small">
                        <?= date('d M Y', strtotime($row->insert_timestamp)) ?>
                    </p>

                    <p class="card-text">
                        <?= character_limiter($row->berita_summary, 20) ?>
                    </p>

                    <a href="<?= site_url('news/detail/'.$row->berita_id) ?>"
                       class="btn btn-outline-primary btn-sm">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?= $this->pagination->create_links(); ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>