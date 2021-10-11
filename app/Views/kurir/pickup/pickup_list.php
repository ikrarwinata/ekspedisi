<?php
$this->extend($Template->container);
$this->section('content');
?>
<div class="col-12">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb-3">
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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-3">
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
                                            <th style="transform: rotate(0);">
                                                OlShop
                                            </th>
                                            <th class="text-center" style="transform: rotate(0);">
                                                <a href="<?php echo (base_url($Page->parent . '/index?sortcolumn=' . base64_encode('jumlah_barang') . '&sortorder=' . ($sortorder == 'ASC' ? 'DESC' : 'ASC'))); ?>" class="stringetched-link text-decoration-none" style="text-decoration: none;color: #243245;">
                                                    <?php if ($sortcolumn == "jumlah_barang") : ?>
                                                        <i class="fas fa-sort-alpha-<?php echo ($sortorder == 'DESC' ? 'down' : 'up'); ?>"></i>&nbsp;
                                                    <?php endif ?>
                                                    Jumlah Barang
                                                </a>
                                            </th>
                                            <th class="text-center">Status</th>
                                            <th width="40px">&nbsp;</th>
                                            <th width="40px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    <?php
                                    $counter = $start;
                                    foreach ($data as $value) :
                                        $counter++
                                    ?>
                                        <tr>
                                            <td><?php echo ($value->nama_olshop) ?></td>
                                            <td class="text-center"><?php echo ($value->jumlah_barang) ?></td>
                                            <td class="text-center">
                                                <?php if ($value->status == 1) : ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php else : ?>
                                                    <span class="badge badge-info">Menunggu</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url($Page->parent . '/update/' . urlencode(base64_encode($value->id))) ?>" title="<?php echo ('Pick') ?>">
                                                    <i class="fa fa-box-open fa-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url($Page->parent . '/done/' . urlencode(base64_encode($value->id))) ?>" title="Tandai Selesai" onclick="return confirm('Anda yakin tandai selesai ?')">
                                                    <i class="fa fa-check fa-lg"></i>
                                                </a>
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