<?php

namespace Deployer;

use Deployer\Task\Context;
use Dotenv\Dotenv;

require_once __DIR__ . "/vendor/deployer/deployer/recipe/composer.php";

host('video.elseif.se')
    ->port(22)
    ->stage('production')
    ->set('deploy_path', '/mnt/persist/www/docroot_vardagen')
    ->user('deploy')
    ->set('branch', 'master')
    ->identityFile('~/.ssh/id_rsa');

/* Valtech internal test server */
set('repository', 'git@github.com:elseifab/vardagen.git');

set('env_vars', '/usr/bin/env');
set('keep_releases', 5);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env']);

// include all php-files under config/build as they are build tasks
foreach (glob(__DIR__ . "/config/build/*.php") as $file) {
    include_once $file;
}
