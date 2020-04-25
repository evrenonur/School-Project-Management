

<div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Proje Sahibi</th>
                        <th>Proje Adı</th>
                        <th>Son Teslim Tarihi</th>
                        <th>Kalan Gün</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $tarih = new DateTime(date('Y-m-d'));

                    foreach ($projeler as $proje){

                            $tarih2 = new DateTime(date('Y-m-d',strtotime($proje->tarih)));
                            $interval = $tarih->diff($tarih2);
                         ?>

                        <tr>
                            <td><?=$proje->name?></td>
                            <td><?=$proje->baslik?></td>
                            <td><span class="badge badge-warning" style="font-size: 13px"><?=date('d/m/Y',strtotime($proje->tarih))?></span></td>
                            <td><span class="badge badge-secondary" style="font-size: 13px"><?=$interval->d." Gün Kaldı"?></span></td>

                            <td>

                                <a href="<?=base_url('projeler/goruntule/'.$proje->proje_id)?>"
                                   class="btn btn-info">Görüntüle</a>
                                <a href="<?=base_url('projeler/teslimet/'.$proje->proje_id)?>"
                                   class="btn btn-success">Teslim Et</a>

                            </td>
                        </tr>

                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>