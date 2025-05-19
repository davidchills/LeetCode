<?php
/*
You are given a 0-indexed integer array nums of size 3 which can form the sides of a triangle.
A triangle is called equilateral if it has all sides of equal length.
A triangle is called isosceles if it has exactly two sides of equal length.
A triangle is called scalene if all its sides are of different lengths.
Return a string representing the type of triangle that can be formed or "none" if it cannot form a triangle.
*/
class Solution {

    /**
     * 3024. Type of Triangle
     * @param Integer[] $nums
     * @return String
     */
    function triangleType($nums) {
        sort($nums);
        if ($nums[0] + $nums[1] > $nums[2]) {
            if ($nums[0] === $nums[2]) {
                return "equilateral";
            }
            elseif ($nums[0] === $nums[1] || $nums[1] === $nums[2]) {
                return "isosceles";
            }
            else { return "scalene"; }
        }
        return "none";
    }
}

$c = new Solution;
print $c->triangleType([3,3,3])."\n"; // Expect "equilateral"
print $c->triangleType([3,4,5])."\n"; // Expect "scalene"
print $c->triangleType([5,3,8])."\n"; // Expect "none"
?>