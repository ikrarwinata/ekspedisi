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
                    <?php echo (form_open_multipart($action)) ?>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="id" data-toggle="tooltip" title="<?php echo ('Required') ?>">ID&nbsp;<code>*</code></label>
                                <input type="text" readonly class="form-control" maxlength="25" placeholder="Id" value="<?php echo ($data->id); ?>" />
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
                                <label for="foto" data-toggle="tooltip" title="Required">Foto&nbsp;<code>*</code></label>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="file" name="foto" id="foto" accept="image/*" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_foto_type')) ?>" required multiple="false">
                                        <div class="invalid-feedback">
                                            <?php echo (session()->getFlashdata('ci_flash_message_foto')) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="harga" data-toggle="tooltip" title="<?php echo ('Required') ?>">Harga&nbsp;<code>*</code></label>
                                <input type="number" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_harga_type')) ?>" name="harga" id="harga" value="" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_harga')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="hp" data-toggle="tooltip" title="<?php echo ('Required') ?>">Telepon&nbsp;<code>*</code></label>
                                <input type="tel" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_hp_type')) ?>" name="hp" id="hp" value="" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_hp')) ?>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="id" class="form-control" name="id" style="display:none;" value="<?php echo $data->id ?>">
                        <input type="hidden" id="resi" class="form-control" name="resi" style="display:none;" value="<?php echo $data->resi ?>">
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