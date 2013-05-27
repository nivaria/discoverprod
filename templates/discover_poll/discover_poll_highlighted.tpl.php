<?php

/**
 * Renders the highligted comment for given node
 *
 * Variables:
 *  $comment - is the comment object from Drupal
 *  $node - related node object from Drupal
 *  $author - themed author name
 *  $created - themed creation date
 *  $changed - themed update date
 *  $picture - author picture
 *  $signature - authors signature
 *  $title - title of the comment
 *  $permalink - Permalink for the comment
 *  $submitted - Submitted text
 *  $comment_body - The comment message
 *  $status - Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview
 *  $classes - String of classes
 */
?>

<section class="<?php print $classes; ?>">
    <h3 class="title"><?php print t('Highlighted opinion').':'; ?></h3>
    <div class="content">
      <?php print $comment_body; ?>
    </div>
    <footer class="content-footer">
      <?php print $picture; ?>
      <span class="author">
          <?php print $author; ?>,
      </span>
      <span class="created">
          <?php print $created; ?>
      </span>
    </footer>
</section>
