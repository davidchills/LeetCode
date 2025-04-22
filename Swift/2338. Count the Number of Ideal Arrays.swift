/*
You are given two integers n and maxValue, which are used to describe an ideal array.
A 0-indexed integer array arr of length n is considered ideal if the following conditions hold:
Every arr[i] is a value from 1 to maxValue, for 0 <= i < n.
Every arr[i] is divisible by arr[i - 1], for 0 < i < n.
Return the number of distinct ideal arrays of length n. Since the answer may be very large, return it modulo 10^9 + 7.
    
2338. Count the Number of Ideal Arrays    
*/
class Solution {
    
    func idealArrays(_ n: Int, _ maxValue: Int) -> Int {
        let MOD = 1_000_000_007
        var dpPrev = Array(repeating: 1, count: maxValue + 1)
        var totalIdeal = 0        
        var comb = [1]
        var divisors = Array(repeating: [Int](), count: maxValue + 1)
        
        for divisor in 1...maxValue {
            var multiple = divisor
            while multiple <= maxValue {
                divisors[multiple].append(divisor)
                multiple += divisor
            }
        }

        for chainLength in 1...n {
            let sumChains = dpPrev[1...].reduce(0) { ($0 + $1) % MOD }
            let chooseIndex = chainLength - 1
            
            if chooseIndex >= comb.count {
                let numerator = (n - 1) - (chooseIndex - 1)
                let denominator = chooseIndex
                let invDen = modPow(denominator, MOD - 2, MOD)
                let nextComb = Int((Int64(comb[chooseIndex - 1]) * Int64(numerator) % Int64(MOD)) * Int64(invDen) % Int64(MOD))
                comb.append(nextComb)
            }
            
            totalIdeal = Int((Int64(totalIdeal) + Int64(sumChains) * Int64(comb[chooseIndex])) % Int64(MOD))
            
            if chainLength == n { break }
            
            var dpCurr = Array(repeating: 0, count: maxValue + 1)
            var anyNonZero = false
            
            for val in 1...maxValue {
                var sumForVal = 0
                for d in divisors[val] {
                    if d < val {
                        sumForVal = (sumForVal + dpPrev[d]) % MOD
                    }
                }
                dpCurr[val] = sumForVal
                if sumForVal != 0 {
                    anyNonZero = true
                }
            }
            if !anyNonZero {
                break
            }
            dpPrev = dpCurr
        }
        
        return totalIdeal        
    }
    
    private func modPow(_ base: Int, _ exp: Int, _ mod: Int) -> Int {
        var result: Int64 = 1
        var b = Int64(base % mod)
        var e = exp
        while e > 0 {
            if e & 1 == 1 {
                result = (result * b) % Int64(mod)
            }
            b = (b * b) % Int64(mod)
            e >>= 1
        }
        return Int(result)
    }    
}
let solution = Solution()
print(solution.idealArrays(2, 5)) // Expect 10
print(solution.idealArrays(5, 3))  // Expect 11