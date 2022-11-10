<?php

namespace Drupal\open_accessibility\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\Config;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'OpenAccessibilityBlock' block.
 *
 * @Block(
 *   id = "open_accessibility_block",
 *   admin_label = @Translation("Open Accessibility"),
 *
 * )
 */
class OpenAccessibilityBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Site location services.
   *
   * @var \Drupal\Core\Config\Configurationaccessvariable
   */
  protected $accessConfig = NULL;

  /**
   * Static create function provided by the ContainerFactoryPluginInterface.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')->get('open_accessibility.settings')
    );
  }

  /**
   * BlockBase plugin constructor that's expecting the create().
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, Config $accessibility_settings) {
    // Instantiate the BlockBase parent first.
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    // Save the service passed to this constructor via dependency injection.
    $this->accessConfig = $accessibility_settings;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'open_accessibility/open-accessibility';

    $build['#attached']['drupalSettings']['openAccessibility'] = [
      'menu_opened' => $this->accessConfig->get('menu_opened'),
      'highlighted_links' => $this->accessConfig->get('highlighted_links'),
      'mobile_enabled' => $this->accessConfig->get('mobile_enabled'),
      'text_selector' => $this->accessConfig->get('text_selector'),
      'icon_size' => $this->accessConfig->get('icon_size'),
    ];

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
