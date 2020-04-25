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
              disabled><?= $proje->teslim_aciklama ?></textarea>
</div>


<div class="form-group">
    <label class="control-label">Proje Ek Dosyanız</label><br>

    <i class="fa fa-file"></i> <a href="<?= base_url('dosya/teslim/' . $proje->teslim_dosya) ?>">
        <span class="badge badge-success">Görmek İçin Tıklayınız</span></a>

</div>


<div class="form-group">
    <label class="control-label">Son Teslim Tarihi</label>
    <input class="form-control" id="" type="text" name="tarih" value="<?= date('d-m-Y', strtotime($proje->tarih)) ?>"
           placeholder="Tarih Seçiniz" disabled>
</div>

<?= form_open('teslim/update')?>
<div class="form-group">
    <label for="teslim_onay"><span style="font-size: 13px" class="badge badge-danger">Durumu Güncelleyin</span></label>
    <select class="form-control" name="teslim_onay" id="teslim_onay">
        <option <?=$proje->teslim_onay == 0 ? 'selected="selected"' : '';?>  value="0">Beklemede</option>
        <option <?=$proje->teslim_onay == 1 ? 'selected="selected"' : '';?>  value="1">İnceleniyor</option>
        <option <?=$proje->teslim_onay == 2 ? 'selected="selected"' : '';?>  value="2">Onaylanmadı</option>
        <option <?=$proje->teslim_onay == 3 ? 'selected="selected"' : '';?>  value="3">Onaylandı</option>
    </select>
</div>
<input type="hidden" value="<?=$proje->teslim_id?>" name="teslim_id">

<div class="tile-footer">
    <button type="submit" class="btn btn-info ">Güncelle</button>
</div>
<?= form_close()?>
</div>

</div>
</div>
<div class="clearix"></div>
