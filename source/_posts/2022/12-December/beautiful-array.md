---
extends: _layouts.post
section: content
title: Beautiful array
problemUrl: https://leetcode.com/problems/beautiful-array/
date: 2022-12-24
categories: [array-and-hashmap]
---

We will use recursion to solve the problem. We will call the helper function on odd numbers and even numbers. We will return the result.

```python
class Solution:
    def beautifulArray(self, n: int) -> List[int]:
        def _beautifulArray(arr):
            if len(arr) <= 2:
                return arr
            return _beautifulArray(arr[::2]) + _beautifulArray(arr[1::2])
        
        return _beautifulArray(list(range(1, n+1)))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`