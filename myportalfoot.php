<footer style="justify-content:space-between;background-color: #050C24;">
    <div class="container-fluid-sm">
        <div class="row" style="border-bottom: 1px solid ; ">

            <div class="col-sm-4 mt-sm-4 " style="text-align:center ;
color:rgba(255, 255, 255,0.5);font-size: 10px!important;" id="aboutus">
                <div class="footr">
                    <h3>About Us</h3>
                </div>
                <div style="padding:10px;">
                    <b>Luxury</b> is what sets apart ambitious people from others.
                    <b>Style </b>is what sets apart sophisticated people from others.
                    <b>Quality</b> is what sets wise people apart from others.
                    At <b>Czar's Place</b>, our vision is to provide our clients with premium watchesthat have luxury, style, and quality.
                    Our products will help you create your own style statement that is bold and classy. <br>
                    <span><b><i>Why choose us?</i> </b> </span> <br>
                    One word: <b>honesty</b>. Our unmatched honesty regarding our products is something our clients will find rare in the industry.
                    Our recommendations will be tailored to your needs, and we will help you embody your very own style statement.

                    <h6> Our Core Values</h6>
                    <span><b>Customers Come First,</b> We do not want to sell you mere objects.
                        We want to adorn you with the best luxury watches and jewelry money could possibly buy.</span>
                    <span><b> Authentic To The Core</b></span> <br>
                    You can throw your fears of being tricked into buying something fake. Integrity, honesty,
                    and authenticity lie in our foundations and sets us apart from others.

                    <span><b>Variety of Style</b> </span> <br>
                    <span>We are constantly searching,
                        looking and talking for new pieces to add to our collection.
                        We understand the importance of diversity in style and we make sure that you find everything you are looking for here at<b> Czars</b>.
                        Our collections include all the important and famous name brands,
                        and when you're choosing to do business with us, you don't need to worry about running out of style.</span>

                </div>

            </div>

            <div class="col-sm-3  mt-sm-4" style="text-align:center ;">
                <h3 class="footr"> DISCLAIMER</h3>
                <p style="color:rgba(255, 255, 255,0.5);
               font-size: 13px!important;"> We are not an official dealer for the products we sell and have no
                    affiliation with the manufacturer.
                    All brand names and trademarks are the property
                    of their respective owners and are used for identification purposes only.</p>
            </div>
            <!--SOCIALS-->

            <div class="col-sm-3  mt-sm-4" style=" text-align:center;">
                <h3 class="footr">FOLLOW US</h3>
                <a href="http://facebook.com" target="_blank" style="text-decoration: none; "> <img src="images/fb1.png" alt="facebook page" width="40" class="socials"></a>

                <a href="http://twitter.com" target="_blank" style="text-decoration: none;"><img src="images/twitter2.png" alt="twitter page" width="40" class="socials"> </a>

                <a href="http://instagram.com" target="_blank" style="text-decoration: none;">
                    <img src="images/ig1.png" alt="instagram page" width="40" class="socials">
                </a>
                <!--WHATSAPP-->

                <a id="whatsapp" href="http://whatsapp.com" target="_blank" style="text-decoration: none;">
                    <div class="mt-2 me-2 opacity-50"><span id="spanwhatsapp">
                            <b>chat with us</b> </span></div>
                    <img src="images/wats2.png" alt="whatsapp" width="40" style=" border-radius: 20%;" >
                </a>
            </div>

            <div class="col-sm-2  mt-sm-4" style="text-align:center; padding-left:7px;padding-right:7px" id="contactus">
                <div>
                    <h3 class="footr"> CONTACT US</h3>
                    <div style="color:rgba(255, 255, 255,0.5);font-size: 13px;font-family:czars;padding-bottom:5px">
                        <i class="fa-solid fa-phone text-light">
                        </i> 08182281634
                    </div>
                    <div>
                        <a href="contactus.php" style="text-decoration: none;color:rgba(255, 255, 255,0.5);font-size: 13px;">
                            <i class="fa-solid fa-message text-light"></i> message </a>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!--COPYRIGHT-->
    <div class="row">
        <p class="col mt-1" style="text-align:center; color:rgba(255, 255, 255,0.5);font-family:czars;
            justify-content:center;" id="copyright_txt">&copy; <?php echo date("Y"); ?> <?php echo CZARS; ?></p>
    </div>
    </div>
</footer> <script type="text/javascript" language="javascript">
        function validateDelete(e) {
            var response = confirm('Are you sure you want to clear cart?');
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