<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Broccoli - Organic Food HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/user/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/responsive.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">

    <script src="<?= base_url(); ?>/assets/frontend/js/jquery-3.4.1.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <div class="toastr-success" data-flashdata="<?= $this->session->flashdata('toastr-success'); ?>"></div>
        <div class="toastr-error" data-flashdata="<?= $this->session->flashdata('toastr-error'); ?>"></div>

        <!-- HEADER AREA START (header-5) -->
        <header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-2">

            <!-- ltn__header-middle-area start -->
            <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-black plr--9---">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="site-logo-wrap">
                                <div class="site-logo">
                                    <a href="index.html"><img src="<?= base_url(); ?>assets/user/img/logo-2.png" alt="Logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col header-menu-column menu-color-white">
                            <div class="header-menu d-none d-xl-block">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <ul>
                                            <li><a href="<?= base_url('home'); ?>">Home</a></li>
                                            <li><a href="contact.html">About</a></li>
                                            <li class="menu-icon"><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-grid.html">Shop Detail</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-icon"><a href="#">Orders</a>
                                                <ul>
                                                    <li><a href="<?= base_url('cart'); ?>">Shopping Cart</a></li>
                                                    <li><a href="javascript:void(0)">Checkout</a></li>
                                                    <li><a href="<?= base_url('orders'); ?>">List Order</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-icon"><a href="#">Grooming</a>
                                                <ul>
                                                    <li><a href="shop.html">List Booked</a></li>
                                                    <li><a href="shop-grid.html">Booking Grooming</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="ltn__header-options ltn__header-options-2">

                            <!-- user-menu -->
                            <div class="ltn__drop-menu user-menu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon-user"></i></a>
                                        <ul>
                                            <li><a href="<?= base_url('auth'); ?>">Sign in</a></li>
                                            <li><a href="<?= base_url('auth/registrasi'); ?>">Register</a></li>
                                            <li><a href="<?= base_url('auth/profile'); ?>">My Account</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- mini-cart -->
                            <div class="mini-cart-icon">
                                <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                    <i class="icon-shopping-cart"></i>
                                    <sup>2</sup>
                                </a>
                            </div>
                            <!-- mini-cart -->
                            <!-- Mobile Menu Button -->
                            <div class="mobile-menu-toggle d-xl-none">
                                <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                    <svg viewBox="0 0 800 600">
                                        <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                        <path d="M300,320 L540,320" id="middle"></path>
                                        <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-middle-area end -->
        </header>
        <!-- HEADER AREA END -->

        <!-- Utilize Cart Menu Start -->
        <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <span class="ltn__utilize-menu-title">Cart</span>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="mini-cart-product-area ltn__scrollbar">
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="<?= base_url(); ?>assets/user/img/product/1.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Red Hot Tomato</a></h6>
                            <span class="mini-cart-quantity">1 x $65.00</span>
                        </div>
                    </div>

                </div>
                <div class="mini-cart-footer">
                    <div class="mini-cart-sub-total">
                        <h5>Subtotal: <span>$310.00</span></h5>
                    </div>
                    <div class="btn-wrapper">
                        <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                        <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                    </div>
                    <p>Free Shipping on All Orders Over $100!</p>
                </div>

            </div>
        </div>
        <!-- Utilize Cart Menu End -->

        <!-- Utilize Mobile Menu Start -->

        <!-- nav tampilan mobile -->
        <?php $this->load->view('frontend/nav_mobile'); ?>

        <!-- Utilize Mobile Menu End -->

        <div class="ltn__utilize-overlay"></div>

        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="<?= base_url(); ?>assets/user/img/bg/9.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                                <h1 class="section-title white-color">Shop Left Sidebar</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                                    <li>Shop Left Sidebar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- PRODUCT DETAILS AREA START -->
        <?php $this->load->view($page); ?>
        <!-- PRODUCT DETAILS AREA END -->

        <!-- FEATURE AREA START ( Feature - 3) -->
        <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url(); ?>assets/user/img/product/11.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Curated Products</h4>
                                            <p>Provide Curated Products for
                                                all product over $100</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url(); ?>assets/user/img/product/12.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Handmade</h4>
                                            <p>We ensure the product quality
                                                that is our main goal</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url(); ?>assets/user/img/product/13.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Natural Food</h4>
                                            <p>Return product within 3 days
                                                for any product you buy</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url(); ?>assets/user/img/product/14.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Free home delivery</h4>
                                            <p>We ensure the product quality
                                                that you can trust easily</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->

        <!-- FOOTER AREA START -->
        <footer class="ltn__footer-area  ">
            <div class="footer-top-area  section-bg-1 plr--5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widget footer-about-widget">
                                <div class="footer-logo">
                                    <div class="site-logo">
                                        <img src="<?= base_url(); ?>assets/user/img/logo.png" alt="Logo">
                                    </div>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.</p>
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p>Brooklyn, New York, United States</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:+0123-456789">+0123-456789</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="mailto:example@example.com">example@example.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ltn__copyright-area ltn__copyright-2 section-bg-2  ltn__border-top-2--- plr--5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="ltn__copyright-design clearfix">
                                <p>All Rights Reserved @ Company <span class="current-year"></span></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 align-self-center">
                            <div class="ltn__copyright-menu text-right">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Claim</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="<?= base_url(); ?>assets/user/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?= base_url(); ?>assets/user/js/main.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/toastr/customScript.js"></script>
</body>

</html>