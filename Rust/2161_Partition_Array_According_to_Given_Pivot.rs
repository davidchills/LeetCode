/*
You are given a 0-indexed integer array nums and an integer pivot. Rearrange nums such that the following conditions are satisfied:
Every element less than pivot appears before every element greater than pivot.
Every element equal to pivot appears in between the elements less than and greater than pivot.
The relative order of the elements less than pivot and the elements greater than pivot is maintained.
More formally, consider every pi, pj where pi is the new position of the ith element and pj is the new position of the jth element. 
    If i < j and both elements are smaller (or larger) than pivot, then pi < pj.
Return nums after the rearrangement.
*/
/* 2161. Partition Array According to Given Pivot */
struct Solution;
impl Solution {
    pub fn pivot_array(nums: Vec<i32>, pivot: i32) -> Vec<i32> {
        
        let mut low = Vec::new();
        let mut mid = Vec::new();
        let mut high = Vec::new();
        
        for &num in &nums {
            if num < pivot { low.push(num); }
            else if num == pivot { mid.push(num); } 
            else { high.push(num); }
        }
        //let mut result = Vec::with_capacity(nums.len());
        //result.extend(low);
        //result.extend(mid);
        //result.extend(high);
        // result
        low.extend(mid);
        low.extend(high);
        low
    }
}

fn main() {
    let nums = vec![9,12,5,10,14,3,10];
    let pivot = 10; // Expect [9,5,3,10,10,12,14]
    
    //let nums = vec![-3,4,3,2];
    //let pivot = 2; // Expect [-3,2,4,3]
    
    let result = Solution::pivot_array(nums, pivot);
    println!("{:?}", result);
}