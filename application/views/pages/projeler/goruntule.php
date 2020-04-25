<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Proje Görüntüle</h3>
        <div class="tile-body">

            <div class="form-group"
            <label class="control-label">Proje Sahibi</label>
            <input class="form-control" type="text" name="" value="<?= $proje->name ?>"
                   disabled>
        </div>
        <div class="form-group"
        <label class="control-label">Proje Başlığı</label>
        <input class="form-control" type="text" name="baslik" value="<?= $proje->baslik ?>" placeholder="Proje Başlığı"
               disabled>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Proje Açıklaması</label>
    <textarea class="form-control" name="aciklama" rows="4" placeholder="Proje Açıklaması"
              disabled><?= $proje->aciklama ?></textarea>
</div>


<?php if (!empty($proje->dosya)){?>
<div class="form-group">
    <label class="control-label">Proje Ek Dosyanız</label><br>

    <i class="fa fa-file"></i> <a href="<?= base_url('dosya/proje/' . $proje->dosya) ?>">
        <span class="badge badge-success">Görmek İçin Tıklayınız</span></a>
</div>
<?php }?>

<div class="form-group">
    <label class="control-label">Son Teslim Tarihi</label>
    <input class="form-control" id="" type="text" name="tarih" value="<?= date('d-m-Y', strtotime($proje->tarih)) ?>"
           placeholder="Tarih Seçiniz" disabled>
</div>

<div class="tile-footer">
    <a href="<?= base_url('projeler') ?>" class="btn btn-success ">Geri Dön</a>
</div>

</div>

</div>
</div>
<div class="clearix"></div>
