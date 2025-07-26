"""
You are given an integer n which represents an array nums containing the numbers from 1 to n in order. 
Additionally, you are given a 2D array conflictingPairs, where conflictingPairs[i] = [a, b] indicates that a and b form a conflicting pair.
Remove exactly one element from conflictingPairs. Afterward, 
    count the number of non-empty subarrays of nums which do not contain both a and b for any remaining conflicting pair [a, b].
Return the maximum number of subarrays possible after removing exactly one conflicting pair.
"""
# 3480. Maximize Subarrays After Removing One Conflicting Pair
from typing import List
from collections import defaultdict
class Solution:
    def maxSubarrays(self, n: int, conflictingPairs: List[List[int]]) -> int:
        m = len(conflictingPairs)
        # Total possible nonempty subarrays
        total = n * (n + 1) // 2

        # Build list of (q, p, idx) for each pair, where
        #    p = min(a,b), q = max(a,b)
        rects = []
        for idx, (a, b) in enumerate(conflictingPairs):
            p, q = min(a, b), max(a, b)
            rects.append((q, p, idx))
        rects.sort()  # sort by q ascending

        idx_rect = 0
        max1 = 0           # current maximum p among q_i ≤ e
        max2 = 0           # second maximum p
        count_max1 = 0     # how many times max1 appears
        r_max1 = -1        # the index of the unique rectangle giving max1
        sum_delta = [0] * m
        invalid_all = 0

        # Sweep e = 1..n, adding any rectangles whose q ≤ e
        for e in range(1, n + 1):
            while idx_rect < m and rects[idx_rect][0] <= e:
                q_i, p_i, r_i = rects[idx_rect]
                # insert p_i into our “top two” tracker
                if p_i > max1:
                    max2, max1 = max1, p_i
                    count_max1 = 1
                    r_max1 = r_i
                elif p_i == max1:
                    count_max1 += 1
                elif p_i > max2:
                    max2 = p_i
                idx_rect += 1

            # All subarrays (s,e) with s ≤ max1 are invalid at this e
            invalid_all += min(max1, e)

            # If exactly one rectangle contributed that max1,
            # then removing it would “recover” (min(max1,e)−min(max2,e)) subarrays here
            if max1 > 0 and count_max1 == 1:
                sum_delta[r_max1] += (min(max1, e) - min(max2, e))

        valid_all = total - invalid_all
        # Choose the conflict whose removal gives the biggest recovery
        best_delta = max(sum_delta) if sum_delta else 0
        return valid_all + best_delta        
        
       

    
# Test Code
solution = Solution()
print(solution.maxSubarrays(4, [[2,3],[1,4]])) # Expect 9
print(solution.maxSubarrays(5, [[1,2],[2,5],[3,5]])) # Expect 12
