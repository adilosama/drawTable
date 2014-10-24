<?php

class UnitTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        require_once './test.php';
    }

    public function testCompFunction() {
        $this->assertEquals(0, comp('paris', 'paris'));
        $this->assertEquals(-1, comp('london', 'new Yok'));
        $this->assertEquals(1, comp('paris', 'casablanca'));
    }

    public function testPrintRowEmpty() {
        $exepted = "+----------+----------+----------+----------+\n";
        $testArray = array(
            'Name' => 'Trixie',
            'Color' => 'Green',
            'Element' => 'Earth',
            'Likes' => 'Flowers'
        );
        ob_start();
        printRow($testArray, true, false);
        $contents = ob_get_contents();
        ob_end_clean();
        $this->assertEquals($exepted, $contents);
    }

    public function testPrintRowFull() {
        $exepted = "| Green   | Earth   | Flowers   | Trixie   |\n";
        $testArray = array(
            'Color' => 'Green',
            'Element' => 'Earth',
            'Likes' => 'Flowers',
            'Name' => 'Trixie',
        );
        ob_start();
        printRow($testArray, false , false);
        $contents = ob_get_contents();
        ob_end_clean();

        $this->assertEquals($exepted, $contents);
    }

    public function testPrintTable() {
        $tableSimple = array(
            array(
                'Name' => 'Trixie',
                'Color' => 'Green',
                'Element' => 'Earth',
                'Likes' => 'Flowers'
            ),
            array(
                'Name' => 'Tinkerbell',
                'Element' => 'Air',
                'Likes' => 'Singning',
                'Color' => 'Blue'
            ),
            array(
                'Element' => 'Water',
                'Likes' => 'Dancing',
                'Name' => 'Blum',
                'Color' => 'Pink'
            ),
        );
        PrintTable($tableSimple);
    }

}

?>