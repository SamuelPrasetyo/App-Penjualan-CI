                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $card_title; ?></h4>
                                <h6 class="card-subtitle">Data Barang</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable"
                                        class="table table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $no = 1; foreach ($get_barang->result() as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->id_barang; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nama_barang; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->kategori; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->harga_barang; ?>
                                                </td>
                                                <!-- <td>
                                                    <a class="btn btn-warning" href="<?php echo base_url('update_barang/'.$row->id_barang); ?>">Update</a>
                                                    <a class="btn btn-danger" href="<?php echo base_url('delete_barang/'.$row->id_barang); ?>">Delete</a>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>