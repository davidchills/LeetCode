/*
You are given a 0-indexed integer array players, where players[i] represents the ability of the ith player. 
You are also given a 0-indexed integer array trainers, where trainers[j] represents the training capacity of the jth trainer.
The ith player can match with the jth trainer if the player's ability is less than or equal to the trainer's training capacity. 
Additionally, the ith player can be matched with at most one trainer, and the jth trainer can be matched with at most one player.
Return the maximum number of matchings between players and trainers that satisfy these conditions.
    
2410. Maximum Matching of Players With Trainers    
*/
class Solution {
    func matchPlayersAndTrainers(_ players: [Int], _ trainers: [Int]) -> Int {
        let players = players.sorted()
        let trainers = trainers.sorted()
        let n = players.count
        let m = trainers.count
        var matches = 0
        var i = 0
        var j = 0
        
        while i < n && j < m {
            if players[i] <= trainers[j] {
                matches += 1
                i += 1
                j += 1
            }
            else { j += 1 }
        }
        
        return matches
    }
}
let solution = Solution()
print(solution.matchPlayersAndTrainers([4,7,9], [8,2,5,8])) // Expect 2
print(solution.matchPlayersAndTrainers([1,1,1], [10])) // Expect 1