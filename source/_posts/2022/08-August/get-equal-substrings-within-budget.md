---
extends: _layouts.post
section: content
title: Get equal substrings within budget
problemUrl: https://leetcode.com/problems/get-equal-substrings-within-budget/
date: 2022-08-30
categories: [sliding-window]
---

We will take 2 pointer, we will forward our right pointer, added the difference of s and t in a running sum and until it is less than max cost, we forward the right pointer. Then we forward the left pointer, and keep the difference of left and right pointer as our maximum length for the result. After right pointer reaches the end of the string, we return our maximum length as result.

```python
class Solution:
    def equalSubstring(self, s: str, t: str, maxCost: int) -> int:
        maxLen, left, runningSum = 0, 0, 0
        for i in range(len(s)):
            runningSum += abs(ord(s[i])-ord(t[i]))
            
            while runningSum > maxCost:
                runningSum -= abs(ord(s[left])-ord(t[left]))
                left += 1
            maxLen = max(maxLen, i-left+1)
        return maxLen
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`