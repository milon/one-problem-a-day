---
extends: _layouts.post
section: content
title: reverse-integer
problemUrl: https://leetcode.com/problems/reverse-integer/
date: 2022-07-31
categories: [bit-manipulation]
---

We can get the least significant digit by moding it with 10. Then we can also get the remainder of the number by divide it by 10. The only catch of this problem is if the reversed number overflows 32 bit integer value. We will check if the result at any time goes above or below this 32 bit integer range, then ren return 0. Else just return the reverded value.

```python
class Solution:
    def reverse(self, x: int) -> int:
        MIN = -2147483648   # -2^31
        MAX = 2147483647    # 2^31-1
        
        res = 0
        while x:
            digit = int(math.fmod(x, 10))
            x = int(x / 10)
        
            if (res > MAX//10) or (res == MAX//10 and digit >= MAX % 10):
                return 0
            if (res < MIN//10) or (res == MIN//10 and digit <= MIN % 10):
                return 0
            
            res = (res*10) + digit
        
        return res
```

Time Complexity: `O(1)`, the iterations is never more than 32. <br/>
Space Complexity: `O(1)`