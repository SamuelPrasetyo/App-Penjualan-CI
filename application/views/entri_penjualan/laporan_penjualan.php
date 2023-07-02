                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <form action="<?php echo base_url('range_penjualan'); ?>" method="post">
                                    <div class="input-group-append">
                                        <!-- <input type="text" class="form-control daterange" name="dateRange" style="width: 500px;"/> -->
                                        <input type="date" name="tgl_beli1" class="form-control" placeholder="dd/mm/yy" style="width: 150px;" required> <h2>&nbsp; - &nbsp;</h2>
                                        <input type="date" name="tgl_beli2" class="form-control" placeholder="dd/mm/yy" style="width: 150px;" required> <h2>&nbsp;</h2>
                                            <!-- <span class="input-group-text">
                                                <span class="ti-calendar"></span>
                                            </span> -->
                                        <button type="submit" name="submit" class="btn btn-info" style="height: 38px;"> <i class="fas fa-search"></i> Search</button>
                                    </div>           
                                </form>
                                <div class="table-responsive m-t-10">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal Beli</th>
                                                <th>Nama Pembeli</th>
                                                <th>Item Dibeli</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal Beli</th>
                                                <th>Nama Pembeli</th>
                                                <th>Item Dibeli</th>
                                                <th>Harga</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $no = 1; foreach ($get_penjualan as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->id_transaksi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->tgl_beli; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nama_pembeli; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->item_dibeli; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->total_harga; ?>
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