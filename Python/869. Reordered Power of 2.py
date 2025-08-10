"""
You are given an integer n. We reorder the digits in any order (including the original order) such that the leading digit is not zero.
Return true if and only if we can do this so that the resulting number is a power of two.
"""
# 869. Reordered Power of 2
class Solution:
    def reorderedPowerOf2(self, n: int) -> bool:
        sig = lambda x: "".join(sorted(str(x)))
        targets = {sig(1 << k) for k in range(31)}  # 2^0 .. 2^30
        return sig(n) in targets       

    
# Test Code
solution = Solution()
print(solution.reorderedPowerOf2(1)) # Expect True
print(solution.reorderedPowerOf2(10)) # Expect False