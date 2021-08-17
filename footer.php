 <footer>
        <div class="container">
            
                <div class="footer-inner">
                    <div class="row">
                    <div class="f-widget col-sm-3">
                        <h3 class="f-title">ABOUT ESSE AROMAS</h3>
                        <?php global $esse_aromas; ?>
                        <p class="p-text"><?php echo $esse_aromas['copyright-text']; ?></p>
                    </div>
                    <div class="f-widget col-sm-3">
                        <!-- <ul class="list-unstyled footer-nav">
                            <li class="nav-item"><a href="">Order Returns</a></li>
                            <li class="nav-item"><a href="">Wholesale</a></li>
                            <li class="nav-item"><a href="">About Us </a></li>
                            <li class="nav-item"><a href="">Privacy Policy</a></li>
                            <li class="nav-item"><a href="">Delivery and Returns</a></li>
                            <li class="nav-item"><a href="">Terms & Conditions</a></li>
                            <li class="nav-item"><a href="">Contact Us</a></li>
                        </ul> -->
                        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-middle-widget') ) ?>
                    </div>
                    <div class="f-widget col-sm-3">
                        <h3 class="f-title">FIND US ON SOCIAL MEDIA</h3>
                        <ul class="list-unstyled footer-nav social">
                            <?php if($esse_aromas['social-icon']['1']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['1']; ?>">Facebook</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['2']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['2']; ?>">Twitter</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['3']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['3']; ?>">Google Plus</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['4']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['4']; ?>">Printerest</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['5']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['5']; ?>">LinkedIn</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['6']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['6']; ?>">Skype</a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['7']): ?>
                               <li class="nav-item social-item"><a href="<?php echo $esse_aromas['social-icon']['7']; ?>">Instagram</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="f-widget col-sm-3">
                        <h3 class="f-title">CONTACT US</h3>
                        <p class="p-text"><?php echo $esse_aromas['copyright-text-up']; ?></p>
                    </div>
                    </div>
                </div>
            
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-inner">
                    <div class="row">
                        <div class="left col-sm-6">
                            <p class="p-text"><?php echo $esse_aromas['copyright-text-bottom']; ?></p>
                        </div>
                        <div class="text-right col-sm-6">
                            <div class="credit_card paypal-1"></div>
                            <div class="credit_card visa"></div>
                            <div class="credit_card direct-debit"></div>
                            <div class="credit_card mastercard"></div>
                            <div class="credit_card maestro"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer();?>
   
</body>
</html>