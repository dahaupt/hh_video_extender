<?php
$customColumns = [
    'controls' => [
        'displayCond' => 'USER:HauerHeinrich\\HhVideoExtender\\UserFunc\\CheckFile->isLocalFile',
        'exclude' => true,
        'label' => 'Controls',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ],
    'loop' => [
        'displayCond' => 'USER:HauerHeinrich\\HhVideoExtender\\UserFunc\\CheckFile->isLocalFile',
        'exclude' => true,
        'label' => 'Loop',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 0,
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ],
    'muted' => [
        'displayCond' => 'USER:HauerHeinrich\\HhVideoExtender\\UserFunc\\CheckFile->isLocalFile',
        'exclude' => true,
        'label' => 'muted (automatically on autoplay)',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 0,
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ],
    'preload' => [
        'displayCond' => 'USER:HauerHeinrich\\HhVideoExtender\\UserFunc\\CheckFile->isLocalFile',
        'exclude' => true,
        'label' => 'preload',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['auto', 0, ''],
                ['metadata', 1, ''],
                ['none', 2, ''],
            ],
            'default' => 2,
        ]
    ],

    'defer' => [
        'displayCond' => 'USER:HauerHeinrich\\HhVideoExtender\\UserFunc\\CheckFile->isExternalFile',
        'exclude' => true,
        'label' => 'Defer loading',
        'description' => 'Note: uses javascript to do that',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 0,
            'items' => [
                [
                    0 => '',
                    1 => '',
                ]
            ],
        ]
    ],

    'preview_image' => [
        'label' => 'preview image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'media',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                    ],
                ],

                'minitems' => 0,
                'maxitems' => 1,
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $customColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'sys_file_reference',
    'videoOverlayPalette',
    'loop, muted, preload, defer, controls, --linebreak--, preview_image'
);