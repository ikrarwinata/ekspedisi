<?php
$this->extend($Template->container);
$this->section('content'); ?>
<div class="col-12">
    <div class="clearfix"></div>

    <?php if (session()->getFlashdata('ci_flash_message') != NULL) : ?>
        <div class="alert text-center mb-1 mt-0 <?php echo session()->getFlashdata('ci_flash_message_type') ?>" role="alert">
            <small><?php echo session()->getFlashdata('ci_flash_message') ?></small>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-body">
                    <?php echo (form_open_multipart($action)); ?>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="resi" data-toggle="tooltip" title="<?php echo ('Required') ?>">Resi&nbsp;<code>*</code></label>
                            <input type="text" class="form-control" name="resi" id="resi" maxlength="50" placeholder="Resi" readonly value="<?php echo ($data->resi); ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="id_olshop" data-toggle="tooltip" title="<?php echo ('Required') ?>">Nama Olshop&nbsp;<code>*</code></label>
                            <input type="text" class="form-control" readonly value="<?php echo ($data->nama_olshop); ?>" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="foto" class="col-12" data-toggle="tooltip" title="<?php echo ('Optional') ?>">Foto</label>&nbsp;
                            <?php if (isset($data->foto) && $data->foto != NULL) : ?>
                                <a href="<?php echo (base_url($data->foto)) ?>"><img src="<?php echo (base_url($data->thumbnail)) ?>" style="width:60px;height: auto;"></a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="harga" data-toggle="tooltip" title="<?php echo ('Required') ?>">Harga&nbsp;<code>*</code></label>
                            <input type="number" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_harga_type')) ?>" name="harga" id="harga" value="<?php echo ($data->harga); ?>" required />
                            <div class="invalid-feedback">
                                <?php echo (session()->getFlashdata('ci_flash_message_harga')) ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="oldresi" class="form-control" name="oldresi" style="display:none;" value="<?php echo $data->resi ?>">
                    <div class="d-flex p-2 bd-highlight">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" onclick="window.history.go(-1)"><?php echo 'Cancel' ?></button>
                            <button class="btn btn-sm btn-primary" type="submit"><?php echo 'Save' ?></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>