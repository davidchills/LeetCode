<?php
/*
Given an m x n board of characters and a list of strings words, return all words on the board.
Each word must be constructed from letters of sequentially adjacent cells, where adjacent cells are horizontally or vertically neighboring. 
    The same letter cell may not be used more than once in a word.
*/
class TrieNode {
    public $children = [];
    public $word = null;
}

class Trie {
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    public function insert(string $word): void {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->word = $word;
    }

    public function getRoot(): TrieNode {
        return $this->root;
    }
}
    
class Solution {

    /**
     * 212. Word Search II
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    private $board;
    private $result = [];
    private $rows;
    private $cols;
    
    public function findWords(array $board, array $words): array {
        $this->board = $board;
        $this->rows = count($board);
        $this->cols = count($board[0]);
        
        $trie = new Trie();
        foreach ($words as $word) {
            $trie->insert($word);
        }

        $root = $trie->getRoot();
        for ($r = 0; $r < $this->rows; $r++) {
            for ($c = 0; $c < $this->cols; $c++) {
                if (isset($root->children[$board[$r][$c]])) {
                    $this->dfs($r, $c, $root);
                }
            }
        }
        return $this->result;        
    }
    
    private function dfs(int $r, int $c, TrieNode $node) {
        $char = $this->board[$r][$c];
        if (!isset($node->children[$char])) { return; }

        $node = $node->children[$char];
        if ($node->word !== null) {
            $this->result[] = $node->word;
            $node->word = null;
        }

        $this->board[$r][$c] = '#';
        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        foreach ($directions as $dir) {
            $newR = $r + $dir[0];
            $newC = $c + $dir[1];

            if ($newR >= 0 && $newR < $this->rows && $newC >= 0 && $newC < $this->cols) {
                $this->dfs($newR, $newC, $node);
            }
        }

        $this->board[$r][$c] = $char;
        if (empty($node->children)) {
            unset($node);
        }
    }    
}

$c = new Solution;
print_r($c->findWords([["o","a","a","n"],["e","t","a","e"],["i","h","k","r"],["i","f","l","v"]], ["oath","pea","eat","rain"])); // Expect ["eat","oath"]
//print_r($c->findWords([["a","b"],["c","d"]], ["abcb"])); // Expect []

?>