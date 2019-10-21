<?php


namespace Tdd\Tests;


use PHPUnit\Framework\TestCase;
use Tdd\TicTacToe;

/**
 * Class TicTacToeTest
 * @package Tdd\Tests
 */
class TicTacToeTest extends TestCase
{

    private $game;

    public function setUp(): void
    {
        $this->game = new TicTacToe();
        $this->game->start();
    }

    public function testAddUnknownSign()
    {
        $this->assertFalse($this->game->addSign('S', 0, 0));
    }

    public function testAddSignSamePosition()
    {
        $this->assertTrue($this->game->addSign('X', 0, 0));
        $this->assertFalse($this->game->addSign('O', 0, 0));
    }

    public function testAddSignOutOfRange()
    {
        $this->assertFalse($this->game->addSign('X', 0, 4));
    }

    public function testWinInColumn()
    {
        $this->assertTrue($this->game->addSign('X', 0, 0));
        $this->assertTrue($this->game->addSign('O', 1, 2));
        $this->assertTrue($this->game->addSign('X', 1, 0));
        $this->assertTrue($this->game->addSign('O', 1, 1));
        $this->assertTrue($this->game->addSign('X', 2, 0));
        $this->assertTrue($this->game->isFinished());
    }


    public function testWinInRow()
    {
        $this->assertTrue($this->game->addSign('X', 0, 0));
        $this->assertTrue($this->game->addSign('O', 1, 1));
        $this->assertTrue($this->game->addSign('X', 0, 1));
        $this->assertTrue($this->game->addSign('O', 1, 2));
        $this->assertTrue($this->game->addSign('X', 0, 2));
        $this->assertTrue($this->game->isFinished());
    }

    public function testWinDiagonal()
    {
        $this->assertTrue($this->game->addSign('X', 0, 0));
        $this->assertTrue($this->game->addSign('O', 0, 1));
        $this->assertTrue($this->game->addSign('X', 1, 1));
        $this->assertTrue($this->game->addSign('O', 1, 2));
        $this->assertTrue($this->game->addSign('X', 2, 2));
        $this->assertTrue($this->game->isFinished());
    }

    public function testWinOtherDiagonal()
    {
        $this->game = new TicTacToe();
        $this->game->start();
        $this->game->addSign('X', 0, 2);
        $this->assertTrue($this->game->addSign('O', 0, 1));
        $this->game->addSign('X', 1, 1);
        $this->assertTrue($this->game->addSign('O', 1, 2));
        $this->game->addSign('X', 2, 0);
        $this->assertTrue($this->game->isFinished());
    }
}
