<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Proje Teslim</h3>
        <div class="tile-body">


            <?= form_open(base_url('projeler/insert'), 'enctype="multipart/form-data"'); ?>


            <div class="form-group">
                <label class="control-label">Proje Sahibi</label>
                <input class="form-control" type="text" value="<?= $proje->name ?>" disabled>
            </div>

            <div class="form-group">
                <label class="control-label">Proje Başlığı</label>
                <input class="form-control" type="text" value="<?= $proje->baslik ?>" disabled>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label">Proje Açıklaması</label>
            <textarea class="form-control" name="teslim_aciklama" rows="4" placeholder="Teslim edeceğiniz projeniz hakkında açıklamanız veya notunuz var ise yazabilirsiniz."></textarea>
        </div>

        <div class="form-group">
            <label class="control-label">Proje Ek Dosya</label><br>
            <span class="badge badge-success" style="font-size: 13px; margin-bottom: 4px">Ek dosyanız mecvut ise yükleyiniz.</span>
            <input class="form-control" name="teslim_dosya" id="teslim_dosya" type="file">
        </div>
        <input type="hidden" name="proje_id" value="<?=$proje->proje_id?>" >


        <div class="tile-footer">
            <button class="btn btn-success ">Kaydet</button>
        </div>
        <?= form_close() ?>
    </div>

</div>
</div>
<div class="clearix"></div>
