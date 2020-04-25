

<div class="col-md-12">
    <div class="card mb-3 text-white bg-danger">
        <div class="card-body">
            <p> <li class="fa fa-exclamation-triangle"> </li> Projeler hakkında düzenleme yapabilemeniz için proje sahibinin tekrardan revizeye açması gerekmektedir!</p>
            <p><li class="fa fa-exclamation-triangle"> </li> Revize onaylandığında eski işlemlerinizin ve dosyalarınızın tamamı silinecektir!</p>
            <p><li class="fa fa-exclamation-triangle"> </li> Revize talebi için teslim edilen projenin onaylanması gerekmektedir!</p>

        </div>
    </div>
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>

                        <th>Proje Adı</th>
                        <th>Son Teslim Tarihi</th>
                        <th>Teslim Tarihi</th>
                        <th>Revize Durumu</th>
                        <th>Revize Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php foreach ($projeler as $proje){
                        ?>

                        <tr>
                            <td><?=$proje->baslik?></td>
                            <td><span class="badge badge-warning" style="font-size: 13px"><?=date('d/m/Y',strtotime($proje->tarih))?></span></td>
                            <td><span class="badge badge-info" style="font-size: 13px"><?=date('d/m/Y',strtotime($proje->teslim_tarih))?></span></td>
                           <td><?php if ($proje->teslim_revize == 0){
                               echo "<span class='badge badge-secondary'>Revize Yapılmadı</span>";
                               }elseif ($proje->teslim_revize == 1){
                                   echo "<span class='badge badge-secondary'>Onaylanma Sürecinde</span>";
                               }
                               elseif ($proje->teslim_revize == 2){
                                   echo "<span class='badge badge-success'>Onaylandı</span>";
                               }
                               elseif ($proje->teslim_revize == 3){
                                   echo "<span class='badge badge-danger'>Onaylanmadı</span>";
                               }?></td>
                            <td><?php if ($proje->teslim_revize_tarih=="0000-00-00"){
                                echo   "<span class='badge badge-secondary'>Revize Yapılmadı</span>";
                                }else{
                                    echo   "<span style='font-size: 13px' class='badge badge-info'>$proje->teslim_revize_tarih</span>";
                                }?></td>
                            <td>

                                <?php
                                if ($proje->teslim_onay == 0){
                                    echo '<span class="badge badge-warning" style="font-size: 13px">Beklemede</span>';
                                }
                                if ($proje->teslim_onay == 1){
                                    echo '<span class="badge badge-info" style="font-size: 13px">İnceleniyor</span>';
                                }
                                if ($proje->teslim_onay == 2){
                                    echo '<span class="badge badge-danger" style="font-size: 13px">Onaylanmadı</span>';
                                }
                                if ($proje->teslim_onay == 3){
                                    echo '<span class="badge badge-success" style="font-size: 13px">Onaylandı</span>';
                                }
                                ?>

                            </td>
                            <td>
                                <?php if ($proje->teslim_revize==0 && $proje->teslim_onay ==3){ ?>
                                    <a href="<?=base_url('projeler/revizetalep/'.$proje->teslim_id)?>" class="btn btn-info">Revize Talep</a>
                               <?php }?>
                                <?php if ($proje->teslim_revize==2){ ?>
                                    <a href="<?=base_url('projeler/duzenle/'.$proje->teslim_id)?>" class="btn btn-success">Düzenle</a>
                                <?php }?>
                                <a href="<?=base_url('projeler/tesgoruntule/'.$proje->teslim_id)?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>

                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>