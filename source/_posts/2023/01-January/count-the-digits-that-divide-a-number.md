---
extends: _layouts.post
section: content
title: Count the digits that divide a number
problemUrl: https://leetcode.com/problems/count-the-digits-that-divide-a-number/
date: 2023-01-01
categories: [math-and-geometry]
---

We will iterate over each digit and check if it is a divisor of the number. If it is, we will increment the counter.

```python
class Solution:
    def countDigits(self, num: int) -> int:
        return sum(num % int(n) == 0 for n in str(num))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`