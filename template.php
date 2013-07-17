<?php

/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see http://drupal.org/node/1728096
 */
/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
  function discoverprod_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  discoverprod_preprocess_html($variables, $hook);
  discoverprod_preprocess_page($variables, $hook);
  }
  // */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function discoverprod_preprocess_html(&$variables, $hook) {

  // Custom close image for ajax register ctools modals
  drupal_add_js(array(
      'ctools-ajax-register-style' => array(
          'modalTheme' => 'custom_ajax_register_modal',
          'closeImage' => theme('image', array(
              'path' => drupal_get_path('theme', 'discoverprod') . ('/images/modal_close.png'),
              'title' => t('Close window'),
              'alt' => t('Close window'),
          )),
          )), 'setting');

  //$variables['sample_variable'] = t('Lorem ipsum.');
  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
  function discoverprod_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
  }
  // */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function discoverprod_preprocess_node(&$variables, $hook) {
  if ($variables['view_mode'] == 'full') {

    // Add Node Right region to node types only
    if ($blocks = block_get_blocks_by_region('node_right')) {
      $variables['region']['node_right'] = $blocks;
    } else {
      $variables['region']['node_right'] = array();
    }

    // Get the context blocks for the sidebar_second region .
    $reaction = context_get_plugin('reaction', 'block');
    $variables['region']['node_right'] = $reaction->block_get_blocks_by_region('node_right');
    // Optionally, run node-type-specific preprocess functions, like
    // discoverprod_preprocess_node_page() or discoverprod_preprocess_node_story().
    $function = __FUNCTION__ . '_' . $variables['node']->type;
    if (function_exists($function)) {
      $function($variables, $hook);
    }
  }
  
}

// Insert variables in restaurant_display node types
function discoverprod_preprocess_node_restaurant_display(&$vars) {
  
}

// Insert variables in plan_display node types
function discoverprod_preprocess_node_plan_display(&$vars) {

  // Insert Booking block in template
  $vars['booking_block'] = module_invoke('discover_booking', 'block_view', 'booking_block');
}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
  function discoverprod_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
  }
  // */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
  function discoverprod_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
  }
  // */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
  function discoverprod_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
  }
  // */

/**
 * Override Office Hours theme function.
 *
 * We need to display only the current state. Time schedule display is deleted.
 */
function discoverprod_office_hours_formatter_default($vars) {
  $settings = $vars['settings'];
  $open = $vars['open'];
  $HTML = '';

  // Generate HTML for CurrentStatus.
  if ($open) {
    $HTML = '<span class="oh-current-open">' . t($settings['current_status']['open_text']) . '</span>';
  } else {
    $HTML = '<span class="oh-current-closed">' . t($settings['current_status']['closed_text']) . '</span>';
  }

  return $HTML;
}

// Override

/**
 * Themeable function for Opinions block.
 *
 * @param type $vars
 */
function discoverprod_discover_poll_opinions($vars) {
  $output = '';

  $node = node_view($vars['node']);

  //Get content for results
  $results = discover_poll_block_contents('discover_poll_results');
  //Get content for highlighted
  $highlighted = discover_poll_block_contents('discover_poll_highlighted');
  $output_recommendation = '';

  if (module_exists('discover_recommendation')) {
    $vid = variable_get('discover_recommendation_vid', NULL);
    if (!empty($vid)) {
      $rec_nodetypes = variable_get('discover_recommendation_nodetypes', array());
      if (isset($rec_nodetypes[$node['#node']->type]) && $rec_nodetypes[$node['#node']->type] === $node['#node']->type) {
        $output_recommendation = theme('discover_poll_recommendation', array('node' => $node['#node'], 'vid' => $vid));
      }
    }
  }

  // THREE columns if we have recommendations, TWO columns if not
  if (strlen($output_recommendation) > 1) {
    $output .= '<div class="three-columns-layout">';
  } else {
    $output .= '<div class="two-columns-layout">';
  }
  $output .= '<div class="column-results">';
  $output .= $results['#markup'];
  $output .= '</div>';

  if (strlen($highlighted['#markup']) > 1) {
    $output .= '<div class="column-highlighted">';
    $output .= $highlighted['#markup'];
    $output .= '</div>';
  }

  // Add the recommendations markup if it exists
  if (strlen($output_recommendation) > 1) {
    $output .= $output_recommendation;
  }

  // End of two/three columns layout here.
  $output .= '</div>';

  if ($node['comments']) {
    $output .= render($node['comments']);
  }
  if (!empty($node['links']['comment'])) {
    $output .= '<div class="links-container-bottom">';
    $output .= render($node['links']['comment']);
    $output .= '</div>';
  }
  return $output;
}

function discoverprod_preprocess_page(&$variables) {
  $status = drupal_get_http_header("status");
  if ($status == '404 Not Found') {
    $variables['search_box_block'] = module_invoke('search', 'block_view', 'form');
    $variables['theme_hook_suggestions'][] = 'page__404';
  } else if ($status == '403 Forbidden') {
    $variables['theme_hook_suggestions'][] = 'page__403';
  }
}
