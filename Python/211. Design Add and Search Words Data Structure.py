"""
Design a data structure that supports adding new words and finding if a string matches any previously added string.
Implement the WordDictionary class:
WordDictionary() Initializes the object.
void addWord(word) Adds word to the data structure, it can be matched later.
bool search(word) Returns true if there is any string in the data structure that matches word or false otherwise. 
    word may contain dots '.' where dots can be matched with any letter.
"""
# 211. Design Add and Search Words Data Structure
class TrieNode:
    def __init__(self):
        self.children = {}  # Dictionary to hold child nodes
        self.is_end = False  # Marks the end of a word
        
class WordDictionary:
    def __init__(self):
        self.root = TrieNode()

    def addWord(self, word: str) -> None:
        node = self.root
        for char in word:
            if char not in node.children:
                node.children[char] = TrieNode()
            node = node.children[char]
        node.is_end = True        

    def search(self, word: str) -> bool:
        def dfs(index, node):
            if index == len(word):
                return node.is_end

            char = word[index]
            if char == ".":
                for child in node.children.values():
                    if dfs(index + 1, child):
                        return True
                return False
            else:
                # Normal character match
                if char not in node.children:
                    return False
                return dfs(index + 1, node.children[char])
        
        return dfs(0, self.root)
    
    
# Test Code
obj = WordDictionary()
obj.addWord("bad")
obj.addWord("dad")
obj.addWord("mad")
print(obj.search("pad")) # Expect False
print(obj.search("bad")) # Expect True
print(obj.search(".ad")) # Expect True
print(obj.search("b..")) # Expect True