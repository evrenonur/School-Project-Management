<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Proje Ekle</h3>
        <div class="tile-body">


            <?= form_open(base_url('proje/insert'), 'enctype="multipart/form-data"' );?>
                <div class="form-group"
                    <label class="control-label">Proje Başlığı</label>
                    <input class="form-control" type="text" name="baslik" placeholder="Proje Başlığı">
                </div>
                <div class="form-group">
                    <label class="control-label">Proje Açıklaması</label>
                    <textarea class="form-control" name="aciklama" rows="4" placeholder="Proje Açıklaması"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Proje Ek Dosya</label>
                    <input class="form-control" name="dosya" id="dosya" type="file">
                </div>

                <div class="form-group">
                    <label class="control-label">Son Teslim Tarihi</label>
                    <input class="form-control" id="demoDate" type="text" name="tarih" placeholder="Tarih Seçiniz">
                </div>

                <div class="form-group">
                    <label class="control-label">Aktiflik</label>
                    <div class="toggle-flip">
                        <label>
                            <input type="checkbox" name="aktif" checked>
                            <span class="flip-indecator" data-toggle-on="Aktif" data-toggle-off="Pasif">
                                </span>
                        </label>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-success ">Kaydet</button>
                </div>
            <?=form_close()?>
        </div>

    </div>
</div>
<div class="clearix"></div>
