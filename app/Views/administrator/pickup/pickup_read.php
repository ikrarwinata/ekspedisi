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
                    <table class="table table-light table-striped">
                        <tbody>
                            <tr>
                                <th width="15%">ID Olshop</th>
                                <td>: <?php echo ($data->id_olshop); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Nama Olshop</th>
                                <td>: <?php echo ($data->nama_olshop); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Jumlah Barang</th>
                                <td>: <?php echo ($data->jumlah_barang); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">kurir</th>
                                <td>: <?php echo ($data->nama_kurir . "(" . $data->kurir . ")"); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex p-2 bd-highlight">
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/index') ?>"><?php echo 'Cancel' ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>