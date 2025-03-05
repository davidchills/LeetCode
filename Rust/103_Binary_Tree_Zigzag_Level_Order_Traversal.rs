/*
Given the root of a binary tree, return the zigzag level order traversal of its nodes' values. 
    (i.e., from left to right, then right to left for the next level and alternate between).
*/
/* 103. Binary Tree Zigzag Level Order Traversal */
use std::rc::Rc;
use std::cell::RefCell;
use std::collections::VecDeque;
//use std::cmp::Ordering;

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
    pub fn zigzag_level_order(root: Option<Rc<RefCell<TreeNode>>>) -> Vec<Vec<i32>> {

        if root.is_none() { return vec![]; }
        let mut result = vec![];
        let mut queue = VecDeque::new();
        if let Some(root) = root {
            queue.push_back(root);
        } 
        else {
            return result;
        }
        let mut zigzag = false;
        
        while !queue.is_empty() {
            let level_size = queue.len();
            let mut level_nodes = vec![];
            for _ in 0..level_size {
                let node = queue.pop_front().unwrap();
                let node_ref = node.borrow();
                
                level_nodes.push(node_ref.val);
                
                if let Some(left) = &node_ref.left {
                    queue.push_back(left.clone());
                }
                if let Some(right) = &node_ref.right {
                    queue.push_back(right.clone());
                }
            }
            if zigzag {
                level_nodes.reverse();
            }
            result.push(level_nodes);
            zigzag = !zigzag;
        }
        result
    }
}

fn main() {
    let root = TreeNode::new(3, 
        Some(TreeNode::new(9, None, None)),
        Some(TreeNode::new(20,
            Some(TreeNode::new(15, None, None)),
            Some(TreeNode::new(7, None, None))
        ))
    );    // Expect [[3],[20,9],[15,7]]
    let result = Solution::zigzag_level_order(Some(root));
    println!("{:?}", result);
}