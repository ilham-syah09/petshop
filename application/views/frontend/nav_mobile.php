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
                        <?php foreach ($this->kategori as $kat) : ?>
                            <li><a href="<?= base_url('shop/') . $kat->id; ?>"><?= $kat->kategori; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="#">Orders</a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('cart'); ?>">Shopping Cart</a></li>
                        <li><a href="javascript:void(0)">Checkout</a></li>
                        <li><a href="<?= base_url('orders'); ?>">List Order</a></li>
                    </ul>
                </li>
                <li><a href="#">Grooming</a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('booked'); ?>">List Booked</a></li>
                        <li><a href="<?= base_url('grooming'); ?>">Booking Grooming</a></li>
                    </ul>
                </li>

                <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
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
                <?php if ($this->session->userdata('log_user')) : ?>
                    <li>
                        <a href="<?= base_url('cart'); ?>" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup><?= count($this->cart); ?></sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>