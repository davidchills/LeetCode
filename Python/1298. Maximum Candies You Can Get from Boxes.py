"""
You have n boxes labeled from 0 to n - 1. You are given four arrays: status, candies, keys, and containedBoxes where:
status[i] is 1 if the ith box is open and 0 if the ith box is closed,
candies[i] is the number of candies in the ith box,
keys[i] is a list of the labels of the boxes you can open after opening the ith box.
containedBoxes[i] is a list of the boxes you found inside the ith box.
You are given an integer array initialBoxes that contains the labels of the boxes you initially have. 
You can take all the candies in any open box and you can use the keys in it to open new boxes and you also can use the boxes you find in it.
Return the maximum number of candies you can get following the rules above.
"""
# 1298. Maximum Candies You Can Get from Boxes
from typing import List
from collections import deque
class Solution:
    def maxCandies(self, status: List[int], candies: List[int], keys: List[List[int]], containedBoxes: List[List[int]], initialBoxes: List[int]) -> int:
        n = len(status)
        owned = set(initialBoxes)
        processed = set()
        inQueue = set()
        queue = deque()
        totalCandies = 0

        for b in initialBoxes:
            if status[b] == 1:
                queue.append(b)
                inQueue.add(b)

        while queue:
            box = queue.popleft()
            inQueue.remove(box)

            if box in processed:
                continue

            if status[box] == 0:
                continue

            totalCandies += candies[box]
            processed.add(box)

            for key in keys[box]:
                if status[key] == 0:
                    status[key] = 1
                    if (key in owned) and (key not in processed) and (key not in inQueue):
                        queue.append(key)
                        inQueue.add(key)

            for c in containedBoxes[box]:
                if c not in owned:
                    owned.add(c)
                    if (status[c] == 1) and (c not in processed) and (c not in inQueue):
                        queue.append(c)
                        inQueue.add(c)
                else:
                    if (status[c] == 1) and (c not in processed) and (c not in inQueue):
                        queue.append(c)
                        inQueue.add(c)

        return totalCandies        
        
    
# Test Code
solution = Solution()
print(solution.maxCandies([1,0,1,0], [7,5,4,100], [[],[],[1],[]], [[1,2],[3],[],[]], [0])) # Expect 16
print(solution.maxCandies([1,0,0,0,0,0], [1,1,1,1,1,1], [[1,2,3,4,5],[],[],[],[],[]], [[1,2,3,4,5],[],[],[],[],[]], [0])) # Expect 6