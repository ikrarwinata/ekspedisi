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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo ($action) ?>" method="post">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="id_olshop" data-toggle="tooltip" title="<?php echo ('Required') ?>">Pilih Nama OlShop&nbsp;<code>*</code> <a href="<?php echo (base_url('administrator/Olshop/create')) ?>"><small>Atau Tambah Baru</small></a></label>
                                <select class="form-control select2bs4 <?php echo (session()->getFlashdata('ci_flash_message_id_olshop_type')) ?>" id="id_olshop" name="id_olshop" placeholder="Pilih Nama OlShop">
                                    <?php foreach ($listOlshop as $key => $value) : ?>
                                        <option value="<?php echo ($value->id) ?>" <?php echo (inputSelect($data->id_olshop, $value->id)) ?>><?php echo ($value->nama) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_id_olshop')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="jumlah_barang" data-toggle="tooltip" title="<?php echo ('Required') ?>">Jumlah Barang&nbsp;<code>*</code></label>
                                <input type="number" class="form-control <?php echo (session()->getFlashdata('ci_flash_message_jumlah_barang_type')) ?>" name="jumlah_barang" id="jumlah_barang" value="<?php echo ($data->jumlah_barang); ?>" required />
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_jumlah_barang')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="kurir" data-toggle="tooltip" title="<?php echo ('Required') ?>">Kurir&nbsp;<code>*</code></label>
                                <select class="form-control select2bs4 <?php echo (session()->getFlashdata('ci_flash_message_kurir_type')) ?>" id="kurir" name="kurir" placeholder="kurir">
                                    <?php foreach ($listKurir as $key => $value) : ?>
                                        <option value="<?php echo ($value->username) ?>" <?php echo (inputSelect($data->kurir, $value->username)) ?>><?php echo ($value->nama) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo (session()->getFlashdata('ci_flash_message_kurir')) ?>
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