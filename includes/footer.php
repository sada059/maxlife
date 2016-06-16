   <!-- Footer -->
        <footer id="footer">
            <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <p>   <img src="images/icons/security.png">&nbsp; &nbsp; &nbsp; &nbsp;
                        <img src="images/icons/authorize.png"></p>
                </div>
                <div class="col-md-8">
                    <ul>
                        <li><a href="index.php?id=<?php echo $id; ?>">home</a></li>
                        <li><a href="compare.php?id=<?php echo $id; ?>">COMPARE</a></li>
                        <li><a href="privacy.php?id=<?php echo $id; ?>">PRIVACY</a></li>
                        <a href="terms.php?id=<?php echo $id; ?>">TERMS</a>
                        <li><a href="returns.php?id=<?php echo $id; ?>">CANCELLATION/RETURNS</a></li>
                        <li><a href="contact.php?id=<?php echo $id; ?>">CONTACT</a></li>
                        <li><a href="faq.php?id=<?php echo $id; ?>">FAQ</a></li>
                        <li><a href="why-maxlife.php?id=<?php echo $id; ?>">WHY MAXLIFE?</a></li>
                    </ul>
                    <ul>
                        <li>© 2016 <a href="http:maxlifefoods.com" target="_blank">MaxLifeFoods</a>. All rights reserved.</li>
                    </ul>

                </div>
            </div>
            </div>
        </footer>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,

                navigationText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ]

            });
        });
    </script>
