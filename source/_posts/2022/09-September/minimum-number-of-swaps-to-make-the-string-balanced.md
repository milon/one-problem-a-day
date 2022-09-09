---
extends: _layouts.post
section: content
title: Minimum number of swaps to make the string balanced
problemUrl: https://leetcode.com/problems/minimum-number-of-swaps-to-make-the-string-balanced/
date: 2022-09-09
categories: [stack]
---

We will iterate over the string, for each opening bracket, we increase the left count by 1. For each closing bracket, if the count of left braket is greater than right bracket, then we increse the count of right bracket, else we increase the count of balance, which is the number of unmatched pair of brackets. The idea is to add 1 to make it matched and then return the integer division of the number by 2 as result.

```python
class Solution:
    def minSwaps(self, s: str) -> int:
        right_count, left_count = 0, 0
        balance = 0
        
        for c in s:
            if c =='[':
                left_count += 1
            else:
                if left_count > right_count:
                    right_count += 1
                else:
                    balance += 1
        
        return (balance+1)//2
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`