/*
Given the root of a binary tree, flatten the tree into a "linked list":

The "linked list" should use the same TreeNode class where the right child pointer points to the next node in the list 
    and the left child pointer is always null.
The "linked list" should be in the same order as a pre-order traversal of the binary tree.
    Uses in-place Morris traversal
*/
/* 114. Flatten Binary Tree to Linked List */
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
    pub fn new(val: i32, left: Option<Rc<RefCell<TreeNode>>>, right: Option<Rc<RefCell<TreeNode>>>) -> Rc<RefCell<TreeNode>> {
        Rc::new(RefCell::new(TreeNode { val, left, right }))
    }
}

struct Solution;
impl Solution {
    pub fn flatten(root: &mut Option<Rc<RefCell<TreeNode>>>) {
        let mut current = root.clone();
        
        while let Some(node_rc) = current {
            let mut node = node_rc.borrow_mut();
            
            if let Some(left_rc) = node.left.take() {
                let mut predecessor = left_rc.clone();
                
                while predecessor.borrow().right.is_some() {
                    let right_child = predecessor.borrow().right.clone();
                    predecessor = right_child.unwrap();;
                }
                predecessor.borrow_mut().right = node.right.take();
                node.right = Some(left_rc);
            }    
            current = node.right.clone();
        }
    }
}
fn main() {
    let root = TreeNode::new(
        1, 
        Some(TreeNode::new(
            2, 
            Some(TreeNode::new(3, None, None)), 
            Some(TreeNode::new(4, None, None)),
        )),
        Some(TreeNode::new(
            5, 
            None, 
            Some(TreeNode::new(6, None, None)),
        )),
    );
    let mut root_option = Some(root.clone());
    Solution::flatten(&mut root_option);
    println!("{:?}", root_option); // Expect [1,null,2,null,3,null,4,null,5,null,6]
}