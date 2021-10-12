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
                                <input type="text" readonly class="form-control" maxlength="25" placeholder="Id" value="<?php echo ($data->id); ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="resi" data-toggle="tooltip" title="<?php echo ('Required') ?>">Resi&nbsp;<code>*</code></label>
                                <input type="text" readonly class="form-control" maxlength="25" placeholder="Id" value="<?php echo ($data->resi); ?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="harga" data-toggle="tooltip" title="<?php echo ('Required') ?>">Harga&nbsp;<code>*</code></label>
                                <input type="number" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_harga_type')) ?>" name="harga" id="harga" required value="<?php echo ($data->harga) ?>" />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_harga')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="hp" data-toggle="tooltip" title="<?php echo ('Required') ?>">Telepon&nbsp;<code>*</code></label>
                                <input type="tel" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_hp_type')) ?>" name="hp" id="hp" required value="<?php echo ($data->hp) ?>" />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_hp')) ?>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
                        <div class="d-flex p-2 bd-highlight">
                            <div class="form-group">
                                <a class="btn btn-sm btn-danger" href="<?php echo (base_url($Page->parent . "/verifikasi")) ?>">Cancel</a>
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