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
    var children: [Character: TrieNode] = [:]
    var isEnd: Bool = false
}

class Trie {
    private let root: TrieNode
    
    init() {
        root = TrieNode()
    }
    
    func insert(_ word: String) {
        var node = root
        for char in word {
            if node.children[char] == nil {
                node.children[char] = TrieNode()
            }
            node = node.children[char]!
        }
        node.isEnd = true        
    }
    
    func search(_ word: String) -> Bool {
        guard let node = findNode(word) else { return false }
        return node.isEnd        
    }
    
    func startsWith(_ prefix: String) -> Bool {
        return findNode(prefix) != nil
    }
    
    private func findNode(_ prefix: String) -> TrieNode? {
        var node = root
        for char in prefix {
            guard let nextNode = node.children[char] else { return nil }
            node = nextNode
        }
        return node
    }    
}

// Test cases
let trie = Trie()
trie.insert("apple")
print(trie.search("apple"))  // Expected: true
print(trie.search("app"))    // Expected: false
print(trie.startsWith("app")) // Expected: true
trie.insert("app")
print(trie.search("app"))    // Expected: true