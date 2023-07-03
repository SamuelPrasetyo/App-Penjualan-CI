<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $card_title; ?></h4>
                                <h6 class="card-subtitle">Data Penjualan</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable"
                                        class="table table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal Beli</th>
                                                <th>Nama Pembeli</th>
                                                <th>Item Dibeli</th>
                                                <th>Harga</th>
                                                <th>Action</th>
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
                                                <th>Action</th>
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
                                                    Rp. <?php echo $row->total_harga; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?php echo base_url('edit_penjualan/'.$row->id_transaksi); ?>">Update</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_penjualan/'.$row->id_transaksi); ?>">Delete</a>
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