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
                    <form action="<?php echo ($action) ?>" method="post">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="id" data-toggle="tooltip" title="<?php echo ('Required') ?>">ID&nbsp;<code>*</code></label>
                                <input type="text" readonly class="form-control <?php echo (session()->getFlashdata('ci_flash_message_id_type')) ?>" autocomplete="on" name="id" id="id" maxlength="25" placeholder="Id" value="<?php echo ($data->id); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_id')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="resi" data-toggle="tooltip" title="<?php echo ('Required') ?>">Resi&nbsp;<code>*</code></label>
                                <select class="form-control select2bs4 <?php echo (session()->getFlashdata('ci_flash_message_resi_type')) ?>" id="resi" name="resi" placeholder="resi" <?php echo ($disableResi ? "disabled" : NULL) ?> required>
                                    <?php foreach ($listResi as $key => $value) : ?>
                                        <option value="<?php echo ($value->resi) ?>" <?php echo (inputSelect($data->resi, $value->resi)) ?>><?php echo ($value->resi) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_resi')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="username_kurir" data-toggle="tooltip" title="<?php echo ('Required') ?>">Kurir&nbsp;<code>*</code></label>
                                <select class="form-control select2bs4 <?php echo (session()->getFlashdata('ci_flash_message_username_kurir_type')) ?>" id="username_kurir" name="username_kurir" placeholder="username_kurir">
                                    <?php foreach ($listKurir as $key => $value) : ?>
                                        <option value="<?php echo ($value->username) ?>" <?php echo (inputSelect($data->username_kurir, $value->username)) ?>><?php echo ($value->nama) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_username_kurir')) ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
                        <div class="d-flex p-2 bd-highlight">
                            <div class="form-group">
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/index') ?>"><?php echo 'Cancel' ?></a>
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