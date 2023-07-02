<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="m-b-0 text-black">Form </h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('update_penjualan'); ?>" method="post">
                    <div class="form-body">
                        <h3 class="card-title">Update Data Penjualan</h3>
                        <small class="form-control-feedback">* Menunjukkan Kolom yang Wajib Diisi</small>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">ID Transaksi</label>
                                    <input type="text" name="id_tsk" class="form-control" value="<?php echo $id_pjl; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*Nama Pembeli</label>
                                    <input type="text" name="nm_pbl" class="form-control" placeholder="Nama Barang" autocomplete="off" value="<?php echo $nm_pbl; ?>" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">*Item Barang</label>
                                    <select class="form-control custom-select" name="item_brg" required onchange="getHargaBarangUpdate(this)">
                                        <option value=""></option>
                                        <?php
                                            $sql_barang = $this->db->get('data_barang');
                                            foreach ($sql_barang->result() as $row) {
                                        ?>
                                            <option value="<?php echo $row->nama_barang; ?>" <?php if($item_dibeli == $row->nama_barang) echo "selected"; ?>><?php echo $row->nama_barang; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*Tanggal Beli</label><br>
                                    <input type="date" name="tgl_beli" class="form-control" placeholder="dd/mm/yy" value="<?php echo $tgl; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Harga Barang</label><br>
                                    <input type="number" name="hrg_brg" id="harga_barang" class="form-control" placeholder="Harga Barang" onkeyup="formatAndDisplayRupiah()" autocomplete="off" value="<?php echo $hrg; ?>" readonly>
                                    <small class="form-control-feedback">Sudah Termasuk Pajak 11%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <button type="reset" class="btn btn-danger"> <i class="fas fa-sync-alt"></i> Reset</button>
                        <a href="<?=base_url('home')?>" class="btn btn-inverse">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>