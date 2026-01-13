
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">FAQ</h3>
                <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">FAQ
                    </li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-10 col-12  order-2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php if (empty($arrFaqList)) : ?>
                            <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                            <div id="accordion" class="collapse-icon accordion-icon-rotate left">
                                <div class="card">
                                    <div class="card-header" id="heading11">
                                        <a class="card-title lead collapsed" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11" href="#">Data tidak ditemukan !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else : ?>
                            <?php foreach ($arrFaqList as $key => $val) : $showPane= ($key==1) ? 'show' : ''; $active = ($key==1) ? 'active' : ''; ?>
                            <div class="tab-pane fade <?= $active ?> <?= $showPane ?>" id="v-pills-<?= $arrFaqCategory[$key-1]['tag'] ?>" data-id="<?= $key ?>" role="tabpanel" aria-labelledby="v-pills-<?= $arrFaqCategory[$key-1]['tag'] ?>-tab">
                                <div id="accordion<?= $key ?>" class="collapse-icon accordion-icon-rotate left">
                                    
                                    <?php foreach ($val as $k => $v) : $show = ($k==0) ? 'show' : ''; ?>
                                        <div class="card">
                                            <div class="card-header" id="heading<?= $k ?>">
                                                <a class="card-title lead collapsed" data-toggle="collapse" data-target="#collapse<?= $k ?>" aria-expanded="false" aria-controls="collapse<?= $k ?>" href="#"><?= $v['worshiphousefaq_question'] ?></a>
                                            </div>
                                            <div id="collapse<?= $k ?>" class="collapse <?= $show ?>" aria-labelledby="heading<?= $k ?>" data-parent="#accordion<?= $key ?>">
                                                <div class="card-body"><?= $v['worshiphousefaq_answer'] ?> </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-md-2 col-12 order-1">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php if (empty($arrFaqCategory)) : ?>
                            <a class="nav-link active show" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">Kategory Tidak Ditermukan !</a>
                        <?php else: ?>
                        <?php foreach ($arrFaqCategory as $key => $val) : $active = (!empty($val['tag']) && $val['tag']=='general') ? 'active' : '' ?>
                            <a class="nav-link <?= $active ?> show" id="v-pills-<?= $val['tag'] ?>-tab" data-id="<?= $val['id'] ?>" data-toggle="pill" href="#v-pills-<?= $val['tag'] ?>" role="tab" aria-controls="v-pills-general" aria-selected="true"><?= $val['name'] ?></a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>