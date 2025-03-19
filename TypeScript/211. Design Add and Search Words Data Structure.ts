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
    children: Map<string, TrieNode>;
    isEnd: boolean;

    constructor() {
        this.children = new Map();
        this.isEnd = false;
    }
}

class WordDictionary {
    private root: TrieNode;
    
    constructor() {
        this.root = new TrieNode();
    }

    addWord(word: string): void {
        let node: TrieNode = this.root;
        for (const char of word) {
            if (!node.children.has(char)) {
                node.children.set(char, new TrieNode());
            }
            node = node.children.get(char)!;
        }
        node.isEnd = true;        
    }

    search(word: string): boolean {
        return this.dfs(word, 0, this.root);
    }
    
    private dfs(word: string, index: number, node: TrieNode): boolean {
        if (index === word.length) {
            return node.isEnd;
        }

        const char = word[index];
        if (char === ".") {
            for (const child of node.children.values()) {
                if (this.dfs(word, index + 1, child)) {
                    return true;
                }
            }
            return false;
        } 
        else {
            if (!node.children.has(char)) {
                return false;
            }
            return this.dfs(word, index + 1, node.children.get(char)!);
        }
    }    
}

// Test Code
const obj = new WordDictionary();
obj.addWord("bad");
obj.addWord("dad");
obj.addWord("mad");

console.log(obj.search("pad")); // Expect false (not in dictionary)
console.log(obj.search("bad")); // Expect true (exact match)
console.log(obj.search(".ad")); // Expect true (matches "bad", "dad", "mad")
console.log(obj.search("b..")); // Expect true (matches "bad")