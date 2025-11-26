<!-- footer -->
<div class="news-footer-wrap">
    <div class="fs-shape">
        <img src="{{ asset_url('images/shape-img/03.png') }}" alt="fst" class="fst-1">
        <img src="{{ asset_url('images/shape-img/04.png') }}" alt="fst" class="fst-2">
    </div>
    <!-- Newsletter Section Start Here -->
    <div class="news-letter">
        {{-- <div class="container">
            <div class="section-wrapper">
                <div class="news-title">
                    <h3>Want Us To Email You About Special Offers And Updates?</h3>
                </div>
                <div class="news-form">
                    <form action="https://demos.codexcoder.com/">
                        <div class="nf-list">
                            <input type="email" name="email" placeholder="Enter Your Email">
                            <input type="submit" name="submit" value="Subscribe Now">
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
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
                                            <li><a href="{{web_url()}}">Home</a></li>
                                            <li><a href="{{web_url('all-scholarship')}}">Scholarship</a></li>
                                            <li><a href="{{web_url('about')}}">About</a></li>
                                            <li><a href="{{web_url('contact')}}">Contact</a></li>
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
                                        <h4>Social Media</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            @if(isset(socialHandles()->instagram))
                                                <li><a href="{{socialHandles()->instagram ?? '#'}}" target="_blank">Instagram</a></li>
                                            @endif
                                            @if(isset(socialHandles()->facebook))
                                                <li><a href="{{socialHandles()->facebook ?? '#'}}" target="_blank">Facebook</a></li>
                                            @endif
                                            @if(isset(socialHandles()->twitter))
                                                <li><a href="{{socialHandles()->twitter ?? '#'}}" target="_blank">LinkedIn</a></li>
                                            @endif
                                            @if(isset(socialHandles()->whatsapp))
                                                <li><a href="https://wa.me/{{ socialHandles()->whatsapp ?? '#' }}" target="_blank">Whatsapp</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        {{-- <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Social Contact</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="#">Facebook</a></li>
                                            <li><a href="#">Twitter</a></li>
                                            <li><a href="#">Instagram</a></li>
                                            <li><a href="#">YouTube</a></li>
                                            <li><a href="#">Github</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col">
                        {{-- <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Our Support</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="#">Help Center</a></li>
                                            <li><a href="#">Paid with Mollie</a></li>
                                            <li><a href="#">Status</a></li>
                                            <li><a href="#">Changelog</a></li>
                                            <li><a href="#">Contact Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="footer-bottom style-2">
            <div class="container">
                <div class="section-wrapper">
                    <p>&copy; 2025 <a href="index.html">GL Scholars</a> Designed by <a href="#" target="_blank">Madhav</a> </p>
                </div>
            </div>
        </div> --}}
    </footer>
    <!-- Footer Section Ending Here -->
</div>
<!-- footer -->
