/*
Given the root of a binary tree, return its maximum depth.
A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.
*/
/* 104. Maximum Depth of Binary Tree */
use std::collections::VecDeque;
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
    pub fn max_depth(root: Option<Rc<RefCell<TreeNode>>>) -> i32 {
        if root.is_none() { return 0; }
        let mut queue = VecDeque::new();
        let mut depth = 0;
        queue.push_back(root.unwrap());
        
        while !queue.is_empty() {
            let level_size = queue.len();
            
            for _ in 0..level_size {
                let node = queue.pop_front().unwrap();
                let node_ref = node.borrow();
                
                if node_ref.left.is_some() {
                    queue.push_back(node_ref.left.clone().unwrap());
                }
                if node_ref.right.is_some() {
                    queue.push_back(node_ref.right.clone().unwrap());
                }                
            }
            depth += 1;
        }
        depth      
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
    
    let result = Solution::max_depth(Some(root));
    println!("{:?}", result);
}