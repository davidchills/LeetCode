"""
Due to a bug, there are many duplicate folders in a file system. 
You are given a 2D array paths, where paths[i] is an array representing an absolute path to the ith folder in the file system.
For example, ["one", "two", "three"] represents the path "/one/two/three".
Two folders (not necessarily on the same level) are identical if they contain the same non-empty set of identical subfolders and underlying subfolder structure. 
The folders do not need to be at the root level to be identical. If two or more folders are identical, then mark the folders as well as all their subfolders.
For example, folders "/a" and "/b" in the file structure below are identical. They (as well as their subfolders) should all be marked:
/a
/a/x
/a/x/y
/a/z
/b
/b/x
/b/x/y
/b/z
However, if the file structure also included the path "/b/w", then the folders "/a" and "/b" would not be identical. 
Note that "/a/x" and "/b/x" would still be considered identical even with the added folder.
Once all the identical folders and their subfolders have been marked, the file system will delete all of them. 
The file system only runs the deletion once, so any folders that become identical after the initial deletion are not deleted.
Return the 2D array ans containing the paths of the remaining folders after deleting all the marked folders. 
The paths may be returned in any order.
"""
# 1948. Delete Duplicate Folders in System
from typing import List, Dict
from collections import defaultdict      
class Solution:
    def deleteDuplicateFolder(self, paths: List[List[str]]) -> List[List[str]]:
        tree = {}
        for path in paths:
            curr = tree
            for name in path:
                curr = curr.setdefault(name, {})

        def encode(node):
            if not node:
                return "()"
            parts = []
            for key, sub in node.items():
                parts.append(key + encode(sub))
            sign = "".join(sorted(parts))
            store[sign].append(node)
            return "(" + sign + ")"

        def remove(nodes):
            for item in nodes:
                item.clear()
                item["#"] = True

        store = defaultdict(list)
        encode(tree)
        for group in store.values():
            if len(group) > 1:
                remove(group)

        def collect(node, path):
            for key, sub in list(node.items()):
                if "#" in sub:
                    continue
                new = path + [key]
                result.append(new)
                collect(sub, new)

        result = []
        collect(tree, [])
        return result    
       

    
# Test Code
solution = Solution()
print(solution.deleteDuplicateFolder([["a"],["c"],["d"],["a","b"],["c","b"],["d","a"]])) # Expect [["d"],["d","a"]]
print(solution.deleteDuplicateFolder([["a"],["c"],["a","b"],["c","b"],["a","b","x"],["a","b","x","y"],["w"],["w","y"]])) # Expect [["c"],["c","b"],["a"],["a","b"]]
print(solution.deleteDuplicateFolder([["a","b"],["c","d"],["c"],["a"]])) # Expect [["c"],["c","d"],["a"],["a","b"]]

