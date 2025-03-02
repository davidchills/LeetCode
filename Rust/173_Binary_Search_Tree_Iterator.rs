/*
Implement the BSTIterator class that represents an iterator over the in-order traversal of a binary search tree (BST):
• BSTIterator(TreeNode root) Initializes an object of the BSTIterator class. 
    The root of the BST is given as part of the constructor. 
    The pointer should be initialized to a non-existent number smaller than any element in the BST.
• boolean hasNext() Returns true if there exists a number in the traversal to the right of the pointer, otherwise returns false.
• int next() Moves the pointer to the right, then returns the number at the pointer.
Notice that by initializing the pointer to a non-existent smallest number, the first call to next() will return the smallest element in the BST.
You may assume that next() calls will always be valid. That is, there will be at least a next number in the in-order traversal when next() is called.

*/
/* 173. Binary Search Tree Iterator */
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
    stack: Vec<Rc<RefCell<TreeNode>>>,
}


/** 
 * `&self` means the method takes an immutable reference.
 * If you need a mutable reference, change it to `&mut self` instead.
 */
impl BSTIterator {

    pub fn new(root: Option<Rc<RefCell<TreeNode>>>) -> Self {
        let mut iter = BSTIterator { stack: Vec::new() };
        iter.push_left(root);
        iter        
    }
    
    pub fn next(&mut self) -> i32 {
        let node = self.stack.pop().unwrap();
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
    let root = TreeNode::new(
        7, 
        Some(TreeNode::new(3, None, None), 
        Some(TreeNode::new(
            15, 
            Some(TreeNode::new(9,None, None)),
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