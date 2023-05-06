---
extends: _layouts.post
section: content
title: Concatenation of array
problemUrl: https://leetcode.com/problems/concatenation-of-array/
date: 2023-05-06
categories: [array-and-hashmap]
---

We can just merge the array with itself and return.

```python
class Solution:
    def getConcatenation(self, nums: List[int]) -> List[int]:
        return nums + nums
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`