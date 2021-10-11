<?php
$this->extend($Template->container);
$this->section('content'); ?>
<div class="col-12">
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
                    <table class="table table-light table-striped">
                        <tbody>
                            <tr>
                                <th width="15%">Resi</th>
                                <td>: <?php echo ($data->resi); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">ID Olshop</th>
                                <td>: <?php echo ($data->id_olshop); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Nama Olshop</th>
                                <td>: <?php echo ($data->nama_olshop); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">Foto</th>
                                <td>: <a href="<?php echo (base_url($data->foto)) ?>"><img src="<?php echo (base_url($data->foto)) ?>" style="width: 40px; height: auto;"></a></td>
                            </tr>
                            <tr>
                                <th width="15%">harga</th>
                                <td>: <?php echo ($data->harga); ?></td>
                            </tr>
                            <tr>
                                <th width="15%">status</th>
                                <td>: <?php echo ($data->status); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex p-2 bd-highlight">
                        <button class="btn btn-sm btn-danger" onclick="window.history.go(-1)">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>