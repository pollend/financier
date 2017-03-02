<?php

require_once __DIR__ . '/autoload.php';

\OCA\Files\App::getNavigationManager()->add(function () {
    $l = \OC::$server->getL10N('files');
    return [
        'id' => 'financier',
        'appname' => 'Financier',
        'order' => 0,
        'name' => $l->t('All files'),
    ];
});
