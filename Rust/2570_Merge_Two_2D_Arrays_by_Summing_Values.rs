/*
You are given two 2D integer arrays nums1 and nums2.
nums1[i] = [idi, vali] indicate that the number with the id idi has a value equal to vali.
nums2[i] = [idi, vali] indicate that the number with the id idi has a value equal to vali.
Each array contains unique ids and is sorted in ascending order by id.
Merge the two arrays into one array that is sorted in ascending order by id, respecting the following conditions:
Only ids that appear in at least one of the two arrays should be included in the resulting array.
Each id should be included only once and its value should be the sum of the values of this id in the two arrays. 
    If the id does not exist in one of the two arrays, then assume its value in that array to be 0.
Return the resulting array. The returned array must be sorted in ascending order by id.
*/
/* 2570. Merge Two 2D Arrays by Summing Values */
struct Solution;
impl Solution {
    pub fn merge_arrays(nums1: Vec<Vec<i32>>, nums2: Vec<Vec<i32>>) -> Vec<Vec<i32>> {
        
        let mut result = vec![];
        let n1 = nums1.len();
        let n2 = nums2.len();
        let mut i = 0;
        let mut j = 0;
        
        while i < n1 && j < n2 {
            if nums1[i][0] == nums2[j][0] {
                result.push(vec![nums1[i][0], nums1[i][1] + nums2[j][1]]);
                i += 1;
                j += 1;
            }
            else if nums1[i][0] < nums2[j][0] {
                result.push(nums1[i].to_vec());
                i += 1;
            }
            else {
                result.push(nums2[j].to_vec());
                j += 1;
            }
        }
        while i < n1 {
            result.push(nums1[i].to_vec());
            i += 1;
        }
        while j < n2 {
            result.push(nums2[j].to_vec());
            j += 1;
        }
        
        result
    }
}

fn main() {
    //let nums1 = vec![vec![1,2],vec![2,3],vec![4,5]];
    //let nums2 = vec![vec![1,4],vec![3,2],vec![4,1]]; // Expect [[1,6],[2,3],[3,2],[4,6]]
    
    let nums1 = vec![vec![2,4],vec![3,6],vec![5,5]];
    let nums2 = vec![vec![1,3],vec![4,3]]; // Expect [[1,3],[2,4],[3,6],[4,3],[5,5]]
    
    let result = Solution::merge_arrays(nums1, nums2);
    println!("{:?}", result);
}