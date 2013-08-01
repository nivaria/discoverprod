<?php
/**
 * @file
 * Theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<?php
  if (isset($field_lift_collection)){
    foreach($field_lift_collection as $key => $value) {
?>
<div id="field_lift_collection_<?php print $key; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php if(isset($value['field_image'])): ?>
      <div class="collection-image"><?php print render($value['field_image']); ?></div>
    <?php endif; ?>

    <?php if(isset($value['field_pretitle']) || isset($value['title_field'])): ?>
      <div class="collection-titles">
        <?php if(isset($value['field_pretitle'])): ?>
          <div class="collection-pretitle"><?php print render($value['field_pretitle']); ?></div>
        <?php endif; ?>
        <?php if(isset($value['title_field'])): ?>
          <div class="collection-title"><?php print render($value['title_field']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if(isset($value['field_top_left'])): ?>
      <div class="collection-top-left"><?php print render($value['field_top_left']); ?></div>
    <?php endif; ?>

    <?php if(isset($value['field_top_right'])): ?>
      <div class="collection-top-right"><?php print render($value['field_top_right']); ?></div>
    <?php endif; ?>

    <?php if(isset($value['field_middle_left']) || isset($value['field_middle_right'])): ?>
      <div class="collection-container-middle clearfix">
        <?php if(isset($value['field_middle_left'])): ?>
          <div class="collection-middle-left-wrapper"><div class="collection-middle-left">
            <?php print render($value['field_middle_left']); ?>
          </div></div>
        <?php endif; ?>

        <?php if(isset($value['field_middle_right'])): ?>
          <div class="collection-middle-right-wrapper"><div class="collection-middle-right">
            <?php print render($value['field_middle_right']); ?>
          </div></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if(isset($value['field_middle'])): ?>
      <div class="collection-middle"><?php print render($value['field_middle']); ?></div>
    <?php endif; ?>

    <?php if(isset($value['field_bottom_left'])): ?>
      <div class="collection-bottom-left"><?php print render($value['field_bottom_left']); ?></div>
    <?php endif; ?>

    <?php if(isset($value['field_bottom_right'])): ?>
      <div class="collection-bottom-right"><?php print render($value['field_bottom_right']); ?></div>
    <?php endif; ?>

    <?php
    /**
     * Print any unused values
     */
    ?>
    <?php print render($value); ?>


  </div>
</div>
<?php
    }
  }
?>
