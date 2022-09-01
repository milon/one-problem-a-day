---
extends: _layouts.post
section: content
title: Clumsy factorial
problemUrl: https://leetcode.com/problems/clumsy-factorial/
date: 2022-09-01
categories: [math-and-geometry]
---

If we calculate some values, then we will notice some pattern. Here are some calculations-

```
clumsy(1) = 1
clumsy(2) = 2*1 = 2
clumsy(3) = 3*2/1 = 6
clumsy(4) = 4*3/2+1= 7
clumsy(5) = 5*4/3+2-1= 7
clumsy(6) = 6*5/4+3-2*1= 8
clumsy(7) = 7*6/5+4-3*2/1= 6
clumsy(8) = 9
clumsy(9) = 11
clumsy(10) = 12
clumsy(11) = 10
clumsy(12) = 13
clumsy(13) = 15
clumsy(14) = 16
clumsy(15) = 14
```

From this we can create the following method to calculate the clumsy factorial.

```python
class Solution:
    def clumsy(self, n: int) -> int:
        if n == 1: return 1
        if n == 2: return 2
        if n == 3: return 6
        if n == 4: return 7
        if (n-4) % 4 in [1, 2]: return n+2
        if (n-4) % 4 == 3: return n-1
        return n+1
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`