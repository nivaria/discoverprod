<?php
/*
 * Renders the discover poll results
 *
 * Variable $results contains info about avarage ratings
 * Key 'count' - contains number of ratings
 * Key 'general' - contains average rating
 *
 * Other keys contain average ratings by axis.
 *
 */
?>

<?php if(!empty($results)): ?>
<section class="<?php print $classes; ?>">
    <div class="general-results">
        <?php if(!empty($results['general'])): ?>
        <h3 class="general-average"><?php print t('Average rating'); ?></h3>
        <div class="points-container">
          <?php print t('!points points',array('!points' => '<span class="points">'.$results['general']['value'].'</span>')); ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($results['count'])): ?>
        <div class="general-count">
          <?php print t('Based on !count opinions', array('!count' => '<span class="count">'.$results['count']['value'].'</span>'));?>
        </div>
        <?php endif; ?>
    </div>

    <div class="axis-results">
    <?php foreach($results as $key => $res){
      if($key==='count' || $key==='general'){
        continue;
      } ?>
      <div class="axis-item">
          <div class="axis-item-title">
             <?php print $results[$key]['title']; ?>
          </div>
          <div class="axis-item-value">
              <div class="meter">
                  <span style="width:<?php print $results[$key]['value']; ?>%"></span>
                  <span class="poll-icon"></span>
              </div>
          </div>
      </div>
    <?php } ?>
    </div>

</section>
<?php endif; ?>