<?php 

class Phase
{
    public int $xp;
    public int $level;
    public int $stars;
    public int $erros;
    public function __construct(int $xp, int $level, int $stars, int $erros)
    {
        $this->xp = $xp;
        $this->level = $level;
        $this->stars = $stars;
        $this->erros = $erros;
    }
    public function calculateStars(): void
    {
        $this->stars = floor($this->xp / 50);
    }
}