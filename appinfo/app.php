<?php
namespace OCA\Financier\AppInfo;

\OC::$server->getNavigationManager()->add(function () {
    $l = \OC::$server->getL10N('financier');
    $g = \OC::$server->getURLGenerator();

    return [
        'id' => 'financier',
        'order' => 100,
        'href' => $g ->linkToRoute('financier.page.index'),
        'icon' => $g ->imagePath('financier', 'app.svg'),
        'name' => $l->t('Financier'),
    ];
});