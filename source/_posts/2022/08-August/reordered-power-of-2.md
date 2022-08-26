---
extends: _layouts.post
section: content
title: Reordered power of 2
problemUrl: https://leetcode.com/problems/reordered-power-of-2/
date: 2022-08-26
categories: [bit-manipulation]
---

We will count the number of digits in out given input. Then we take all the power of 2 from 1 to 32 bit integers, compare the digits of them, if any one of it matches with our given input, we return true, otherwise false.

```python
class Solution:
    def reorderedPowerOf2(self, n: int) -> bool:
        count = Counter(str(n))
        return any(count == Counter(str(1 << i)) for i in range(31))
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`
