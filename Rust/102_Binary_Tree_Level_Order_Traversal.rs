/*
Given the root of a binary tree, return the level order traversal of its nodes' values. (i.e., from left to right, level by level).
*/
/* 102. Binary Tree Level Order Traversal */
struct Solution;
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
impl Solution {
    pub fn level_order(root: Option<Rc<RefCell<TreeNode>>>) -> Vec<Vec<i32>> {
        if root.is_none() { return vec![]; }
        let mut queue = VecDeque::new();
        let mut result: Vec<Vec<i32>> = Vec::new();
        queue.push_back(root.unwrap());
        
        while !queue.is_empty() {
            let level_size = queue.len();
            let mut level: Vec<i32> = Vec::new();
            
            for _ in 0..level_size {
                let node = queue.pop_front().unwrap();
                let node_ref = node.borrow();
                level.push(node_ref.val);
                
                if node_ref.left.is_some() {
                    queue.push_back(node_ref.left.clone().unwrap());
                }
                if node_ref.right.is_some() {
                    queue.push_back(node_ref.right.clone().unwrap());
                }                
            }
            result.push(level);
        }
        result
    }
}

fn main() {
    //let root = TreeNode::new(1, None, None);
    //let root = TreeNode::new(None, None, None);
    
    let root = TreeNode::new(
        3, 
        Some(TreeNode::new(9, None, None)),
        Some(TreeNode::new(20, 
            Some(TreeNode::new(15, None, None)), 
            Some(TreeNode::new(7, None, None)),
        )),
    );
    let result = Solution::level_order(Some(root));
    println!("{:?}", result);
}