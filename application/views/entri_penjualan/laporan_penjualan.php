                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
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
                                        <?php $no = 1; foreach ($get_penjualan->result() as $row) { ?>
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