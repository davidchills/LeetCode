/*
Given an integer array nums and an integer k, return the kth largest element in the array.
Note that it is the kth largest element in the sorted order, not the kth distinct element.
Can you solve it without sorting?
*/
/* 215. Kth Largest Element in an Array */
use std::collections::BinaryHeap;
use std::cmp::Reverse;
struct Solution;
impl Solution {
    pub fn find_kth_largest(nums: Vec<i32>, k: i32) -> i32 {
        let k = k as usize;
        let mut min_heap = BinaryHeap::new();
        
        for num in nums {
            min_heap.push(Reverse(num));
            if min_heap.len() > k {
                min_heap.pop().unwrap().0;
            }
        }
        min_heap.pop().unwrap().0
    }
}

fn main() {
    //let nums = vec![3,2,1,5,6,4];
    //let k = 2; // Expect 5
    
    let nums = vec![3,2,3,1,2,4,5,5,6];
    let k = 4; // Expect 4
    
    let result = Solution::find_kth_largest(nums, k);
    println!("{:?}", result);
}