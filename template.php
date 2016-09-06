<?php

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
function idneys_flip_theme_js_alter(&$js) {
  $exclude = array();
  //$js = array_diff_key($js, $exclude);
}
