---
extends: _layouts.post
section: content
title: Gray code
problemUrl: https://leetcode.com/problems/gray-code/
date: 2022-09-03
categories: [bit-manipulation]
---

There is formula to get Gray's code, for every number i, it `i ^ (i>>1)`. We can use the foumula to get the values for 2^n numbers and return it as the result.

```python
class Solution:
    def grayCode(self, n: int) -> List[int]:
        res = []
        for i in range(2**n):
            res.append(i ^ (i>>1))
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(1)`
