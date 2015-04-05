Level One
=========

Introduction
------------
Alternative skeleton for Zend Framework 2 applications, that includes third party modules.

Modules shipped by default
--------------------------

* `AssetManager` - allows you to keep your assets clean from the very beginning
* `OcraCachedViewResolver` - caches process of resolving template names to template paths
* `ZendDeveloperTools` - shows some information useful in dev mode
* `Zf2Whoops` - displays nice error message in dev mode

Installation
------------

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev mtymek/level1 path/to/install

Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network interfaces.

**Note: ** The built-in CLI server is *for development only*.
