---
extends: _layouts.post
section: content
title: Break a palindrome
problemUrl: https://leetcode.com/problems/break-a-palindrome/
date: 2022-10-10
categories: [array-and-hashmap]
---

We can check the half of the string and if a character is not a, we can replace it with a. If all characters are a, we can replace the last character with b. If the string is a single character, we can return an empty string.

```python
class Solution:
    def breakPalindrome(self, palindrome: str) -> str:
        if len(palindrome) == 1:
            return ''

        for i in range(len(palindrome)//2):
            if palindrome[i] != 'a':
                return palindrome[:i] + 'a' + palindrome[i+1:]
        return palindrome[:-1] + 'b'
```

Time complexity: O(n) <br/>
Space complexity: O(1)