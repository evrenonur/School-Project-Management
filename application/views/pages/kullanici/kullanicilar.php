<div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Kullanıcı</th>
                        <th>Mail</th>
                        <th>Rol</th>
                        <th>Aktif</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?=$user->name?></td>
                            <td><?=$user->email?></td>
                            <td><?=$user->role == 0 ? 'Öğrenci':'Yönetici'?></td>
                            <td><?=$user->user_active == 0 ? 'Deaktif':'Aktif'?></td>
                            <td>
                                <button id="<?=$user->user_id?>" class="btn btn-info duzenle"><i class="fa fa-shield"></i></button>
                                <a href="<?=base_url('kullanici/delete/'.$user->user_id)?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).on('click', '.duzenle', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"<?=base_url('kullanici/json_data/')?>"+id,
            method:"GET",
            dataType:"json",
            success:function(data){
                $('#user_id').val(data.user_id);

                if (data.role == 0){
                   document.getElementById("role_0").setAttribute('selected','selected');
                }
                if (data.role == 1){
                    document.getElementById("role_1").setAttribute('selected','selected');
                }
                $('#add_data_Modal').modal('show');
            }
        });

    });
</script>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kullanıcı Rol Düzenle</h4>
            </div>
            <div class="modal-body">
                <?=form_open('kullanici/update','')?>

                <div class="form-group">
                    <select name="role" id="role" class="form-control">
                        <option id="role_0" value="0">Öğrenci</option>
                        <option id="role_1" value="1">Yönetici</option>
                    </select>
                </div>
                <input type="hidden" id="user_id" name="user_id" value="">
                <button type="submit" class="btn btn-success">Kaydet</button>
                <?=form_close()?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
