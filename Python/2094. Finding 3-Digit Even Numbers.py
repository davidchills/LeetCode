"""
You are given an integer array digits, where each element is a digit. The array may contain duplicates.
You need to find all the unique integers that follow the given requirements:
The integer consists of the concatenation of three elements from digits in any arbitrary order.
The integer does not have leading zeros.
The integer is even.
For example, if the given digits were [1, 2, 3], integers 132 and 312 follow the requirements.

Return a sorted array of the unique integers.
"""
# 2094. Finding 3-Digit Even Numbers
from typing import List
from collections import Counter
class Solution:
    def findEvenNumbers(self, digits: List[int]) -> List[int]:
        cnt = Counter(digits)
        result = []
        
        for d1 in range(1, 10):
            if cnt[d1] == 0:
                continue
            cnt[d1] -= 1
            
            for d2 in range(0, 10):
                if cnt[d2] == 0:
                    continue
                cnt[d2] -= 1
                
                for d3 in (0, 2, 4, 6, 8):
                    if cnt[d3] > 0:
                        num = d1 * 100 + d2 * 10 + d3
                        result.append(num)
                
                cnt[d2] += 1
            cnt[d1] += 1
        
        return sorted(set(result))        
        
        
    
# Test Code
solution = Solution()
print(solution.findEvenNumbers([2,1,3,0]))  # Expect [102,120,130,132,210,230,302,310,312,320]
print(solution.findEvenNumbers([2,2,8,8,2]))  # Expect [222,228,282,288,822,828,882]
print(solution.findEvenNumbers([3,7,5]))  # Expect []