<?php
   if(isset($_SESSION['resultMessage']) && $_SESSION['resultMessage'] != '') {
      ?>
      <script>
         const alertMessageCode = "<?=$_SESSION['resultMessageCode'];?>";
         let actionPerform = "<?=$_SESSION['actionPerform'];?>";
         if(alertMessageCode == "success") {
            if(actionPerform == "send") {
               swal({
                  title: "Send Successfully!",
                  text: "<?php echo $_SESSION['resultMessage']; ?>",
                  type: "<?php echo $_SESSION['resultMessageCode']; ?>",
                  confirmButtonColor: "#A9CCE3",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false,
                  html: true,
               });
            } else if(actionPerform == "reset") {
               swal({
                  title: "Password Reset Successfully!",
                  text: "<?php echo $_SESSION['resultMessage']; ?>",
                  type: "<?php echo $_SESSION['resultMessageCode']; ?>",
                  confirmButtonColor: "#A9CCE3",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false,
                  html: true,
               });

            } else if(actionPerform == "verified") {
                swal({
                  title: "Verify Successfully!",
                  text: "<?php echo $_SESSION['resultMessage']; ?>",
                  type: "<?php echo $_SESSION['resultMessageCode']; ?>",
                  confirmButtonColor: "#A9CCE3",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false,
                  html: true,
               });

            } else if(actionPerform == "login") {
               swal({
                  title: "Login Successfully!",
                  text: "<?php echo $_SESSION['resultMessage']; ?>",
                  type: "<?php echo $_SESSION['resultMessageCode']; ?>",
                  confirmButtonColor: "#A9CCE3",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false,
                  html: true,
               });
            }
             else {
               location.reload();
            }
            
         } else if(alertMessageCode == "warning") {
            swal({
               title: "Opps!",
               text: "<?php echo $_SESSION['resultMessage']; ?>",
               // type: "<?php echo $_SESSION['resultMessageCode']; ?>",
               imageUrl: "../admin/resources/images/system-photo/gmc.png",
               confirmButtonColor: "#F8C471",
               confirmButtonText: "Ok",
               closeOnConfirm: false,
               html: true,
            });

         } else if(alertMessageCode == "error") {
            swal({
               title: "Failed!",
               text: "<?php echo $_SESSION['resultMessage']; ?>",
               imageUrl: "../admin/resources/images/system-photo/gmc.png",
               confirmButtonColor: "#F8C471",
               confirmButtonText: "Ok",
               closeOnConfirm: false,
               html: true,
            });
            
         } else {
            location.reload();
         }
      </script>
      <?php
          unset($_SESSION['resultMessage']);
   }
?>