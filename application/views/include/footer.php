</div>
</div>
    <footer class="footer">
        © 2023 Apple Company
    </footer>
</div>

    <script src="<?php echo base_url() ?>template/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/morrisjs/morris.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/ecom-dashboard.js"></script>
    <script src="<?php echo base_url() ?>template/ecommerce/dist/js/pages/morris-data.js"></script>



    <script src="<?php echo base_url() ?>template/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <script>
        $(function() {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });
    </script>
    <script type="text/javascript">
        // Fungsi untuk memformat dan menampilkan harga dalam format Rupiah
        function formatAndDisplayRupiah() {
            var hrg_brg = document.getElementById('hrg_brg').value; // Ambil nilai harga barang

            // Format angka ke dalam format Rupiah
            var formattedValue = formatRupiah(hrg_brg, 'Rp. ');

            // Tampilkan hasilnya di elemen <small> dengan ID "rupiah"
            document.getElementById('rupiah').innerHTML = formattedValue;
        }

        // Fungsi untuk menampilkan nominal rupiah dari data database saat reset tombol diklik
        function displayRupiahFromDatabase() {
            var hrg_brg = <?php echo $hrg_brg; ?>; // Ambil nilai harga barang dari database

            // Format angka ke dalam format Rupiah
            var formattedValue = formatRupiah(hrg_brg, 'Rp. ');

            // Tampilkan hasilnya di elemen <small> dengan ID "rupiah"
            document.getElementById('rupiah').innerHTML = formattedValue;
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik jika yang diinput sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        // Panggil fungsi saat halaman dimuat untuk menampilkan nominal rupiah awal
        formatAndDisplayRupiah();
    </script>
    <script>
        function getHargaBarang(select) {
            var nama_barang = select.value;

            $.ajax({
                url: "Penjualan/get_barang",
                type: "POST",
                data: {
                    nama_barang: nama_barang
                },
                dataType: "json",
                success: function(data) {
                    $("#harga_barang").val(data.harga_barang);
                }
            });
        }
    </script>
    <script>
        function getHargaBarangUpdate(select) {
            var nama_barang = select.value;

            $.ajax({
                url: "<?php echo base_url('get_harga_barang'); ?>",
                type: "POST",
                data: {
                    nama_barang: nama_barang
                },
                dataType: "json",
                success: function(data) {
                    $("#harga_barang").val(data.harga_barang);
                }
            });
        }
    </script>














    <!-- ============================================================== -->
    <!-- Plugins for datepicker -->
    <!-- ============================================================== -->
    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/moment/moment.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url() ?>template/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>template/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript">
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
        $('#timepicker').bootstrapMaterialDatePicker({
            format: 'HH:mm',
            time: true,
            date: false
        });
        $('#date-format').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY - HH:mm'
        });

        $('#min-date').bootstrapMaterialDatePicker({
            format: 'DD/MM/YYYY HH:mm',
            minDate: new Date()
        });
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        // Colorpicker
        $(".colorpicker").asColorPicker();
        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });
        $(".gradient-colorpicker").asColorPicker({
            mode: 'gradient'
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // -------------------------------
        // Start Date Range Picker
        // -------------------------------

        // Basic Date Range Picker
        $('.daterange').daterangepicker({
            format: 'YYYY/MM/DD'
        });

        // Date & Time
        $('.datetime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });

        //Calendars are not linked
        $('.timeseconds').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            timePicker24Hour: true,
            timePickerSeconds: true,
            locale: {
                format: 'MM-DD-YYYY h:mm:ss'
            }
        });

        // Single Date Range Picker
        $('.singledate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });

        // Auto Apply Date Range
        $('.autoapply').daterangepicker({
            autoApply: true,
        });

        // Calendars are not linked
        $('.linkedCalendars').daterangepicker({
            linkedCalendars: false,
        });

        // Date Limit
        $('.dateLimit').daterangepicker({
            dateLimit: {
                days: 7
            },
        });

        // Show Dropdowns
        $('.showdropdowns').daterangepicker({
            showDropdowns: true,
        });

        // Show Week Numbers
        $('.showweeknumbers').daterangepicker({
            showWeekNumbers: true,
        });

        $('.dateranges').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });

        // Always Show Calendar on Ranges
        $('.shawCalRanges').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            alwaysShowCalendars: true,
        });

        // Top of the form-control open alignment
        $('.drops').daterangepicker({
            drops: "up" // up/down
        });

        // Custom button options
        $('.buttonClass').daterangepicker({
            drops: "up",
            buttonClasses: "btn",
            applyClass: "btn-info",
            cancelClass: "btn-danger"
        });

        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });

        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false,
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse',
            dateLimit: {
                days: 6
            }
        });
    </script>
    <script>
        var data = <?php echo json_encode($penjualan); ?>;
        var labels = [];
        var jumlah = [];

        data.forEach(function(row) {
            labels.push(row.item_dibeli);
            jumlah.push(row.jumlah);
        });

        var ctx = document.getElementById('grafikBatang').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Menggunakan data labels yang sudah Anda siapkan
                datasets: [{
                    label: 'Grafik Penjualan Barang', // Label untuk dataset
                    data: jumlah,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

    <script>
        var data = <?php echo json_encode($penjualan); ?>;
        var labels = [];
        var jumlah = [];

        data.forEach(function(row) {
            labels.push(row.item_dibeli);
            jumlah.push(row.jumlah);
        });

        var ctx = document.getElementById('grafikLingkaran').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: jumlah,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Jumlah Barang Dibeli'
                    }
                }
            }
        });
    </script>
    <script>
        function addItemBarang() {
            var itemBarang = document.getElementById("item_brg");
            var namaBarang = itemBarang.options[itemBarang.selectedIndex].text;
            var hargaBarang = document.getElementById("harga_barang").value;

            if (namaBarang !== "" && hargaBarang !== "") {
                var table = document.getElementById("keranjang").getElementsByTagName("tbody")[0];

                var newRow = table.insertRow(table.rows.length);
                var namaCell = newRow.insertCell(0);
                var hargaCell = newRow.insertCell(1);

                namaCell.innerHTML = namaBarang;
                hargaCell.innerHTML = hargaBarang;

                // Reset input values
                itemBarang.selectedIndex = 0;
                document.getElementById("harga_barang").value = "";
            }
        }
    </script>

</body>

</html>