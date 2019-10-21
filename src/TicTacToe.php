<?php declare(strict_types=1);


namespace Tdd;


use PHPUnit\Framework\Constraint\IsFalse;

final class TicTacToe
{

    private const NUM_ROWS = 3;

    private const NUM_COLS = 3;

    private const ALLOWED_SIGNS = ['X', 'O'];

    /**
     * @var array
     */
    private $board = null;

    /**
     * @var string
     */
    private $lastSign = null;

    /**
     *
     */
    public function start()
    {
        $this->initBoard();
        $this->lastSign = null;
    }

    /**
     *
     */
    private function initBoard()
    {
        $this->board = [];
        for ($i = 0; $i < self::NUM_ROWS; $i++) {
            $this->board[$i] = [];
            for ($j = 0; $j < self::NUM_COLS; $j++) {
                $this->board[$i][$j] = null;
            }
        }
    }


    /**
     * @param string $sign
     * @param int $rowIdx
     * @param int $colIdx
     * @return bool
     */
    public function addSign(string $sign, int $rowIdx, int $colIdx): bool
    {
        if (!in_array($sign, self::ALLOWED_SIGNS)) {
            return false;
        }
        if ($this->board[$rowIdx][$colIdx] !== null) {
            return false;
        }

        if ($rowIdx >= self::NUM_ROWS || $colIdx >= self::NUM_ROWS || $rowIdx < 0 || $colIdx < 0) {
            return false;
        }

        if ($this->lastSign === $sign) {
            return false;
        }
        $this->lastSign = $sign;
        $this->board[$rowIdx][$colIdx] = $sign;
        return true;
    }

    /**
     * Game is finished when all places are filled or 3 signs in a row, column or diagonal.
     */
    public function isFinished(): bool
    {
        return $this->checkRows() || $this->checkCols() || $this->checkDiagonals();
    }

    /**
     * @return bool
     */
    private function checkRows()
    {
        foreach ($this->board as $row) {
            $values = [];
            foreach ($row as $col){
                if ($col !== null){
                    $values[$col]++;
                }
            }
            if (in_array(3, $values)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    private function checkCols(): bool
    {
        for ($col = 0; $col <= self::NUM_COLS; $col++) {
            $values = [];
            for ($row = 0; $row <= self::NUM_ROWS; $row++) {
                if ($this->board[$row][$col] !== null){
                    $values[$this->board[$row][$col]]++;
                }
            }

            if (in_array(3, $values)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    private function checkDiagonals(): bool
    {
        $basicDiagonal = [];
        $otherDiagonal = [];
        for ($row = 0; $row <= self::NUM_COLS; $row++) {
            if ($this->board[$row][$row] !== null){
                $basicDiagonal[$this->board[$row][$row]]++;
            }

//            $otherValue = $this->board[$row][count($this->board[$row]) - 1 - $row];
//
//            if ($otherValue!== null){
//                $otherDiagonal[$otherValue]++;
//            }
        }

        return in_array(3, $basicDiagonal)|| in_array(3, $otherDiagonal);
    }
}
