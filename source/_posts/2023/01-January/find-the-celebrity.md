---
extends: _layouts.post
section: content
title: Find the celebrity
problemUrl: https://leetcode.com/problems/find-the-celebrity/
date: 2023-01-17
categories: [two-pointers]
---

First we need to find the celebraty candidate. We will take two pointers, left and right must meet at some point, this person is a potential celebrity. Next we need verify if the candidate is indeed a celebrity, there are 2 scenarios:

- At least one person doesn't know this candidate => not a celebrity
- This candidate knows at least one person => not a celebrity

```python
# The knows API is already defined for you.
# return a bool, whether a knows b
# def knows(a: int, b: int) -> bool:

class Solution:
    def findCelebrity(self, n: int) -> int:
        left, right = 0, n - 1
        while left < right:
            if knows(left, right):
                left += 1
            else:
                right -= 1
        
        for i in range(n):
            if not knows(i, left) and i != left:
                return -1
        
        for i in range(n):
            if knows(left, i) and i != left:
                return -1
        
        return left
```

Time complexity: `O(n)`, n is the number of people. <br/>
Space complexity: `O(1)`
