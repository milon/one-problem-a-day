---
extends: _layouts.post
section: content
title: Valid palindrome IV
problemUrl: https://leetcode.com/problems/valid-palindrome-iv/
date: 2022-12-10
categories: [array-and-hashmap, two-pointers]
---

We will use two pointers to check if the string is a palindrome. We will start from the beginning and the end of the string and we will check if the characters are the same. If they are not, we will count the mismatch. If the mismatch is greater than 2, we will return false, else return true.

```python
class Solution:
    def makePalindrome(self, s: str) -> bool:
        count = 0
        for i in range(len(s)//2):
            if s[i] != s[-1-i]:
                count += 1
        return count <= 2
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
