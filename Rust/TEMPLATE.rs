/*
Description
*/
/* 506. Relative Ranks */
use std::collections::HashMap;
struct Solution;
impl Solution {
    pub fn find_relative_ranks(score: Vec<i32>) -> Vec<String> {
        let mut sorted_scores = score.clone();
        sorted_scores.sort_unstable_by(|a, b| b.cmp(a)); // Sort in descending order
        
        let mut rank_map = HashMap::new();
        for (i, &s) in sorted_scores.iter().enumerate() {
            let rank = match i {
                0 => "Gold Medal".to_string(),
                1 => "Silver Medal".to_string(),
                2 => "Bronze Medal".to_string(),
                _ => (i + 1).to_string(),
            };
            rank_map.insert(s, rank);
        }
        
        score.iter().map(|&s| rank_map[&s].clone()).collect()
    }
}
/*
fn main() {
    let scores = vec![5,4,3,2,1];
    let ranks = Solution::find_relative_ranks(scores);
    println!("{:?}", ranks);
    // Expect ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
}
*/
fn main() {
    let scores = vec![10,3,8,9,4];
    let ranks = Solution::find_relative_ranks(scores);
    println!("{:?}", ranks);
    // Expect ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
}