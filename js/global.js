/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.nrel_bootstrap = {
    attach: function (context, settings) {
      $('[data-toggle="tooltip"]').each(function() {
        var tooltip = new bootstrap.Tooltip($(this), options);
      });
      /* The Views Bootstrap accordions are missing the collapsed class when the page is first loaded. This is
       * possibly a side-effect of using a template override to allow Views Bootstrap accordions to work with BS5 - @see
       * https://www.drupal.org/project/views_bootstrap/issues/3168271 and
       * templates/views_bootstrap/views-bootstrap-accordion.html.twig.
       */
      $('button.accordion-button').addClass('collapsed');
    }
  };

})(jQuery, Drupal);
