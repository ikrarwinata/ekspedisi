<?php 
$this->extend($Template->container);
$this->section('content'); ?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $Page->title; ?></h3>
        </div>
    </div>
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
                                <label for="resi" data-toggle="tooltip" title="<?php echo ('Required') ?>">Resi&nbsp;<code>*</code></label>
                                <input type="text" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_resi_type')) ?>" autocomplete="on" name="resi" id="resi" maxlength="50" placeholder="Resi" value="<?php echo ($data->resi); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_resi')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="id_olshop" data-toggle="tooltip" title="<?php echo ('Required') ?>">Id_olshop&nbsp;<code>*</code></label>
                                <input type="text" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_id_olshop_type')) ?>" autocomplete="on" name="id_olshop" id="id_olshop" maxlength="25" placeholder="Id_olshop" value="<?php echo ($data->id_olshop); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_id_olshop')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="foto" data-toggle="tooltip" title="<?php echo ('Optional') ?>">Foto</label>
                                <textarea class="form-control <?php echo (session()->getFlashdata('ci_flash_message_foto_type')) ?>" rows="3" name="foto" id="foto" maxlength="65535" placeholder="Foto"  ><?php echo ($data->foto); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_foto')) ?>
                                </div>
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
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent.'/index') ?>"><?php echo 'Cancel' ?></a>
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
