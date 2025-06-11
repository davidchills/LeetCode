"""
You are given a string s and an integer k. Your task is to find the maximum difference between the frequency of two characters, 
    freq[a] - freq[b], in a substring subs of s, such that:
subs has a size of at least k.
Character a has an odd frequency in subs.
Character b has an even frequency in subs.
Return the maximum difference.

Note that subs can contain more than 2 distinct characters.
"""
# 3445. Maximum Difference Between Even and Odd Frequency II
from collections import defaultdict
import math
class Solution:
    def maxDifference(self, s: str, k: int) -> int:
        ans = -math.inf
        for a in "01234": 
            for b in "01234": 
                if a != b: 
                    seen = defaultdict(lambda : math.inf)
                    pa = [0]
                    pb = [0]
                    ii = 0 
                    for i, ch in enumerate(s): 
                        pa.append(pa[-1])
                        pb.append(pb[-1])
                        if ch == a: 
                            pa[-1] += 1
                        elif ch == b: 
                            pb[-1] += 1
                            
                        while ii <= i - k + 1 and pa[ii] < pa[-1] and pb[ii] < pb[-1]: 
                            key = (pa[ii] % 2, pb[ii] % 2) 
                            diff = pa[ii] - pb[ii]
                            seen[key] = min(seen[key], diff)
                            ii += 1
                        key = (1 - pa[-1] % 2, pb[-1] % 2) 
                        diff = pa[-1] - pb[-1]
                        ans = max(ans, diff - seen[key])
        return ans         
    
# Test Code
solution = Solution()
print(solution.maxDifference("12233", 4)) # Expect -1
print(solution.maxDifference("1122211", 3)) # Expect 1
print(solution.maxDifference("110", 3)) # Expect -1