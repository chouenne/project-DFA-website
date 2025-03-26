<footer class="footer" style="margin-top:13rem;">
  <div class="container">
    <div class="row">
      <!-- Company Info -->
      <div class="col-md-3 mb-3">
        <h5 class="footer-title">Design Future Academy</h5>
        <p class="small">
          <?php echo (pll_current_language() == 'zh') ? '赋能梦想，构建未来' : 'Empowering Dreams, Building Futures'; ?>
        </p>
        <a href="<?php echo (pll_current_language() == 'zh') ? home_url('/zh/关于我们/') : home_url('/about-us/'); ?>"
          class="btn secondary">
          <?php echo (pll_current_language() == 'zh') ? '了解更多' : 'Learn Details'; ?>
        </a>
      </div>


      <div class="col-md-3 mb-3">
        <h5 class="footer-title"><?php echo (pll_current_language() == 'zh') ? '快速链接' : 'Quick Links'; ?></h5>
        <ul class="list-unstyled footer-nav">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '%3$s', // Removes outer <ul> tag added by wp_nav_menu
            'add_li_class' => 'nav-item',
            'link_class' => 'nav-link',
          ));
          ?>
        </ul>
      </div>

      <!-- Social Media Links -->
      <div class="col-md-3 mb-3">
        <h5 class="footer-title"><?php echo (pll_current_language() == 'zh') ? '联系我们' : 'Contact Us'; ?></h5>
        <div class="social-links">
          <div class="contact-item d-flex g-2">
            <i class="fas fa-envelope contact-icon"></i>
            <p>
              <a href="mailto:info@dfacademy.com">info@dfacademy.com</a>
            </p>
          </div>

          <div class="contact-item d-flex">
            <i class=" fab fa-weixin contact-icon"></i>
            <p>Wechat ID:DFAcademy</p>

          </div>
        </div>
      </div>

      <!-- Email Subscription -->
      <div class="col-md-3 mb-3">
        <h5 class="footer-title">
          <?php
          if (function_exists('pll_current_language')) {
            echo (pll_current_language() == 'zh') ? '订阅我们的最新资讯' : 'Subscribe to Our Newsletter';
          } else {
            echo 'Subscribe to Our Newsletter'; // 默认回退英文
          }
          ?>
        </h5>


        <form action="#" method="post" class="subscription-form">
          <div class="row g-2">
            <!-- Email Input
            <div class="col-12">
              <input type="email" class="form-control" placeholder="Your Email Address" required>
            </div>
          
            <div class="col-12">
              <button type="submit" class="btn primary">Subscribe</button>
            </div> -->
            <!-- MailPoet Subscription Form -->
            <div class="col-12">
              <?php if (function_exists('do_shortcode')): ?>
                <?php
                $form_id = (pll_current_language() == 'zh') ? 2 : 1; // 中文ID=2，英文ID=1
                echo do_shortcode("[mailpoet_form id='{$form_id}']");
                ?>
              <?php endif; ?>
            </div>
          </div>

      </div>
    </div>
    <div class="row mt-4">
      <a href="<?php echo home_url(); ?>" class="col-12 text-center small">
        <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/02/logo_dfa.png" alt="Footer Logo">
      </a>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center small">
        <?php echo date('Y'); ?> by
        <?php bloginfo('name'); ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>