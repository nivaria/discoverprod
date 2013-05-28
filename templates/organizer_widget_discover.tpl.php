  <?php
/*
 * Renders extra Organizer reference field
 *
 * Variables:
 *
 * $entity - entity object for user from Drupal
 *
 */
?>

<?php if(!empty($entity)): ?>
<section class="<?php print $classes; ?>">
  <div class="title">
    <h3 class="title">
      <?php print t('This plan is organized by'); ?>
    </h3>
  </div>
  <div class="organizer">
    <?php if(isset($picture) || isset($author)): ?>
      <div class="user-info">
        <?php if(isset($picture)): ?>
          <?php print $picture; ?>
        <?php endif; ?>
        <?php if(isset($author)): ?>
          <?php print $author; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if(isset($description)): ?>
      <div class="description">
        <?php print $description; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="links">

    <?php if(isset($contact)): ?>
      <div class="contact">
        <?php print $contact; ?>
      </div>
    <?php endif; ?>
    <?php if(isset($more_info)): ?>
      <div class="more-info">
        <?php print $more_info; ?>
      </div>
    <?php endif; ?>
    <?php if(isset($my_plans)): ?>
      <div class="my-plans">
        <?php print $my_plans; ?>
      </div>
    <?php endif; ?>

  </div>
  <?php if(isset($join_organizer)): ?>
  <div class="join">
     <?php print $join_organizer; ?>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>
