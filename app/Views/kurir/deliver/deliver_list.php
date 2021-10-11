<?php
$this->extend($Template->container);
$this->section('content');
?>
<div class="col-12">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb-3">
            <a href="<?php echo base_url($Page->parent . '/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add Stock</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <form action="<?php echo base_url($Page->parent . '/index') ?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" value="<?php echo $keyword; ?>">
                    <span class="input-group-btn">
                        <?php if ($keyword <> '') : ?>
                            <a href="<?php echo base_url($Page->parent . '/index') ?>" class="btn btn-default"><?php echo 'Reset' ?></a>
                        <?php endif; ?>
                        <button class="btn btn-primary" type="submit"><?php echo 'Search' ?></button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="<?php echo base_url($Page->parent . '/index') ?>" class="form-inline" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <?php echo 'Data per-Page :' ?>
                        </div>
                    </div>
                    <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
                    <input type="number" class="form-control" min="2" max="9999999999" name="perPage" value="<?php echo $perPage ?>">
                    <button class="btn btn-secondary" type="submit"><?php echo 'Show' ?></button>
                </div>
            </form>
        </div>
    </div>

    <?php if (session()->getFlashdata('ci_flash_message') != NULL) : ?>
        <div class="alert text-center mb-1 mt-0 <?php echo session()->getFlashdata('ci_flash_message_type') ?>" role="alert">
            <small><?php echo session()->getFlashdata('ci_flash_message') ?></small>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h2>Data <?php echo $Page->title; ?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive-sm table-responsive-md">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="60px" class="text-center">#</th>
                                            <th colspan="2" style="transform: rotate(0);">
                                                <a href="<?php echo (base_url($Page->parent . '/index?sortcolumn=' . base64_encode('resi') . '&sortorder=' . ($sortorder == 'ASC' ? 'DESC' : 'ASC'))); ?>" class="stringetched-link text-decoration-none" style="text-decoration: none;color: #243245;">
                                                    <?php if ($sortcolumn == "resi") : ?>
                                                        <i class="fas fa-sort-alpha-<?php echo ($sortorder == 'DESC' ? 'down' : 'up'); ?>"></i>&nbsp;
                                                    <?php endif ?>
                                                    Resi
                                                </a>
                                            </th>
                                            <th style="transform: rotate(0);">
                                                <a href="<?php echo (base_url($Page->parent . '/index?sortcolumn=' . base64_encode('tanggal') . '&sortorder=' . ($sortorder == 'ASC' ? 'DESC' : 'ASC'))); ?>" class="stringetched-link text-decoration-none" style="text-decoration: none;color: #243245;">
                                                    <?php if ($sortcolumn == "tanggal") : ?>
                                                        <i class="fas fa-sort-alpha-<?php echo ($sortorder == 'DESC' ? 'down' : 'up'); ?>"></i>&nbsp;
                                                    <?php endif ?>
                                                    Tanggal
                                                </a>
                                            </th>
                                            <th class="text-center" style="transform: rotate(0);">
                                                <a href="<?php echo (base_url($Page->parent . '/index?sortcolumn=' . base64_encode('status') . '&sortorder=' . ($sortorder == 'ASC' ? 'DESC' : 'ASC'))); ?>" class="stringetched-link text-decoration-none" style="text-decoration: none;color: #243245;">
                                                    <?php if ($sortcolumn == "status") : ?>
                                                        <i class="fas fa-sort-alpha-<?php echo ($sortorder == 'DESC' ? 'down' : 'up'); ?>"></i>&nbsp;
                                                    <?php endif ?>
                                                    Status
                                                </a>
                                            </th>
                                            <th width="80px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    <?php
                                    $counter = $start;
                                    foreach ($data as $value) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $counter++ ?></td>
                                            <td class="text-center" width="60px">
                                                <?php if (isset($value->foto) && $value->foto != NULL) : ?>
                                                    <a href="<?php echo (base_url($value->foto)) ?>"><img src="<?php echo (base_url($value->thumbnail)) ?>" style="width:60px;height: auto;"></a>
                                                <?php endif ?>
                                            </td>
                                            <td><a href="<?php echo (base_url('kurir/Deliver/read/' . urlencode(base64_encode($value->resi)))) ?>"><?php echo ($value->resi) ?></a></td>
                                            <td><?php echo (date("d M Y H:i:s", $value->tanggal)) ?></td>
                                            <td class="text-center">
                                                <?php if ($value->status == -1) : ?>
                                                    <span class="badge badge-danger">Cancel</span>
                                                <?php elseif ($value->status == 0) : ?>
                                                    <span class="badge badge-primary">On Proses</span>
                                                <?php elseif ($value->status == 1) : ?>
                                                    <span class="badge badge-info">Pending</span>
                                                <?php elseif ($value->status == 2) : ?>
                                                    <span class="badge badge-success">Success</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($value->status != 2) : ?>
                                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url($Page->parent . '/update/' . urlencode(base64_encode($value->id))) ?>" title="<?php echo ('Process On Delivery') ?>">
                                                        <i class="fa fa-truck-loading fa-lg"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <!-- pagination -->
                        <?php echo $pager->makeLinks($currentPage, $perPage, $totalrecord, 'custom_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>;