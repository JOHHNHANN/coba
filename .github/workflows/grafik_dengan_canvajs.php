<div class="col-md-6">
                    <div class="row" style="margin-right: 2px; margin-left: 2px">
                    <?php 
                   $data_peminjaman_buku = $this->db->query("SELECT COUNT(id_peminjaman) AS jumlah, DATE_FORMAT(tgl_pinjam,'%M %Y') AS pinjam_bulan FROM tb_peminjaman_buku GROUP BY DATE_FORMAT(tgl_pinjam,'%M %Y')")->result();
                    foreach ($data_peminjaman_buku as $pinjam => $p_buku) {
                       $data_pinjam[]=['label'=>$p_buku->pinjam_bulan, 'y'=>$p_buku->jumlah];
                    }

                    ?>

                   
                    <body>
                        <div id="data_peminjaman" style="height: 370px; width: 100%;"></div>
                        <script src="<?php echo base_url('assets/canvasjs/js/canvasjs.min.js') ?>"></script>

                    </body>
                </div>
                </div>

          
                <script type="text/javascript">
                        window.onload = function (){
                    
                            var chart1 = new CanvasJS.Chart("data_peminjaman",{
                                theme: "light1",
                                animationEnabled: true,
                                title:{
                                    text: "Jumlah Peminjaman Buku"

                                },
                                axisY:[{
                               title: "Jumlah Peminjaman",       
                              }],
                              axisX:[{
                               title: "Bulan-Tahun",       
                              }],
                                data: [
                                {
                                    type: "column",
                                    dataPoints: 
                                   
                                   <?=json_encode($data_pinjam,JSON_NUMERIC_CHECK);?>
                                    
                                }
                                ]
                            });
                            chart1.render();
                        }
                    </script>