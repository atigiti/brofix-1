<?php

declare(strict_types=1);

namespace Sypets\Brofix\Tests\Functional;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Sypets\Brofix\Configuration\Configuration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

abstract class AbstractFunctionalTestCase extends FunctionalTestCase
{
    /**
     * @var non-empty-string[]
     */
    protected $coreExtensionsToLoad = [
        'backend',
        'fluid',
        'info',
        'install'
    ];

    /**
     * @var non-empty-string[]
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/brofix',
    ];

    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * Set up for set up the backend user, initialize the language object
     * and creating the Export instance
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->initializeConfiguration();
    }

    /**
     * @throws \Exception
     */
    protected function initializeConfiguration(): void
    {
        $tsConfigPath = GeneralUtility::getFileAbsFileName('EXT:brofix/Configuration/TsConfig/Page/pagetsconfig.tsconfig');
        $this->configuration = GeneralUtility::makeInstance(Configuration::class);
        // load default values
        $this->configuration->overrideTsConfigByString(file_get_contents($tsConfigPath));
        $this->configuration->overrideTsConfigByString('mod.brofix.linktypesConfig.external.headers.User-Agent = Mozilla/5.0 (compatible; Broken Link Checker; +https://example.org/imprint.html)');
    }
}
