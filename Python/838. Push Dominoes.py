"""
There are n dominoes in a line, and we place each domino vertically upright. 
In the beginning, we simultaneously push some of the dominoes either to the left or to the right.
After each second, each domino that is falling to the left pushes the adjacent domino on the left. 
Similarly, the dominoes falling to the right push their adjacent dominoes standing on the right.
When a vertical domino has dominoes falling on it from both sides, it stays still due to the balance of the forces.
For the purposes of this question, we will consider that a falling domino expends no additional force to a falling or already fallen domino.
You are given a string dominoes representing the initial state where:
dominoes[i] = 'L', if the ith domino has been pushed to the left,
dominoes[i] = 'R', if the ith domino has been pushed to the right, and
dominoes[i] = '.', if the ith domino has not been pushed.
Return a string representing the final state.
"""
# 838. Push Dominoes
class Solution:
    def pushDominoes(self, dominoes: str) -> str:
        padded = 'L' + dominoes + 'R'
        n = len(padded)
        result = list(dominoes)
        
        prev_force_index = 0
        for curr_index in range(1, n):
            if padded[curr_index] == '.':
                continue
            
            distance = curr_index - prev_force_index - 1
            if padded[prev_force_index] == padded[curr_index]:
                # Same direction forces, fill all in between
                for k in range(1, distance + 1):
                    result[prev_force_index + k - 1] = padded[curr_index]
            
            elif padded[prev_force_index] == 'R' and padded[curr_index] == 'L':
                # Opposing forces: fill half right, half left
                left = prev_force_index + 1
                right = curr_index - 1
                while left < right:
                    result[left - 1] = 'R'
                    result[right - 1] = 'L'
                    left += 1
                    right -= 1
                # if left == right, it stays '.'
            
            # 'L' ... 'R' leaves middle as dots
            
            prev_force_index = curr_index
        
        return ''.join(result)
    
    
# Test Code
solution = Solution()
print(solution.pushDominoes("RR.L")) # Expect "RR.L"
print(solution.pushDominoes(".L.R...LR..L..")) # Expect "LL.RR.LLRRLL.."