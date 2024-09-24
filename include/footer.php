<?php
echo'
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                '.COPY_RIGHTS_ORG.' <br>
                                Powered by: <a href="'.COPY_RIGHTS_URL.'">'.COPY_RIGHTS.'</a> <small>v1.0</small>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top"><i class="ri-arrow-up-line"></i></button>
        <script>
            function myClock() {
                setTimeout(function () {
                    const d = new Date();
                    const n = d.toLocaleTimeString();
                    document.getElementById("time").innerHTML = n;
                    myClock();
                }, 1000)
            }
            myClock();
        </script>
        <!-- INCLUDES MODAL FUNCTIONS -->
        <script type="text/javascript">
            document.addEventListener("keydown", function(event) {
                if (event.ctrlKey && event.key === "s" || event.ctrlKey && event.key === "p") {
                    event.preventDefault();
                }
            });
            function showAjaxModalZoom(url) {
                $.ajax( {
                    url: url,
                    success: function ( response ) {
                        jQuery( \'#show_modal\' ).html( response );
                        $("#show_modal").modal("show");
                    }
                } );
            }
        </script>
        <div class="modal fade" id="show_modal"></div>
        <script type="text/javascript">
            function showAjaxModalView(url) {
                $.ajax( {
                    url: url,
                    success: function ( response ) {
                        jQuery(\'#offcanvasRight\').html( response );
                    }
                } );
            }
        </script>
        <div class="offcanvas offcanvas-end" style="width: 30%; visibility: visible;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"></div>
        <script type="text/javascript">
            function confirm_modal( delete_url ) {
                swal( {
                    title: "Are you sure?",
                    text: "Are you sure that you want to delete this information?",
                    type: "warning",
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    closeOnConfirm: false,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    cancelButtonColor: "#f5f7fa",
                    confirmButtonColor: "#ed5e5e"
                }, function () {
                    $.ajax( {
                        url: delete_url,
                        type: "POST"
                    } )
                    .done( function ( data ) {
                        swal( {
                            title: "Deleted",
                            text: "Information has been successfully deleted",
                            type: "success"
                        }, function () {
                            location.reload();
                        } );
                    } )
                    .error( function ( data ) {
                        swal( "Oops", "We couldn\'t\ connect to the server!", "error" );
                    } );
                } );
            }
            function getCity(val) {
                $.ajax({
                    type: "POST",
                    url: "include/ajax/get_city.php",
                    data: "id_substate=" + val,
                    success: function(data) {
                        $("#id_city").html(data);
                    }
                });
            }
            
        </script>
        
        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- prismjs plugin -->
        <script src="assets/libs/prismjs/prism.js"></script>
        <script src="assets/libs/list.js/list.min.js"></script>
        <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

        <!-- listjs init -->
        <script src="assets/js/pages/listjs.init.js"></script>
    
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    
        <!-- Vector map-->
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    
        <!--Swiper slider js-->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
    
        <!-- Dashboard init -->
        <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>
    
        <!-- dropzone min -->
        <script src="assets/libs/dropzone/dropzone-min.js"></script>

        <!-- filepond js -->
        <script src="assets/libs/filepond/filepond.min.js"></script>
        <script src="assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
        <script src="assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
        <script src="assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
        <script src="assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
        <script src="assets/js/pages/form-file-upload.init.js"></script>

        <!-- swiper.init js -->
        <script src="assets/js/pages/swiper.init.js"></script>

        <!-- Time Line -->
        <script src="assets/js/pages/timeline.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    
        <!-- gridjs js -->
        <script src="assets/libs/gridjs/gridjs.umd.js"></script>

        <!-- gridjs init -->
        <script src="assets/js/pages/gridjs.init.js"></script>
        
        <!-- notifications init -->
        <script src="assets/js/pages/notifications.init.js"></script>
    </body>
</html>';
?>