---
extends: _layouts.post
section: content
title: Can make arithmetic progression from sequence
problemUrl: https://leetcode.com/problems/can-make-arithmetic-progression-from-sequence/
date: 2023-06-05
categories: [math-and-geometry, array-and-hashmap]
---

We will sort the array and then check if the difference between each element is the same.

```python
class Solution:
    def canMakeArithmeticProgression(self, arr: List[int]) -> bool:
        arr.sort()
        diff = arr[1] - arr[0]
        for i in range(1, len(arr)):
            if arr[i] - arr[i-1] != diff:
                return False
        return True
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`
