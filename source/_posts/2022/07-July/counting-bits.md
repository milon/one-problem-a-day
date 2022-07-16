---
extends: _layouts.post
section: content
title: Number of 1 bits
problemUrl: https://leetcode.com/problems/number-of-1-bits/
date: 2022-07-16
categories: [bit-manipulation]
---

We can have a repeatative pattern if we look at the most significant bit. For example, lets look the following table-

| Number | Binary |
|--------|--------|
| 0      | 000    |
| 1      | 001    |
| 2      | 010    |
| 3      | 011    |
| 4      | 100    |
| 5      | 101    |
| 6      | 110    |
| 7      | 111    |

For first 2 number, most significant bit is different, and it 0 and 1. Then next 2 numbers, most significant bit is same but the rest is similar to first 2 number. For the next 4 number, msb is same, and rest is same as previous 4 numbers and so on. So, we can calculate on that.

```python
class Solution:
    def countBits(self, n: int) -> List[int]:
        dp = [0] * (n+1)
        offset = 1
        
        for i in range(1, n+1):
            if offset * 2 == i:
                offset = i
            dp[i] = 1 + dp[i-offset]
        return dp
```

We iterate through the array only once so, the time complexity is `O(n)`. We don't use any extra space, we use the same return array to calculate, so space complexity is `O(1)`.
