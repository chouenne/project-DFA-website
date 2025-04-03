<?php
// Get the YouTube Video ID using ACF
$youtube_video_id = get_field('youtube_video_id');

// Only render the section if a video ID exists
if ($youtube_video_id):
  // Get current language (default to English)
  $current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
  ?>
  <?php
  // Get YouTube Video ID (ACF)
  $youtube_video_id = get_field('youtube_video_id');

  // Only render if video exists
  if ($youtube_video_id):
    // Language detection (default: English)
    $current_lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
    ?>
    <section class="cta-video py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 text-center">
            <?php if ($current_lang == 'zh'): ?>
              <h2 class="mb-4">重温思想碰撞的瞬间</h2> <!-- Chinese -->
            <?php else: ?>
              <h2 class="mb-4">Relive the best moments of inspiration</h2> <!-- English -->
            <?php endif; ?>

            <!-- Responsive 16:9 YouTube embed -->
            <div class="ratio ratio-16x9">
              <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_video_id); ?>"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>