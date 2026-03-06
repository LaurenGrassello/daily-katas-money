<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SlugTest extends TestCase
{
    public function testSlugBasic(): void 
    {
        $this->assertSame('creatine-plus', Slug::from('Creatine+'));
    }

    public function testSlugTrimsAndCollapses(): void 
    {
        $this->assertSame('hello-world', Slug::from('   Hello   World   '));
    }

    public function testSlugUnderscores(): void 
    {
        $this->assertSame('pump-nitric-oxide', Slug::from('Pump_Nitric_Oxide'));
    }

    public function testRejectsEmpty(): void 
    {
        $this->expectException(InvalidArgumentException::class);
        Slug::from('   ');
    }
}