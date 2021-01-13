<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <?= $title ?>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <a href="<?= base_url('rumkit/input') ?>" class="btn-primary btn-sm"><i class="fa fa-plus"></i>  Input Data </a>
            <div><br> </div>
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $this->session->flashdata('pesan');
                echo '<a href="#" class="alert-link"></a>.' ;
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Rumah Sakit</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($rumkit as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value-> nama_rumkit ?></td>
                            <td><?= $value-> no_telfon ?></td>
                            <td><?= $value-> alamat ?></td>
                            <td><?= $value-> latitude ?></td>
                            <td><?= $value-> longitude ?></td>
                            <td>
                                <a href="<?= base_url('rumkit/edit/' .$value->id_rumkit)?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?= base_url('rumkit/delete/' .$value->id_rumkit)?>" class="btn btn-danger btn-sm" onclick=" return confirm('Apakah Ingin Hapus Data?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
