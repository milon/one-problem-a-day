---
extends: _layouts.post
section: content
title: Minimum addition to make integer beautiful
problemUrl: https://leetcode.com/problems/minimum-addition-to-make-integer-beautiful/
date: 2022-11-21
categories: [math-and-geometry]
---

We will iterate through the digits of the number and find the minimum number of digits we need to add to make the number beautiful. We will keep track of the number of digits we have seen and the number of digits we need to add. If the number of digits we have seen is greater than the number of digits we need to add, we will add the difference to the number of digits we need to add. If the number of digits we have seen is less than the number of digits we need to add, we will add the difference to the number of digits we have seen.

```python
class Solution:
    def makeIntegerBeautiful(self, n: int, target: int) -> int:
        n0 = n
        i = 0
        while sum(map(int, str(n))) > target:
            n = n // 10 + 1
            i += 1
        return n*(10**i) - n0
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`