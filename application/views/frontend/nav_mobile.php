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
                <li><a href="<?= base_url('home'); ?>">Beranda</a></li>

                <li><a href="#">Belanja</a>
                    <ul class="sub-menu">
                        <?php foreach ($this->kategori as $kat) : ?>
                            <li><a href="<?= base_url('shop/') . $kat->id; ?>"><?= $kat->kategori; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="#">Orders</a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('cart'); ?>">Keranjang Pesanan</a></li>
                        <li><a href="javascript:void(0)">Checkout</a></li>
                        <li><a href="<?= base_url('orders'); ?>">Daftar Pesanan</a></li>
                    </ul>
                </li>
                <li><a href="#">Grooming</a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('grooming/order'); ?>">Booking Grooming</a></li>
                        <li><a href="<?= base_url('grooming/list'); ?>">Daftar Grooming</a></li>
                    </ul>
                </li>

                <li><a href="<?= base_url('contact'); ?>">Kontak</a></li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="<?= base_url('profile'); ?>" title="My Account">
                        <span class="utilize-btn-icon">
                            <i class="far fa-user"></i>
                        </span>
                        Akun Saya
                    </a>
                </li>
                <?php if ($this->session->userdata('log_user')) : ?>
                    <li>
                        <a href="<?= base_url('cart'); ?>" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup><?= count($this->cart); ?></sup>
                            </span>
                            Keranjang Belanja
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>