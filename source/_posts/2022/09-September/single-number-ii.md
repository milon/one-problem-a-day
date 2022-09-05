---
extends: _layouts.post
section: content
title: Single number II
problemUrl: https://leetcode.com/problems/single-number-ii/
date: 2022-09-05
categories: [bit-manipulation]
---

We will have 2 elements, one will be store all the values that store all the elements that occurs once and two will store all the elements that occurs twice. Then we make sure that the values that is in one does not belongs in two. So, for getting one, we bitwise and the complement of two, same for two, we bitwise and the complement of one. This will make sure, if the number actually happens 3 times, you will not be able to find it both one and two, so, it doesn't have any effects on both. So, if we go through each element, then finally in the one, we will have the value that only occurs once.

```python
class Solution:
    def singleNumber(self, nums: List[int]) -> int:
        one, two = 0, 0
        for n in nums:
            one = ~two & (n^one)
            two = ~one & (n^two)
        
        return one
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`