<?php
/**
 * @file
 * Returns the HTML for the footer region.
 *
 * Complete documentation for this file is available online.
 * @see http://drupal.org/node/1728140
 */
?>
<?php if ($content): ?>
  <footer id="footer-second" class="<?php print $classes; ?>">
    <div class="fixed-width-container">
      <?php print $content; ?>
    </div>
  </footer>
<?php endif; ?>
