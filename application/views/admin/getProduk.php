<?php
if ($getProduk != null) {
    foreach ($getProduk as $g) {
?>
        <input type="text" class="form-control d-none" name="nama_produk" value="<?= $g->nama_produk ?>" readonly>
        <div id="hb" class="form-group">
            <label>Harga Beli</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" name="harga_beli" value="<?= $g->harga_beli ?>" readonly>
            </div>
        </div>
        <div id="hj" class="form-group">
            <label>Harga Jual</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" name="harga_jual" value="<?= $g->harga_jual ?>" readonly>
            </div>
        </div>
    <?php }
} else { ?>
    <input type="text" class="form-control d-none" name="nama_produk" value="" readonly>
    <div id="hb" class="form-group">
        <label>Harga Beli</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="form-control" name="harga_beli" value="" readonly>
        </div>
    </div>
    <div id="hj" class="form-group">
        <label>Harga Jual</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="form-control" name="harga_jual" value="" readonly>
        </div>
    </div>
<?php } ?>