---
extends: _layouts.post
section: content
title: Next greater element II
problemUrl: https://leetcode.com/problems/next-greater-element-ii/
date: 2022-11-05
categories: [stack]
---

We will iterate over the array, and push the index of the current element to the stack. If the current element is greater than the element at the top of the stack, we will pop the top of the stack, and set the element at the popped index to the current element. We will repeat this process until the stack is empty or the current element is less than the element at the top of the stack. Then we will push the index of the current element to the stack. We will repeat this process for 2 times the length of the array, and the result will be the array of the next greater element.

```python
class Solution:
    def nextGreaterElements(self, nums: List[int]) -> List[int]:
        n = len(nums)
        res = [-1] * n
        stack = []
        for i in range(2*n):
            while stack and nums[i%n] > nums[stack[-1]]:
                res[stack.pop()] = nums[i%n]
            stack.append(i%n)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`