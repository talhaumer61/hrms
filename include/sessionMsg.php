<?php
    if(isset($_SESSION['msg'])) { 
        //$_SESSION['msg']['title']
        echo '
        <script>
            window.onload = function() {
                Toastify({
                    newWindow: !0,
                    text: "'.$_SESSION['msg']['title'].'! '.$_SESSION['msg']['text'].'",
                    gravity: "top",
                    position: "right",
                    className: "bg-'.$_SESSION['msg']['type'].'",
                    stopOnFocus: !0,
                    offset: "50",
                    duration: "2000",
                    close: "close",
                    style: "style",
                }).showToast();
            };
        </script>';
        unset($_SESSION['msg']);
    }
?>