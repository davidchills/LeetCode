<?php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function createLinkedList($arr) {
    if (empty($arr)) { return null; }
    $head = new ListNode(array_shift($arr));
    $current = $head;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $head;
}

function printLinkedList($head) {
    $result = [];
    while ($head !== null) {
        $result[] = $head->val;
        $head = $head->next;
    }
    echo implode(" -> ", $result) . "\n";
}	
	
//$arr = [1,2,3,null,5,null,4];
//$root = createLinkedList($arr);
//printLinkedList($root);
?>