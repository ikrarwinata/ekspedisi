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
                        <?php if (isset($data->status) && isset($data->valid) && $data->valid == 1) : ?>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="status" data-toggle="tooltip" title="<?php echo ('Required') ?>">Status&nbsp;<code>*</code></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="-1" <?php echo (inputSelect($data->status, "-1")) ?>>Cancel</option>
                                        <option value="0" <?php echo (inputSelect($data->status, "0")) ?>>On Process</option>
                                        <option value="1" <?php echo (inputSelect($data->status, "1")) ?>>Pending</option>
                                        <option value="2" <?php echo (inputSelect($data->status, "2")) ?>>Success</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo (session()->getFlashdata('ci_flash_message_status')) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
                        <input type="hidden" id="referrer" class="form-control" name="referrer" style="display:none;" value="<?php echo $Page->subtitle['Delivery'] ?>">
                        <div class="d-flex p-2 bd-highlight">
                            <div class="form-group">
                                <a class="btn btn-sm btn-danger" href="<?php echo (base_url($Page->subtitle['Delivery'])) ?>">Cancel</a>
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