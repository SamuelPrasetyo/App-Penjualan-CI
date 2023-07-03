                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Barang yang Terjual</h4>
                                <div class="text-right">
                                    <span class="text-muted">Todays Order</span>
                                    <h3 class="font-light"><sup><i class="ti-arrow-up text-success"></i></sup> <?php echo $barangTerjual; ?></h3>
                                </div>
                                <span class="text-success">
                                    <?php
                                    $persentase = ($barangTerjual / 100) * 100; // Menghitung persentase total pembelian
                                    echo $persentase . "%";
                                    ?>
                                </span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $persentase; ?>%; height: 6px;" aria-valuenow="<?php echo $persentase; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pajak</h4>
                                <div class="text-right"> <span class="text-muted">Monthly Deduction</span>
                                    <h3 class="font-light"><sup><i class="ti-arrow-up text-primary"></i></sup> $5,000</h3>
                                </div>
                                <span class="text-primary">30%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statistik Pendapatan</h4>
                                <div class="text-right"> <span class="text-muted">Todays Income</span>
                                    <h3 class="font-light"><sup><i class="ti-arrow-down text-info"></i></sup> Rp. <?php echo $statistikPendapatan; ?></h3>
                                </div>
                                <span class="text-info">
                                    <?php
                                    $persentase = ($barangTerjual / 100) * 100; // Menghitung persentase total pembelian
                                    echo $persentase . "%";
                                    ?>
                                </span>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $persentase; ?>%; height: 6px;" aria-valuenow="<?php echo $persentase; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Penjualan Awal Tahun</h4>
                                <div class="text-right"> <span class="text-muted">Yearly  Income</span>
                                    <h3 class="font-light"><sup><i class="ti-arrow-up text-inverse"></i></sup> Rp. <?php echo $penjualanAwalTahun; ?></h3>
                                </div>
                                <span class="text-inverse">
                                    <?php
                                    $persentase = ($barangTerjual / 100) * 100; // Menghitung persentase total pembelian
                                    echo $persentase . "%";
                                    ?>
                                </span>
                                <div class="progress">
                                    <div class="progress-bar bg-inverse" role="progressbar" style="width: <?php echo $persentase; ?>%; height: 6px;" aria-valuenow="<?php echo $persentase; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-40 align-items-center no-block">
                                    <h5 class="card-title ">PRODUK TERJUAL</h5>
                                </div>
                                <!-- <div id="morris-area-chart2" style="height: 400px;"></div> -->
                                <canvas id="grafikBatang" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">PRODUK TERJUAL</h5>
                                        <canvas id="grafikLingkaran" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>