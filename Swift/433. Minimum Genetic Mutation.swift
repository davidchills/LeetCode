/*
A gene string can be represented by an 8-character long string, with choices from 'A', 'C', 'G', and 'T'.
Suppose we need to investigate a mutation from a gene string startGene to a gene string endGene 
    where one mutation is defined as one single character changed in the gene string.
For example, "AACCGGTT" --> "AACCGGTA" is one mutation.
There is also a gene bank bank that records all the valid gene mutations. 
    A gene must be in bank to make it a valid gene string.
Given the two gene strings startGene and endGene and the gene bank bank, 
    return the minimum number of mutations needed to mutate from startGene to endGene. 
    If there is no such a mutation, return -1.
Note that the starting point is assumed to be valid, so it might not be included in the bank.
    
433. Minimum Genetic Mutation    
*/
import Foundation
class Solution {
    func minMutation(_ startGene: String, _ endGene: String, _ bank: [String]) -> Int {
        let validGenes: [Character] = ["A", "C", "G", "T"]
        let geneBank = Set(bank)    
        if !geneBank.contains(endGene) {
            return -1
        }
        var queue: [(String, Int)] = [(startGene, 0)]
        var visited: Set<String> = [startGene]
    
        while !queue.isEmpty {
            let (currentGene, mutations) = queue.removeFirst()            
            if currentGene == endGene {
                return mutations
            }
    
            let geneArray = Array(currentGene)
            
            for i in 0..<geneArray.count {
                for char in validGenes {
                    if char != geneArray[i] {
                        var newGeneArray = geneArray
                        newGeneArray[i] = char
                        let newGene = String(newGeneArray)
                        if geneBank.contains(newGene) && !visited.contains(newGene) {
                            queue.append((newGene, mutations + 1))
                            visited.insert(newGene)
                        }
                    }
                }
            }
        }
    
        return -1        
    }
}
let solution = Solution()
print(solution.minMutation("AACCGGTT", "AACCGGTA", ["AACCGGTA"])); // Expect 1
print(solution.minMutation("AACCGGTT", "AAACGGTA", ["AACCGGTA","AACCGCTA","AAACGGTA"])); // Expect 2