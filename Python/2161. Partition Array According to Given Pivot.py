"""
You are given a 0-indexed integer array nums and an integer pivot. Rearrange nums such that the following conditions are satisfied:
Every element less than pivot appears before every element greater than pivot.
Every element equal to pivot appears in between the elements less than and greater than pivot.
The relative order of the elements less than pivot and the elements greater than pivot is maintained.
More formally, consider every pi, pj where pi is the new position of the ith element and pj is the new position of the jth element. 
    If i < j and both elements are smaller (or larger) than pivot, then pi < pj.
Return nums after the rearrangement.
"""
# 2161. Partition Array According to Given Pivot
class Solution:
    def pivotArray(self, nums: list[int], pivot: int) -> list[int]:
        """
        low = []
        mid = []
        high = []
        
        for num in nums:
            if num < pivot:
                low.append(num)
            elif num == pivot:
                mid.append(num)
            else:
                high.append(num)
                
        return [*low, *mid, *high]
        """
        left, right = [], []
        pivotCount = 0
        for num in nums:
            if num < pivot:
                left.append(num)
            elif num > pivot:
                right.append(num)
            else:
                pivotCount += 1
                
        return left + [pivot] * pivotCount + right
            
# Test Code
solution = Solution()
print(solution.pivotArray([9,12,5,10,14,3,10], 10)) # Expect [9,5,3,10,10,12,14]
#print(solution.pivotArray([-3,4,3,2], 2)) # Expect [-3,2,4,3]