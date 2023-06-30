<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Form </h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('create_barang'); ?>" method="post">
                    <div class="form-body">
                        <h3 class="card-title">Input Data Barang</h3>
                        <small class="form-control-feedback">* Menunjukkan Kolom yang Wajib Diisi</small>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*ID Barang</label>
                                    <input type="text" name="id_brg" class="form-control" placeholder="ID Barang" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*Nama Barang</label>
                                    <input type="text" name="nm_brg" class="form-control" placeholder="Nama Barang" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">*Kategori Barang</label>
                                    <select class="form-control custom-select" name="ktg_brg" required>
                                        <option value=""></option>
                                        <option value="IPhone">IPhone</option>
                                        <option value="Mac">Mac</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">*Harga Barang</label><br>
                                    <input type="number" name="hrg_brg" id="hrg_brg" class="form-control" placeholder="Harga Barang" onkeyup="formatAndDisplayRupiah()" required>
                                    <small class="form-control-feedback" id="rupiah"></small>
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