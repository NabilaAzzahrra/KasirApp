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
                            <h1 class="m-0">Produk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Beranda</a></li>
                                <li class="breadcrumb-item active">Master</li>
                                <li class="breadcrumb-item active">Produk</li>
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
                                    <h3 class="card-title">Daftar Produk</h3>
                                    <button id="tambahkan" class="btn bg-gradient-warning float-right" onclick="return tambah()">
                                        <i class="fal fa-plus-circle"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="tabelku" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Nama Produk</th>
                                                <th class="text-center">Kuantitas</th>
                                                <th class="text-center">Harga Beli</th>
                                                <th class="text-center">Harga Jual</th>
                                                <th class="text-center">Margin</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($read as $d) {
                                                $margin = $d->harga_jual - $d->harga_beli;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?>.</td>
                                                    <td><?= $d->nama_produk ?></td>
                                                    <td class="text-center"><?= $d->qty ?></td>
                                                    <td>Rp<span class="float-right"><?= number_format($d->harga_beli, '0', '.', '.'); ?></span></td>
                                                    <td>Rp<span class="float-right"><?= number_format($d->harga_jual, '0', '.', '.'); ?></span></td>
                                                    <td>Rp<span class="float-right"><?= number_format($margin, '0', '.', '.'); ?></span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn bg-gradient-warning" onclick="return ubah(`<?= $d->id ?>`, `<?= $d->id_owner ?>`, `<?= $d->id_kategori ?>`, `<?= $d->nama_produk ?>`, `<?= $d->qty ?>`, `<?= $d->harga_beli ?>`, `<?= $d->harga_jual ?>`)"><i class="fal fa-edit"></i></button>
                                                            <button class="btn bg-gradient-warning" onclick="return hapus(`<?= $d->id ?>`, `<?= $d->nama_produk ?>`)"><i class="fal fa-trash"></i></button>
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
                                <label>Nama Owner</label>
                                <select name="id_owner" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Owner">
                                    <?php foreach ($owner as $o) { ?>
                                        <option value="<?= $o->id ?>"><?= $o->nama_owner ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <select name="id_kategori" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" data-placeholder="Pilih Kategori">
                                    <?php foreach ($kategori as $k) { ?>
                                        <option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Produk">
                            </div>
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <input type="number" name="qty" class="form-control" placeholder="Kuantitas">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual">
                                </div>
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
            $('[name="id_owner"]').focus();
        });
        $('.select2').select2({
            dropdownParent: $('#Modal')
        });
        $('[name="harga_beli"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="harga_jual"]').inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            digits: 0,
            digitsOptional: true
        });
        $('[name="form"]').validate({
            rules: {
                id_owner: {
                    required: true
                },
                id_kategori: {
                    required: true
                },
                nama_produk: {
                    required: true
                },
                qty: {
                    required: true
                },
                harga_beli: {
                    required: true
                },
                harga_jual: {
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
        $('#modal-header').html('Tambah Produk');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id"]').val("");
        $('[name="id_owner"]').val(null).trigger('change');
        $('[name="id_kategori"]').val(null).trigger('change');
        $('[name="nama_produk"]').val("");
        $('[name="qty"]').val("");
        $('[name="harga_beli"]').val("");
        $('[name="harga_jual"]').val("");
        document.form.action = '<?= base_url('Admin/produk_add'); ?>';
    }

    function ubah(id, id_owner, id_kategori, nama_produk, qty, harga_beli, harga_jual) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Produk');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id"]').val(id);
        $('[name="id_owner"]').val(id_owner).trigger('change');
        $('[name="id_kategori"]').val(id_kategori).trigger('change');
        $('[name="nama_produk"]').val(nama_produk);
        $('[name="qty"]').val(qty);
        $('[name="harga_beli"]').val(harga_beli);
        $('[name="harga_jual"]').val(harga_jual);
        document.form.action = '<?= base_url('Admin/produk_update'); ?>';
    }

    function hapus(id, nama_produk) {
        $('#Modal').modal('show');
        $('#modal-header').html('Hapus Produk');
        $('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-body-update-or-create').addClass('d-none');
        $('#modal-body-delete').removeClass('d-none');
        $('[name="id"]').val(id);
        $('#name-delete').html(nama_produk);
        document.form.action = '<?= base_url('Admin/produk_delete'); ?>';
    }
</script>

</html>
