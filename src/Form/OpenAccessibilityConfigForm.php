<?php

namespace Drupal\open_accessibility\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigManagerInterface;

/**
 * Class to manage Open Accessibility config form.
 */
class OpenAccessibilityConfigForm extends ConfigFormBase {

  /**
   * Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The configuration manager.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;

  /**
   * Constructs a \Drupal\system\ConfigFormBase object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Config\ConfigManagerInterface $config_manager
   *   Configuration manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory, ConfigManagerInterface $config_manager) {
    parent::__construct($config_factory);
    $this->configFactory = $config_factory;
    $this->configManager = $config_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('config.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'open_accessibility_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'open_accessibility.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('open_accessibility.settings');

    $form['menu_opened'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Expanded by default'),
      '#default_value' => $config->get('menu_opened'),
    ];
    $form['mobile_enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable on Mobile'),
      '#default_value' => $config->get('mobile_enabled'),
    ];
    $form['text_selector'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Zoom HTML tags'),
      '#default_value' => $config->get('text_selector'),
      '#required' => TRUE,
      '#description' => $this->t('Mention HTML tags comma seprated to allow Zoom feature.'),
    ];
    $form['icon_size'] = [
      '#type' => 'select',
      '#title' => $this->t('Icon Size'),
      '#options' => [
        's' => $this->t('Small'),
        'm' => $this->t('Medium'),
        'l' => $this->t('Large'),
      ],
      '#default_value' => $config->get('icon_size'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $config = $this->config('open_accessibility.settings');
    $config->set('menu_opened', ($values['menu_opened']) ? TRUE : FALSE);
    $config->set('mobile_enabled', ($values['mobile_enabled']) ? TRUE : FALSE);
    $config->set('text_selector', $values['text_selector']);
    $config->set('icon_size', $values['icon_size']);
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
