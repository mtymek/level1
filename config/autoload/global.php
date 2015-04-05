<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

use OcraCachedViewResolver\Module as OcraCachedViewResolver;

return [
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
    ],
    'asset_manager' => [
        'caching' => [
            'default' => [
                'cache' => 'FilePath',
                'options' => [
                    'dir' => 'public', // path/to/cache
                ],
            ],
        ],
    ],
    OcraCachedViewResolver::CONFIG => [
        // configuration to be passed to `Zend\Cache\StorageFactory#factory()`
        // see http://framework.zend.com/manual/2.3/en/modules/zend.cache.storage.adapter.html#quick-start
        // Used to instantiate service `'OcraCachedViewResolver\\Cache\\ResolverCache'`
        'cache' => [
            'adapter' => [
                'name'    => 'filesystem',
                'options' => [
                    'ttl' => 86400,
                    'namespace' => 'app_view_resolver_' . sha1(realpath(__FILE__)),
                    'cache_dir' => 'data/cache',
                    'dir_level' => 0,
                ],
            ],
            'plugins' => [
                'Serializer'
            ]
        ],

        // following is the key used to store the template map in the cache adapter
        OcraCachedViewResolver::CONFIG_CACHE_KEY     => 'cached_template_map',
        // name of a service implementing the `Zend\Cache\Storage\StorageInterface`, used to cache the template map
        OcraCachedViewResolver::CONFIG_CACHE_SERVICE => 'OcraCachedViewResolver\\Cache\\ResolverCache',
    ],
];
