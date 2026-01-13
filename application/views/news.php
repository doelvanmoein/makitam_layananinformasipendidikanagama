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
        <div class="content-body">
            <div id="transactions" style="display: none;">
                <div class="transactions-table-th d-none d-md-block">
                    <div class="col-12">
                        <div class="row px-1">
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0">Nama Madrasah</p>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0">Jenis</p>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0">Telepon</p>
                            </div>
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0">Kepala</p>
                            </div>
                            <div class="col-md-3 col-12 py-1">
                                <p class="mb-0">Tahun Berdiri</p>
                            </div>
                            <div class="col-md-1 col-12 py-1">
                                <p class="mb-0">Alamat</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="transactions-table-tbody">
                    <?php if (empty($madrasahList)) : ?>
                    <section class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12 col-12 py-1">
                                            <p class="mb-0" style="text-align: center; color: red; font-style: italic;">
                                                <span class="d-inline-block d-md-none text-bold-700"></span>Data Tidak Ditemukan !
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php else : ?>
                    <?php foreach ($madrasahList as $key => $val) : ?>
                    <section class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row info-worshiphouse" data-id="<?= $val['madrasah_id'] ?>" data-url="<?= base_url('Home/detail/').$val['madrasah_id'] ?>" data-toggle="modal" data-target="#ModalDetail" style="cursor: pointer;">
                                        <div class="col-md-2 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_name'] ?></p>
                                        </div>
                                        <div class="col-md-2 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_type'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_nspp'] ?></p>
                                        </div>
                                        <div class="col-md-2 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_head'] ?></p>
                                        </div>
                                        <div class="col-md-1 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_year'] ?></p>
                                        </div>
                                        <div class="col-md-2 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_address'] ?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <?= $this->pagination->create_links(); ?>

                </div>
            </div>

            <style>
                .article-content p {
                    line-height: 1.8;
                    margin-bottom: 1.2rem;
                }
                .article-header {
                    max-width: 900px;
                    margin: auto;
                }
                .article-body {
                    max-width: 900px;
                    margin: auto;
                }
            </style>

<div class="container">

<!-- Berita Unggulan -->
<div class="card mb-4">
    <div class="row no-gutters">
        <div class="col-md-5">
            <img src="https://via.placeholder.com/600x400" class="img-fluid h-100" style="object-fit:cover;">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <span class="badge badge-primary mb-2">Pengumuman</span>
                <h4 class="card-title">Judul Berita Unggulan</h4>
                <p class="text-muted small">
                    12 Januari 2026 | Admin
                </p>
                <p class="card-text">
                    Ringkasan singkat berita unggulan yang ditampilkan lebih
                    menonjol dibanding berita lainnya.
                </p>
                <a href="#" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<!-- Grid Berita -->
<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card h-100 position-relative">
            <span class="badge badge-info badge-category">Kegiatan</span>
            <img src="https://via.placeholder.com/400x300" class="card-img-top news-thumb">
            <div class="card-body">
                <h6 class="card-title">Judul Berita Singkat</h6>
                <p class="text-muted small">10 Januari 2026</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 position-relative">
            <span class="badge badge-success badge-category">Layanan</span>
            <img src="https://via.placeholder.com/400x300" class="card-img-top news-thumb">
            <div class="card-body">
                <h6 class="card-title">Judul Berita Singkat</h6>
                <p class="text-muted small">9 Januari 2026</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 position-relative">
            <span class="badge badge-warning badge-category">Informasi</span>
            <img src="https://via.placeholder.com/400x300" class="card-img-top news-thumb">
            <div class="card-body">
                <h6 class="card-title">Judul Berita Singkat</h6>
                <p class="text-muted small">8 Januari 2026</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
            </div>
        </div>
    </div>

</div>

<!-- Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Sebelumnya</a>
        </li>
        <li class="page-item active">
            <a class="page-link">1</a>
        </li>
        <li class="page-item">
            <a class="page-link">2</a>
        </li>
        <li class="page-item">
            <a class="page-link">Berikutnya</a>
        </li>
    </ul>
</nav>

</div>

        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Rumah Ibadah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Nav tabs untuk modal -->
                <ul class="nav nav-tabs" id="myModalTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="facility-tab" data-toggle="tab" href="#facility" role="tab" aria-controls="facility" aria-selected="false">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="schedule-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="schedule" aria-selected="false">Jadwal Ibadah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="photo-tab" data-toggle="tab" href="#photo" role="tab" aria-controls="photo" aria-selected="false">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Peta</a>
                    </li>
                </ul>

                <!-- Tab content untuk modal -->
                <div class="tab-content mt-2" id="myModalTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h5>Informasi Umum</h5>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">

                    </div>
                    <div class="tab-pane fade" id="facility" role="tabpanel" aria-labelledby="facility-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">

                    </div>
                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                        <div id="map_content" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
