

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width: 48px; height: 48px" src="
         <?php
        if ($this->session->userdata('gender') == 0) {
            echo base_url('public/images/male.jpg');
        } else {
            echo base_url('public/images/female.jpg');
        }
        ?>
         " alt="User Image">
        <div>
            <p class="app-sidebar__user-designation"><?= $this->session->userdata('name'); ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?= base_url('/') ?>"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Anasayfa</span></a>
        </li>
        <?php if ($this->session->userdata('role') == 1) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-laptop">
                    </i><span class="app-menu__label">Proje Yönetimi</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('proje/ekle') ?>"><i
                                class="icon fa fa-circle-o"></i> Proje Ekle</a></li>
                    <li><a class="treeview-item" href="<?= base_url('proje') ?>"><i class="icon fa fa-circle-o"></i>
                            Proje Listele</a>
                    </li>
                    <li><a class="treeview-item" href="<?= base_url('revize') ?>"><i class="icon fa fa-circle-o"></i> Proje
                            Revize</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-laptop">
                    </i><span class="app-menu__label">Kullanıcı Yönetimi</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">

                    <li><a class="treeview-item" href="<?= base_url('kullanici') ?>"><i class="icon fa fa-circle-o"></i>
                            Kullanıcı Listele</a>
                    </li>

                </ul>
            </li>
        <?php } ?>
        <?php if ($this->session->userdata('role') == 0) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-laptop">
                    </i><span class="app-menu__label">Projeler</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="<?= base_url('projeler') ?>">
                            <i class="icon fa fa-circle-o"></i>Proje Listele</a>
                    </li>
                    <li>
                        <a class="treeview-item" href="<?= base_url('projeler/durum') ?>">
                            <i class="icon fa fa-circle-o"></i>Proje Durum</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</aside>

