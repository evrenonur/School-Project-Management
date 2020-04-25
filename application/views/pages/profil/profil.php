
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Profil</h3>
        <div class="tile-body">
            <?=form_open(base_url('profil/update'))?>
                <div class="form-group">
                    <label class="control-label">İsim-Soyisim</label>
                    <input class="form-control" type="text" placeholder="" value="<?=$user->name?>" disabled>
                </div>
                <div class="form-group">
                    <label class="control-label">Email Adresi</label>
                    <input class="form-control" value="<?=$user->email?>" disabled>
                </div>

                <div class="form-group">
                    <label class="control-label">Mevcut Şifreniz</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <label class="control-label">Yeni Şifreniz</label>
                    <input class="form-control" type="password" name="newpass" id="newpass" >
                </div>

                <div class="form-group">
                    <label class="control-label">Şifre Tekrar</label>
                    <input class="form-control" type="password" name="passconf" id="passconf" >
                </div>

        </div>
        <div class="tile-footer">
            <button class="btn btn-success" type="submit">Kaydet</button>
        </div>
        <?=form_close()?>
    </div>
</div>
