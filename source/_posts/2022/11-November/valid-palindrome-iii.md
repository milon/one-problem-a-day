---
extends: _layouts.post
section: content
title: Valid palindrome III
problemUrl: https://leetcode.com/problems/valid-palindrome-iii/
date: 2022-11-29
categories: [dynamic-programming]
---

We will solve the problem using top-down dynamic programming. If the first and last characters are the same, we will check if the substring between the first and last characters is a valid palindrome. If the first and last characters are not the same, we will check if the substring between the first and last characters is a valid palindrome if we remove either the first or the last character.

```python
class Solution:
    def isValidPalindrome(self, s: str, k: int) -> bool:
        def calculate(left: int, right: int, memo: dict) -> int:
            if (left, right) in memo:
                return memo[(left, right)]
            
            if left == right or left+1 == right:
                return 0
            
            if s[left] == s[right-1]:
                memo[(left, right)] = calculate(left+1, right-1, memo)
            else:
                memo[(left, right)] = min(calculate(left+1, right, memo), calculate(left, right-1, memo))+1
            
            return memo[(left, right)]
        
        return calculate(0, len(s)-1, {}) <= k
```

Time complexity: `O(n^2)`, n is the length of the string <br/>
Space complexity: `O(n^2)`