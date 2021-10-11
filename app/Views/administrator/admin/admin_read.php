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
                            <th width="15%">username</th><td>: <?php echo ($data->username); ?></td>
                        </tr>
                            <tr>
                            <th width="15%">password</th><td>: <?php echo ($data->password); ?></td>
                        </tr>
                            <tr>
                            <th width="15%">nama</th><td>: <?php echo ($data->nama); ?></td>
                        </tr>
                            <tr>
                            <th width="15%">hp</th><td>: <?php echo ($data->hp); ?></td>
                        </tr>
                            <tr>
                            <th width="15%">email</th><td>: <?php echo ($data->email); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex p-2 bd-highlight">
                        <button class="btn btn-sm btn-danger" onclick="window.history.go(-1)"><?php echo 'Cancel' ?></>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
