<?php
/*
 * Renders extra field for Votingapi results with tag 'general' 
 * 
 * Variable $results contains info about avarage ratings
 * Key 'count' - contains number of ratings
 * Key 'general' - contains average rating
 * 
 * $node - node object of Drupal
 * 
 */
?>

<?php if(!empty($results)): ?>
<div class="<?php print $classes; ?>">
    <div class="general-results">
        <div class="general-average">
            <div class="points-container">  
            <?php print t('!points points',array('!points' => '<span class="points">'.$results['general']['value'].'</span>')); ?>  
            </div>    
        </div>
        <!--div class="general-count"-->
          <?php /*print t('Based on !count opinions', array('!count' => '<span class="count">'.$results['count']['value'].'</span>'));*/ ?>  
        <!--/div-->
    </div>
</div>
<?php endif; ?>
