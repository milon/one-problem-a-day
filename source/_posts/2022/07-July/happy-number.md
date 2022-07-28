---
extends: _layouts.post
section: content
title: Happy number
problemUrl: https://leetcode.com/problems/happy-number/
date: 2022-07-28
categories: [math-and-geometry]
---

We will calculate the next number, and memoize it. If it's already in the memo, that means we have a cycle, then we return false. Otherwise the number will end up on to be 1. Then we break the loop and return true.

```python
class Solution:
    def isHappy(self, n: int) -> bool:
        memo = set()
        while n != 1:
            n = sum(int(i) ** 2 for i in str(n))
            if n in memo:
                return False
            memo.add(n)
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`