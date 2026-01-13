    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Data Pondok Pesantren</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Data Pondok Pesantren
                  </li>
                </ol>
              </div>
            </div>
          </div>
          
        </div>
        <div class="content-body">
            <div id="transactions">
                <div class="transactions-table-th d-none d-md-block">
                    <div class="col-12">
                        <div class="row px-1">
                            <div class="col-md-2 col-12 py-1">
                                <p class="mb-0">Nama Pondok Pesantren</p>
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
                    <?php if (empty($pontrenList)) : ?>
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
                    <?php foreach ($pontrenList as $key => $val) : ?>
                    <section class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row info-worshiphouse" data-id="<?= $val['madrasah_id'] ?>" data-url="<?= base_url('Home/detail/').$val['madrasah_id'] ?>" data-toggle="modal" data-target="#ModalDetail" style="cursor: pointer;">
                                        <div class="col-md-2 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_name'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-12 py-1">
                                            <p class="mb-0"><?= $val['madrasah_phone'] ?></p>
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
