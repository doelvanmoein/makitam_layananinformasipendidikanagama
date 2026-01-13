<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
    <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="<?= base_url() ?>"><img class="brand-logo" alt="CryptoDash admin logo" src="<?=  base_url('app-assets/images/logo/logo.png')?>"/></a>
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="<?= (!empty($active_menu) && $active_menu=='dashboard' ) ? 'active' : 'nav-item' ?>"><a href="<?= base_url() ?>"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>
        <li class="<?= (!empty($active_menu) && $active_menu=='news' ) ? 'active' : 'nav-item' ?>"><a href="<?= base_url('home/news') ?>"><i class="icon-layers"></i><span class="menu-title" data-i18n="">Berita</span></a>
        </li>
        <!-- <li class="<?= (!empty($active_menu) && $active_menu=='statistic') ? 'active' : 'nav-item' ?>"><a href="<?= base_url('home/statistic') ?>"><i class="icon-graph"></i><span class="menu-title" data-i18n="">Statistik</span></a>
        </li> -->
        <li class="<?= (!empty($active_menu) && $active_menu=='faq') ? 'active' : 'nav-item' ?>"><a href="<?= base_url('home/faq') ?>"><i class="icon-question"></i><span class="menu-title" data-i18n="">FAQ</span></a>
        </li>
    </ul>
    </div>
</div>