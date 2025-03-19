/*
Design a data structure that supports adding new words and finding if a string matches any previously added string.
Implement the WordDictionary class:
WordDictionary() Initializes the object.
void addWord(word) Adds word to the data structure, it can be matched later.
bool search(word) Returns true if there is any string in the data structure that matches word or false otherwise. 
    word may contain dots '.' where dots can be matched with any letter.

211. Design Add and Search Words Data Structure
*/

var TrieNode = function() {
    this.children = {};
    this.isEnd = false;
};

var WordDictionary = function() {
    this.root = new TrieNode();
};

/** 
 * @param {string} word
 * @return {void}
 */
WordDictionary.prototype.addWord = function(word) {
    let node = this.root;
    for (const char of word) {
        if (!node.children[char]) {
            node.children[char] = new TrieNode();
        }
        node = node.children[char];
    }
    node.isEnd = true;    
};

/** 
 * @param {string} word
 * @return {boolean}
 */
WordDictionary.prototype.search = function(word) {
    return this.dfs(word, 0, this.root);
};

WordDictionary.prototype.dfs = function(word, index, node) {
    if (index === word.length) {
        return node.isEnd;
    }

    let char = word[index];
    if (char === ".") {
        for (const child of Object.values(node.children)) {
            if (this.dfs(word, index + 1, child)) {
                return true;
            }
        }
        return false;
    } 
    else {
        if (!node.children[char]) {
            return false;
        }
        return this.dfs(word, index + 1, node.children[char]);
    }
};

// Test Code
var obj = new WordDictionary();
obj.addWord("bad");
obj.addWord("dad");
obj.addWord("mad");

console.log(obj.search("pad")); // Expect false (not in dictionary)
console.log(obj.search("bad")); // Expect true (exact match)
console.log(obj.search(".ad")); // Expect true (matches "bad", "dad", "mad")
console.log(obj.search("b..")); // Expect true (matches "bad")