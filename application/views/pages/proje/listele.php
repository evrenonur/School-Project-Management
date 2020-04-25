<div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Proje Adı</th>
                        <th>Aktiflik</th>
                        <th>Son Teslim Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($projeler as $proje){?>
                    <tr>
                        <td><?=$proje->baslik?></td>
                        <td><?php echo $proje->aktif == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Pasif</span>'?></td>
                        <td><?=date('d/m/Y',strtotime($proje->tarih))?></td>
                        <td>
                            <a href="<?=base_url('proje/guncelle/'.$proje->proje_id)?>" class="btn btn-info"><i class="fa fa-refresh"></i></a>
                            <a href="<?=base_url('proje/sil/'.$proje->proje_id)?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                            <a href="<?=base_url('teslim/listele/'.$proje->proje_id)?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>