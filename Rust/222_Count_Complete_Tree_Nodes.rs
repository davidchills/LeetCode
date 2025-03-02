/*
Given the root of a complete binary tree, return the number of the nodes in the tree.
According to Wikipedia, every level, except possibly the last, is completely filled in a complete binary tree, 
    and all nodes in the last level are as far left as possible. It can have between 1 and 2h nodes inclusive at the last level h.
Design an algorithm that runs in less than O(n) time complexity.
*/
/* 222. Count Complete Tree Nodes */
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

struct BSTIterator {
    stack: Vec<Rc<RefCell<TreeNode>>>, // Stack to hold nodes during traversal
}

impl BSTIterator {
    pub fn new(root: Option<Rc<RefCell<TreeNode>>>) -> Self {
        let mut iter = BSTIterator { stack: Vec::new() };
        iter.push_left(root);
        iter
    }
    
    pub fn next(&mut self) -> i32 {
        let node = self.stack.pop().unwrap(); // Safe to unwrap since next() is always valid
        let val = node.borrow().val;
        if let Some(right) = node.borrow().right.clone() {
            self.push_left(Some(right));
        }
        val
    }
    
    pub fn has_next(&self) -> bool {
        !self.stack.is_empty()
    }

    fn push_left(&mut self, mut node: Option<Rc<RefCell<TreeNode>>>) {
        while let Some(n) = node {
            self.stack.push(n.clone());
            node = n.borrow().left.clone();
        }
    }
}

fn main() {
    let root = TreeNode::new(7, 
        Some(TreeNode::new(3, None, None)), 
        Some(TreeNode::new(15, 
            Some(TreeNode::new(9, None, None)), 
            Some(TreeNode::new(20, None, None))
        ))
    );

    let mut obj = BSTIterator::new(Some(root));
    println!("{:?}", obj.next()); // Expect 3
    println!("{:?}", obj.next()); // Expect 7
    println!("{:?}", obj.has_next()); // Expect true
    println!("{:?}", obj.next()); // Expect 9
    println!("{:?}", obj.has_next()); // Expect true
    println!("{:?}", obj.next()); // Expect 15
    println!("{:?}", obj.has_next()); // Expect true
    println!("{:?}", obj.next()); // Expect 20
    println!("{:?}", obj.has_next()); // Expect false
}