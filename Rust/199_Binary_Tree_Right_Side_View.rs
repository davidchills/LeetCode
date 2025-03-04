/*
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
*/
/* 199. Binary Tree Right Side View */
use std::rc::Rc;
use std::cell::RefCell;
use std::collections::VecDeque;

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
    pub fn right_side_view(root: Option<Rc<RefCell<TreeNode>>>) -> Vec<i32> {
        if root.is_none() { return vec![]; }
        let mut result = vec![];
        let mut queue = VecDeque::new();
        queue.push_back(root.unwrap());
        
        while !queue.is_empty() {
            let size = queue.len();
            for i in 0..size {
                let node = queue.pop_front().unwrap();
                let node_ref = node.borrow();
                
                if i == size - 1 {
                    result.push(node_ref.val);
                }
                if let Some(left) = &node_ref.left {
                    queue.push_back(left.clone());
                }
                if let Some(right) = &node_ref.right {
                    queue.push_back(right.clone());
                }
            }
        }
        result
    }
}

fn main() {
    let root = TreeNode::new(1, 
        Some(TreeNode::new(1, None, Some(TreeNode::new(5, None, None)))), 
        Some(TreeNode::new(3, None,
            Some(TreeNode::new(4, None, None))
        ))
    );    // Expect [1, 3, 4]
    let result = Solution::right_side_view(Some(root));
    println!("{:?}", result);
}