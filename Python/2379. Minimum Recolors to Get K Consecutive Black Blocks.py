"""
You are given a 0-indexed string blocks of length n, where blocks[i] is either 'W' or 'B', representing the color of the ith block. 
    The characters 'W' and 'B' denote the colors white and black, respectively.
You are also given an integer k, which is the desired number of consecutive black blocks.
In one operation, you can recolor a white block such that it becomes a black block.
Return the minimum number of operations needed such that there is at least one occurrence of k consecutive black blocks.
"""
# 2379. Minimum Recolors to Get K Consecutive Black Blocks
class Solution:
    def minimumRecolors(self, blocks: str, k: int) -> int:
        n = len(blocks)
        minOps = 10**10
        currBlackCount = 0;
        for i in range(0, k):
            if blocks[i] == 'B':
                currBlackCount += 1
                
        minOps = k - currBlackCount
        
        for i in range(k, n):
            if blocks[i - k] == 'B':
                currBlackCount -= 1
            if blocks[i] == 'B':
                currBlackCount += 1
            minOps = min(minOps, k - currBlackCount)
        return minOps
        
    
# Test Code
solution = Solution()
print(solution.minimumRecolors("WBBWWBBWBW", 7)) # Expect 3
print(solution.minimumRecolors("WBWBBBW", 2)) # Expect 0