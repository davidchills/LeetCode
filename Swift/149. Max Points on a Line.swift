/*
Given an array of points where points[i] = [xi, yi] represents a point on the X-Y plane, 
return the maximum number of points that lie on the same straight line.
    
149. Max Points on a Line    
*/
struct Slope: Hashable {
    let dy: Int
    let dx: Int
}
class Solution {
    func maxPoints(_ points: [[Int]]) -> Int {
        let n = points.count
        if n < 3 { return n }
        
        var result = 0
        
        // Compute the greatest common divisor.
        func gcd(_ a: Int, _ b: Int) -> Int {
            return b == 0 ? a : gcd(b, a % b)
        }
        
        for i in 0..<n {
            var slopeCount = [Slope: Int]()
            var duplicates = 0   // Count points that are exactly the same as points[i]
            var currMax = 0      // Maximum points found with a specific slope relative to points[i]
            
            for j in (i + 1)..<n {
                // Check for duplicate points.
                if points[j][0] == points[i][0] && points[j][1] == points[i][1] {
                    duplicates += 1
                    continue
                }
                
                let dx = points[j][0] - points[i][0]
                let dy = points[j][1] - points[i][1]
                
                // Handle vertical lines separately.
                if dx == 0 {
                    let slope = Slope(dy: Int.max, dx: Int.max)
                    slopeCount[slope, default: 0] += 1
                    currMax = max(currMax, slopeCount[slope]!)
                } 
                else {
                    let divisor = gcd(abs(dx), abs(dy))
                    var normalizedDx = dx / divisor
                    var normalizedDy = dy / divisor
                    
                    // Ensure a consistent representation of slopes by forcing dx to be positive.
                    if normalizedDx < 0 {
                        normalizedDx = -normalizedDx
                        normalizedDy = -normalizedDy
                    }
                    let slope = Slope(dy: normalizedDy, dx: normalizedDx)
                    slopeCount[slope, default: 0] += 1
                    currMax = max(currMax, slopeCount[slope]!)
                }
            }
            
            result = max(result, currMax + duplicates + 1)
        }
        
        return result        
    }
}
let solution = Solution()
print(solution.maxPoints([[1,1],[2,2],[3,3]])) // Expect 3
print(solution.maxPoints([[1,1],[3,2],[5,3],[4,1],[2,3],[1,4]]))  // Expect 4