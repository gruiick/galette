<?php

/**
 * Copyright © 2003-2024 The Galette Team
 *
 * This file is part of Galette (https://galette.eu).
 *
 * Galette is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Galette is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Galette. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Galette\DynamicFields\test\units;

use PHPUnit\Framework\TestCase;

/**
 * Dynamic booleans test
 *
 * @author Johan Cwiklinski <johan@x-tnd.be>
 */
class Boolean extends TestCase
{
    private \Galette\Core\Db $zdb;
    private \Galette\DynamicFields\Boolean $bool;

    /**
     * Set up tests
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->zdb = new \Galette\Core\Db();
        $this->bool = new \Galette\DynamicFields\Boolean($this->zdb);
    }

    /**
     * Test constructor
     *
     * @return void
     */
    public function testConstructor(): void
    {
        $o = new \Galette\DynamicFields\Boolean($this->zdb, 10);
        $this->assertNull($o->getId());
    }

    /**
     * Test get type name
     *
     * @return void
     */
    public function testGetTypeName(): void
    {
        $this->assertSame(_T('boolean'), $this->bool->getTypeName());
    }

    /**
     * Test if basic properties are ok
     *
     * @return void
     */
    public function testBaseProperties(): void
    {
        $muliple = $this->bool->isMultiValued();
        $this->assertFalse($muliple);

        $required = $this->bool->isRequired();
        $this->assertFalse($required);

        $name = $this->bool->getName();
        $this->assertSame('', $name);

        $has_fixed_values = $this->bool->hasFixedValues();
        $this->assertFalse($has_fixed_values);

        $has_data = $this->bool->hasData();
        $this->assertTrue($has_data);

        $has_w = $this->bool->hasWidth();
        $this->assertFalse($has_w);

        $has_h = $this->bool->hasHeight();
        $this->assertFalse($has_h);

        $has_s = $this->bool->hasSize();
        $this->assertFalse($has_s);

        $perms = $this->bool->getPermission();
        $this->assertNull($perms);

        $width = $this->bool->getWidth();
        $this->assertNull($width);

        $height = $this->bool->getHeight();
        $this->assertNull($height);

        $repeat = $this->bool->getRepeat();
        $this->assertNull($repeat);

        $repeat = $this->bool->isRepeatable();
        $this->assertFalse($repeat);

        $size = $this->bool->getSize();
        $this->assertNull($size);

        $values = $this->bool->getValues();
        $this->assertFalse($values);

        $this->assertTrue($this->bool->hasPermissions());
    }
}
