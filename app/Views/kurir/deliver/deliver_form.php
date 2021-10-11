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
                                <label for="status" data-toggle="tooltip" title="<?php echo ('Required') ?>">Status Delivery&nbsp;<code>*</code></label>
                                <select class="form-control <?php echo (session()->getFlashdata('ci_flash_message_status_type')) ?>" id="status" name="status" placeholder="Status Delivery" required>
                                    <option value="-1" <?php echo (inputSelect($data->status, "-1")) ?>>Cancel</option>
                                    <option value="0" <?php echo (inputSelect($data->status, "0")) ?>>On Process</option>
                                    <option value="1" <?php echo (inputSelect($data->status, "1")) ?>>Pending</option>
                                    <option value="2" <?php echo (inputSelect($data->status, "2")) ?>>Success</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_resi')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="keterangan" data-toggle="tooltip" title="<?php echo ('Required') ?>">Keterangan&nbsp;<code>*</code></label>
                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"><?php echo ($data->keterangan) ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_username_kurir')) ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
                        <div class="d-flex p-2 bd-highlight">
                            <div class="form-group">
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/index') ?>">Cancel</a>
                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>