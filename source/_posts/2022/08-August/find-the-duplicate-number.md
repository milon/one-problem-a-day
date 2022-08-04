---
extends: _layouts.post
section: content
title: Find the duplicate number
problemUrl: https://leetcode.com/problems/find-the-duplicate-number/
date: 2022-08-04
categories: [linked-list]
---

We will use Floyd's cycle detection algorithm for solve the problem. As the input array has elements from [1, n], and there is n+1 numbers, this is nothing but a linked list, where the list starts as index 0, and the list has a cycle. We will find the first element of the cycle.

```python
class Solution:
    def findDuplicate(self, nums: List[int]) -> int:
        slow, fast = 0, 0
        while True:
            slow = nums[slow]
            fast = nums[nums[fast]]
            if slow == fast:
                break
        
        slow2 = 0
        while True:
            slow = nums[slow]
            slow2 = nums[slow2]
            if slow == slow2:
                return slow
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`