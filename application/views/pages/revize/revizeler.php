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
                        <th>Son Revize Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($revizeler as $revize){?>
                        <tr>
                            <td><?=$revize->name?></td>
                            <td><?=$revize->baslik?></td>
                            <td><?=date('d-m-Y',strtotime($revize->tarih))?></td>
                            <td><?php
                                if ($revize->teslim_revize_tarih == "0000-00-00"){
                                    echo "Revize Yapılmamış";
                                }else{
                                    echo date('d-m-Y',strtotime($revize->teslim_revize_tarih));
                                }
                                ?></td>
                            <td>
                                <a href="<?=base_url('revize/onayla/'.$revize->teslim_id)?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                                <a href="<?=base_url('revize/onaylama/'.$revize->teslim_id)?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                <a href="<?=base_url('revize/goruntule/'.$revize->teslim_id)?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            </td>

                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>