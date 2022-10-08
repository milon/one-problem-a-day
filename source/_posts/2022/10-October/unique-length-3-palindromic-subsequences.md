---
extends: _layouts.post
section: content
title: Unique length 3 palindromic subsequences
problemUrl: https://leetcode.com/problems/unique-length-3-palindromic-subsequences/
date: 2022-10-08
categories: [array-and-hashmap]
---

For each palindromes in format of "aba", we enumerate the character on two side. We find its first occurrence and its last occurrence, all the characters in the middle are the candidate for the middle char.

```python
class Solution:
    def countPalindromicSubsequence(self, s: str) -> int:
        res = 0
        for c in string.ascii_lowercase:
            i, j = s.find(c), s.rfind(c)
            if i > -1:
                res += len(set(s[i + 1: j]))
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
