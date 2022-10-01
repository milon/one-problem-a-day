---
extends: _layouts.post
section: content
title: Valid palindrome II
problemUrl: https://leetcode.com/problems/valid-palindrome-ii/
date: 2022-10-01
categories: [two-pointers]
---

We will take two pointers, one at the beginning and one at the end. Then we start compare, if it doesn't match, then we try to skip the character in the left pointer and character in right pointer and check whether the rest is palindrome or not and return that. If the two pointers meet then it's a palindrome and we return that.

```python
class Solution:
    def validPalindrome(self, s: str) -> bool:
        l, r = 0, len(s)-1
        while l<=r:
            if s[l] != s[r]:
                skipL, skipR = s[l+1:r+1], s[l:r]
                return skipL == skipL[::-1] or skipR == skipR[::-1]
            l += 1
            r -= 1
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`