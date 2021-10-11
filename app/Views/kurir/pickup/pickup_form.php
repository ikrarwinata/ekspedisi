<?php
$this->extend($Template->container);
$this->section('content'); ?>
<div class="col-12">
    <div class="card badge-secondary">
        <div class="card-body">
            <small>Alamat : <?php echo ($olshop->alamat) ?></small>
        </div>
    </div>
    <div class="clearfix"></div>

    <?php if (session()->getFlashdata('ci_flash_message') != NULL) : ?>
        <div class="alert text-center mb-1 mt-0 <?php echo session()->getFlashdata('ci_flash_message_type') ?>" role="alert">
            <small><?php echo session()->getFlashdata('ci_flash_message') ?></small>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive-sm table-responsive-md">
                                <table class="table table-hover">
                                    <tr>
                                        <th colspan="2">Resi</th>
                                        <th>Harga</th>
                                        <th width="40px"></th>
                                    </tr>
                                    <?php foreach ($master as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php if (isset($value->foto) && $value->foto != NULL) : ?>
                                                    <a href="<?php echo (base_url($value->foto)) ?>"><img src="<?php echo (base_url($value->foto)) ?>" style="width: 60px;height: auto;"></a>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php echo ($value->resi) ?>
                                            </td>
                                            <td>Rp. <?php echo (formatNumber($value->harga)) ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/remove/' . urlencode(base64_encode($value->resi))) ?>" title="Hapus">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-5">
                    <?php echo (form_open_multipart($action)) ?>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="foto" data-toggle="tooltip" title="<?php echo ('Optional') ?>">Foto&nbsp;<code>*</code></label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="file" name="foto" id="foto" accept="image/*" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_foto_type')) ?>" required>
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
                    <input type="hidden" id="oldid" class="form-control" name="oldid" style="display:none;" value="<?php echo $data->id ?>">
                    <input type="hidden" id="id_olshop" class="form-control" name="id_olshop" style="display:none;" value="<?php echo $data->id_olshop ?>">
                    <div class="d-flex p-2 bd-highlight">
                        <div class="form-group">
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/index') ?>">Kembali</a>
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