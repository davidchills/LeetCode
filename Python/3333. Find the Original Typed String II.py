"""
Alice is attempting to type a specific string on her computer. 
However, she tends to be clumsy and may press a key for too long, resulting in a character being typed multiple times.
You are given a string word, which represents the final output displayed on Alice's screen. You are also given a positive integer k.
Return the total number of possible original strings that Alice might have intended to type, 
    if she was trying to type a string of size at least k.
Since the answer may be very large, return it modulo 10^9 + 7.
"""
# 3333. Find the Original Typed String II
class Solution:
    def possibleStringCount(self, word: str, k: int) -> int:
        MOD = 10**9+7
        runs = []
        i = 0
        n = len(word)
        while i < n:
            j = i + 1
            while j < n and word[j] == word[i]:
                j += 1
            runs.append(j - i)
            i = j

        base = 0
        free = []
        for L in runs:
            if L == 1:
                base += 1
            else:
                free.append(L)
        F = len(free)

        max_len = base + sum(free)
        if max_len < k:
            return 0

        D = k - base - F
        if D <= 0:
            ans = 1
            for L in free:
                ans = ans * L % MOD
            return ans

        total = 1
        for L in free:
            total = total * L % MOD

        cap = D
        dp = [1] + [0] * cap

        for L in free:
            w = L - 1
            new = [0] * (cap + 1)
            window = 0
            for s in range(cap + 1):
                window = (window + dp[s]) % MOD
                if s - w - 1 >= 0:
                    window = (window - dp[s - w - 1]) % MOD
                new[s] = window
            dp = new

        bad = sum(dp[:D]) % MOD
        return (total - bad) % MOD      

    
# Test Code
solution = Solution()
print(solution.possibleStringCount("aabbccdd", 7)) # Expect 5
print(solution.possibleStringCount("aabbccdd", 8)) # Expect 1
print(solution.possibleStringCount("aaabbb", 3)) # Expect 8
