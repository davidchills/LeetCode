<?php
/*
A trie (pronounced as "try") or prefix tree is a tree data structure used to efficiently store and retrieve keys in a dataset of strings. 
    There are various applications of this data structure, such as autocomplete and spellchecker.
Implement the Trie class:
Trie() Initializes the trie object.
void insert(String word) Inserts the string word into the trie.
boolean search(String word) Returns true if the string word is in the trie (i.e., was inserted before), and false otherwise.
boolean startsWith(String prefix) Returns true if there is a previously inserted string word that has the prefix prefix, and false otherwise.

208. Implement Trie (Prefix Tree)
*/
class TrieNode {
    public $children = [];
    public $isEnd = false;
}
    
class Trie {

    private $root;
    
    public function __construct() {
        $this->root = new TrieNode();
    }
  
    /**
     * @param String $word
     * @return NULL
     */
    public function insert(string $word): void {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
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
        $node = $this->findNode($word);
        return $node !== null && $node->isEnd;        
    }
  
    /**
     * @param String $prefix
     * @return Boolean
     */
    public function startsWith(string $prefix): bool {
        return $this->findNode($prefix) !== null;
    }
    
    private function findNode(string $prefix): ?TrieNode {
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) {
                return null;
            }
            $node = $node->children[$char];
        }
        return $node;
    }    
}

$obj = new Trie();
$obj->insert("apple");
echo $obj->search("apple") ? "true\n" : "false\n"; // Expected: true
echo $obj->search("app") ? "true\n" : "false\n";   // Expected: false
echo $obj->startsWith("app") ? "true\n" : "false\n"; // Expected: true
$obj->insert("app");
echo $obj->search("app") ? "true\n" : "false\n";   // Expected: true
?>