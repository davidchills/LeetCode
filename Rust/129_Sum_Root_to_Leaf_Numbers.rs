/*
You are given the root of a binary tree containing digits from 0 to 9 only.
Each root-to-leaf path in the tree represents a number.
For example, the root-to-leaf path 1 -> 2 -> 3 represents the number 123.
Return the total sum of all root-to-leaf numbers. Test cases are generated so that the answer will fit in a 32-bit integer.
A leaf node is a node with no children.
*/
/* 129. Sum Root to Leaf Numbers */
use std::rc::Rc;
use std::cell::RefCell;

#[derive(Debug, PartialEq, Eq)]
pub struct TreeNode {
    pub val: i32,
    pub left: Option<Rc<RefCell<TreeNode>>>,
    pub right: Option<Rc<RefCell<TreeNode>>>,
}

impl TreeNode {
    #[inline]
    pub fn new(
        val: i32, 
        left: Option<Rc<RefCell<TreeNode>>>, 
        right: Option<Rc<RefCell<TreeNode>>>
    ) -> Rc<RefCell<TreeNode>> {
        Rc::new(RefCell::new(TreeNode { val, left, right }))
    }
}
struct Solution;
impl Solution {
    pub fn sum_numbers(root: Option<Rc<RefCell<TreeNode>>>) -> i32 {
        
        fn dfs(node: Option<Rc<RefCell<TreeNode>>>, current_sum: i32) -> i32 {
            if let Some(node) = node {
                let node = node.borrow();
                let new_sum = current_sum * 10 as i32 + node.val;
                
                if node.left.is_none() && node.right.is_none() {
                    return new_sum;
                }
                
                let left_sum = dfs(node.left.clone(), new_sum);
                let right_sum = dfs(node.right.clone(), new_sum);
                
                return left_sum + right_sum;
            }
            0
        }        
        
        dfs(root, 0)
    }
}

fn main() {
    let root = TreeNode::new(1, Some(TreeNode::new(2, None, None)), Some(TreeNode::new(3, None, None)));
    /*
    let root = TreeNode::new(
        4, 
        Some(TreeNode::new(9, 
            Some(TreeNode::new(5, None, None)),
            Some(TreeNode::new(1, None, None))
        )),
        Some(TreeNode::new(0, None, None)) 
    );
    */
    let result = Solution::sum_numbers(Some(root));
    println!("{:?}", result);
}