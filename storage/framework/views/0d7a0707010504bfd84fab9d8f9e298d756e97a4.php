<!-- footer -->
<div class="news-footer-wrap">
    <div class="fs-shape">
        <img src="<?php echo e(asset_url('images/shape-img/03.png')); ?>" alt="fst" class="fst-1">
        <img src="<?php echo e(asset_url('images/shape-img/04.png')); ?>" alt="fst" class="fst-2">
    </div>
    <!-- Newsletter Section Start Here -->
    <div class="news-letter">
        
    </div>
    <!-- Newsletter Section Ending Here -->

    <!-- Footer Section Start Here -->
    <footer>
        <div class="footer-top padding-tb pt-0">
            <div class="container">
                <div class="row g-4 row-cols-xl-4 row-cols-md-2 row-cols-1 justify-content-center">
                    <div class="col">
                        <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Useful Links</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="<?php echo e(web_url()); ?>">Home</a></li>
                                            <li><a href="<?php echo e(web_url('all-scholarship')); ?>">Scholarship</a></li>
                                            <li><a href="<?php echo e(web_url('about')); ?>">About</a></li>
                                            <li><a href="<?php echo e(web_url('contact')); ?>">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Social Handels</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <?php if(isset(socialHandles()->instagram)): ?>
                                                <li><a href="<?php echo e(socialHandles()->instagram ?? '#'); ?>" target="_blank">Instagram</a></li>
                                            <?php endif; ?>
                                            <?php if(isset(socialHandles()->facebook)): ?>
                                                <li><a href="<?php echo e(socialHandles()->facebook ?? '#'); ?>" target="_blank">Facebook</a></li>
                                            <?php endif; ?>
                                            <?php if(isset(socialHandles()->twitter)): ?>
                                                <li><a href="<?php echo e(socialHandles()->twitter ?? '#'); ?>" target="_blank">Twitter</a></li>
                                            <?php endif; ?>
                                            <?php if(isset(socialHandles()->whatsapp)): ?>
                                                <li><a href="https://wa.me/<?php echo e(socialHandles()->whatsapp ?? '#'); ?>" target="_blank">Whatsapp</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- Footer Section Ending Here -->
</div>
<!-- footer -->
<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/web/layouts/footer.blade.php ENDPATH**/ ?>