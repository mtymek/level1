Development module
==================

This module, enabled only in development mode, tweaks application settings that cannot 
be updated using configuration files. 

Config alterations:
-------------------

* unset `options` and `plugins` for cache configuration, to allow `blackhole` cache 
for `OcraCachedViewResolver`.