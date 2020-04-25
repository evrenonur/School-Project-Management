<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Proje Güncelle</h3>
        <div class="tile-body">


            <?= form_open(base_url('proje/update'), 'enctype="multipart/form-data"' );?>
            <div class="form-group"
            <label class="control-label">Proje Başlığı</label>
            <input class="form-control" type="text" name="baslik" value="<?=$proje->baslik?>" placeholder="Proje Başlığı">
        </div>
        <div class="form-group">
            <label class="control-label">Proje Açıklaması</label>
            <textarea class="form-control" name="aciklama" rows="4" placeholder="Proje Açıklaması"><?=$proje->aciklama?></textarea>
        </div>


        <div class="form-group">
            <label class="control-label">Proje Ek Dosyanız</label><br>

            <i class="fa fa-file"></i> <a href="<?=base_url('dosya/proje/'.$proje->dosya)?>">
                <span class="badge badge-success">Görmek İçin Tıklayınız</span></a>

        </div>

        <div class="form-group">
            <label class="control-label">Proje Ek Dosya</label><br>
            <span class="badge badge-danger" style="font-size: 13px; margin-bottom: 3px">Yeni dosya eklediğinizde eski dosyanız silinmektedir!</span>

            <input class="form-control" name="dosya" id="dosya" type="file">
            <input type="hidden" name="tmp_dosya" value="<?=$proje->dosya?>">
            <input type="hidden" name="proje_id" value="<?=$proje->proje_id?>">
        </div>

        <div class="form-group">
            <label class="control-label">Son Teslim Tarihi</label>
            <input class="form-control" id="demoDate" type="text" name="tarih" value="<?=date('d-m-Y',strtotime($proje->tarih))?>" placeholder="Tarih Seçiniz">
        </div>

        <div class="form-group">
            <label class="control-label">Aktiflik</label>
            <div class="toggle-flip">
                <label>
                    <input type="checkbox" name="aktif" <?php echo $proje->aktif == 1 ? 'checked': '' ?>>
                    <span class="flip-indecator" data-toggle-on="Aktif" data-toggle-off="Pasif">
                                </span>
                </label>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-success ">Güncelle</button>
        </div>
        <?=form_close()?>
    </div>

</div>
</div>
<div class="clearix"></div>
