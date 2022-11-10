/**
 * @file
 * Javascript for the Open Accessibility.
 */
(function ($) {
  Drupal.behaviors.open_accessibility = {
    attach: function (context, settings) {
      $('header').openAccessibility({
        maxZoomLevel: 5,
        minZoomLevel: 0.1,
        zoomStep: 0.2,
        isMenuOpened: drupalSettings.openAccessibility.menu_opened,
        isMobileEnabled: drupalSettings.openAccessibility.mobile_enabled,
        textSelector: drupalSettings.openAccessibility.text_selector,
        iconSize: drupalSettings.openAccessibility.icon_size,
        localization: ['en']
      });
    }
  };
})(jQuery);
