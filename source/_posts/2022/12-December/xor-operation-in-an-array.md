---
extends: _layouts.post
section: content
title: XOR operation in an array
problemUrl: https://leetcode.com/problems/xor-operation-in-an-array/
date: 2022-12-27
categories: [bit-manipulation]
---

We will generate the array and then XOR all the elements.

```python
class Solution:
    def xorOperation(self, n: int, start: int) -> int:
        res = 0
        for i in range(n):
            num = start + 2*i
            res ^= num
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

We can also use `reduce` function to XOR all the elements.

```python
class Solution:
    def xorOperation(self, n: int, start: int) -> int:
        return reduce(lambda x, y: x ^ y, [start + 2*i for i in range(n)])
```