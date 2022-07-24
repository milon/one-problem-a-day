---
extends: _layouts.post
section: content
title: Longest substring without repeating characters
problemUrl: https://leetcode.com/problems/longest-substring-without-repeating-characters/
date: 2022-07-24
categories: [sliding-window]
---

We will use a set to keep track of repeating characters. We will have 2 pointers, we will move our right pointer, check if the character as right pointer is already exist in the set, if exists, then we remove characters for left until the character is removed, also updating the left pointer position in the process. We will keep track of the length of the set to get the maximum value and return it after right pointer moves to the end of the string.

```python
class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        charSet = set()
        l = 0
        res = 0
        
        for r in range(len(s)):
            while s[r] in charSet:
                charSet.remove(s[l])
                l += 1
            charSet.add(s[r])
            res = max(res, r-l+1)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`