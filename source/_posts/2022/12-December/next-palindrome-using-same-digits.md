---
extends: _layouts.post
section: content
title: Next palindrome using same digits
problemUrl: https://leetcode.com/problems/next-palindrome-using-same-digits/
date: 2022-12-27
categories: [math-and-geometry]
---

We will find the next permutation that is greater than the first half of the palindrome, say greaterHalf. Then add it to the mid item if there is one and to reversed of greaterHalf.

```python
class Solution:
    def nextPalindrome(self, num: str) -> str:
        digits = list(num)
        mid = len(num) // 2
        midStr = "" if (len(num) % 2 == 0) else digits[mid]
        
        leftGreater = self.getNextLarger(digits[:mid])
        if not leftGreater:
            return ""
        
        return  "".join(leftGreater) + midStr + "".join(reversed(leftGreater))
        
    def getNextLarger(self, digits: List[str]) -> Optional[List[str]]:
        i = len(digits) - 2
        while i >= 0 and digits[i] >= digits[i+1]:
            i -= 1
        if i < 0:
            return []
        
        j = len(digits) - 1
        while j>=0 and digits[i] >= digits[j]:
            j -= 1

        digits[i], digits[j] = digits[j], digits[i]
        digits[i+1:] = reversed(digits[i+1:])
        
        return digits
    
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`