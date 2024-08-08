<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         DebugKit 3.5.2
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 **/
namespace DebugKit\Test\TestCase\Panel;

use Cake\TestSuite\TestCase;
use DebugKit\Panel\PackagesPanel;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Class PackagesPanelTest
 */
class PackagesPanelTest extends TestCase
{
    /**
     * @var PackagesPanel
     */
    protected $panel;

    /**
     * set up
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->panel = new PackagesPanel();
    }

    /**
     * Packages view variables provider
     *
     * @return array
     */
    public static function packagesProvider()
    {
        return [
            'requirements' => ['packages'],
            'dev requirements' => ['devPackages'],
        ];
    }

    /**
     * test data
     *
     * @return void
     */
    #[DataProvider('packagesProvider')]
    public function testData($package)
    {
        $data = $this->panel->data();
        $this->assertArrayHasKey($package, $data);

        $singlePackage = current($data[$package]);
        $this->assertArrayHasKey('name', $singlePackage);
        $this->assertArrayHasKey('description', $singlePackage);
        $this->assertArrayHasKey('version', $singlePackage);
    }
}
