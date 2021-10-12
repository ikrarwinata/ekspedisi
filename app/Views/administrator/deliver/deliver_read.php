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
                                <th width="15%">ID Delivery</th>
                                <td>: <?php echo ($data->id); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Resi</th>
                                <td>: <?php echo ($data->resi); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Kurir</th>
                                <td>: <?php echo ($data->nama_kurir . " (" . $data->username_kurir . ")"); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Tanggal Input</th>
                                <td>: <?php echo (date("d M Y H:i:s", $data->tanggal)); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Status</th>
                                <td>:
                                    <?php if ($data->status == -1) : ?>
                                        Cancel
                                    <?php elseif ($data->status == 0) : ?>
                                        On Proses
                                    <?php elseif ($data->status == 1) : ?>
                                        Pending
                                    <?php elseif ($data->status == 2) : ?>
                                        Success
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th width="15%">keterangan</th>
                                <td>: <?php echo ($data->keterangan); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex p-2 bd-highlight">
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url($Page->parent . '/verifikasi') ?>"><?php echo 'Cancel' ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>