        <!--COPYRIGHT-->
        <footer style="justify-content:space-between;background-color: #050C24;">
            <div class="container-fluid-sm">
                <div class="row">
                    <p class="col mt-1" style="text-align:center; color:rgba(255, 255, 255,0.5);font-family:czars;
            justify-content:center;" id="copyright_txt">&copy; <?php echo date("Y"); ?> <?php echo CZARS; ?></p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" language="javascript">
            function Updatestatus(e) {
                var response = confirm('Are you sure you want to update this order?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }
            function validateDelete(e) {
                var response = confirm('Are you sure you want to delete this Brand?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }
            function Deleteproduct(e) {
                var response = confirm('Are you sure you want to delete this product?');
                if (response == true) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }
            
        </script>

        <?php
        ob_end_flush();
        ?>