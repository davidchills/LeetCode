/*
Given two integer arrays inorder and postorder where 
    inorder is the inorder traversal of a binary tree and 
    postorder is the postorder traversal of the same tree, construct and return the binary tree.
    Inorder Traversal → [Left, Root, Right]
    Postorder Traversal → [Left, Right, Root]
*/
/* 106. Construct Binary Tree from Inorder and Postorder Traversal */
use std::rc::Rc;
use std::cell::RefCell;
use std::collections::HashMap;

#[derive(Debug, PartialEq, Eq)]
pub struct TreeNode {
    pub val: i32,
    pub left: Option<Rc<RefCell<TreeNode>>>,
    pub right: Option<Rc<RefCell<TreeNode>>>,
}

impl TreeNode {
    #[inline]
    pub fn new(val: i32) -> Self {
        TreeNode { val, left: None, right: None }
    }
}

struct Solution;
impl Solution {
    pub fn build_tree(inorder: Vec<i32>, postorder: Vec<i32>) -> Option<Rc<RefCell<TreeNode>>> {
        if inorder.len() != postorder.len() {
            return None; // Avoids mismatched lengths
        }
        
        fn helper(
            in_left: isize, 
            in_right: isize, 
            post_idx: &mut isize, 
            inorder_map: &HashMap<i32, usize>, 
            postorder: &Vec<i32>
        ) -> Option<Rc<RefCell<TreeNode>>> {

            if in_left > in_right || *post_idx < 0 {
                return None;
            }
            
            let root_val = postorder[*post_idx as usize];
            let root = Rc::new(RefCell::new(TreeNode::new(root_val)));
            
            let index = *inorder_map.get(&root_val).unwrap() as isize;
            *post_idx -= 1;
            
            
            root.borrow_mut().right = helper(index + 1, in_right, post_idx, inorder_map, postorder);
            root.borrow_mut().left = helper(in_left, index - 1, post_idx, inorder_map, postorder);
            
            Some(root)
        }
        
        let inorder_map: HashMap<i32, usize> = inorder.iter().enumerate().map(|(i, &val)| (val, i)).collect();
        let mut post_idx = (postorder.len() as isize) - 1;
        
        helper(0, inorder.len().saturating_sub(1) as isize, &mut post_idx, &inorder_map, &postorder)
    }
}

fn main() {
    let inorder = vec![9,3,15,20,7];
    let postorder = vec![9,15,7,20,3];
    let root = Solution::build_tree(inorder, postorder);
    println!("{:?}", root);
    // Expect [3,9,20,null,null,15,7]
}