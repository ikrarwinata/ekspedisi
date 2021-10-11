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
                                <label for="id" data-toggle="tooltip" title="<?php echo ('Required') ?>">Id&nbsp;<code>*</code></label>
                                <input type="text" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_id_type')) ?>" autocomplete="on" name="id" id="id" maxlength="25" placeholder="Id" value="<?php echo ($data->id); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_id')) ?>
                                </div>
                            </div>
                        </div>
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
                                <label for="username_kurir" data-toggle="tooltip" title="<?php echo ('Required') ?>">Username_kurir&nbsp;<code>*</code></label>
                                <input type="text" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_username_kurir_type')) ?>" autocomplete="on" name="username_kurir" id="username_kurir" maxlength="50" placeholder="Username_kurir" value="<?php echo ($data->username_kurir); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_username_kurir')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="tanggal" data-toggle="tooltip" title="<?php echo ('Required') ?>">Tanggal&nbsp;<code>*</code></label>
                                <input type="number" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_tanggal_type')) ?>" name="tanggal" id="tanggal" value="<?php echo ($data->tanggal); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_tanggal')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="status" data-toggle="tooltip" title="<?php echo ('Required') ?>">Status&nbsp;<code>*</code></label>
                                <input type="radio" name="status" id="status" value="<?php echo ($data->status); ?>" required />&nbsp;<label for="status">status</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="keterangan" data-toggle="tooltip" title="<?php echo ('Optional') ?>">Keterangan</label>
                                <textarea class="form-control <?php echo (session()->getFlashdata('ci_flash_message_keterangan_type')) ?>" rows="3" name="keterangan" id="keterangan" maxlength="65535" placeholder="Keterangan"  ><?php echo ($data->keterangan); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_keterangan')) ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
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
