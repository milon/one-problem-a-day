---
extends: _layouts.post
section: content
title: Minimum number of flips to make the binary string alternating
problemUrl: https://leetcode.com/problems/minimum-number-of-flips-to-make-the-binary-string-alternating/
date: 2022-08-26
categories: [greedy]
---

We will take the string, and start comparing with first character as 0, and count the number of flips required. If we take first character as 1, the number of flips will be length of the string minus the flips of first character 0. If the input string is even lenght, then number of flips for 0 or 1 is exactly the same. For odd length, we use sliding window technique and update the number of flips accordingly. We will keep a running minimum flips and then return it at the end.

```python
class Solution:
    def minFlips(self, s: str) -> int:
        n = len(s)
        diff = 0
        first_bit = 0
        
        for c in s:
            if int(c) != first_bit:
                diff += 1
            first_bit = not first_bit
        
        min_diff = min(diff, n-diff)
        
        if n%2 != 0:
            for c in s:
                if int(c) == first_bit:
                    diff -= 1
                else:
                    diff += 1
                
                min_diff = min(min_diff, diff, n-diff)
                first_bit = not first_bit
        
        return min_diff
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`