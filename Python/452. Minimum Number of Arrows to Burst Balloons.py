"""
There are some spherical balloons taped onto a flat wall that represents the XY-plane. 
    The balloons are represented as a 2D integer array points where points[i] = [xstart, xend] 
    denotes a balloon whose horizontal diameter stretches between xstart and xend. You do not know the exact y-coordinates of the balloons.
Arrows can be shot up directly vertically (in the positive y-direction) from different points along the x-axis. 
    A balloon with xstart and xend is burst by an arrow shot at x if xstart <= x <= xend. There is no limit to the number of arrows that can be shot. 
    A shot arrow keeps traveling up infinitely, bursting any balloons in its path.
Given the array points, return the minimum number of arrows that must be shot to burst all balloons.
"""
# 452. Minimum Number of Arrows to Burst Balloons
class Solution:
    def findMinArrowShots(self, points: list[list[int]]) -> int:
        if len(points) == 0:
            return 0
        
        points.sort(key=lambda x: x[1])
        
        arrows = 1
        lastArrow = points[0][1]
        for balloon in points:
            xstart = balloon[0]
            xend = balloon[1]
            
            if xstart > lastArrow:
                arrows += 1
                lastArrow = xend
                
        return arrows

    
# Test Code
solution = Solution()
print(solution.findMinArrowShots([[10,16],[2,8],[1,6],[7,12]])) # Expect 2
print(solution.findMinArrowShots([[1,2],[3,4],[5,6],[7,8]])) # Expect 4
print(solution.findMinArrowShots([[1,2],[2,3],[3,4],[4,5]])) # Expect 2