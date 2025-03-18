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
    children: { [key: string]: TrieNode } = {};
    isEnd: boolean = false;
}

class Trie {
    private root: TrieNode;
    
    constructor() {
        this.root = new TrieNode();
    }

    insert(word: string): void {
        let node = this.root;
        for (const char of word) {
            if (!node.children[char]) {
                node.children[char] = new TrieNode();
            }
            node = node.children[char];
        }
        node.isEnd = true;        
    }

    search(word: string): boolean {
        const node = this.findNode(word);
        return node !== null && node.isEnd;        
    }

    startsWith(prefix: string): boolean {
        return this.findNode(prefix) !== null;
    }
    
    private findNode(prefix: string): TrieNode | null {
        let node = this.root;
        for (const char of prefix) {
            if (!node.children[char]) {
                return null;
            }
            node = node.children[char];
        }
        return node;
    }    
}

// Test cases
const trie = new Trie();
trie.insert("apple");
console.log(trie.search("apple"));  // Expected: true
console.log(trie.search("app"));    // Expected: false
console.log(trie.startsWith("app")); // Expected: true
trie.insert("app");
console.log(trie.search("app"));    // Expected: true