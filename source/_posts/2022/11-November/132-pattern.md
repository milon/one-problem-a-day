---
extends: _layouts.post
section: content
title: 132 pattern
problemUrl: https://leetcode.com/problems/132-pattern/
date: 2022-11-22
categories: [stack]
---

We will use a stack to store the numbers. Then, we will iterate through the numbers and check if the number is less than the second number. If it is, then we will pop the numbers from the stack until the number is less than the second number. Then, we will check if the number is less than the third number. If it is, then we will return true. If it is not, then we will push the number to the stack. If we reach the end of the loop, then we will return false.

```python
class Solution:
    def find132pattern(self, nums: List[int]) -> bool:
        stack = []
        second = -math.inf
        
        for num in nums[::-1]:
            if num < second:
                return True
            while stack and num > stack[-1]:
                second = stack.pop()
            stack.append(num)
        
        return False
```

Time Complexity: `O(n)`, n is the length of the given array. <br/>
Space Complexity: `O(n)`