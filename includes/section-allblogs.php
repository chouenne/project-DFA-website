<section class="blog-section">
  <div class="container">
    <div class="row py-5">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged,
      );

      $blog_query = new WP_Query($args);
      ?>

      <div class="row py-5">
        <?php
        if ($blog_query->have_posts()):
          while ($blog_query->have_posts()):
            $blog_query->the_post();
            ?>
            <div class="col-md-4 mb-4">
              <?php get_template_part('/includes/card-blog'); ?>
            </div>
            <?php
          endwhile;
        else:
          echo '<p>No blog posts found.</p>';
        endif;
        ?>
      </div>

      <div class="pagination">
        <?php
        echo paginate_links(array(
          'total' => $blog_query->max_num_pages, // 总页数
          'current' => max(1, get_query_var('paged')), // 当前页码
          'prev_text' => __('« Previous'), // 上一页文本
          'next_text' => __('Next »'), // 下一页文本
        ));
        ?>
      </div>

      <?php
      wp_reset_postdata(); // 重置查询数据
      ?>
    </div>
  </div>
</section>