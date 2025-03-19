<?php
/*
Design a data structure that supports adding new words and finding if a string matches any previously added string.
Implement the WordDictionary class:
WordDictionary() Initializes the object.
void addWord(word) Adds word to the data structure, it can be matched later.
bool search(word) Returns true if there is any string in the data structure that matches word or false otherwise. 
    word may contain dots '.' where dots can be matched with any letter.
    
211. Design Add and Search Words Data Structure
*/
class TrieNode {
    public array $children = [];
    public bool $isEnd = false;
}
    
class WordDictionary {
    /**
     */
    private TrieNode $root;
    public function __construct() {
        $this->root = new TrieNode();
    }
  
    /**
     * @param String $word
     * @return NULL
     */
    public function addWord(string $word): void {
        $node = $this->root;
        for ($i = 0, $n = strlen($word); $i < $n; $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->isEnd = true;
    }
  
    /**
     * @param String $word
     * @return Boolean
     */
    public function search(string $word): bool {
        return $this->dfs($this->root, $word, 0);
    }
    
    private function dfs(TrieNode $node, string $word, int $index): bool {
        if ($index === strlen($word)) {
            return $node->isEnd;
        }
        $char = $word[$index];
        if ($char === '.') {
            foreach ($node->children as $child) {
                if ($this->dfs($child, $word, $index + 1)) {
                    return true;
                }
            }
            return false;
        } 
        else {
            if (!isset($node->children[$char])) {
                return false;
            }
            return $this->dfs($node->children[$char], $word, $index + 1);
        }
    }    
}

 $obj = new WordDictionary();
 $obj->addWord("bad");
 $obj->addWord("dad");
 $obj->addWord("mad");
 print $obj->search("pad")."\n"; // Expect false
 print $obj->search("bad")."\n"; // Expect true
 print $obj->search(".ad")."\n"; // Expect true
 print $obj->search("b..")."\n"; // Expect true
?>