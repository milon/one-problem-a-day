---
extends: _layouts.post
section: content
title: Valid parenthesis string
problemUrl: https://leetcode.com/problems/valid-parenthesis-string/
date: 2022-08-09
categories: [greedy]
---

We will keep track of number of left parenthesis and number of right parenthesis in the string. For `*`, we could count it as left parenthesis or right parenthesis or we could ignore it. So we will keep track of maximum number of left parenthesis and min number of left parenthesis, in that way if we ever reach below 0 maximum left parenthesis, we will immediately return false. If the number of minimum parenthesis dips below 0, we will reset it to 0. Finally, we will check if the number of minimum parenthesis is 0 or not, and based on that we will return true or false.

```python
class Solution:
    def checkValidString(self, s: str) -> bool:
        leftMin, leftMax = 0, 0
        for c in s:
            if c == '(':
                leftMin, leftMax = leftMin + 1, leftMax + 1
            elif c == ')':
                leftMin, leftMax = leftMin - 1, leftMax - 1
            else:
                leftMin, leftMax = leftMin - 1, leftMax + 1
                
            if leftMax < 0:
                return False
            if leftMin < 0:
                leftMin = 0
        return leftMin == 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`