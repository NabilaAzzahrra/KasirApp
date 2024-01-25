<!DOCTYPE html>
<html lang="id-ID">

<head>
    <?php $this->load->view('templates/head'); ?>
</head>

<body class="hold-transition sidebar-mini-md layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        $this->load->view('templates/preloader');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kategori</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Beranda</a></li>
                                <li class="breadcrumb-item active">Master</li>
                                <li class="breadcrumb-item active">Kategori</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Kategori</h3>
                                    <button id="tambahkan" class="btn bg-gradient-warning float-right" onclick="return tambah()">
                                        <i class="fal fa-plus-circle"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="tabelku" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Nama Kategori</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($read as $d) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?>.</td>
                                                    <td><?= $d->nama_kategori ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn bg-gradient-warning" onclick="return ubah(`<?= $d->id ?>`, `<?= $d->nama_kategori ?>`)"><i class="fal fa-edit"></i></button>
                                                            <button class="btn bg-gradient-warning" onclick="return hapus(`<?= $d->id ?>`, `<?= $d->nama_kategori ?>`)"><i class="fal fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </div>
    <form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <div id="Modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modal-header" class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <span id="modal-body-update-or-create">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" maxlength="50">
                            </div>
                        </span>
                        <span id="modal-body-delete">
                            Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block" id="modal-button">OK</button>
                        <button type="button" class="btn btn-block" data-dismiss="modal" id="batal" aria-d-none="true">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<?php $this->load->view('templates/script'); ?>
<script>
    $(function() {
        $("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "url": "<?= base_url('assets/plugins/datatables/i18n/id.json'); ?>"
            }
        });
        $('#Modal').on('shown.bs.modal', function() {
            $('[name="nama_kategori"]').focus();
        });
        $('[name="form"]').validate({
            rules: {
                nama_kategori: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    function tambah() {
        $('#Modal').modal('show');
        $('#modal-header').html('Tambah Kategori');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id"]').val("");
        $('[name="nama_kategori"]').val("");
        document.form.action = '<?= base_url('Admin/kategori_add'); ?>';
    }

    function ubah(id, nama_kategori, status) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Kategori');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id"]').val(id);
        $('[name="nama_kategori"]').val(nama_kategori);
        document.form.action = '<?= base_url('Admin/kategori_update'); ?>';
    }

    function hapus(id, nama_kategori) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Kategori');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id"]').val(id);
        $('#name-delete').html(nama_kategori);
        document.form.action = '<?= base_url('Admin/kategori_delete'); ?>';
    }
</script>

</html>
