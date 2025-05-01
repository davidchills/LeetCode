"""
You have n tasks and m workers. Each task has a strength requirement stored in a 0-indexed integer array tasks, 
    with the ith task requiring tasks[i] strength to complete. 
The strength of each worker is stored in a 0-indexed integer array workers, with the jth worker having workers[j] strength. 
Each worker can only be assigned to a single task and must have a strength greater than or equal to the task's strength requirement 
    (i.e., workers[j] >= tasks[i]).
Additionally, you have pills magical pills that will increase a worker's strength by strength. 
You can decide which workers receive the magical pills, however, you may only give each worker at most one magical pill.
Given the 0-indexed integer arrays tasks and workers and the integers pills and strength, 
    return the maximum number of tasks that can be completed.
"""
# 2071. Maximum Number of Tasks You Can Assign
from typing import List
import bisect
class Solution:
    def maxTaskAssign(self, tasks: List[int], workers: List[int], pills: int, strength: int) -> int:
        sortedTasks = sorted(tasks)
        sortedWorkers = sorted(workers)

        def canAssign(k: int) -> bool:
            available = sortedWorkers[-k:]
            pillsLeft = pills

            for taskStrength in reversed(sortedTasks[:k]):
                idx = bisect.bisect_left(available, taskStrength)
                if idx < len(available):
                    available.pop(idx)
                else:
                    if pillsLeft == 0:
                        return False
                    
                    needed = taskStrength - strength
                    idx2 = bisect.bisect_left(available, needed)
                    if idx2 == len(available):
                        return False
                    
                    available.pop(idx2)
                    pillsLeft -= 1

            return True

        lo = 0
        hi = min(len(tasks), len(workers))
        best = 0
        while lo <= hi:
            mid = (lo + hi) // 2
            if canAssign(mid):
                best = mid
                lo = mid + 1
            else:
                hi = mid - 1

        return best        
        
        
    
# Test Code
solution = Solution()
print(solution.maxTaskAssign([3,2,1], [0,3,3], 1, 1))  # Expect 3
print(solution.maxTaskAssign([5,4], [0,0,0], 1, 5))  # Expect 1
print(solution.maxTaskAssign([10,15,30], [0,10,10,10,10], 3, 10))  # Expect 2
