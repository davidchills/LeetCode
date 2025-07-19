"""
Given a list of folders folder, return the folders after removing all sub-folders in those folders. You may return the answer in any order.
If a folder[i] is located within another folder[j], it is called a sub-folder of it. A sub-folder of folder[j] must start with folder[j], 
    followed by a "/". For example, "/a/b" is a sub-folder of "/a", but "/b" is not a sub-folder of "/a/b/c".
The format of a path is one or more concatenated strings of the form: '/' followed by one or more lowercase English letters.
For example, "/leetcode" and "/leetcode/problems" are valid paths while an empty string and "/" are not.
"""
# 1233. Remove Sub-Folders from the Filesystem
from typing import List

class TrieNode:
    def __init__(self):
        self.children = {}
        self.is_end = False
        
class Solution:
    def removeSubfolders(self, folder: List[str]) -> List[str]:
        folder.sort()
        root = TrieNode()
        result = []
        
        for path in folder:
            parts = path.split('/')[1:]
            node = root
            skip = False

            for part in parts:
                if node.is_end:
                    skip = True
                    break
                if part not in node.children:
                    node.children[part] = TrieNode()
                node = node.children[part]

            if not skip:
                node.is_end = True

        def dfs(node: TrieNode, path: List[str]):
            if node.is_end:
                result.append('/' + '/'.join(path))
                return  # stop, don't include subfolders
            for name, child in node.children.items():
                dfs(child, path + [name])

        dfs(root, [])
        return result      

    
# Test Code
solution = Solution()
print(solution.removeSubfolders(["/a","/a/b","/c/d","/c/d/e","/c/f"])) # Expect ["/a","/c/d","/c/f"]
print(solution.removeSubfolders(["/a","/a/b/c","/a/b/d"])) # Expect ["/a"]
print(solution.removeSubfolders(["/a/b/c","/a/b/ca","/a/b/d"])) # Expect ["/a/b/c","/a/b/ca","/a/b/d"]
