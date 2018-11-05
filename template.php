<?php
/**
 * @file
 * template.php
 */

/**
 *
 */
function nrel_bootstrap_preprocess_html(&$vars) {
  // Set the printable template.
  if (isset($_GET['print'])) {
    $vars['classes_array'][] = 'printable';
  }
  // Since all NREL Communications sites use https, change the reference to the
  // XHTML Vocabulary to use https.
  if (!empty($vars['grddl_profile'])) {
    $vars['grddl_profile'] = str_replace('http:', 'https:', $vars['grddl_profile']);
  }
}
/**
 *
 */
function nrel_bootstrap_preprocess_page(&$vars) {
  // Set the printable template.
  if (isset($_GET['print'])) {
    $vars['theme_hook_suggestions'][] = 'page__printable';
  }
}
