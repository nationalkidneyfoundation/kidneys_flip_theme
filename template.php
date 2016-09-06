<?php


function kidneys_flip_theme_preprocess_page(&$vars) {

  $query = new EntityFieldQuery();
  $entities = $query->entityCondition('entity_type', 'node')
    ->propertyCondition('type', 'webform')
    ->propertyCondition('title', 'Flip')
    ->propertyCondition('status', 1)
    ->range(0,1)
    ->execute();
  if (!empty($entities['node'])) {
    $wnode = node_load(array_shift(array_keys($entities['node'])));
    $nid = $wnode->nid;
    $form = drupal_get_form('webform_client_form_' . $nid, $wnode, array());
    $vars['flip_form'] = $form;
  }

}

/**
 * Implementation of hook_css_alter().
 * get rid of all css cruft
 */
function kidneys_flip_theme_css_alter(&$css) {
  $exclude = array();

  //$css = array_diff_key($css, $exclude);
}

/**
 * Implementation of hook_js_alter().
 * get rid of all css cruft
 */
function kidneys_flip_theme_js_alter(&$js) {
  $exclude = array();
  //$js = array_diff_key($js, $exclude);
}

function kidneys_flip_theme_form_alter(&$form, &$form_state, $form_id) {
  if (isset($form['#node']) && $form['#node']->title == 'Flip') {
    $form['#theme'] = array_unshift($form['#theme'], 'webform_form_flip');
    $form['submitted']['email']['#title'] = '';
  }
}
