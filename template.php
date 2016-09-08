<?php


function kidneys_flip_theme_preprocess_page(&$vars) {
  /*
  $query = new EntityFieldQuery();
  $entities = $query->entityCondition('entity_type', 'node')
    ->propertyCondition('type', 'webform')
    ->propertyCondition('title', 'Flip')
    ->propertyCondition('status', 1)
    ->range(0,1)
    ->execute();
  if (!empty($entities['node'])) {
    $nodes = $entities['node'];
    $nid = array_keys($nodes);
    $node = array_shift($nid);
    $wnode = node_load($node);
    $nid = $wnode->nid;
    $form = drupal_get_form('webform_client_form_' . $nid, $wnode, FALSE, FALSE);
    $vars['flip_form'] = drupal_render($form);
  }
  */
  //$block = module_invoke('webform', 'block_view', 'client-block-26926');
  //$vars['flip_form'] = render($block['content']);

}

function kidneys_flip_theme_theme($existing, $type, $theme, $path) {
  $hooks['webform_form_flip'] = array(
    'template' => 'webform-form-flip',
    'render element' => 'form',
  );
  return $hooks;
}


function kidneys_flip_theme_form_alter(&$form, &$form_state, $form_id) {
  if (isset($form['#node']) && $form['#node']->title == 'Flip' && FALSE) {
    array_unshift($form['#theme'], 'webform_form_flip');
    $form['submitted']['email']['#attributes']['class'] = array(
      'width--100',
    );
    $form['submitted']['email']['#theme_wrappers'] = array();
    $form['actions']['submit']['#attributes']['class'] = array(
      'width--100',
      'button--aqua',
      'caps'
    );
  }
}
