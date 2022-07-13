---
extends: _layouts.post
section: content
title: Valid palindrome
problemUrl: https://leetcode.com/problems/valid-palindrome/
date: 2022-07-13
categories: [two-pointers]
---

We will take 2 pointers, at the beginning of the string and end of the string, then we compare both. If the character is not an aplhabet or number we move the pointer value by one. We also convert the whole string to lowercase before doing the comperison.

```python
class Solution:
    def isPalindrome(self, s: str) -> bool:
        s = s.lower()
        left, right = 0, len(s)-1
        while left < right:
            if s[left] == s[right]:
                left += 1
                right -= 1
                continue
            if not (s[left].isalpha() or s[left].isnumeric()):
                left += 1
            elif not (s[right].isalpha() or s[right].isnumeric()):
                right -= 1
            else: return False
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`
