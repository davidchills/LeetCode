/*
Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.
According to the definition of LCA on Wikipedia: 
    “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
    (where we allow a node to be a descendant of itself).
*/
/* 236. Lowest Common Ancestor of a Binary Tree */
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
    pub fn lowest_common_ancestor(root: Option<Rc<RefCell<TreeNode>>>, p: Option<Rc<RefCell<TreeNode>>>, q: Option<Rc<RefCell<TreeNode>>>) -> Option<Rc<RefCell<TreeNode>>> {
        
        if let Some(curr) = root.clone() {
            if let (Some(p_node), Some(q_node)) = (p.clone(), q.clone()) {
                if Rc::ptr_eq(&curr, &p_node) || Rc::ptr_eq(&curr, &q_node) {
                    return Some(curr);
                }
            }

            let left = Self::lowest_common_ancestor(
                curr.borrow().left.clone(),
                p.clone(),
                q.clone(),
            );
            let right = Self::lowest_common_ancestor(
                curr.borrow().right.clone(),
                p.clone(),
                q.clone(),
            );

            if left.is_some() && right.is_some() {
                return Some(curr);
            }

            return left.or(right);
        }

        None
    }
}

fn main() {
    let root = TreeNode::new(3, None, None);
    let node5 = TreeNode::new(5, None, None);
    let node1 = TreeNode::new(1, None, None);
    let node6 = TreeNode::new(6, None, None);
    let node2 = TreeNode::new(2, None, None);
    let node0 = TreeNode::new(0, None, None);
    let node8 = TreeNode::new(8, None, None);
    let node7 = TreeNode::new(7, None, None);
    let node4 = TreeNode::new(4, None, None);

    root.borrow_mut().left = Some(node5.clone());
    root.borrow_mut().right = Some(node1.clone());
    node5.borrow_mut().left = Some(node6.clone());
    node5.borrow_mut().right = Some(node2.clone());
    node1.borrow_mut().left = Some(node0.clone());
    node1.borrow_mut().right = Some(node8.clone());
    node2.borrow_mut().left = Some(node7.clone());
    node2.borrow_mut().right = Some(node4.clone());
    
    //let result = Solution::lowest_common_ancestor(Some(root.clone()), Some(node5.clone()), Some(node1.clone()));
    //println!("LCA: {:?}", result.unwrap().borrow().val); // Expect 3

    let result2 = Solution::lowest_common_ancestor(Some(root.clone()), Some(node5.clone()), Some(node4.clone()));
    println!("LCA: {:?}", result2.unwrap().borrow().val); // Expect 5
}