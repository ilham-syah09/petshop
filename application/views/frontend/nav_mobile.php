<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="index.html"><img src="<?= base_url(); ?>assets/user/img/logo.png" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu-search-form">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li><a href="<?= base_url('about'); ?>">About</a></li>

                <li><a href="#">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-grid.html">Shop Detail</a></li>
                    </ul>
                </li>
                <li><a href="#">Orders</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shopping Cart</a></li>
                        <li><a href="shop-grid.html">Checkout</a></li>
                        <li><a href="shop-grid.html">List Order</a></li>
                    </ul>
                </li>
                <li><a href="#">Grooming</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">List Booked</a></li>
                        <li><a href="shop-grid.html">Booking Grooming</a></li>
                    </ul>
                </li>

                <li><a href="Contact">Contact</a></li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="<?= base_url('profile'); ?>" title="My Account">
                        <span class="utilize-btn-icon">
                            <i class="far fa-user"></i>
                        </span>
                        My Account
                    </a>
                </li>
                <li>
                    <a href="wishlist.html" title="Wishlist">
                        <span class="utilize-btn-icon">
                            <i class="far fa-heart"></i>
                            <sup>3</sup>
                        </span>
                        Wishlist
                    </a>
                </li>
                <li>
                    <a href="cart.html" title="Shoping Cart">
                        <span class="utilize-btn-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <sup>5</sup>
                        </span>
                        Shoping Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>