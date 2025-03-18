"""
A trie (pronounced as "try") or prefix tree is a tree data structure used to efficiently store and retrieve keys in a dataset of strings. 
    There are various applications of this data structure, such as autocomplete and spellchecker.
Implement the Trie class:
Trie() Initializes the trie object.
void insert(String word) Inserts the string word into the trie.
boolean search(String word) Returns true if the string word is in the trie (i.e., was inserted before), and false otherwise.
boolean startsWith(String prefix) Returns true if there is a previously inserted string word that has the prefix prefix, and false otherwise.
"""
# 208. Implement Trie (Prefix Tree)
class TrieNode:
    def __init__(self):
        self.children = {}
        self.is_end = False
        
class Trie:

    def __init__(self):
        self.root = TrieNode()

    def insert(self, word: str) -> None:
        node = self.root
        for char in word:
            if char not in node.children:
                node.children[char] = TrieNode()
            node = node.children[char]
        node.is_end = True        

    def search(self, word: str) -> bool:
        node = self._findNode(word)
        return node is not None and node.is_end        

    def startsWith(self, prefix: str) -> bool:
        return self._findNode(prefix) is not None
    
    def _findNode(self, prefix: str):
        """Helper function to traverse the Trie."""
        node = self.root
        for char in prefix:
            if char not in node.children:
                return None
            node = node.children[char]
        return node
    
# Test cases
obj = Trie()
obj.insert("apple")
print(obj.search("apple"))  # Expected: True
print(obj.search("app"))    # Expected: False
print(obj.startsWith("app")) # Expected: True
obj.insert("app")
print(obj.search("app"))    # Expected: True