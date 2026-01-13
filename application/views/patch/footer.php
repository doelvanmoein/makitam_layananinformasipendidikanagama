    <footer class="footer footer-static footer-transparent">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; <script>
          document.write(new Date().getFullYear())
          </script> Kantor Kementerian Agama Kota Sawahlunto | All rights reserved. </span>
      </p>
    </footer>

    <script src="<?=  base_url('app-assets/vendors/js/vendors.min.js')?>" type="text/javascript"></script>
    <script src="<?=  base_url('app-assets/js/core/app-menu.js')?>" type="text/javascript"></script>
    <script src="<?=  base_url('app-assets/js/core/app.js')?>" type="text/javascript"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var map;  // Variabel untuk menyimpan instance peta
        var PI = {
            onReady: function(){
                $('.info-worshiphouse').click(PI.showDetailInfo);
            },
            showDetailInfo: function(){
                var id = $(this).attr('data-id');
                // console.log(id);
                $.ajax({
                    url: $(this).attr('data-url'),
                    type: 'POST',
                    dataType: 'json',
                    async: true,
                    success: function(data){
                        // console.log(data);
                        var home_tab = $('#home');
                        home_tab.empty();
                        var home_content = `<div class="table-responsive">
                            <table class="table table-de mb-0">                    
                                <tbody>
                                <tr>
                                    <td>Nama Rumah Ibadah</td>
                                    <td>`+data.worshiphouse_name+`</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>`+data.worshiphouse_type+`</td>                        
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>`+data.worshiphouse_religion+`</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>`+data.worshiphouse_kec+`</td>                        
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>`+data.worshiphouse_kel+`</td>                        
                                </tr> 
                                <tr>
                                    <td>Alamat</td>
                                    <td>`+data.worshiphouse_address+`</td>                        
                                </tr> 
                                <tr>
                                    <td>Penanggungjawab</td>
                                    <td>`+data.worshiphouse_pj+`</td>                        
                                </tr>    
                                <tr>
                                    <td>No.HP Penanggungjawab</td>
                                    <td>`+data.worshiphouse_pjno+`</td>                        
                                </tr>                   
                                </tbody>
                            </table>
                            </div>`;

                        home_tab.append(home_content);

                        var history_tab = $('#history');
                        history_tab.empty();
                        var history_content = `<div class="card-body">`+data.worshiphouse_history+`</div>`;
                        history_tab.append(history_content);

                        var facility_tab = $('#facility');
                        facility_tab.empty();
                        var facility_content = `<div class="card-body">`+data.worshiphouse_facility+`</div>`;
                        facility_tab.append(facility_content);

                        var schedule_tab = $('#schedule');
                        schedule_tab.empty();
                        var schedule_content = `<div class="card-body">`+data.worshiphouse_schedule+`</div>`;
                        schedule_tab.append(schedule_content);

                        // var schedule_tab = $('#schedule');
                        // schedule_tab.empty();
                        // var schedule_content = `<div class="card-body">`+data.worshiphouse_schedule+`</div>`;
                        // schedule_tab.append(schedule_content);

                        var photo_tab = $('#photo');
                        photo_tab.empty();
                        var photo_content = `<div class="card-body">`+data.worshiphouse_schedule+`</div>`;
                        photo_tab.append(photo_content);

                        var map_tab = $('#map_content');
                        map_tab.empty();
                        var map_content = `<div class="card-body">`+data.worshiphouse_schedule+`</div>`;
                        // map_tab.append(map_content);
                        // Koordinat untuk pusat peta (latitude, longitude)
                        var lat = data.worshiphouse_latitude;  
                        var lon = data.worshiphouse_longitude; 

                        // Membuat peta dengan Leaflet.js
                        if (map) {  // Jika peta sudah ada
                            map.remove();  // Hapus peta yang sudah ada
                        }

                        var map = L.map('map_content').setView([lat, lon], 13); // Set tampilan awal dengan zoom level 13
                        

                        // Menambahkan Tile Layer untuk peta dari OpenStreetMap
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        // Menambahkan marker pada lokasi yang ditentukan
                        var marker = L.marker([lat, lon]).addTo(map);

                        // Menambahkan popup untuk marker
                        marker.bindPopup("<b>Lokasi Rumah Ibadah</b><br>Latitude: " + lat + "<br>Longitude: " + lon).openPopup();

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            }
        };
        
        $(document).ready(PI.onReady);
    </script>
  </body>
</html>