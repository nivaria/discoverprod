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
<div class="<?php print $classes; ?>">
    <div class="title">
        <h3 class="title">
            <?php print t('This plan is organized by'); ?>
        </h3>
    </div>
    <div class="organizer">
       <?php if(isset($picture)){
           print $picture;
       } ?>
       <?php if(isset($author)){
           print $author;
       } ?>
       <?php if(isset($description)){
           print '<div class="description">';
           print $description;
           print '</div>';
       } ?> 
    </div>
    <div class="links">
      <?php if(isset($contact)){
           print $contact;
       } ?>
       <?php if(isset($more_info)){
           print $more_info;
       } ?>  
    </div>
</div>
<?php endif; ?>
