<div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Gönderen</th>
                        <th>Proje Adı</th>
                        <th>Son Teslim Tarihi</th>
                        <th>Teslim Tarihi</th>
                        <th>Revize Tarihi</th>
                        <th>Onay Durumu</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($veriler as $veri){?>
                        <tr>
                            <td><?=$veri->name?></td>
                            <td><?=$veri->baslik?></td>
                            <td><?=date('d-m-Y',strtotime($veri->tarih))?></td>
                            <td><?=date('d-m-Y',strtotime($veri->teslim_tarih))?></td>
                            <td>
                                <?php if ($veri->teslim_revize_tarih=="0000-00-00"){
                                    echo   "<span class='badge badge-secondary'>Revize Yapılmadı</span>";
                                }else{
                                    echo   "<span style='font-size: 13px' class='badge badge-info'>$veri->teslim_revize_tarih</span>";
                                }?>
                            </td>

                            <td>
                                <?php
                                if ($veri->teslim_onay == 0){
                                    echo '<span class="badge badge-warning" style="font-size: 13px">Beklemede</span>';
                                }
                                if ($veri->teslim_onay == 1){
                                    echo '<span class="badge badge-info" style="font-size: 13px">İnceleniyor</span>';
                                }
                                if ($veri->teslim_onay == 2){
                                    echo '<span class="badge badge-danger" style="font-size: 13px">Onaylanmadı</span>';
                                }
                                if ($veri->teslim_onay == 3){
                                    echo '<span class="badge badge-success" style="font-size: 13px">Onaylandı</span>';
                                }
                                ?>
                            </td>
                            <td><a href="<?=base_url('teslim/goster/'.$veri->teslim_id)?>" class="btn badge-success"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>