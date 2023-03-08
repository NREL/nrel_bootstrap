/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.nrel_bootstrap = {
    attach: function (context, settings) {
      $('[data-toggle="tooltip"]').tooltip();
    }
  };

})(jQuery, Drupal);
