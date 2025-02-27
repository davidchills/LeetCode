/*
A path in a binary tree is a sequence of nodes where each pair of adjacent nodes in the sequence has an edge connecting them. 
A node can only appear in the sequence at most once. Note that the path does not need to pass through the root.
The path sum of a path is the sum of the node's values in the path.
Given the root of a binary tree, return the maximum path sum of any non-empty path.
*/
/* 124. Binary Tree Maximum Path Sum */
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
    pub fn max_path_sum(root: Option<Rc<RefCell<TreeNode>>>) -> i32 {
        
        fn dfs(node: Option<Rc<RefCell<TreeNode>>>, max_sum: &mut i32) -> i32 {
            if let Some(node) = node {
                let node = node.borrow();
                let left = dfs(node.left.clone(), max_sum).max(0);
                let right = dfs(node.right.clone(), max_sum).max(0);
                let current_max_path = node.val + left + right;
                *max_sum = (*max_sum).max(current_max_path);
                return node.val + left.max(right);
            }
            0
        }        
        
        let mut max_sum = i32::MIN;        
        dfs(root, &mut max_sum);
        max_sum
    }
}

fn main() {
    //let root = TreeNode::new(1, Some(TreeNode::new(2, None, None)), Some(TreeNode::new(3, None, None)));
    
    let root = TreeNode::new(
        -10, 
        Some(TreeNode::new(9, None, None)),
        Some(TreeNode::new(20, 
            Some(TreeNode::new(15, None, None)), 
            Some(TreeNode::new(7, None, None)),
        )),
    );
    
    let result = Solution::max_path_sum(Some(root));
    println!("{:?}", result);
}