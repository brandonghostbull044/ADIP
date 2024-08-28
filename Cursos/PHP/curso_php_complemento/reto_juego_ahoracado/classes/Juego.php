<?php


class Juego
{
    public $word;
    public $associate;
    public $draws;
    private $limit;
    private $attemps;

    public function __construct($words, $draws, $limit) {
        $this->word = array_keys($words)[rand(0, count($words) - 1)];
        $this->associate = $words[$this->word][rand(0, 4)];
        $this->draws = $draws;
        $this->limit = $limit;
        $this->attemps = 0;
    }

    public function start()
    {
        $game = str_repeat("- ", strlen($this->word));
        while ($this->attemps < $this->limit) {
            echo "{$this->draws[$this->attemps]}" . "\n    La palabra que buscas esta relacionada con: ". $this->associate . "\n\n    " . $game . "\n\n\n";
            $guess = strtolower(readline("Adivina una letra de la palabra: "));
            $first_position = strpos($this->word, $guess);
            $indexes = [];
            if ($first_position) {
                for ($counter = $first_position; $counter <= strlen($this->word); $counter++) {
                    if ($this->word[$counter] == $guess) {
                        $indexes[] = $counter;
                    }
                }
                
            }
            echo "$this->word\n";
            var_dump($indexes);
            $this->attemps++;
        }
    }
}


?>