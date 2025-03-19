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
    var children: [Character: TrieNode] = [:]
    var isEnd: Bool = false
}

class WordDictionary {
    private let root: TrieNode
    
    init() {
        self.root = TrieNode()
    }
    
    func addWord(_ word: String) {
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
        return dfs(Array(word), 0, root)
    }
    
    private func dfs(_ word: [Character], _ index: Int, _ node: TrieNode) -> Bool {
        if index == word.count {
            return node.isEnd
        }
        
        let char = word[index]
        if char == "." {
            for child in node.children.values {
                if dfs(word, index + 1, child) {
                    return true
                }
            }
            return false
        } 
        else {
            guard let nextNode = node.children[char] else {
                return false
            }
            return dfs(word, index + 1, nextNode)
        }
    }    
}

// Test Code
let obj = WordDictionary()
obj.addWord("bad")
obj.addWord("dad")
obj.addWord("mad")

print(obj.search("pad"))  // Expect False (not in dictionary)
print(obj.search("bad"))  // Expect True (exact match)
print(obj.search(".ad"))  // Expect True (matches "bad", "dad", "mad")
print(obj.search("b.."))  // Expect True (matches "bad")