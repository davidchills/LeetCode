"""
Description
"""
# 506. Relative Ranks
from typing import List
class Solution:
    def findRelativeRanks(self, score):
        """
        :type score: List[int]
        :rtype: List[str]
        """
        sorted_scores = sorted(enumerate(score), key=lambda x: x[1], reverse=True)
        
        # Initialize result array with the same length as score
        result = [""] * len(score)
        
        # Assign ranks based on sorted order
        for rank, (index, _) in enumerate(sorted_scores):
            if rank == 0:
                result[index] = "Gold Medal"
            elif rank == 1:
                result[index] = "Silver Medal"
            elif rank == 2:
                result[index] = "Bronze Medal"
            else:
                result[index] = str(rank + 1)
        
        return result
    
# Test Code
solution = Solution()
print(solution.findRelativeRanks(score))