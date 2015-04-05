<?php

namespace ApplicationDev;

use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManager;
use OcraCachedViewResolver\Module as OcraCachedViewResolverModule;

class Module
{
    public function init(ModuleManager $moduleManager)
    {
        $events = $moduleManager->getEventManager();

        // Registering a listener at default priority, 1, which will trigger
        // after the ConfigListener merges config.
        $events->attach(ModuleEvent::EVENT_MERGE_CONFIG, array($this, 'onMergeConfig'));
    }

    public function onMergeConfig(ModuleEvent $e)
    {
        $configListener = $e->getConfigListener();
        $config         = $configListener->getMergedConfig(false);

        // Modify the configuration; here, we'll remove a specific key:
        if (isset($config[OcraCachedViewResolverModule::CONFIG]['cache']['adapter']['options'])) {
            unset($config[OcraCachedViewResolverModule::CONFIG]['cache']['adapter']['options']);
            unset($config[OcraCachedViewResolverModule::CONFIG]['cache']['plugins']);
        }

        // Pass the changed configuration back to the listener:
        $configListener->setMergedConfig($config);
    }
}
